@extends('layouts.app')
@section('head')
<script src="https://js.stripe.com/v3/"></script>
<style type="text/css">
    

</style>
@endsection

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
            
                    <label>Card Holder Name</label>
                    <input type="text" name="card-holder-name" class="form-control">

                    <div id="card-element"></div>
                    <input type ="text" name ='description' id="payment-description" class="form-control">

                    <button id="card-button" data-secret="{{ $intent->client_secret}}">Submit</button>


                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('client.js')
<script type="text/javascript">


</script>
@endsection