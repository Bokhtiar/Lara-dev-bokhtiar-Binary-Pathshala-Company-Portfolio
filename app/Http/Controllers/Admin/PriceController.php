<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Price;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PriceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        try {
            $prices = Price::latest()->get(['price_id', 'title', 'designation', 'price', 'status']);
            return view('admin.modules.price.index', compact('prices'));
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.modules.price.createOrUpdate');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validated = Price::query()->Validation($request->all());
        if($validated){
            try{
                DB::beginTransaction();
                $price = Price::create([
                    'title' => $request->title,
                    'designation' => $request->designation,
                    'price' => $request->price,
                    'item1' => $request->item1,
                    'item2' => $request->item2,
                    'item3' => $request->item3,
                    'item4' => $request->item4,
                    'item5' => $request->item5, 
                ]);

                if (!empty($price)) {
                    DB::commit();
                    return redirect()->route('admin.price.index')->with('success','Price Created successfully!');
                }
                throw new \Exception('Invalid About Information');
            }catch(\Exception $ex){
                return back()->withError($ex->getMessage());
                DB::rollBack();
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
            $show = Price::query()->FindID($id);
            return view('admin.modules.price.show', compact('show'));
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
            $edit = Price::query()->FindID($id);
            return view('admin.modules.price.createOrUpdate', compact('edit'));
        } catch (\Throwable $th) {
            //throw $th;
        }
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
        $validated = Price::query()->Validation($request->all());
        if($validated){
            try{
                DB::beginTransaction();
                $update = Price::query()->FindID($id);
                $price = $update->update([
                    'title' => $request->title,
                    'designation' => $request->designation,
                    'price' => $request->price,
                    'item1' => $request->item1,
                    'item2' => $request->item2,
                    'item3' => $request->item3,
                    'item4' => $request->item4,
                    'item5' => $request->item5, 
                ]);

                if (!empty($price)) {
                    DB::commit();
                    return redirect()->route('admin.price.index')->with('success','Price Updated successfully!');
                }
                throw new \Exception('Invalid About Information');
            }catch(\Exception $ex){
                return back()->withError($ex->getMessage());
                DB::rollBack();
            }
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
            Price::query()->FindID($id)->delete();
            return redirect()->route('admin.price.index')->with('success','Price Delete successfully!');
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    public function status($id)
    {
        try {
            $price = Price::query()->FindID($id); //self trait
            Price::query()->Status($price); // crud trait
            return redirect()->route('admin.price.index')->with('warning','price Status Change successfully!');
        } catch (\Throwable $th) {
            throw $th;
        }
    }
}
