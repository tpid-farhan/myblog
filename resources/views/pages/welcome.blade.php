@extends('main')

@section('title','| Home')

@section('stylesheet')
    <link rel="stylesheet" href="css/style.css">    
@endsection

@section('content')
    <div class="row">
        <div class="col-md-12">
        <div class="jumbotron">
            <h1 class="display-4">Hello, world!</h1>
            <p class="lead">This is a simple hero unit, a simple jumbotron-style component for calling extra attention to featured content or information.</p>
            <hr class="my-4">
            <p>It uses utility classes for typography and spacing to space content out within the larger container.</p>
            <a class="btn btn-primary btn-lg" href="#" role="button">Learn more</a>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-8">
            @php
                $posts = DB::table('posts')->select('*')->get();
            @endphp
            @foreach ($posts as $post)
                <hr>
                <div class="post">
                    <h3> {{$post->title}} </h3>
                    <p>{{ substr(strip_tags($post->body),0,255) }}{{ strlen(strip_tags($post->body)) > 255 ? '...' : '' }}</p>
                    <a href="{{ route('blog.single',$post->slug) }}" role="button" class="btn btn-primary">Popular Post</a>
                </div>
            @endforeach
        </div>
        <div class="col-md-3 offset-md-1">
            <h2>Sidebar</h2>
        </div>
    </div>
    
@endsection

