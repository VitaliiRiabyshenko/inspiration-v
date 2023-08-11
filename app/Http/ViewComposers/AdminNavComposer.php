<?php

namespace App\Http\ViewComposers;


use Illuminate\View\View;

class AdminNavComposer
{
    public function compose(View $view)
    {
        return $view->with('notifications', auth()->guard('admin')->user()->unreadNotifications);
    }
}