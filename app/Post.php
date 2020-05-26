<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model {

    protected $fillable = ['title', 'slug', 'description', 'body', 'image'];
    protected $appends = ['full_image', 'thumbnail_image'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function tags()
    {
        return $this->belongsToMany(Tag::class);
    }

    public function getFullImageAttribute()
    {
        $path = substr($this->image, 0, 2);

        return asset('images/' . $path . '/' . $this->image);
    }

    public function getThumbnailImageAttribute()
    {
        $path = substr($this->image, 0, 2);

        $thumb = explode('.', $this->image);
        $thumb = $thumb[0] . '_t.' . $thumb[1];

        return asset('images/' . $path . '/' . $thumb);
    }
}
