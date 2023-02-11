<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Plan;
use App\User;
use Auth;
use App\subscription;
use Laravel\Cashier\invoice;


class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
     
       

      
        return view('home')->with(['status'=>'not subscribe till now']);
      

       
    }

    public function plan(User $user)
    {  

        $plan = [
           
              'price_1HJLGLEsb5TMNGfdsfhkjlkja13o9xhZajJ'=> '4000 Three Monthly',
              'price_1HJLGLEsb5TMNGdsafhjkhjds13zV0MZYKf'=> '2000 Monthly'
        ];

        $data = [
                  'intent'=>Auth::user()->createSetupIntent(),
                  'plan'=>$plan

                ];
        return view('plan')->with($data);
    }

    public function payment(Request $request)
    {
        
   
      
         $user = Auth::user();
         $payment_method = $request->payment_method;
         $planid = $request->planid;

         $user->newSubscription('main', $planid)->create($payment_method);

         return response([
          'success_url'=> redirect()->intended('/home')->getTargetUrl(),
          'message'=>'success'
          ]);
        
       
      
       

    }

    public function pre()
    {
        return view('price')->with(['message'=>'Your are subscribed Person']);
    }

    public function deletesub(Request $request)
    {
        
        $user = Auth::user();

        $user->subscription('main')->cancelNow();

        return redirect()->route('home');
       
    }

    public function ind(Request $request)
    {
       $user = Auth::user();
       $invoices = $user->invoices();

        return view('home',compact('invoices'));

    }

    public function planchange()
    {
       $plan_id = 'price_1HJLGLEssfb5TMiipoiNGgd13zV0MZYKf';

       $user = Auth::user();

       $user->subscription('main')->swap($plan_id);

       echo "done";

    }

    public  function download(Request $request, $id)
    {
      return $request->user()->downloadInvoice($id, [
        'vendor' => 'Amar Laravel Project Development Company',
        'product' => 'Preimum subscription',
     ]);

    }

   public function sca()
   {

     \Stripe\Stripe::setApiKey('your_stripe_key');

     $intent = \Stripe\PaymentIntent::create([
      
         'amount' => 4000,
         'currency'=>'usd', 
         'setup_future_usage' => 'off_session',  

     ]);
    
     return view('sca',['intent'=>$intent]);


   }
  


}

