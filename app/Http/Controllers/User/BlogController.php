<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use App\Models\Service;
use Illuminate\Http\Request;

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
            $services = Service::query()->latest()->Active()->get(['service_id', 'name', 'status']);
            $blogs = Blog::query()->Active()->latest()->inRandomOrder()->paginate(4);
            return view('user.blog.index', compact('blogs', 'services'));
        } catch (\Throwable $th) {
            throw $th;
            abort(500);
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function service($id)
    {
        try {
            $services = Service::query()->latest()->Active()->get(['service_id', 'name', 'status']);
            $blogs = Blog::query()->Active()->latest()->where('service_id', $id)->inRandomOrder()->paginate(4);
            return view('user.blog.index', compact('blogs', 'services'));
        } catch (\Throwable $th) {
            throw $th;
            abort(500);
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $show = Blog::query()->FindID($id);
        return view('user.blog.detail', compact('show'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function search(Request $request)
    {
        try {
            $services = Service::query()->latest()->Active()->get(['service_id', 'name', 'status']);
            $blogs = Blog::orwhere('title','like','%'.$request->searchKey.'%')->Active()->paginate(4);
            return view('user.blog.index', compact('blogs', 'services'));
        } catch (\Throwable $th) {
            abort(500);
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
