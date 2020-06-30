<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Str;

class Article extends Model
{
    //
    use SoftDeletes;

    protected $primaryKey = 'id';
    public $incrementing = false;
    protected $keyType = 'string';
    protected $table = 'articles';
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
        return parent::create(['title' => '', 'body' => '', 'mdbody' => '', 'state' => 'draft']);
    }

    public function scopeInStatus($query, $arr)
    {
        $articles = $query->whereIn('state', $arr);
        return $articles;
    }

    public function ArticleTags()
    {
        return $this->hadMany('App\ArticleTag');
    }

    public function tags()
    {
        return $this->hasManyThrough('App\Tag', 'App\ArticleTag', 'article_id', 'id', 'id', 'tag_id');
    }
}
