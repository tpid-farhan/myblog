@extends('main')

@section('title','| '.$post->title)

@section('content')
    <div class="row">
        <div class="col-md-8 offset-2">
            <h1>{{ $post->title }}</h1>
            <p>
                {!! $post->body !!}
            </p>
            <hr>
            <p>Posted in : {{ $post->categories->name }}</p>
        </div>
    </div>
    <div class="row">
       <div class="col-md-8 offset-2">
            <h3 class="comments-title"><span class="fa fa-comment"></span> &nbsp;{{ $post->comments()->count() }} Comments</h3>
            @foreach ($post->comments as $comment)
                <div class="comment">
                    <div class="author-info">
                        <img src="{{ "https://www.gravatar.com/avatar/".md5(strtolower(trim($comment->email)))."?s=75&d=monsterid" }}" class="author-image">
                        <div class="author-name">
                            <h6><strong>{{ $comment->name }}</strong></h6>
                            <p class="author-time">{{ date('F jS, Y - g:iA',strtotime($comment->created_at)) }}</p>
                        </div>
                    </div>
                    <div class="comment-content">
                        {{ $comment->comment }}
                    </div>
                </div>
                <br>
            @endforeach
       </div>
    </div>
    <div class="row">
        <div class="col-md-8 offset-2">
            <form method="POST" action="{{ route('comments.store',$post->id) }}">
                @csrf
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="name">Name:</label>
                        <input name="name" type="text" class="form-control">
                    </div>
                    <div class="form-group col-md-6">
                        <label for="email">Email:</label>
                        <input name="email" type="email" class="form-control">
                    </div>
                </div>
                <div class="form-group">
                    <label for="comment">Coment:</label>
                    <textarea name="comment" id="comment" class="form-control" rows="5"></textarea>
                </div>
                <button type="submit" name="submit" class="btn btn-success btn-block">Add Comment</button>
            </form>
        </div>
    </div>
@endsection