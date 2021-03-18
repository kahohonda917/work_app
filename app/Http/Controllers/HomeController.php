<?php

namespace App\Http\Controllers;

use App\Calender;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\User;
use App\Chat;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware(['auth','verified']);
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

    public function calender_edit(Request $request, $id)
    {
        $Calender = Calender::find($id);
        $start_hour=$request->request->get("start_hour");
        $start_minute=$request->request->get("start_minute");
        $end_hour=$request->request->get("end_hour");
        $end_minute=$request->request->get("end_minute");
        $date=$request->request->get("edit_date");

        $Calender->user_id=Auth::id();
        if(isset($start_hour)){
            $Calender->start_time_plan=Carbon::parse($date.' '.$start_hour.':'.$start_minute);
            $Calender->end_time_plan=Carbon::parse($date.' '.$end_hour.':'.$end_minute);
        }elseif($Calender->start_time==null){
            $Calender->start_time=new Carbon();
        }else{
            $Calender->end_time=new Carbon();
        }

        $Calender->save();

        return redirect()->route("home");

    }
    public function calender_delete($id)
    {
        $Calender = Calender::find($id);
        $Calender->delete();
        return redirect()->route("home");
    }
    public function chat_prev(){

        $customer=Auth::user();//自分

    
        $users = User::where('id' ,'<>' , $customer->id)->get();
        // $messages=Chat::where("to_user_id",$customer->id)
        //         //->where("from_user_id",$user->id)
        //         ->get();
        
        return view('chat_prev', [
            "users" => $users
        ]);
        //return view('chat',compact($messages));
    }

    public function chat(Request $request, $customer_id){

        $login=Auth::user();//自分
        $loginId=Auth::id();
        $customer=User::find($customer_id);//相手

        $Chat = new Chat();
        $new_message=$request->request->get("message");
        if(isset($new_message)){
            $Chat->message=$new_message;
            $Chat->to_user_id=$customer->id;
            $Chat->from_user_id=$login->id;
            $Chat->save();
        }

        $users = User::where('id' ,'<>' , $login->id)->get();

        $param = [
            'send' => $loginId,
            'receive' => $customer_id,
        ];

        $query=Chat::where("to_user_id",$login->id)
                ->where("from_user_id",$customer->id);
        $query->orWhere(function($query) use($loginId , $customer_id){
                    $query->where('to_user_id' , $customer_id);
                    $query->where('from_user_id' , $loginId);
         
                });
        $messages = $query->get();

        $kochas=Chat::where("to_user_id",$login->id)
                ->where("from_user_id",$customer->id)
                ->get();
        $sentkochas=Chat::where("from_user_id",$login->id)
                ->where("to_user_id",$customer->id)
                ->get();

        

        //dd($kochas);
        //dd($sentkochas);
        //dd($messages);
        return view('chat', [
            "param" => $param,
            "messages" => $messages,
            "users" => $users,
            "kochas" => $kochas,
            "sentkochas" => $sentkochas ,
            "user_t" => $customer
        ]);
        //return view('chat',compact($messages));
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
