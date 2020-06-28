<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Str;

class Post extends Model
{
    //
    use SoftDeletes;

    protected $primaryKey = 'id';
    public $incrementing = false;
    protected $keyType = 'string';
    protected $table = 'posts';
    protected $guarded = [];

    /**
     *  Setup model event hooks
     */
    public static function boot()
    {
        parent::boot();
        self::creating(function ($model) {
            $model->id = (string) Str::uuid();
        });
    }

    public static function init()
    {
        return parent::create(['title' => '', 'body' => '', 'mdbody' => '', 'status' => 'draft']);
    }

    public function scopeInStatus($query, $arr)
    {
        $posts = $query->whereIn('state', $arr);
        return $posts;
    }

    public function PostTags()
    {
        return $this->hadMany('App\PostTag');
    }

    public function tags()
    {
        return $this->hasManyThrough('App\Tag', 'App\PostTag', 'post_id', 'id', 'id', 'tag_id');
    }
}
