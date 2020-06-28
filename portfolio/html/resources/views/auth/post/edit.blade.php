@extends('layouts.app')


@section('content')
<form method="POST" action="{{route('admin.post.update',['post'=>$post])}}">
    {{ csrf_field() }}
    <div class="row">
        <div class="col-12">
            <div class="form-group">
                <input type="text" name="title" class="form-control form-title" id="InputTitle" placeholder="タイトル"
                    value="{{ $post->title }}" required />
                <span class="help-block">{{$errors->first('title')}}</span>
            </div>
            <div id="app-editor">
                <editor :mdbody='@json($post->mdbody)' :post_id='@json($post->id)'
                    :url="{{ json_encode(route('admin.post.upload-image')) }}">
                </editor>
            </div>
            <div class="form-group">
                <input type="hidden" class="form-control" name="state" value="{{ $post->state }}">
                <span class="help-block">{{$errors->first('title')}}</span>
            </div>
            <div class="form-group">
                <label for="exampleSelect1exampleFormControlSelect1"></label>
                <select class="form-control" id="exampleFormControlSelect1" name="state">
                    <option value="draft" {{ $post->state == "draft"?"selected":"" }}>draft</option>
                    <option value="public" {{ $post->state == "public" ? "selected":"" }}>public</option>
                </select>
            </div>
            <div class="row mt-3">
                <div class="col-sm-4 offset-sm-4">
                    <button type="submit" class="btn btn-primary w-100">保存</button>
                </div>
            </div>
</form>

@endsection