<?php
/**
 * @var $users \App\User []
 */
?>


@extends('layouts.app')

@section('content')

    <div class="card card-default">
        <div class="card-header">
            Users
        </div>
        <div class="card-body">
            @if($users->count())
                <table class="table">
                    <thead>
                    <tr>
                        <th>Image</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th></th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($users as $user)
                        <tr>
                            <td>
                                <img src="{{ Gravatar::src($user->email) }}"
                                     alt=""
                                     width="40"
                                     style="border-radius: 50%">
                            </td>
                            <td>{{ $user->name }}</td>
                            <td>{{ $user->email }}</td>
                            @if(!$user->isAdmin())
                            <td>
                                <form action="{{ route('users.make-admin', $user->id) }}" method="POST">
                                    @csrf
                                    <button type="submit" class="btn btn-success">Make Admin</button>
                                </form>
                            </td>
                            @endif
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            @else
                <h6 class="text-center">No users yet</h6>
            @endif
        </div>
    </div>

@endsection

