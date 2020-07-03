@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-sm-12">
            <div class="card">
                <div class="card-header">{{ $article->title }}</div>
                <div class="card-body markdown-body">
                    <div class="card-text">
                        <p><a href="{{ route('admin.article.edit',['article'=>$article->id]) }}">
                                <strong>編集</strong>
                            </a></p>
                        <p><strong>更新日 :{{ $article->updated_at }}</strong></p>
                        {!! $article->body !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endsection