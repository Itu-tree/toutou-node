<?php

namespace App\UseCases\Tag;

use App\ArticleTag;
use App\Tag;

class UpdateArticleTags
{
    public function __invoke($article_id = null, $pre_tag_names = [], $new_tag_names = [])
    {
        //create Tag
        foreach ($new_tag_names as $tag_name) {
            Tag::firstOrCreate(['name' => $tag_name]);
        }
        //update articletag
        $add_tag_names = array_diff($new_tag_names, $pre_tag_names);
        $add_tag_ids = Tag::whereIn('name', $add_tag_names)->pluck('id');
        foreach ($add_tag_ids as $tag_id) {
            ArticleTag::firstOrCreate(['article_id' => $article_id, 'tag_id' => $tag_id]);
        }
        $delete_tag_names = array_diff($pre_tag_names, $new_tag_names);
        $delete_tag_ids = Tag::whereIn('name', $delete_tag_names)->pluck('id');
        ArticleTag::where('article_id', $article_id)->whereIn('tag_id', $delete_tag_ids)->delete();
        return true;
    }
}
