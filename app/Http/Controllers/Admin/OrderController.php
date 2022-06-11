<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Cart;
use App\Models\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $orders = Order::query()->latest()->get(['order_id','f_name', 'l_name', 'email', 'status']);
        return view('admin.modules.order.index', compact('orders'));
    }

    public function show($id)
    {
        try {
            $show = Order::query()->FindID($id);
            $carts = Cart::where('order_id', $id)->get();
            return view('admin.modules.order.show', compact('show', 'carts'));
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
        try {
            $edit = Order::query()->FindID($id);
        return view('admin.modules.service.createOrUpdate', compact('edit'));
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try {
            Order::query()->FindID($id)->delete();
            foreach (Cart::where('order_id', $id)->get() as $cart) {
                $cart->delete();
            }
            return redirect()->route('admin.order.index')->with('success','Service Delete successfully!');
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    public function delete($cart_id) //this function order cart item delete for this
    {
        try {
            Cart::query()->FindID($cart_id)->delete();
            return redirect()->back();
        } catch (\Throwable $th) {
            throw $th;
        }
    }



     /**
     * status change the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function status($id)
    {
        try {
            $order = Order::query()->FindID($id); //self trait
            Order::query()->Status($order); // crud trait
            return redirect()->route('admin.order.index')->with('warning','Order Status Change successfully!');
        } catch (\Throwable $th) {
            throw $th;
        }
    }
}
