@extends('layouts.app')

@section('content')

<div class="d-flex justify-content-end mb-2">
    <a href="{{ route('posts.create') }}" class="btn btn-success">
        Add Post
    </a>
</div>
<div class="card card-default">
    <div class="card-header">
        Posts
    </div>
    <div class="card-body">
        <table class="table">
            <thead>
            <tr>
                <th>Image</th>
                <th>Title</th>
                <th></th>
            </tr>
            </thead>
            <tbody>
            @foreach($posts as $post)
                <tr>
                    <td><img src="{{ asset('storage/' . $post->image) }}" width="60px" alt=""></td>
                    <td>{{ $post->title }}</td>
                    <td>
                        <a href="{{ route('posts.edit', $post->id)}}"
                           class="btn btn-info btn-sm"
                           role="button">Edit</a>
                        <button type="button" class="btn btn-danger btn-sm"
                                onclick="handleDelete({{ $post->id }})">
                            Delete
                        </button>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
</div>

@endsection
