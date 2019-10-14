@extends('main')

@section('title','| Archive')
    
@section('content')
    <div class="row">
        <div class="col-md-8 offset-2">
            <h1>Blog Posts</h1>
            @foreach ($posts as $post)
                <hr>
                <div class="post">
                    <h3>{{ $post->title }}</h3>
                    <p>{{ substr(strip_tags($post->body),0,255) }}{{ strlen(strip_tags($post->body)) > 255 ? '...' : '' }}</p>
                    <a href="{{ route('blog.single',$post->slug) }}" class="btn btn-primary">Read More</a>
                </div>                
            @endforeach
            {{ $posts->links() }}
        </div>
    </div>
@endsection