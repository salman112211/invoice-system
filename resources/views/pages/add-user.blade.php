@extends('layouts.app', ['class' => 'g-sidenav-show bg-gray-100'])

@section('content')
    @include('layouts.navbars.auth.topnav', ['title' => 'Your Profile'])
    
    <div id="alert">
        @include('components.alert')
    </div>
    <div class="container-fluid py-4" >
        <div class="row">
            <div class="col-md-8">
                <div class="card" class="titl-bg">
                    <form role="form" method="POST" action="user-verification" enctype="multipart/form-data">
                        @csrf
                        <div class="card-header pb-0">
                            <div class="d-flex align-items-center">
                                <h2 style="text-align:center;" class="mb-0">Create Invoice</h2>
                               
                            </div>
                        </div>
                        <div class="card-body">
                            
                            <div class="row">
                               
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="example-text-input" class="form-control-label">Invoice Date</label>
                                        <input class="form-control @error('naminvoice_date') is-invalid @enderror" type="date" name="invoice_date" >
                                        @error('naminvoice_date')
                <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                            <div class="form-group">
                     <label for="example-text-input" class="form-control-label">Name</label>
               <input class="form-control @error('name') is-invalid @enderror" type="text" name="name" value="{{ old('name') }}">
                 @error('name')
                <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
    </div>
</div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="example-text-input" class="form-control-label">Email</label>
                                        <input class="form-control @error('email') is-invalid @enderror" type="text" name="email">
                                        @error('email')
                <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="example-text-input" class="form-control-label">Phone</label>
                                        <input class="form-control @error('phone') is-invalid @enderror" type="text" name="phone">
                                        @error('phone')
                <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
                                    </div>
                                </div>
                            </div>
                            
                            <!-- <hr class="horizontal dark">
                            <p class="text-uppercase text-sm">Contact Information</p> -->
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="example-text-input" class="form-control-label">Address</label>
                                        <input class="form-control @error('address') is-invalid @enderror" type="text" name="address">
                                        @error('address')
                <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
                                    </div>
                                </div>
                                <div class="col-md-12">
        <button id="addStatusButton" type="button" class="btn btn-primary">Add Status</button>
        <div id="statusInput" style="display: none;">
            <input class="form-control" type="text" id="statusValue">
            <button id="saveStatusButton" type="button" class="btn btn-success">Save</button>
        </div>
    </div>
</div>

                                <div id="rowContainer">
                                    <div class="row">
                            
                                    <div class="col-md-3">
                                    <div class="form-group">
                                     <label for="example-text-input" class="form-control-label @error('address') is-invalid @enderror">Product</label>
                                <select class="form-select" id="status" name="status[]" placeholder="Select the Product">
                                                           @foreach($products as $key => $product)         
                                                         <option value="{{$product->id}}">{{$product->product_name}}</option>
                                                            @endforeach
                                                                <!-- Add more options as needed -->
                                                            </select>
                                                            @error('status')
                <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
                                                                </div>
                                                            </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="example-text-input" class="form-control-label @error('price') is-invalid @enderror">Price</label>
                                                <input class="form-control" type="text" name="price[]">
                                                @error('price')
                <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="example-text-input" class="form-control-label @error('quantity') is-invalid @enderror">Quantity</label>
                                                <input class="form-control" type="text" name="quantity[]" >
                                                @error('quantity')
                <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
                                            </div>
                                        </div>

                                        <div class="col-md-3">
    <div class="form-group">
        <label for="example-text-input" class="form-control-label">VAT</label>
        <select class="form-select" name="inputvat[]">
            <option value="0">No VAT</option>
            <option value="0.2">VAT (20%)</option>
        </select>
    </div>
</div>
 </div>
  </div>
  <button id="addRowButton" type="button">Add Row</button>
                            
                               
                                </div>
                                
                                <div class="col-md-12">
                                <div class="form-group">
                                    <label for="description" class="form-control-label">Description</label>
                                    <textarea class="form-control" type="textarea" name="description"></textarea>
                                    @error('description')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            

                            
                                <div class="text-center">
                                <button type="submit" class="btn btn-success btn-lg w-50 mt-4">Submit</button>
                            </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
           
        </div>
        @include('layouts.footers.auth.footer')
    </div>
@endsection



<style>
    body {
    background-image: url('img/inv-bg.jpg');
    background-size: cover; / Adjust as needed /
    background-repeat: no-repeat; / Adjust as needed /
    / You can add more background properties here /
    
}

.titl-bg{
    background-image: url('img/inv-logologo1.png');
    / background-size: cover; Adjust as needed /
    background-repeat: no-repeat; / Adjust as needed /
    opacity: 0.7;
}

</style>
