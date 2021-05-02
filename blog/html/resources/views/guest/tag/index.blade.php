@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-sm-12">
            <div class="card">
                <div class="card-header">タグ一覧</div>
                <div class="card-body">
                    <div class="row">
                        <p>

                            @foreach ($tags as $tag)
                            <a href="{{ route('tag.articles',['tag'=>$tag->id]) }}" class="badge badge-light"
                                target=" _blank" rel="noopener noreferrer">
                                {{ $tag->name }}
                                <span class="badge badge-secondary">
                                    {{ $tag->articles()->count() }}
                                </span>
                            </a>
                            @endforeach
                        </p>
                    </div>

                </div>

            </div>

        </div>
    </div>
    @endsection