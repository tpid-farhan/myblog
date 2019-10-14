@extends('main')
@section('title','| Create Post')

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
    <div class="row">
        <div class="col-md-8 offset-md-2">
            <h1>Create New Post</h1>
            <hr>
            <form id="form" method="POST" action="{{ route('posts.store') }}">
                {{ csrf_field() }}
                <div class="form-group">
                    <label for="title">Title :</label>
                    <input type="text" name="title" class="form-control" value="{{ old('title') }}" required>
                </div>
                <div class="form-group">
                    <label for="slug">Slug :</label>
                    <input type="text" name="slug" class="form-control form-control-sm" value="{{ old('slug') }}" required>
                </div>
                <div class="form-group">
                    <label for="category">Category :</label>
                    <select name="category" id="category" class="form-control form-control-sm" required>
                        @foreach ($categories as $category)
                            <option value="{{ $category->id }}">{{ $category->name }}</option>
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
                    <textarea name="body" id="body" cols="30" rows="10" class="form-control">{{ old('body') }}</textarea>
                </div>
                <input type="submit" name="submit" value="Create New Post" class="btn btn-success btn-lg btn-block">
            </form>
        </div>
    </div>
@endsection

@section('script')
    <script src="{{ asset('js/parsley.min.js') }}"></script>
    <script src="{{ asset('js/select2.min.js') }}"></script>
    <script>
        $('.select2-multi').select2({
            placeholder : 'Select an option'
        });
        $('#form').parsley();
    </script>
@endsection