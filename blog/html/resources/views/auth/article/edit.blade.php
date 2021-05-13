@extends('layouts.app_editor')

@section('content')
<form method="POST" action="{{route('admin.article.update',['article'=>$article])}}">
    {{ csrf_field() }}
    <div class="row justify-content-md-center">
        <div class="col-md-10">
            <div class=" form-group">
                <input type="text" name="title" class="form-control form-title" id="InputTitle" placeholder="タイトル"
                    value="{{ $article->title }}" required />
                <span class="help-block">{{$errors->first('title')}}</span>
            </div>
        </div>
    </div>
    <div class="row justify-content-md-center">
        <div class="col-md-10">
            <div id="select_tags" tags="{{json_encode($tags,JSON_UNESCAPED_UNICODE)}}"
                article_tags="{{json_encode($article->tags,JSON_UNESCAPED_UNICODE)}}"></div>
        </div>
    </div>
    <div class="row justify-content-md-center">
        <div class="col-md-10">
            <textarea name="body" id="editor">
            {{ $article->body }}
            </textarea>
        </div>
    </div>
    <div class="row justify-content-md-center">
        <div class="form-group col-md-6">
            <label for="exampleSelect1exampleFormControlSelect1"></label>
            <select class="form-control" id="exampleFormControlSelect1" name="state">
                <option value="draft" {{ $article->state == "draft"?"selected":"" }}>draft</option>
                <option value="public" {{ $article->state == "public" ? "selected":"" }}>public</option>
            </select>
        </div>
        <div class="col-md-4 mt-4">
            <button type="submit" class="btn btn-primary w-100">保存</button>
        </div>
    </div>
    <div class="row justify-content-md-center">
        <div class="form-group col-md-10">
            <input type="hidden" class="form-control" name="state" value="{{ $article->state }}">
        </div>
    </div>
    <div class="row justify-content-md-center">
        <div class="form-group col-md-10">
            <input type="hidden" class="form-control" name="article_id" value="{{ $article->id }}">
        </div>
    </div>
</form>
<script>
    ClassicEditor
    .create( document.querySelector( '#editor' ),{
        simpleUpload: {
		// The URL that the images are uploaded to.
		uploadUrl: '{{route("admin.article.upload-image") }}',

		// Enable the XMLHttpRequest.withCredentials property.
		withCredentials: true,

		// Headers sent along with the XMLHttpRequest to the upload server.
		headers: {
            'article-id':'{{$article->id}}',
			'X-CSRF-TOKEN': '{{ csrf_token() }}',
			Authorization: '{{ csrf_token() }}',
		}
	},
    } )
    .then( editor => {
        {{-- console.log( editor ); --}}
    } )
    .catch( error => {
        {{-- console.error( error ); --}}
    } );
</script>

@endsection