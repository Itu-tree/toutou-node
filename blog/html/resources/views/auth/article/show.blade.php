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
                    state:{{ $article->state }}
                    updated_at:{{ $article->updated_at }}
                </div>
                <div class="card-body">
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