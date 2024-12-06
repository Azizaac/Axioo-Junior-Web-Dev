<?php

namespace App\Controllers;

class Pages extends BaseController
{
    public function index()
    {
        $data = [
            'title' => 'Home Page || Prakusya'
        ];
        return view('Page/Home', $data);
    }

    public function about()
    {
        $data = [
            'title' => 'About Page || Prakusya'
        ];
        return view('Page/About', $data);
    }
}
