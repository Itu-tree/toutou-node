@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-sm-12">
            <div class="card">
                <div class="card-header">記事</div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-sm-6 col-md-3  mt-3">
                            <div class="card img-thumbnail h-100">
                                <img class="card-img-top img-fluid" src="/static/img/topic.png" alt="画像">
                                <div class="card-body px-2 py-3">
                                    <h5 class="card-title"><a href="{{ route('blog.post',['post'=>$post->id]) }}"
                                            target="_blank" 　rel="noopener noreferrer">{{ $post->title }}</a>
                                    </h5>
                                    <div class="card-text">
                                        <p><strong>距離 :</strong>
                                            <br />
                                            <a href="{{ route('blog.post',['post'=>$post->id]) }}" target="_blank"
                                                　rel="noopener noreferrer">
                                                {{$post->body}}</a>
                                        </p>
                                        <p>編集<a href="{{ route('admin.post.edit',['post'=>$post->id]) }}"
                                                target="_blank" 　rel="noopener noreferrer">編集</a></p>
                                        <p><strong>作成日 :</strong></p>
                                    </div>
                                </div><!-- /.card-body -->
                            </div><!-- /.card -->
                        </div>
                    </div>

                </div>

            </div>

        </div>
    </div>
    @endsection