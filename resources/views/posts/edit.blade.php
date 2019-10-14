@extends('main')

@section('title','| Edit Post')

@section('stylesheet')
    <link rel="stylesheet" href="{{ asset('css/parsley.css') }}">
    <link rel="stylesheet" href="{{ asset('css/select2.min.css') }}">
    <script src="https://cdn.tiny.cloud/1/no-api-key/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
    <script>
        tinymce.init({
            selector: 'textarea',
            toolbar: 'insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image | print preview media fullpage | forecolor backcolor emoticons'
        });
    </script>
@endsection

@section('content')
    <form class="row" method="POST" action="{{ route('posts.update',$post->id) }}">
        {{ csrf_field() }}
        @method('PUT')
        <div class="col-md-8">
            <h1>Edit Post</h1>
            <div class="form-group">
                <label for="title">Title :</label>
                <input type="text" name="title" value="{{ old('title',$post->title) }}" class="form-control">
            </div>
            <div class="form-group">
                <label for="slug">Slug :</label>
                <input type="text" name="slug" value="{{ old('slug',$post->slug) }}" class="form-control form-control-sm" >
            </div>
            <div class="form-group">
                <label for="category">Category :</label>
                <select name="category" id="category" class="form-control form-control-sm">
                    @foreach ($categories as $category)
                        @if ($category->id == $post->categories_id)
                            <option value="{{ old('category',$category->id) }}" selected>{{ $category->name }}</option>
                        @else
                            <option value="{{ old('category',$category->id) }}">{{ $category->name }}</option>
                        @endif
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="tags">Tags :</label>
                <select name="tags[]" id="tags" class="form-control form-control-sm select2-multi" multiple="multiple">
                    @foreach ($tags as $tag)
                        <option value="{{ $tag->id }}">{{ $tag->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="body">Body :</label>
                <textarea name="body" id="body" cols="30" rows="10" class="form-control">{{ old('body',$post->body) }}</textarea>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card">
                <div class="card-body">
                    <div class="row mb-4">
                        <div class="col-sm-6 text-right font-weight-bold">Created at : </div>
                        <div class="col-sm-6 text-left">{{ date('M d, Y h:ia',strtotime($post->created_at))}}</div>
                    </div>
                    <div class="row">
                        <div class="col-sm-6 text-right font-weight-bold">Last Updated : </div>
                        <div class="col-sm-6 text-left">{{ date('M d, Y h:ia',strtotime($post->updated_at))}}</div>
                    </div>
                </div>
                <div class="card-body pt-0">
                    <hr>
                    <div class="row">
                        <div class="col-sm-6">
                            <a href="{{ route('posts.show',$post->id) }}" class="btn btn-danger btn-block">Cancel</a>
                        </div>
                        <div class="col-sm-6">
                            <input type="submit" class="btn btn-success btn-block" value="Save Changes">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
@endsection

@section('script')
    <script src="{{ asset('js/parsley.min.js') }}"></script>
    <script src="{{ asset('js/select2.min.js') }}"></script>
    <script>
        $('.select2-multi').select2();
        $('.select2-multi').select2().val({!! json_encode($post->tags()->allRelatedIds()) !!}).trigger('change');
        $('#form').parsley();
    </script>
@endsection