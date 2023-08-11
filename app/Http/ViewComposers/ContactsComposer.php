<?php

namespace App\Http\ViewComposers;

use App\Models\Contacts;
use Illuminate\View\View;

class ContactsComposer
{
    public function compose(View $view)
    {
        return $view->with('contacts', Contacts::get()->groupBy('name'));
    }
}