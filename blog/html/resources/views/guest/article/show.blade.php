@extends('layouts.app')

@section('content')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/highlight.js/9.15.10/styles/vs.min.css">
<script src="https://cdnjs.cloudflare.com/ajax/libs/highlight.js/9.15.10/highlight.min.js"></script>
<script>
    hljs.initHighlightingOnLoad();
</script>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-1">
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
        <div class="col-9">
            <div class="card">
                <div class="card-header bg-transparent">
                    <h1>{{ $article->title }}</h1>
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
                    <div class="card-text markdown-body">
                        {!! $article->body !!}
                    </div>
                </div>
            </div>
        </div>
        <div class="col-2">
            <div class="sidebar-item">
                <div class="make-me-sticky">
                    {{-- <h3>記事検索</h3> --}}
                    <h4>最近の投稿</h4>
                    <ul class="list-unstyled text-small">
                        @isset($articles)
                        @foreach ($articles as $s_article)
                        <li class="border-bottom pt-1 pb-1"><a class="text-muted"
                                href="{{ route('article.show',['article'=>$s_article->id]) }}">{{ $s_article->title }}</a>
                        </li>
                        @if ($loop->index >= 2)
                        @break
                        @endif
                        @endforeach
                        @endisset
                    </ul>
                    {{-- <h3>目次</h3> --}}
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
    <script type="text/javascript"
        src="https://cdnjs.cloudflare.com/ajax/libs/mathjax/2.7.6/MathJax.js?config=TeX-MML-AM_CHTML"></script>
    <script>
        MathJax.Ajax.config.path["mhchem"] = "https://cdnjs.cloudflare.com/ajax/libs/mathjax-mhchem/3.3.2";
      MathJax.Hub.Config({
        showMathMenu: false,
        TeX: {
          extensions: [ "[mhchem]/mhchem.js" ]
        },
        messageStyle: "none",
          tex2jax: {
          preview: "none"
        }
      });
    </script>
    @endsection