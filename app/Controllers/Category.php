<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class Category extends BaseController
{
    public function index()
    {
        $data = [
            'page' => 'view_categories'
        ];
        return view('view_template', $data);
    }
}
