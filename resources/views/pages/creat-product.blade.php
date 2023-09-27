@extends('layouts.app')

@section('content')
    @include('layouts.navbars.auth.topnav', ['title' => 'User Management'])

    <div class="row mt-4 mx-4">
        <div class="col-12">
            <div class="card mb-4">
                <div class="card-header pb-0">
                    <h6>Products</h6>
                </div>

                <div class="card-body px-0 pt-0 pb-2">
                    <div class="table-responsive p-0">
                        <!-- Search Form -->


                        <table class="table table-striped table-bordered">
                        <form action="{{ route('creat-product') }}" method="GET">
    <div class="input-group">
        <input type="text" class="form-control" name="search" placeholder="Search for products">
        <button type="submit" class="btn btn-primary">Search</button>
    </div>
</form>
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Product Name</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($products as $product)
                                    <tr>
                                        <td>{{ $product->id }}</td>
                                        <td>{{ $product->product_name }}</td>
                                        <td>
                                        <a href="/delete-product/{{ $product->id }}" class="btn btn-danger">Delete</a>

                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Pagination Links -->
    <div class="d-flex justify-content-center">
        {{ $products->links() }}
    </div>
@endsection






  <style>

.flex.justify-between.flex-1.sm\:hidden {
    display: none;
}


  </style>  

<style>

.flex.justify-between.flex-1.sm\:hidden {
    display: none;
}

/* Define custom styles for the form */


/* Custom CSS to make the search button and search bar the same height and align to the right */
.serach-form .input-group {
    height: 38px; 
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

.serch-input{
    height:42px !important;
}
  </style>  

