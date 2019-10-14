@extends('main')

@section('title','| Category')
    
@section('content')
    <div class="row">
        <div class="col-md-8">
            <h1>Categories</h1>
            <hr>
            <table class="table">
                <thead>
                    <th>#</th>
                    <th>Name</th>
                </thead>
                <tbody>
                    @foreach ($categories as $category)
                        <tr>
                            <td>{{ $category->id }}</td>
                            <td>{{ $category->name}}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            {{ $categories->links() }}
        </div>
        <div class="col-md-4">
            <div class="card">
                <div class="card-body">
                    <h1>New Category</h1>
                    <form class="form" method="POST" action="{{ route('categories.store') }}">
                        @csrf
                        <div class="form-group">
                            <label for="name">Name :</label><br>
                            <input type="text" name="name" class="form-control">
                        </div>
                        <button type="submit" name="submit" class="btn btn-primary btn-block">Create New Category</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <p>New Paragraph 12</p>
@endsection