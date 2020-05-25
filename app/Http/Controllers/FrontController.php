<?php
namespace App\Http\Controllers;

use App\Measurement;

class FrontController extends Controller
{
    public function index()
    {
        $current = Measurement::getCurrent();

        return view('welcome')->with(compact('current'));
    }
}
