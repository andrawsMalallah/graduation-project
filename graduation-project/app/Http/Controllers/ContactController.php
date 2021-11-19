<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function index()
    {
        return view('frontend.contact');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'message' => 'required',
        ]);

        Contact::create($request->all());

        return back()->with('message', 'Message sent successfully');
    }

    // dashboard
    public function messages()
    {
        $messages = Contact::orderBy('created_at', 'DESC')->get();
        return view('backend.messages.index', compact('messages'));
    }

    public function show(Contact $contact)
    {
        return view('backend.messages.show', compact('contact'));
    }

    public function delete(Contact $contact)
    {
        $contact->delete();
        return back()->with('message', 'Message deleted successfully');
    }


}
