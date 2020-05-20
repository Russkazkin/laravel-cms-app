<?php
/**
 * @var $posts \App\Post []
 */
?>


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
        @if($posts->count())
        <table class="table">
            <thead>
            <tr>
                <th>Image</th>
                <th>Title</th>
                <th>Category</th>
                <th></th>
            </tr>
            </thead>
            <tbody>
            @foreach($posts as $post)
                <tr>
                    <td><img src="{{ asset('storage/' . $post->image) }}" width="120px" alt=""></td>
                    <td>{{ $post->title }}</td>
                    <td>
                        <a href="{{ route('categories.edit', $post->category->id) }}">{{ $post->category->name }}</a>
                    </td>
                    <td class="posts-buttons">
                        @if(!$post->trashed())
                        <a href="{{ route('posts.edit', $post->id)}}"
                           class="btn btn-info btn-sm"
                           role="button">Edit
                        </a>
                        @else
                        <form action="{{ route('posts.restore', $post->id) }}"
                              method="POST"
                              style="display: inline-block">
                            @csrf
                            @method('PATCH')
                            <button
                                class="btn btn-info btn-sm"
                                type="submit"
                                role="button">
                                Restore
                            </button>
                        </form>
                        @endif
                        <form action="{{ route('posts.destroy', $post->id) }}" method="POST" style="display: inline-block">
                            @csrf
                            @method('DELETE')
                            <button
                                class="btn btn-danger btn-sm"
                                type="submit"
                                role="button">
                                {{ $post->trashed() ? 'Delete' : 'Trash' }}
                            </button>
                        </form>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
        @else
        <h6 class="text-center">No posts yet</h6>
        @endif
    </div>
</div>

@endsection
