@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-sm-12">
            <div class="card">
                <div class="card-header">
                    {{ $post->title }}
                    {{ $post->updated_at }}
                    <a href="{{ route('admin.post.edit',['post'=>$post->id]) }}" target="_blank"
                        　rel="noopener noreferrer">編集</a>
                </div>
                <div class="card-body markdown-body">
                    <div class="card-text">
                    </div>
                    {!! $post->body !!}
                </div>
            </div>
        </div>
    </div>
    @endsection