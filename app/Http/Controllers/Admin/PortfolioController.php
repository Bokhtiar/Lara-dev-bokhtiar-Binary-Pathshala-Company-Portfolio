<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Portfolio;
use App\Models\Service;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PortfolioController extends Controller
{
   /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        try {
            $portfolios = Portfolio::latest()->get(['portfolio_id', 'title', 'service_id', 'status']);
            return view('admin.modules.portfolio.index', compact('portfolios'));
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
        try {
            $servies = Service::query()->Active()->latest()->get(['service_id', 'name']);
            return view('admin.modules.portfolio.createOrUpdate', compact('servies'));
        } catch (\Throwable $th) {
            //throw $th;
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validated = portfolio::query()->Validation($request->all());
        if($validated){
            try{
                DB::beginTransaction();
                $images = portfolio::query()->Images($request);
                $portfolio = portfolio::create([
                    'service_id' => $request->service_id,
                    'title' => $request->title,
                    'client_name' => $request->client_name,
                    'project_url' => $request->project_url,
                    'project_date' => $request->project_date,
                    'body' => $request->body,
                    'images' => json_encode($images)
                ]);

                if (!empty($portfolio)) {
                    DB::commit();
                    return redirect()->route('admin.portfolio.index')->with('success','portfolio Created successfully!');
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
            $show = Portfolio::query()->FindID($id);
            return view('admin.modules.portfolio.show', compact('show',));
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
            $servies = Service::query()->Active()->latest()->get(['service_id', 'name']);
            $edit = Portfolio::query()->FindID($id);
            return view('admin.modules.portfolio.createOrUpdate', compact('edit', 'servies'));
        } catch (\Throwable $th) {
            throw $th;
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
        $validated = Portfolio::query()->Validation($request->all());
        if($validated){
            try{
                DB::beginTransaction();
                $update = Portfolio::query()->FindID($id);

                $reqImage = $request->images;
                if($reqImage){
                    $newimage = Portfolio::query()->Images($request);
                }else{
                    $image = $update->images;
                }


                $portfolioU = $update->update([
                    'service_id' => $request->service_id,
                    'title' => $request->title,
                    'client_name' => $request->client_name,
                    'project_url' => $request->project_url,
                    'project_date' => $request->project_date,
                    'body' => $request->body,
                    'images' => $reqImage ? json_encode($newimage) : $image,
                ]);

                if (!empty($portfolioU)) {
                    DB::commit();
                    return redirect()->route('admin.portfolio.index')->with('success','portfolio Created successfully!');
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
            Portfolio::query()->FindID($id)->delete();
            return redirect()->route('admin.portfolio.index')->with('success','portfolio Deleted successfully!');
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
            $portfolio = Portfolio::query()->FindID($id); //self trait
            Portfolio::query()->Status($portfolio); // crud trait
            return redirect()->route('admin.portfolio.index')->with('warning','portfolio Status Change successfully!');
        } catch (\Throwable $th) {
            throw $th;
        }
    }
}
