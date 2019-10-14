@extends('main')

@section('title','| All Post')

@section('stylesheet')
     <style>
         .table th[role = 'title']{
             width:30%;
         }
     </style>   
@endsection

@section('content')
    <div class="row">
        <div class="col-md-10">
            <h1>All Post</h1>
        </div>
        <div class="col-md-2">
            <a href="{{ route('posts.create') }}" class="btn btn-block btn-primary mt-2">Create New Post</a>
        </div>
        <div class="col-md-12">
            <hr>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <table class="table">
                <thead>
                    <th>#</th>
                    <th role="title">Title</th>
                    <th>Body</th>
                    <th>Created at</th>
                    <th>Action</th>
                </thead>
                <tbody>
                    @foreach ($posts as $post)
                        <tr>
                            <td>{{ $post->id }}</td>
                            <td>{{ $post->title}}</td>
                            <td>{{ substr(strip_tags($post->body),0,50) }} {{ strlen(strip_tags($post->body)) > 50 ? '...' : '' }}</td>
                            <td>{{ date('M d, Y',strtotime($post->created_at)) }}</td>
                            <td>
                                <a href="{{ route('posts.show',$post->id) }}" class="btn btn-default">View</a>
                                <a href="{{ route('posts.edit',$post->id) }}" class="btn btn-default">Edit</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            {{ $posts->links() }}
        </div>
    </div>
    
@endsection