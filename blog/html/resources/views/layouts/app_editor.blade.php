<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ "editor"." - "}} {{ config('app.name', 'Laravel') }}</title>
    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-172522830-1"></script>
    <script>
        window.dataLayer = window.dataLayer || [];
      function gtag(){dataLayer.push(arguments);}
      gtag('js', new Date());
      gtag('config', 'UA-172522830-1');
    </script>

    <!-- Scripts -->
    <script src="{{ asset('js/ckeditor.js') }}"></script>
    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    <script src="https://kit.fontawesome.com/e6a8d8d763.js" crossorigin="anonymous"></script>

    <!-- Styles -->
    <link href="{{ mix('css/app.css') }}" rel="stylesheet">
    <link href="{{ mix('css/custom.css') }}" rel="stylesheet">
    {{--  MathJax  --}}
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
    <script src="{{ mix('js/react-app.js') }}" defer></script>
</head>

<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    {{ config('app.name', 'Laravel') }}
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse"
                    data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                    aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        @guest
                        {{--  <li class="nav-item">
                            <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                        </li> --}}
                        {{--  <li class="nav-item">
                            <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                        </li> --}}
                        {{--  @if (Route::has('register'))
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                        </li>
                        @endif --}}
                        @else
                        <li class="nav-item dropdown">
                            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                {{ Auth::user()->name }} <span class="caret"></span>
                            </a>

                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                    {{ __('Logout') }}
                                </a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                    style="display: none;">
                                    @csrf
                                </form>

                                <a class="dropdown-item" href="{{ route('admin.home') }}">ホーム</a>
                                <a class="dropdown-item" href="{{ route('admin.article.manage') }}">管理</a>
                                <a class="dropdown-item" href="{{ route('admin.article.manage-public') }}">公開記事一覧</a>
                                <a class="dropdown-item" href="{{ route('admin.article.manage-draft') }}">下書き記事一覧</a>
                                <a class="dropdown-item" href="{{ route('admin.article.create') }}">作成</a>
                        </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

        <main class="py-4">
            @yield('content')
        </main>
        <footer class="container pt-4 my-md-5 pt-md-5 border-top">
            <div class="row justify-content-center">
                <div class="col-6 col-md">
                    <h5>新着記事</h5>
                    <ul class="list-unstyled text-small">
                        @isset($articles)
                        @foreach ($articles as $art)
                        <li class="border-bottom pt-1 pb-1"><a class="text-muted"
                                href="{{ route('article.show',['article'=>$art->id]) }}">
                                {{ $art->title }}
                            </a>
                        </li>
                        @if ($loop->index >= 4)
                        @break
                        @endif
                        @endforeach
                        @endisset
                    </ul>
                </div>
                <div class="col-6 col-md ">
                    <h5>リンク</h5>
                    <ul class="list-unstyled text-small">
                        <li class="border-bottom pt-1 pb-1"><a class="text-muted"
                                href="https://toutounode.com">ポートフォリオトップ</a></li>
                        <li class="border-bottom pt-1 pb-1"><a class="text-muted"
                                href="https://blog.toutounode.com">ブログトップ</a></li>
                        <li class="border-bottom pt-1 pb-1"><a class="text-muted"
                                href="https://github.com/Itu-tree">Github</a></li>
                        <li class="border-bottom pt-1 pb-1"><a class="text-muted"
                                href="https://twitter.com/__tou__tou">twitter</a></li>
                        <li class="border-bottom pt-1 pb-1"><a class="text-muted"
                                href="https://www.amazon.co.jp/hz/wishlist/dl/invite/3KiTDNy?ref_=wl_share">ほしいものリスト</a>
                        </li>
                    </ul>
                </div>
                <div class="col-6 col-md ">
                    <h5>サイト情報</h5>
                    <ul class="list-unstyled text-small">
                        <li class="border-bottom pt-1 pb-1"><a class="text-muted"
                                href="{{ route('privacy') }}">お問い合わせ</a></li>
                        <li class="border-bottom pt-1 pb-1"><a class="text-muted"
                                href="{{ route('privacy') }}">プライバシーポリシー</a></li>
                    </ul>
                </div>
            </div>
            <div class="row justify-content-center">
                <small class="d-block mb-3 text-muted">©{{ config('app.name', 'Laravel') }}</small>
            </div>
        </footer>
    </div>
</body>

</html>