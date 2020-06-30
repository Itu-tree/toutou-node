@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-sm-12">
            <div class="card">
                <div class="card-header">記事</div>
                <div class="card-body">
                    <div class="row">
                        @foreach ($posts as $post)
                        <div class="col-sm-6 col-md-3  mt-3">
                            <div class="card img-thumbnail h-100">
                                {{--  <img class="card-img-top img-fluid" src="/static/img/topic.png" alt="画像">  --}}
                                <div class="card-body px-2 py-3">
                                    <h5 class="card-title"><a href="{{ route('post.show',['post'=>$post->id]) }}"
                                            target="_blank" 　rel="noopener noreferrer">{{ $post->title }}</a>
                                    </h5>
                                    <div class="card-text">
                                        <p><strong>updated_at :{{ $post->updated_at }}</strong></p>
                                    </div>
                                </div><!-- /.card-body -->
                            </div><!-- /.card -->
                        </div>
                        @endforeach
                    </div>

                </div>

            </div>

        </div>
    </div>
    @endsection