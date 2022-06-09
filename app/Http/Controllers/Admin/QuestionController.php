<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Question;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class QuestionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        try {
            $questions = Question::latest()->get(['question_id', 'question', 'ans']);
            return view('admin.modules.question.index', compact('questions'));
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
        return view('admin.modules.question.createOrUpdate');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validated = Question::query()->Validation($request->all());
        if($validated){
            try{
                DB::beginTransaction();
                $question = Question::create([
                    'question' => $request->question,
                    'ans' => $request->ans,
                ]);

                if (!empty($question)) {
                    DB::commit();
                    return redirect()->route('admin.question.index')->with('success','Question Created successfully!');
                }
                throw new \Exception('Invalid About Information');
            }catch(\Exception $ex){
                return back()->withError($ex->getMessage());
                DB::rollBack();
            }
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
            $edit = Question::query()->FindID($id);
            return view('admin.modules.question.createOrUpdate', compact('edit'));
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
        $validated = Question::query()->Validation($request->all());
        if($validated){
            try{
                DB::beginTransaction();
                $update = Question::query()->FindID($id);
                $question = $update->update([
                    'question' => $request->question,
                    'ans' => $request->ans,
                ]);

                if (!empty($question)) {
                    DB::commit();
                    return redirect()->route('admin.question.index')->with('success','Question Updated successfully!');
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
            Question::query()->FindID($id)->delete();
            return redirect()->route('admin.question.index')->with('success','Question Delete successfully!');
        } catch (\Throwable $th) {
            throw $th;
        }
    }
}
