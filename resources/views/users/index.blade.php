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
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($users as $user)
                        <tr>
                            <td></td>
                            <td>{{ $user->name }}</td>
                            <td>{{ $user->email }}</td>
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

