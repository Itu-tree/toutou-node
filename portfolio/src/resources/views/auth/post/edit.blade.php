@extends('layouts.app')


<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/simplemde@latest/dist/simplemde.min.css">
<script src="https://cdn.jsdelivr.net/npm/simplemde@latest/dist/simplemde.min.js"></script>

@section('content')
<form method="POST" action="{{route('admin.post.update',['post'=>$post])}}">
    {{ csrf_field() }}
    <div class="row">
        <div class="col-12">
            <div class="form-group">
                <input type="hidden" class="form-control" name="state" value="{{ $post->state }}">
                <input type="text" name="title" class="form-control form-title" id="InputTitle" placeholder="タイトル"
                    value={{ $post->title }} />
                <span class="help-block">{{$errors->first('title')}}</span>
            </div>

            <body>
                <textarea id="mde" name="body">{{ $post->body }}</textarea>
            </body>

            <div class="row mt-3">
                <div class="col-sm-4 offset-sm-4">
                    <button type="submit" class="btn btn-primary w-100">保存</button>
                </div>
            </div>
</form>
<script>
    const mde = new SimpleMDE({
                    element: document.getElementById("mde")
                });
</script>
@endsection