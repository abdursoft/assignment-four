<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

class ContactController extends Controller
{
    public function view(){
        return view('home');
    }

    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        if($request->get('search') && $request->get('sort')){
            $key = $request->get('search');
            $sort = $request->get('sort') == 'name' ? 'name' : 'created_at';

            $contacts = Contact::query()
            ->where('name', 'LIKE',"%$key%")
            ->orWhere('email','LIKE',"%$key%")
            ->orderBy($sort,'desc')->get();
        }else{
            $contacts = Contact::get();
        }

        return view('index',compact('contacts'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validate = Validator::make($request->post(),[
            'name' => 'required|string',
            'email' => 'required|email|unique:contacts,email'
        ]);

        if($validate->fails()){
            Session::flash('errors',$validate->errors());
            return redirect('/contacts/create');
        }

        try {
            Contact::create([
                'name' => $request->post('name'),
                'email' => $request->post('email'),
                'phone' => $request->post('phone'),
                'address' => $request->post('address')
            ]);
            Session::flash('success', "Contact successfully created");
            return redirect('/contacts/create');
        } catch (\Throwable $th) {
            Session::flash('errors', $th->getMessage());
            return redirect('/contacts/create');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $contact = Contact::find($id);
        if($contact){
            return view('show',compact('contact'));
        }else{
            Session::flash('errors','Contact id not found');
            return redirect('/contacts');
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $exist = Contact::find($id);
        if($exist){
            return view('edit',compact('exist'));
        }else{
            Session::flash('errors','Contact id not found');
            return redirect('/contacts');
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
        $validate = Validator::make($request->post(),[
            'name' => 'required|string',
            'email' => 'required|email|unique:contacts,email,'.$request->post('id').',id'
        ]);

        if($validate->fails()){
            Session::flash('errors',$validate->errors());
            return redirect("/contacts/".$request->post('id')."/edit");
        }

        try {
            Contact::where('id',$request->post('id'))->update([
                'name' => $request->post('name'),
                'email' => $request->post('email'),
                'phone' => $request->post('phone'),
                'address' => $request->post('address')
            ]);
            Session::flash('success', "Contact successfully updated");
            return redirect("/contacts/".$request->post('id')."/edit");
        } catch (\Throwable $th) {
            Session::flash('errors', $th->getMessage());
            return redirect("/contacts/".$request->post('id')."/edit");
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $contact = Contact::find($id);
        if($contact){
            $contact->delete();
            Session::flash('success','Contact successfully deleted');
            return redirect('/contacts');
        }else{
            Session::flash('errors','Contact id not found');
            return redirect('/contacts');
        }
    }
}
