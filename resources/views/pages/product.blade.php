@extends('layouts.app', ['class' => 'g-sidenav-show bg-gray-100'])

@section('content')
    @include('layouts.navbars.auth.topnav', ['title' => 'Your Profile'])

    <div class="container-fluid py-4">
        <div class="row justify-content-center"> <!-- Center the content horizontally -->
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header pb-0">
                        <h2 class="text-center">Create New Product</h2> <!-- Center the title -->
                    </div>
                    <div class="card-body">
                        <form method="POST" action="/creat-product">
                            @csrf
                            <div class="mb-3">
                                <input type="text" class="form-control" name="product_name" placeholder="New Product Name">
                            </div>
                            <div class="text-center">
                                <button type="submit" class="btn btn-primary">Add Product</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @include('layouts.footers.auth.footer')
@endsection
