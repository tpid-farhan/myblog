@extends('main')

@section('title','| All Tags')
    
@section('content')
    <div class="row">
        <div class="col-md-8">
            <h1>Tags</h1>
            <hr>
            <table class="table">
                <thead>
                    <th>#</th>
                    <th>Name</th>
                </thead>
                <tbody>
                    @php
                        $num = 1;
                    @endphp
                    @foreach ($tags as $tag)
                        <tr>
                            <td>{{ $num++ }}</td>
                            <td><a href="{{ route('tags.show',$tag->id) }}">{{ $tag->name }}</a></td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            {{ $tags->links() }}
        </div>
        <div class="col-md-4">
            <div class="card">
                <div class="card-body">
                    <h1>New Tag</h1>
                    <form class="form" method="POST" action="{{ route('tags.store') }}">
                        @csrf
                        <div class="form-group">
                            <label for="name">Name :</label><br>
                            <input type="text" name="name" class="form-control">
                        </div>
                        <button type="submit" name="submit" class="btn btn-primary btn-block">Create New Tag</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection