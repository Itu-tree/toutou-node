@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-sm-12">
            <div class="card">
                <div class="card-header">記事</div>
                <div class="card-body markdown-body">
                    <div class="card-text">
                        <p><a href="{{ route('admin.post.edit',['post'=>$post->id]) }}">
                                <strong>編集</strong>
                            </a></p>
                        <p><strong>更新日 :{{ $post->updated_at }}</strong></p>
                        {!! $post->body !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endsection