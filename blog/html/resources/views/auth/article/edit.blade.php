@extends('layouts.app')

<!-- Scripts -->

@section('content')
<form method="POST" action="{{route('admin.article.update',['article'=>$article])}}">
    {{ csrf_field() }}
    <div class="row">
        <div class="col-12">
            <div class="form-group">
                <input type="text" name="title" class="form-control form-title" id="InputTitle" placeholder="タイトル"
                    value="{{ $article->title }}" required />
                <span class="help-block">{{$errors->first('title')}}</span>
            </div>

            <div id="app-editor">
                <editor :mdbody='@json($article->mdbody)' :article_id='@json($article->id)'
                    :url="{{ json_encode(route('admin.article.upload-image')) }}">
                </editor>
            </div>
            <div class="form-group">
                <input type="hidden" class="form-control" name="state" value="{{ $article->state }}">
                <span class="help-block">{{$errors->first('title')}}</span>
            </div>
            <div id="select_tags" tags="{{json_encode($tags,JSON_UNESCAPED_UNICODE)}}"
                article_tags="{{json_encode($article->tags,JSON_UNESCAPED_UNICODE)}}"></div>
            <div class="form-group">
                <label for="exampleSelect1exampleFormControlSelect1"></label>
                <select class="form-control" id="exampleFormControlSelect1" name="state">
                    <option value="draft" {{ $article->state == "draft"?"selected":"" }}>draft</option>
                    <option value="public" {{ $article->state == "public" ? "selected":"" }}>public</option>
                </select>
            </div>

            <div class="row mt-3">
                <div class="col-sm-4 offset-sm-4">
                    <button type="submit" class="btn btn-primary w-100">保存</button>
                </div>
            </div>
</form>
<script src="{{ asset('js/react-app.js') }}" defer></script>
@endsection