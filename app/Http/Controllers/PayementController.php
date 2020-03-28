<?php
// use facade cart

namespace App\Http\Controllers;
// use Gloudemans\Shoppingcart\Facades\Cart;
// use Stripe\Stripe;
// use Stripe\PaymentIntent;
// use Illuminate\Http\Request;
// use Illuminate\Support\Arr;
// use Illuminate\Support\Facades\Session;
// use App\order;
// use Illuminate\Support\Facades\Input;
// use App\User;
use DateTime;
use App\Order;
use Stripe\Stripe;
use Stripe\PaymentIntent;
use Illuminate\Support\Arr;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Gloudemans\Shoppingcart\Facades\Cart;
// use Payment;
class PayementController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(Cart::count()<=0)
        {
            return redirect()->route('products.index');
        }
       Stripe::setApiKey('sk_test_E4qnw5VJgmhneqjn1UFZ6nOI00jXP6VNGn');
       $intent = PaymentIntent::create([
        'amount' => round( Cart::total()),
        'currency' => 'usd',
        //
    ]);
    $clientSecret = Arr::get($intent, 'client_secret');
            // $clientSecret = Arr::get($intent ,'client_Secret');
// dd($clientSecret);
        return view('payement.index',[
'clientSecret'=>$clientSecret
        ]);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
//     public function store(Request $request)
//     {
//         Cart::destroy();
//        $data = $request->json()->all();
//     //    dd('test');
// // dd($data);
//        return $data['paymentIntent'];
//     }

public function store(Request $request)
    {
        $data = $request->json()->all();
// dd($data);
        $order = new Order();

        $order->payment_intent_id = $data['paymentIntent']['id'];
        $order->amount = $data['paymentIntent']['amount'];

        $order->payment_created_at = (new DateTime())
            ->setTimestamp($data['paymentIntent']['created'])
            ->format('Y-m-d H:i:s');

        $products = [];
        $i = 0;

        foreach (Cart::content() as $product) {
            $products['product_' . $i][] = $product->model->title;
            $products['product_' . $i][] = $product->model->price;
            $products['product_' . $i][] = $product->qty;
            $i++;
        }

        $order->products = serialize($products);
        $order->user_id = Auth()->user()->id;
        $order->save();

        if ($data['paymentIntent']['status'] === 'succeeded') {
            Cart::destroy();
            Session::flash('success', 'Votre commande a été traitée avec succès.');
            return response()->json(['success' => 'Payment Intent Succeeded']);
        } else {
            return response()->json(['error' => 'Payment Intent Not Succeeded']);
        }
        // dd(response()->json);
    }

    public function thankyou()
    {

           return Session::has('success') ? view('payement.thankyou') : redirect()->route('products.index');
        }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $rowId)
    {
      $data = $request->json()->all();
      Cart::update($rowId,$data['qty']);
      Session::flash('success','La quantité du produit est passée à' . $data['qty'] . '.');
    return response()->json(['success'=>'Cart quantity Has Benn updated']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
