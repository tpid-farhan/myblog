@extends('main')

@section('title','| Tag')

@section('content')
    <div class="row">
         <div class="col-md-8">
            <h1>{{ $tags->name}} Tag <small class="text-muted">{{ $tags->posts()->count() }} Post</small></h1>
         </div>
         <div class="col-md-2">  
            <form method="POST" action="{{ route('tags.destroy',$tags->id) }}">
                 @csrf
                 @method('DELETE')
                 <input type="submit" name="submit" class="btn btn-danger btn-block" value="Delete">
            </form>
        </div>
         <div class="col-md-2">  
            <a href="{{ route('tags.edit',$tags->id) }}" class="btn btn-primary btn-block">Edit</a>
         </div>
         <hr>
    </div>
    <div class="row">
        <div class="col-md-12">
            <table class="table">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Post Title</th>
                        <th>Tags</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($tags->posts as $post)
                        <tr>
                            <td>{{ $post->id }}</td>
                            <td>{{ $post->title }}</td>
                            <td>
                                @foreach ($post->tags as $tag)
                                    <span class="badge badge-secondary">{{ $tag->name }}</span>
                                @endforeach
                            </td>
                            <td><a href="{{ route('posts.show',$post->id) }}" class="btn btn-default">view</a></td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection