<?php

namespace App\Controllers;

class Home extends BaseController
{
    public function index()
    {
        $data = [
            'page' => 'view_home'
        ];
        return view('view_template', $data);
    }
}
