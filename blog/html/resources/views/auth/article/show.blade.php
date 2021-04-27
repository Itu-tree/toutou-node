@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-sm-12">
            <div class="card">
                <div class="card-header">
                    <h1>{{ $article->title }}</h1>
                    <a href="{{ route('admin.article.edit',['article'=>$article->id]) }}">
                        <strong>編集</strong>
                    </a>
                </div>
                <div class="card-body">
                    <p>
                        state:{{ $article->state }}
                    </p>
                    <p>
                        更新:{{ date("Y/m/d",strtotime($article->updated_at))  }}
                        作成：{{ date("Y/m/d",strtotime($article->created_at)) }}
                    </p>
                    <p>
                        @foreach ($article->tags as $tag)
                        <button type="button" class="btn-sm btn-outline-dark">{{ $tag->name }}</button>
                        @endforeach
                    </p>
                    <div class="card-text markdown-body">
                        {!! $article->body !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endsection