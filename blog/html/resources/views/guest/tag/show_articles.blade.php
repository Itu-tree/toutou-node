@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-sm-12">
            <div class="card">
                <div class="card-header">{{ $tag->name }} の記事</div>
                <div class="card-body">
                    <div class="row">
                        @foreach ($articles as $at)
                        <div class="col-sm-6 col-md-3  mt-3">
                            <div class="card img-thumbnail h-100">
                                {{--  <img class="card-img-top img-fluid" src="/static/img/topic.png" alt="画像">  --}}
                                <div class="card-body px-2 py-3">
                                    <h5 class="card-title"><a href="{{ route('article.show',['article'=>$at->id]) }}"
                                            target="_blank" 　rel="noopener noreferrer">{{ $at->title }}</a>
                                    </h5>
                                    <div class="card-text">
                                        <p>
                                            <i class="far fa-clock"></i> {{ date("Y/m/d",strtotime($at->updated_at)) }}
                                        </p>
                                        <p>
                                            @foreach ($at->tags as $tag)
                                            <a href="{{ route('tag.articles',['tag'=>$tag->id]) }}"
                                                class="badge badge-light" target=" _blank" rel="noopener noreferrer">
                                                <i class="fas fa-tag"></i> {{ $tag->name }}
                                            </a>
                                            @endforeach
                                        </p>
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