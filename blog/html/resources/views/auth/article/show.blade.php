@extends('layouts.app')

@section('content')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/highlight.js/9.15.10/styles/vs.min.css">
<script src="https://cdnjs.cloudflare.com/ajax/libs/highlight.js/9.15.10/highlight.min.js"></script>
<script>
    hljs.initHighlightingOnLoad();
</script>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-sm-12">
            <div class="card">
                <div class="card-header　bg-transparent">
                    <h1>{{ $article->title }}</h1>
                    <a href="{{ route('admin.article.edit',['article'=>$article->id]) }}">
                        <strong>編集</strong>
                    </a>
                </div>
                <div class="card-body">
                    <p>
                        state:{{ $article->state }}
                    </p>
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