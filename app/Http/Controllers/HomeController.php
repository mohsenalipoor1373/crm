<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $output = "
        <div class='col-md-6'>
        <canvas id='ChartComplaints' width='400' height='200'></canvas>

    </div>
    <div class='col-md-6'>
        <canvas id='ChartSale' width='400' height='200'></canvas>

    </div>
        ";
        return view('home',compact('output'));
    }


}
