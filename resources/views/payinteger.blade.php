@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}
                </div>
                
                <div class="card-body">
                     <form action="{{ route('paynow') }}" method="POST" accept-charset="utf-8">
                     <input type="hidden" name="product_name" value="redmi7"> 
                     <input type="hidden" name="product_price" value="6999"> 
                     <div class="form-group">
                     <label>Your Name</label>
                     <input type="text" class="form-control" name="name" placeholder="Amar Kumar">   
                     </div>
                     <div class="form-group">
                     <label>Your Phone</label>
                     <input type="text" class="form-control" name="phone" placeholder="Enter your phone number"> 
                     </div>
                     <div class="form-group">
                     <label>Your Email</label>
                     <input type="email" class="form-control" name="email" placeholder="Enter you email"> 
                     </div>
                     <div class="form-group">
                     <label>Amount</label>
                     <input type="email" class="form-control" name="amount" Value="100" readonly>
                     </div>
                     <p><input type="submit" class="btn btn-success btn-lg" value="Click here to Pay"></p>
                     </form>
                  
                </div>
             

               
            </div>
        </div>
    </div>
</div>
@endsection
