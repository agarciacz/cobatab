<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Notice;
use App\User;


class NoticeController extends Controller
{
    public function listnotice()
    {
        return view('notice.listnotice');
    }

    public function create()
    {
        return view('notice.create');
    }

    public function savevideo(Request $request)
    {
        $validateData = $this->validate($request, [
            'title' => 'required|min:5',
            'description' => 'required',
            'image' => 'required|mimes:jpeg,jpg,png'
        ]);
    }
}
