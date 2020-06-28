@extends('layouts.app_show')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-sm-12">
            <div class="card">
                <div class="card-header">記事</div>
                <div class="card-body markdown-body">
                    <div class="card-text">
                        <p>編集<a href="{{ route('admin.post.edit',['post'=>$post->id]) }}" target="_blank"
                                　rel="noopener noreferrer">編集</a></p>
                        <p><strong>作成日 :{{ $post->updated_at }}</strong></p>
                        {!! $post->body !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endsection