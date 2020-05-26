<?php

namespace App\Http\Controllers;

use Image;
use App\Post;
use Spatie\ImageOptimizer\OptimizerChainFactory;

class PostController extends Controller {

    public function view($slug)
    {
        $post = (new Post)->where('slug', $slug)->where('verified', true)->first();

        if (empty($post))
        {
            abort(404);
        }

        return view('posts.view', compact('post'));
    }

    public function submit()
    {
        if (request()->isMethod('post'))
        {
            $extension = request()->file('image')->extension();

            $hash = substr(sha1(time() . auth()->id()), 0, 15);
            $thumb = $hash . '_t';
            $file_name = $hash . '.' . $extension;
            $thumb_name = $thumb . '.' . $extension;
            $file_dir = substr($file_name, 0, 2);
            $dir_path = storage_path('app/images/' . $file_dir);
            $thumb_path = storage_path('app/images/' . $file_dir . '/' . $thumb_name);

            if (! is_dir($dir_path))
            {
                mkdir($dir_path);
            }

            $path = request()->file('image')->storeAs('images/' . $file_dir, $file_name);

            $this->optimize($path, $thumb_path);

            $data = request()->all();
            $data['description'] = '';
            $data['image'] = $file_name;
            $data['slug'] = $this->getSlug($data['title']);

            auth()->user()->posts()->create($data);

            session()->flash('success', 'تصویر شما با موفقیت ارسال شد و پس از بررسی در سایت منتشر خواهد شد.');

            return redirect()->back();
        }

        return view('posts.submit');
    }

    private function getSlug($title)
    {
        $slug = str_replace(['،', '"', ':', '-', ',', '!', '.', '|', '#', '%', '&', '*', '(', ')', '=', '_', '+', '/', '[', ']'], '', $title);
        $slug = preg_replace('/\s+/', ' ', $slug);
        $slug = str_replace(' ', '-', $slug);
        $slug_last = (new Post)->where('slug', 'LIKE', $slug . '%')->orderByDesc('id')->first();

        $index = null;

        if (! empty($slug_last))
        {
            $slug_index = last(explode('-', $slug_last->slug));

            $index = is_numeric($slug_index) ? $slug_index + 1 : 1;
        }

        return $slug . ($index ? '-' . $index : '');
    }

    private function optimize($path, $thumb_path)
    {
        $img = Image::make($path)->resize(1920, null, function ($constraint)
        {
            $constraint->aspectRatio();
            $constraint->upsize();
        });

        $img->save($path);

        $thumb = Image::make($path)->resize(500, null, function ($constraint)
        {
            $constraint->aspectRatio();
            $constraint->upsize();
        });

        $thumb->save($thumb_path);

        $optimizer = OptimizerChainFactory::create();

        $optimizer->optimize($path);

        $this->convert($path, $path);
    }

    private function convert($from, $to)
    {
        $command = 'convert '
                   . $from
                   . ' '
                   . '-sampling-factor 4:2:0 -strip -quality 65'
                   . ' '
                   . $to;

        return `$command`;
    }
}
