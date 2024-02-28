<?php

namespace App\Http\Controllers\API;
use App\Http\Controllers\Controller;
use App\Models\Contact;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;


class ContactController extends Controller
{
    /**
     * Menampilkan daftar resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $contacts = Contact::all();
        return response()->json($contacts);
    }

    /**
     * Menyimpan resource yang baru dibuat ke dalam penyimpanan.
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
// dd($request->all());
        $contact = Contact::create($request->all());

        return response()->json($contact, 201);
    }

    /**
     * Menampilkan resource tertentu.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Contact $contact)
    {
        return response()->json($contact);
    }

    /**
     * Memperbarui resource yang ditentukan.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Contact $contact)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:contacts,email,{$contact -> $id} ,id',
            'phone_number' => 'required|max:255',
            'address' => 'required|string',
        ]);
     
        // dd($validator->messages());
        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }
       
        $contact->update($request->all());

        return response()->json($contact);

        
    }

    /**
     * Menghapus resource yang ditentukan.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Contact $contact)
    {
        $contact->delete();

        return response()->json(null, 204);
    }
}
