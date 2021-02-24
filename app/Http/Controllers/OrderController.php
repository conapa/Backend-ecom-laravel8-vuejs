<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;
use App\Models\Product;
use Srmklive\PayPal\Services\ExpressCheckout;
use Illuminate\Support\Facades\Redirect;
use Inertia\Inertia;


class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */



    public function index()
    {
      $id = auth()->user()->id;
      //dd(Order::where('user_id', $id)->get());
      return Inertia::render('Orders',[
        'orders' => Order::where('user_id', $id)->get()
      ]);
    }
    public function PayNow(Product $product)
    {
      $data=[];
      $data ['items']=[
        'name' => $product->title,
        'price' => $product->price,
        'desc' => $product->description,
        'qty' => 1,
      ];
        /*
      array_push($data['items'],[
        'name' => $product->title,
        'price' => $product->price,
        'desc' => $product->description,
        'qty' => 1
      ]);*/
      $data['invoice_id'] = auth()->user()->id;
      $data['invoice_description'] = "Commande #"{$data['invoice_id']};
      $data['return_url'] = route('success.payment');
      $data['cancel_url'] = route('cancel.payment');
      $data['total'] = $product->price;
      $paypalModule = new ExpressCheckout;
      $res = $paypalModule->setExpressCheckout($data);
      $res = $paypalModule->setExpressCheckout($data,true);
      $link = $res['paypal_link'];
      return redirect($link);

    }

    public function payment_Cancel()
    {
      return redirect::route('dashboard');
    }
    public function payment_success(Request $request,Product $product)
    {
      $paypalModule = new ExpressCheckout;
      $rep = $paypalModule->getExpressCheckoutDetails($request->token);
      if(in_array(strtoupper($rep['ACK']),['SUCCESS','SUCCESSWITHWARNING'])){
        $this->create();
      }
      return redirect::route('userorders');
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Product $product)
    {
        Order::create([
          'user_id' => auth()->user()->id,
          'product_name' => $product->title ,
          'qty' => 1 ,
          'price' => $product->price ,
          'total' =>  $product->price ,
          'paid' => 1
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function show(Order $order)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function edit(Order $order)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Order $order)
    {
        $order->update([
          'delivered' => 1
        ]);
        return redirect::route('admin');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */

    public function destroy(Order $order)
    {

      $order->delete();
      return redirect::route('admin');
    }
}
