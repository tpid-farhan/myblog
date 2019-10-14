@extends('main')
@section('title','| Post')
@section('content')
    <div class="row">
        <div class="col-md-8">
            <h1>{{ $post->title }}</h1>
            <p class="lead">{!! $post->body !!}</p>
            <hr>
            <div class="tags">
                @foreach ($post->tags as $tag)
                    <span class="badge badge-secondary">{{ $tag->name }}</span>
                @endforeach
            </div>
            <div class="comments-table">
                <h4>Comments <small>{{ $post->comments()->count() }} total</small></h4>
                <table class="table">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Comment</th>
                            <th style="width:15%"></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($post->comments as $comment)
                            <tr>
                                <td>{{ $comment->name }}</td>
                                <td>{{ $comment->email }}</td>
                                <td>{{ $comment->comment }}</td>
                                <td>
                                    <a href="{{ route('comments.edit',$comment->id) }}" class="btn btn-primary btn-sm"><span class="fa fa-edit"></span></a>
                                    <a href="{{ route('comments.delete',$comment->id) }}" class="btn btn-danger btn-sm"><span class="fa fa-trash"></span></a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card">
                <div class="card-body pb-1">
                    <div class="row mb-2">
                        <div class="col-sm-12 text-left font-weight-bold">URL : </div>
                        <div class="col-sm-12 text-left">
                            <a href="{{ route('blog.single',$post->slug) }}">{{ route('blog.single',$post->slug) }}</a> 
                        </div>
                    </div>
                    <div class="row mb-2">
                        <div class="col-sm-12 text-left font-weight-bold">Category : </div>
                        <div class="col-sm-12 text-left">{{ $post->categories->name}}</div>
                    </div>
                    <div class="row mb-2">
                        <div class="col-sm-12 text-left font-weight-bold">Created at : </div>
                        <div class="col-sm-12 text-left">{{ date('M d, Y h:ia',strtotime($post->created_at))}}</div>
                    </div>
                    <div class="row">
                        <div class="col-sm-12 text-left font-weight-bold">Last Updated : </div>
                        <div class="col-sm-12 text-left">{{ date('M d, Y h:ia',strtotime($post->updated_at))}}</div>
                    </div>
                </div>
                <div class="card-body pt-0">
                    <hr>
                    <div class="row">
                        <div class="col-sm-6 pr-1">
                            <a href="{{ route('posts.edit',$post->id) }}" class="btn btn-primary btn-block">Edit</a>
                        </div>
                        <div class="col-sm-6 pl-1">
                            <form method = "POST" action="{{ route('posts.destroy',$post->id) }}">
                                {{ csrf_field() }}
                                @method('DELETE')
                                <input type="submit" name="submit" class="btn btn-danger btn-block" value="Delete">
                            </form>
                        </div>
                    </div>
                    <div class="row pt-2">
                        <div class="col-md-12">
                            <a href="{{ route('posts.index') }}" class="btn btn-default btn-block"><< Show All Post</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection