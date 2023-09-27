<!-- resources/views/search.blade.php -->

@extends('layouts.app')

@section('content')
    <div class="container">
        <h2>Search Active Users</h2>
        <form action="{{ route('search') }}" method="GET">
            <div class="input-group mb-3">
                <input type="text" class="form-control" name="verification_number" placeholder="Enter Verification Number">
                <div class="input-group-append">
                    <button class="btn btn-primary" type="submit">Search</button>
                </div>
            </div>
        </form>

        @if (isset($activeUsers))
            <!-- Display search results here -->
            <h3>Search Results</h3>
            <table class="table">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Email</th>
                        <!-- Add more columns as needed -->
                    </tr>
                </thead>
                <tbody>
                    @foreach($activeUsers as $user)
                        <tr>
                            <td>{{ $user->id }}</td>
                            <td>{{ $user->name }}</td>
                            <td>{{ $user->email }}</td>
                            <!-- Add more columns as needed -->
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @endif
    </div>
@endsection
