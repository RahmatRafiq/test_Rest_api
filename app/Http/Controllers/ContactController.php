<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ContactController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $contacts = Contact::all();
        return view('contacts.index', compact('contacts'));
    }

    

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('create');
    }

    public function search(Request $request)
{
    $query = $request->input('query');
    $contacts = Contact::where('name', 'LIKE', "%$query%")
        ->orWhere('email', 'LIKE', "%$query%")
        ->orWhere('phone_number', 'LIKE', "%$query%")
        ->orWhere('address', 'LIKE', "%$query%")
        ->get();

    return view('contacts.index', compact('contacts'));
}


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:contacts',
            'phone_number' => 'required|string|max:255',
            'address' => 'required|string',
        ]);

        $contact = Contact::create($request->all());

        return redirect()->route('index')->with('success', 'Contact created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $contact = Contact::findOrFail($id);
        return view('contacts.show', compact('contact'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $contact = Contact::findOrFail($id);
        return view('contacts.edit', compact('contact'));
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
        $contact = Contact::findOrFail($id);

        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:contacts,email,' . $contact->id,
            'phone_number' => 'required|string|max:255',
            'address' => 'required|string',
        ]);

        if ($validator->fails()) {
            return redirect()->route('edit', $id)->withErrors($validator)->withInput();
        }

        $contact->update($request->all());

        return redirect()->route('index')->with('success', 'Contact updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $contact = Contact::findOrFail($id);
        $contact->delete();

        return redirect()->route('contacts.index')->with('success', 'Contact deleted successfully.');
    }
}
