<?php /**
 * @var $post \App\Post
 */?>


@extends('layouts.app')

@section('content')

<div class="card card-default">
    <div class="card-header">
        {{ isset($post) ? 'Edit post' : 'Create post' }}
    </div>
    <div class="card-body">
        @include('partials.errors')
        <form action="{{ isset($post) ? route('posts.update', $post->id) : route('posts.store') }}"
              method="POST"
              enctype="multipart/form-data">
            @csrf
            @if(isset($post))
                @method('PATCH')
            @endif
            <div class="form-group">
                <label for="title">Title</label>
                <input type="text"
                       id="title"
                       name="title"
                       class="form-control"
                       value="{{ isset($post) ? $post->title : '' }}">
            </div>
            <div class="form-group">
                <label for="description">Description</label>
                <textarea name="description"
                          id="description"
                          cols="5"
                          rows="5"
                          class="form-control">{{ isset($post) ? $post->description : '' }}</textarea>
            </div>
            <div class="form-group">
                <label for="text">Content</label>
                <input id="text"
                       type="hidden"
                       name="text"
                       value="{{ isset($post) ? $post->content : '' }}">
                <trix-editor input="text"></trix-editor>
            </div>
            <div class="form-group">
                <label for="published_at">Published at</label>
                <input type="text"
                       id="published_at"
                       name="published_at"
                       class="form-control"
                       value="{{ isset($post) ? $post->published_at : '' }}">
            </div>
            @if(isset($post))
                <div class="form-group">
                    <label for="image">Image</label>
                    <img src="{{ asset('storage/' . $post->image) }}" alt="" width="100%">
                </div>
            @endif
            <div class="form-group">

                <input type="file" id="image" name="image" class="form-control">
            </div>

            <div class="form-group">
                <label for="category_id"></label>
                <select name="category_id" id="category_id" class="form-control">
                @foreach($categories as $category)
                        <option value="{{ $category->id }}"
                        @if(isset($post))
                            @if($category->id == $post->category_id)
                                selected
                            @endif
                        @endif
                        >
                            {{ $category->name }}
                        </option>
                @endforeach
                </select>
            </div>

            <div class="form-group">
                <button type="submit" class="btn btn-success">
                    {{ isset($post) ? 'Update post' : 'Create post' }}
                </button>
            </div>
        </form>
    </div>
</div>

@endsection

@section('scripts')
<script src="https://cdnjs.cloudflare.com/ajax/libs/trix/1.2.1/trix.js"></script>
<script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
<script>
    flatpickr('#published_at', {
        enableTime: true,
    });
</script>
@endsection

@section('css')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/trix/1.2.1/trix.css">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
@endsection
