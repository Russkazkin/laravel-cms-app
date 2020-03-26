@extends('layouts.app')

@section('content')

<div class="card card-default">
    <div class="card-header">
        Create post
    </div>
    <div class="card-body">
        <form action="{{ route('posts.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="title">Title</label>
                <input type="text" id="title" name="title" class="form-control">
            </div>
            <div class="form-group">
                <label for="description">Description</label>
                <textarea name="description" id="description" cols="5" rows="5" class="form-control"></textarea>
            </div>
            <div class="form-group">
                <label for="text">Content</label>
                <textarea name="text" id="text" cols="5" rows="5" class="form-control"></textarea>
            </div>
            <div class="form-group">
                <label for="published_at">Published at</label>
                <input type="text" id="published_at" name="published_at" class="form-control">
            </div>
            <div class="form-group">
                <label for="image">Image</label>
                <input type="file" id="image" name="image" class="form-control">
            </div>
            <div class="form-group">
                <button type="submit" class="btn btn-success">Create post</button>
            </div>
        </form>
    </div>
</div>

@endsection
