@extends('layouts.app_editor')

<!-- Scripts -->

@section('content')
<script src="{{ asset('js/ckeditor.js') }}"></script>

<form method="POST" action="{{route('admin.article.update',['article'=>$article])}}">
    {{ csrf_field() }}
    <div class="row">
        <div class="col-12  p-5">
            <div class=" form-group">
                <input type="text" name="title" class="form-control form-title" id="InputTitle" placeholder="タイトル"
                    value="{{ $article->title }}" required />
                <span class="help-block">{{$errors->first('title')}}</span>
            </div>

            <textarea name="body" id="editor">
                {{ $article->body }}
            </textarea>
            <div class="form-group">
                <input type="hidden" class="form-control" name="state" value="{{ $article->state }}">
            </div>
            <div class="form-group">
                <input type="hidden" class="form-control" name="article_id" value="{{ $article->id }}">
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
        console.log( editor );
    } )
    .catch( error => {
        console.error( error );
    } );

</script>
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

<script src="{{ asset('js/react-app.js') }}" defer></script>
@endsection