<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Cart;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Session;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $orders = Order::where('user_id', Auth::id())->get();
        return view('user.order.index', compact('orders'));
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
    public function store(Request $request)
    {
        $validated = Order::query()->Validation($request->all());
        if($validated){
            try{
                DB::beginTransaction();
                $order = Order::create([
                    'f_name' => $request->f_name,
                    'l_name' => $request->l_name,
                    'email' => $request->email,
                    'phone' => $request->phone,
                    'user_id' => Auth::id(),
                    'address_1' => $request->address_1,
                    'address_2' => $request->address_2,
                    'paymentMethod' => $request->paymentMethod,
                    'send_number' => $request->send_number,
                    'secretKey' => $request->secretKey,
                ]);

                foreach (Cart::item_cart() as $cart) {
                    $cart['order_id']=$order->order_id;
                    $cart->save();
                }

                if (!empty($order)) {
                    DB::commit();
                    Session::flash('insert','Order Added Sucessfully...');
                    return redirect('/');
                }
                throw new \Exception('Invalid About Information');
            }catch(\Exception $ex){
                DB::rollBack();
                echo $ex;
                //return back()->withError($ex->getMessage());
            }
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        try {
            $show = Order::query()->FindID($id);
            $carts = Cart::where('order_id', $id)->get();
            return view('user.order.show', compact('show', 'carts'));
        } catch (\Throwable $th) {
            throw $th;
        }
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
    public function update(Request $request, $id)
    {
        //
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
