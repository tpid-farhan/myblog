@extends('main')

@section('title','| Confirm Delete')
    
@section('content')
    <div class="row">
        <div class="col-md-8 offset-2">
            <h1>Delete This Comment ?</h1><br>
            <p><strong>Name: </strong> {{$comment->name}}</p>
            <p><strong>Email: </strong> {{ $comment->email}}</p>
            <p><strong>Comment: </strong>{{ $comment->comment}}</p>
            <form method="POST" action="{{ route('comments.destroy',$comment->id) }}">
                @csrf
                @method('DELETE')
                <button type="submit" name="submit" class="btn btn-danger btn-block btn-lg">Yes, Delete This Comment</button>
            </form>
        </div>
    </div>
@endsection