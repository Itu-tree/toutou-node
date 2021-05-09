<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Tag extends Model
{
    //
    protected $guarded = [];

    public function articles()
    {
        return $this->belongsToMany('App\Article', 'article_tags', 'tag_id', 'article_id');
    }

    public function scopeInStatus($query, $arr)
    {
        $tags = $query->join('article_tags', 'tags.id', '=', 'article_tags.tag_id')
            ->join('articles', 'articles.id', '=', 'article_tags.article_id')
            ->whereIn('state', $arr)
            ->groupBy('tags.id')
            ->select('tags.id as id', 'tags.name as name', DB::raw('count(articles.id) as count'));
        return $tags;
    }
}
