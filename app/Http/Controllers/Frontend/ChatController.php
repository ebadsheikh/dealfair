<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;

class ChatController extends Controller
{
    public function index()
    {
        return view('frontend.user-panel.chat.index');
    }
}
