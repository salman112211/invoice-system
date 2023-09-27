@extends('layouts.app')

@section('content')
    @include('layouts.navbars.auth.topnav', ['title' => 'User Management'])

    <div class="row mt-4 mx-4">
        <div class="col-12">
            <div class="card mb-4">
                <div class="card-header pb-0">
                    <h6>Users</h6>
                </div>
                <form class="form-inline mx-auto search-form" action="{{ route('user-verification') }}" method="GET">
                    <div class="input-group">
                        <input type="text" class="form-control rounded-0 border-right-0 serch-input" name="search" placeholder="Search By Name" value="{{ $search }}">
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
                                    <th>Inovice Number</th>
                                    <!-- <th>Inovice Date</th> -->
                                    <th>Product</th>
                                    <th>Price</th>
                                    <th>Quantity</th>
                                    <th>Total</th>
                                    <!-- <th>Sub Total</th> -->
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($verifications as $verification)
                                    @php
                                        // Decode the JSON dynamic data
                                        $dynamicData = json_decode($verification->dynamic_data);
                                    @endphp
                                    @foreach($dynamicData as $data)
                                        <tr>
                                            @if ($loop->first)
                                                <td rowspan="{{ count($dynamicData) }}">{{ $verification->id }}</td>
                                                <!-- <td rowspan="{{ count($dynamicData) }}">{{ $verification->invoice_date }}</td> -->
                                            @endif
                                            <!-- <td>{{ $verification->status }}</td> -->
                                            <td>{{ $data->status}}</td> <!-- Display the product value here -->
                                            <td>{{ $data->price }}</td>
                                            <td>{{ $data->quantity }}</td>
                                            <td>
                                                @if (property_exists($data, 'total_price'))
                                                    {{ $data->total_price }}
                                                @else
                                                    <!-- Handle the case where 'total_price' property is missing -->
                                                @endif
                                            </td>
                                            <!-- <td>
                                                @if (property_exists($data, 'subtotal'))
                                                    {{ $data->subtotal }}
                                                @else
                                                    
                                                @endif
                                            </td> -->
                                            @if ($loop->first)
                                                <td rowspan="{{ count($dynamicData) }}">
                                                    <a href="/invoices-print/{{ $verification->id }}" type="button"
                                                        class="btn btn-success" target="_blank">
                                                        <!-- Add your print icon here -->
                                                        Print
                                                    </a>

                                                    <a href="/verification-edit/{{ $verification->id }}" type="button"
                                                        class="btn btn-info">
                                                        <!-- Add your edit icon here -->
                                                        Edit
                                                    </a>

                                                    <a href="/verification-delete/{{ $verification->id }}" type="button"
                                                        class="btn btn-danger">
                                                        <!-- Add your delete icon here -->
                                                        Delet
                                                    </a>
                                                </td>
                                            @endif
                                        </tr>
                                    @endforeach
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row mt-2 mx-4">
        <div class="col-12">
            {{ $verifications->links() }}
        </div>
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

