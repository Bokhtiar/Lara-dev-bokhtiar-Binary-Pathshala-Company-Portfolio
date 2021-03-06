<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Team;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TeamController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        try {
            $teams = Team::latest()->get(['team_id','name', 'designation', 'status']);
            return view('admin.modules.team.index', compact('teams'));
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
        return view('admin.modules.team.createOrUpdate');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validated = Team::query()->Validation($request->all());
        if($validated){
            try{
                DB::beginTransaction();
                $image = Team::query()->Image($request);
                $team = Team::create([
                    'name' => $request->name,
                    'designation' => $request->designation,
                    'image' => json_encode($image),

                    'fb' => $request->fb,
                    'instagram' => $request->instagram,
                    'twitter' => $request->twitter,
                    'linkdin' => $request->linkdin,
                ]);

                if (!empty($team)) {
                    DB::commit();
                    return redirect()->route('admin.team.index')->with('success','Team Created successfully!');
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
            $show = Team::query()->FindID($id);
            return view('admin.modules.team.show', compact('show'));
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
            $edit = Team::query()->FindID($id);
        return view('admin.modules.team.createOrUpdate', compact('edit'));
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
        $validated = Team::query()->Validation($request->all());
        if($validated){
            try{
                DB::beginTransaction();
                $update = Team::query()->FindID($id);
                $reqImage = $request->image;
                if($reqImage){
                    $newimage = Team::query()->Image($request);
                }else{
                    $image = $update->image;
                }

                $team = $update->update([
                    'name' => $request->name,
                    'designation' => $request->designation,
                    'image' => $reqImage ? json_encode($newimage) : $image,

                    'fb' => $request->fb,
                    'instagram' => $request->instagram,
                    'twitter' => $request->twitter,
                    'linkdin' => $request->linkdin,
                ]);

                if (!empty($team)) {
                    DB::commit();
                    return redirect()->route('admin.team.index')->with('success','Team Updated successfully!');
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
            Team::query()->FindID($id)->delete();
            return redirect()->route('admin.team.index')->with('success','Team Delete successfully!');
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    public function status($id)
    {
        try {
            $team = Team::query()->FindID($id); //self trait
            Team::query()->Status($team); // crud trait
            return redirect()->route('admin.team.index')->with('warning','Team Status Change successfully!');
        } catch (\Throwable $th) {
            throw $th;
        }
    }
}
