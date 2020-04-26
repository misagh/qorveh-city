<?php

namespace App\Http\Controllers;

use Image;
use Spatie\ImageOptimizer\OptimizerChainFactory;

class PostController extends Controller {

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

            session()->flash('success', 'تصویر شما با موفقیت ارسال شد و پس از بررسی در سایت منتشر خواهد شد.');

            return redirect()->back();
        }

        return view('posts.submit');
    }

    public function optimize($path, $thumb_path)
    {
        $img = Image::make($path)->fit(1920, 1080);

        $img->save($path);

        $thumb = Image::make($path)->resize(500, null, function ($constraint)
        {
            $constraint->aspectRatio();
        });

        $thumb->save($thumb_path);

        $optimizer = OptimizerChainFactory::create();

        $optimizer->optimize($path);

        $this->convert($path, $path);
    }

    public function convert($from, $to)
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
