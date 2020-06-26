@extends('layouts.app')
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/katex@0.11.1/dist/katex.min.css"
    integrity="sha384-zB1R0rpPzHqg7Kpt0Aljp8JPLqbXI3bhnPWROx27a9N0Ll6ZP/+DiW/UqRcLbRjq" crossorigin="anonymous">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/highlight.js/9.14.2/styles/vs2015.min.css">
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-sm-12">
            <div class="card">
                <div class="card-header">記事</div>
                <div class="card-body">
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