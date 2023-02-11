@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">

                 <a href ="{{ url('change') }}">change your plan</a>


                @isset($cancel)
                  @if(Auth::user()->subscription('main')->onGracePeriod())
                    {{__('user subscription is cancel ')}}

                  @endif
                 @endisset
                  
                   @if(Auth::user()->subscribed('main'))
                      {{__('Your are subscribed Successfully')}}

                      <a href="{{ route('cancel')}}">Can Subscription</a>

                      <a href="{{ route('invoice')}}">find invoice</a>
                   @else
                      <a href="{{ route('planselect') }}">Subscribe For Premium Service</a>
                   @endif
                      
  
                </div>

                <div class="card card-primary">

                   @isset($invoices)

                     @foreach($invoices as $invoice)
                     <div class="card-header">
                        <h1 class="text-center text-success">Payment Details</h1>
                     </div>
                     <div class="card-body">
                        <ul>
                            <li>
                                {{ $invoice->date()->toFormattedDateString() }}
                            </li>
                            <li>
                                {{ $invoice->total() }}
                            </li>
                            <li>
                                <a href="{{ url('user')}}/{{ $invoice->id }}">Download</a>
                            </li>
                        </ul>
                        
                     </div>
                     <div class="card-footer">
                        
                     </div>
                      @endforeach
                    
                    @endisset
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
