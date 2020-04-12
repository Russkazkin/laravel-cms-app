<?php /**
 * @var $tags \App\Tag []
 */ ?>

@extends('layouts.app')

@section('content')
    <div class="d-flex justify-content-end mb-2">
        <a href="{{ route('tags.create') }}" class="btn btn-success">
            Add Tag
        </a>
    </div>
    <div class="card card-default">
        <div class="card-header">
            Tags
        </div>
        <div class="card-body">
            @if($tags->count())
                <table class="table">
                    <thead>
                    <tr>
                        <th>
                            Name
                        </th>
                        <th>
                            Post count
                        </th>
                        <th></th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($tags as $tag)
                        <tr>
                            <td>{{ $tag->name }}</td>
                            <td>{{ $tag->posts->count() }}</td>
                            <td>
                                <a href="{{ route('tags.edit', $tag->id)}}"
                                   class="btn btn-info btn-sm"
                                   role="button">Edit</a>
                                <button type="button" class="btn btn-danger btn-sm"
                                        onclick="handleDelete({{ $tag->id }})">
                                    Delete
                                </button>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            @else
                <h6 class="text-center">No tags yet</h6>
                <div class="modal fade"
                     id="deleteModal" tabindex="-1"
                     role="dialog"
                     aria-labelledby="deleteModalLabel"
                     aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <form action="" method="POST" id="deleteTagForm">
                            @csrf
                            @method('DELETE')
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Delete tag</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <div class="text-center">
                                        Are you sure you want to delete this tag?
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">No, go back</button>
                                    <button type="submit" class="btn btn-danger">Yes, delete</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            @endif
        </div>
    </div>
@endsection
<script>
    function handleDelete(id) {
        $('#deleteModal').modal();
        let form = document.getElementById('deleteTagForm');
        form.action = `tags/${id}`;
        console.log(form);
    }
</script>
@section('scripts')

@endsection

