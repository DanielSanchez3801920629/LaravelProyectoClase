<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class HomeController extends Controller
{
    public function testDBConection() {
        try {
            DB::connection()->getPdo();
            if(DB::connection()->getDatabaseName()){
                return "Connected";
            } else {
                die("not connected");
            }
        } catch (\Exception $e) {
            die("Can't connect to the DB");
        }
    }
}
