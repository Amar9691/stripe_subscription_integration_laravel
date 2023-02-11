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
                <h1>You are not subscribe For preium serive please Subscribe</h1>
                <div class="card-header">{{ __('Dashboard') }}</div>
                           
                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{ __('You are logged in!') }}
                    
                    <select class="form-control" id="plan">
                    @foreach($plan as $key=>$value)
                     <option value ="{{$key}}">{{$value}}</option>
                    @endforeach


                    </select>
                     <label>card Holder Name</label>
                    <input id="card-holder-name" type="text" class="form-control">
                    <div id="card-element"></div>
                    <button id="card-button" data-secret="{{ $intent->client_secret }}" class="btn btn-primary mt-2">
                     subscribe
                     </button>



                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('client.js')
<script type="text/javascript">

    window.addEventListener('load',function(){
    
    const stripe = Stripe('your-stipe-key');

    const elements = stripe.elements();
    const cardElement = elements.create('card');

    cardElement.mount('#card-element');

    const cardHolderName = document.getElementById('card-holder-name');
    const cardButton = document.getElementById('card-button');
    const clientSecret = cardButton.dataset.secret;
    const planid = document.getElementById('plan').value;
    
    
    cardButton.addEventListener('click', async (e) => {
    const { setupIntent, error } = await stripe.confirmCardSetup(
        clientSecret, {
            payment_method: {
                card: cardElement,
                billing_details: { name: cardHolderName.value }
            }
        }
    );

    if (error) {
        // Display "error.message" to the user...
    } else {
        /* plan delete kar diye the esliye error hai testing ke liye plan course or uske andar id leni hai */

        axios.post('/paystripe/subscribe',
        { payment_method:setupIntent.payment_method,
         planid:planid}).then(function (data){

                location.replace(data.data.success_url)
        });


                
        



        
    }
});

    });
    

</script>
@endsection