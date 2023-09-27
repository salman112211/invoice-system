@extends('layouts.app')

@section('content')
    @include('layouts.navbars.auth.topnav', ['title' => 'User Management'])
    

    <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Your Page Title</title>
    <!-- Include Bootstrap Icons CSS here -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.17.0/font/bootstrap-icons.css" rel="stylesheet">
    <!-- Include Bootstrap CSS and other necessary stylesheets -->
    <!-- ... -->
</head>
<body>
<!-- Add this form to your 'pages.users.blade.php' view -->


</div>
    <div class="row mt-4 mx-4">
        <div class="col-12">
            <div class="card mb-4">
                <div class="card-header pb-0">
                    <h6>Users</h6>
                </div>
                <form class="form-inline mx-auto serach-form" action="{{ route('users') }}" method="GET">
    <div class="input-group">
        <input type="text" class="form-control rounded-0 border-right-0" name="search" placeholder="Search By Name" value="{{ $search }}">
        <div class="input-group-append">
            <button type="submit" class="btn btn-primary rounded-0 border-left-0">Search</button>
        </div>
    </div>
</form>


@if (!$resultsFound)
    <p>No results found. Showing all users:</p>
@endif
                <div class="card-body px-0 pt-0 pb-2">
                    <div class="table-responsive p-0">
                        <table class="table table-striped table-bordered">
  
                            <thead>
                                <tr>
                                <th>Id</th>
                                    <th>name</th>
                                    <th>Email</th>
                                    <!-- <th>Password</th> -->
                                    <th>Action</th>
                                    
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($users as $user)
                                <tr>
                                    <td>{{ $user->id }}</td>
                                    <td>{{ $user->username }}</td>
                                    <td>{{ $user->email }}</td>
                                    <!-- <td>{{ $user->Password }}</td> -->
                                    <td>


<a href="/user-edit/{{ $user->id }}" type="button" class="btn btn-info">
    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil" viewBox="0 0 16 16">
        <path d="M11.293 3.293a1 1 0 011.32-.083l1.414 1.414a1 1 0 01.083 1.32l-8 8a1 1 0 01-1.497.04l-3-3a1 1 0 01-.04-1.497l8-8a1 1 0 011.403-.097l1.414 1.414-3 3a1 1 0 01-1.414-1.414l3-3z"/>
        <path fill-rule="evenodd" d="M3.293 10.293a1 1 0 010-1.414L12.586.293a1 1 0 111.414 1.414L4.707 11.707a1 1 0 01-1.414 0z" clip-rule="evenodd"/>
    </svg>
</a>

<a href="/user-delete/{{ $user->id }}" type="button" class="btn btn-danger">
    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16">
        <path d="M1.5 1a.5.5 0 01.5-.5h12a.5.5 0 01.5.5V2h-1a2 2 0 00-2-2H5a2 2 0 00-2 2H2v-.5a.5.5 0 01.5-.5zM2 3v10a2 2 0 002 2h8a2 2 0 002-2V3H2z"/>
        <path fill-rule="evenodd" d="M5.5 6.5a.5.5 0 000 .707L7.793 9l-2.293 2.293a.5.5 0 10.708.708L8.5 9.707l2.293 2.293a.5.5 0 00.708-.708L9.207 9l2.293-2.293a.5.5 0 00-.708-.708L8.5 8.293 6.207 6.293a.5.5 0 00-.707 0z" clip-rule="evenodd"/>
    </svg>
</a>

                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

      
</body>
</html>

  <style>

.flex.justify-between.flex-1.sm\:hidden {
    display: none;
}

/* Define custom styles for the form */


/* Custom CSS to make the search button and search bar the same height and align to the right */
.serach-form .input-group {
    height: 38px; /* Adjust the height as needed */
    position: relative;
    left:100%;
    margin-bottom:10px;
}

.serach-form .form-control,
.serach-form .btn {
    height: 38px;
}

.serach-form .input-group-append {
    align-self: flex-end;
}


  </style>  
@endsection
