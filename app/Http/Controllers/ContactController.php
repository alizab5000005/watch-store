<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function show_contacts(Request $request)
    {
        return view('contacts');
    }
    public function store(Request $request)
    {
        //
    }
    public function edit(Contact $contact)
    {
        //
    }

    public function update(Request $request, Contact $contact)
    {
        //
    }
    public function destroy(Contact $contact)
    {
        //
    }
}
