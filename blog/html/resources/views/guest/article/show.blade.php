@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-1 d-none d-sm-block">
            <div class="sidebar-item">
                <div class="make-me-sticky mt-5">
                    <p>
                        <a href={{ "http://twitter.com/share?text=&url=".url()->current() }} target="_blank"
                            rel="nofollow noopener noreferrer">
                            <span class="fab fa-twitter-square fa-2x"></span>
                        </a>
                    </p>
                    <p>
                        <a href={{ "https://social-plugins.line.me/lineit/share?url=".url()->current() }}
                            target="_blank" rel="nofollow noopener noreferrer">
                            <span class="fab fa-line fa-2x" style="color:forestgreen;"></span>
                        </a>
                    </p>
                    <p>
                        <a href={{"https://www.facebook.com/sharer/sharer.php?u=".url()->current()}} target="_blank"
                            rel="nofollow noopener noreferrer">
                            <span class="fab fa-facebook-square fa-2x"></span>
                        </a>
                    </p>
                    <p>
                        <a href="https://b.hatena.ne.jp/entry/" class="hatena-bookmark-button"
                            data-hatena-bookmark-layout="touch" data-hatena-bookmark-width="25.2"
                            data-hatena-bookmark-height="25.2" title="このエントリーをはてなブックマークに追加"><img
                                src="https://b.st-hatena.com/images/v4/public/entry-button/button-only@2x.png"
                                alt="このエントリーをはてなブックマークに追加" width="20" height="20" style="border: none;" /></a>
                        <script type="text/javascript" src="https://b.st-hatena.com/js/bookmark_button.js"
                            charset="utf-8" async="async"></script>
                    </p>
                </div>
            </div>
        </div>
        <div class="col-sm-9">
            <div class="card">
                <div class="card-header bg-transparent">
                    <h1>{{ $article->title }}</h1>
                    @auth
                    <p class="text-right">
                        <a href="{{ route('admin.article.edit',['article'=>$article->id]) }}">
                            state:{{ $article->state }} | <strong>編集</strong>
                        </a>
                    </p>
                    @endauth
                </div>
                <div class="card-body">
                    <p>
                        更新:{{ date("Y/m/d",strtotime($article->updated_at))  }}
                        作成：{{ date("Y/m/d",strtotime($article->created_at)) }}
                    </p>
                    <p>
                        @foreach ($article->tags as $tag)
                        <a href="{{ route('tag.articles',['tag'=>$tag->id]) }}" class="badge badge-light"
                            target=" _blank" rel="noopener noreferrer">
                            <i class="fas fa-tag"></i> {{ $tag->name }}
                        </a>
                        @endforeach
                    </p>

                    <body class="card-text " data-spy="scroll" data-target="#toc">
                        {!! $article->body !!}
                    </body>
                </div>
            </div>
        </div>
        <div class="col-2 d-none d-sm-block">
            <div class="sidebar-item">
                <div class="make-me-sticky">
                    {{-- <h3>記事検索</h3> --}}
                    <nav id="toc" data-toggle="toc">
                        <h4>目次</h4>
                    </nav>
                    <h4>タグ一覧</h4>
                    <p>
                        @foreach ($tags as $tag)
                        <a href="{{ route('tag.articles',['tag'=>$tag->id]) }}" class="badge badge-light"
                            target=" _blank" rel="noopener noreferrer">
                            <i class="fas fa-tag"></i> {{ $tag->name }}
                            <span class="badge badge-secondary">
                                {{ $tag->count }}
                            </span>
                        </a>
                        @endforeach
                    </p>
                </div>
            </div>
        </div>
    </div>

    @endsection