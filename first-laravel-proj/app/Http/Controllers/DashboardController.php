<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index(Request $request) {
        // var_dump($request->query('title'));
        // dashboard?title=Dashboard
        $title = $request->input('title', 'Título por defecto');
        return view('test', ['name' => $title]);
    }
}
