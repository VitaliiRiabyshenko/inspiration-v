<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Contacts;
use Illuminate\Http\Request;

class ContactsController extends Controller
{
    public function index()
    {
        $contacts = Contacts::get()->groupBy('name');

        return view('admin.layouts.contacts.index', compact('contacts'));
    }

    public function store(Request $request)
    {
        $contacts = $request->all();

        foreach($contacts as $key => $contact) {
            if($key !== '_token') {
                Contacts::updateOrCreate([
                    'name' => $key
                ],[
                    'link' => $contact
                ]);
            }
        }
        return redirect()->route('contacts.index')->with('success', 'Контакти успішно оновлено');

    }
}
