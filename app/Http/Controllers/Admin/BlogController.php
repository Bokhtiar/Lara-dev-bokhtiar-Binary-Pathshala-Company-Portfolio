<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use App\Models\Service;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class BlogController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        try {
            $blogs = Blog::latest()->get(['blog_id', 'title', 'service_id','status']);
            return view('admin.modules.blog.index', compact('blogs'));
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
            $services = Service::latest()->get(['service_id', 'name']);
            return view('admin.modules.blog.createOrUpdate', compact('services'));
        } catch (\Throwable $th) {
            throw $th;
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
        $validated = Blog::query()->Validation($request->all());
        if($validated){
            try{
                DB::beginTransaction();
                $image = Blog::query()->Image($request);
                $blog = Blog::create([
                    'title' => $request->title,
                    'user_id' => Auth::id(),
                    'service_id' => $request->service_id,
                    'body' => $request->body,
                    'image' => json_encode($image)
                ]);

                if (!empty($blog)) {
                    DB::commit();
                    return redirect()->route('admin.blog.index')->with('success','Blog Created successfully!');
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
            $show = Blog::query()->FindID($id);
            return view('admin.modules.blog.show', compact('show'));
        } catch (\Throwable $th) {
            //throw $th;
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
            $edit = Blog::query()->FindID($id);
            $services = Service::latest()->get(['service_id', 'name']);
            return view('admin.modules.blog.createOrUpdate', compact('services', 'edit'));
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
        $validated = Blog::query()->Validation($request->all());
        if($validated){
            try{
                DB::beginTransaction();
                $update = Blog::query()->FindID($id);

                $reqImage = $request->image;
                if($reqImage){
                    $newimage = Service::query()->Image($request);
                }else{
                    $image = $update->image;
                }

                $blog = $update->update([
                    'title' => $request->title,
                    'user_id' => Auth::id(),
                    'service_id' => $request->service_id,
                    'body' => $request->body,
                    'image' => $reqImage ? json_encode($newimage) : $image
                ]);

                if (!empty($blog)) {
                    DB::commit();
                    return redirect()->route('admin.blog.index')->with('success','Blog Created successfully!');
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
            Blog::query()->FindID($id)->delete();
            return redirect()->route('admin.blog.index')->with('success','Blog Delete successfully!');
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    public function status($id)
    {
        try {
            $blog = Blog::query()->FindID($id); //self trait
            Blog::query()->Status($blog); // crud trait
            return redirect()->route('admin.blog.index')->with('warning','Blog Status Change successfully!');
        } catch (\Throwable $th) {
            throw $th;
        }
    }
}
