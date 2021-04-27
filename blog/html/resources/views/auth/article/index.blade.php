@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-sm-12">
            <div class="card">
                <div class="card-header">記事</div>
                <div class="card-body">
                    <div class="row">
                        @isset($articles)
                        @foreach ($articles as $at)
                        <div class="col-sm-6 col-md-3  mt-3">
                            <div class="card img-thumbnail h-100">
                                {{--  <img class="card-img-top img-fluid" src="/static/img/topic.png" alt="画像">  --}}
                                <div class="card-body px-2 py-3">
                                    <h5 class="card-title"><a
                                            href="{{ route('admin.article.show',['article'=>$at->id]) }}"
                                            target="_blank" 　rel="noopener noreferrer">t:{{ $at->title }}</a>
                                    </h5>
                                    <div class="card-text">
                                        <p>
                                            state:{{ $at->state }}
                                        </p>
                                        <p>
                                            <i class="far fa-clock"></i> {{ date("Y/m/d",strtotime($at->updated_at)) }}
                                        </p>
                                        <p>
                                            @foreach ($at->tags as $tag)
                                            <button type="button" class="btn-sm btn-outline-dark">
                                                <i class="fas fa-tag"></i> {{ $tag->name }}
                                            </button>
                                            @endforeach
                                        </p>
                                    </div>
                                </div><!-- /.card-body -->
                            </div><!-- /.card -->
                        </div>
                        @endforeach
                        @endisset
                    </div>

                </div>

            </div>

        </div>
    </div>
    @endsection