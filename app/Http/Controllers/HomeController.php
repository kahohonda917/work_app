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
        return view('home');
    }

    public function calender()
    {
        return view('calender');
    }
    public function calender_register($id)
    {
        return view('calender');
    }
    public function calender_edit($id)
    {
        return view('calender');
    }
    public function calender_delete($id)
    {
        return view('calender');
    }

    public function customer()
    {
        return view('customer');
    }
    public function customer_register($id)
    {
        return view('customer');
    }
    public function customer_edit($id)
    {
        return view('customer');
    }
    public function customer_delete($id)
    {
        return view('customer');
    }

    public function worker()
    {
        return view('worker');
    }
    public function worker_register($id)
    {
        return view('worker');
    }
    public function worker_edit($id)
    {
        return view('worker');
    }
    public function worker_delete($id)
    {
        return view('worker');
    }
}
