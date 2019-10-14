@extends('main')

@section('title','| Edit Tag')

@section('stylesheet')
    <link rel="stylesheet" href="{{ asset('css/parsley.css') }}">
@endsection

@section('content')
    <div class="row">
        <div class="col-md-12">
            <form id="form" method="POST" action="{{ route('tags.update',$tags->id) }}">
                @csrf
                @method('PUT')
                <div class="form-group">
                    <label for="name">Name : </label>
                    <input type="text" class="form-control" name="name" value="{{ $tags->name }}" required>
                </div>
                <button type="submit" class="btn btn-success">Save Changes</button>
            </form>
        </div>
    </div>
@endsection

@section('script')
    <script src="{{ asset('js/parsley.min.js') }}"></script>
@endsection