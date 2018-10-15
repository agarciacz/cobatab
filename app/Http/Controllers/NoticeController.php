<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class NoticeController extends Controller
{
    public function create()
    {
        return view('notice.create');
    }

    public function savevideo(Request $request)
    {
        $validateData = $this->validate($request, [
            'title' => 'requered|min:5',
            'description' => 'required',
            'image' => 'required|mimes:jpeg,jpg,png'
        ]);
    }
}
