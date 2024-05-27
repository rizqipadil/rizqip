<!-- Blade Template: resources/views/user_data.blade.php -->
@extends('layouts.app')
@section('title', 'User Data')
@section('styles')
    <!-- Tambahkan CSS Bootstrap -->
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <!-- Tambahkan Custom CSS -->
    <link href="{{ asset('css/custom.css') }}" rel="stylesheet">
@endsection
@section('contents')
<div class="container mt-5">
    <h1 class="mb-4">User Data</h1>
    <table class="table table-bordered table-hover">
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Email</th>
                <th>Image</th>
            </tr>
        </thead>
        <tbody>
            @foreach($users as $user)
                <tr>
                    <td>{{ $user->id }}</td>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->email }}</td>
                    <td><img src="{{ asset($user->image) }}" alt="Profile Image" class="profile-image"></td>
                </tr>
            @endforeach
        </tbody>
    </table>
    <!-- Pagination Links -->
    <div class="d-flex justify-content-center">
        {{ $users->links() }}
    </div>
</div>
@endsection
@section('scripts')
    <!-- Tambahkan JS Bootstrap dan jQuery -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
@endsection
