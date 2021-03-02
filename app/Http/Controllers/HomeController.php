<?php

namespace App\Http\Controllers;

use App\Calender;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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
        $Calender= Calender::all();

        return view('home',array('calender'=>$Calender));
    }
    public function calender_register(Request $request)
    {
        $start_hour=$request->request->get("start_hour");
        $start_minute=$request->request->get("start_minute");
        $end_hour=$request->request->get("end_hour");
        $end_minute=$request->request->get("end_minute");
        $date=$request->request->get("date");
        $Calender= new Calender();
        $Calender->user_id=Auth::id();
        $Calender->start_time_plan=Carbon::parse($date.' '.$start_hour.':'.$start_minute);
        $Calender->end_time_plan=Carbon::parse($date.' '.$end_hour.':'.$end_minute);
        $Calender->save();

        return redirect()->route("home");
    }




    public function calender()
    {
        return view('calender');
    }

    // public function calender_edit($id)
    // {
    //     return view('calender');
    // }
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
