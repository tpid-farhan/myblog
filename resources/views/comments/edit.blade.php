@extends('main')

@section('title','| Edit Comment')

@section('content')
    <div class="row">
        <div class="col-md-8 offset-2">
            <h3>Edit Comment</h3>
            <form method="POST" action="{{ route('comments.update',$comment->id) }}">
                @csrf
                @method('PUT')
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="name">Name:</label>
                        <input name="name" type="text" value="{{ $comment->name }}" class="form-control" disabled>
                    </div>
                    <div class="form-group col-md-6">
                        <label for="email">Email:</label>
                        <input name="email" type="email" value="{{ $comment->email }}" class="form-control" disabled>
                    </div>
                </div>
                <div class="form-group">
                    <label for="comment">Comment:</label>
                    <textarea name="comment" id="comment" rows="10" class="form-control">{{ $comment->comment }}</textarea>
                </div>
                <button type="submit" name="submit" class="btn btn-success btn-block">Save Changes</button>
            </form>
        </div>
    </div>
@endsection