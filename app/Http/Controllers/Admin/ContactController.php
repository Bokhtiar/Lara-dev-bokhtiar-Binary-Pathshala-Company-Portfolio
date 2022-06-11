<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Contact;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $contacts = Contact::get(['name', 'email', 'contact_id', 'status']);
        return view('admin.modules.contact.index', compact('contacts'));
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
            $show = Contact::query()->FindID($id);
            return view('admin.modules.contact.show', compact('show'));
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
            Contact::query()->FindID($id)->delete();
            return redirect()->route('admin.contact.index')->with('success','Contact Delete successfully!');
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    public function status($id)
    {
        try {
            $contact = Contact::query()->FindID($id); //self trait
            Contact::query()->Status($contact); // crud trait
            return redirect()->route('admin.contact.index')->with('warning','Contact Status Change successfully!');
        } catch (\Throwable $th) {
            throw $th;
        }
    }
}
