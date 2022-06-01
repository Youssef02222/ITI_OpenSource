<?php

namespace App\Http\Controllers;

use App\Models\Reports;
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

        $id = auth()->id();
        $data['incomplete'] = Reports::where('status' , '!=' ,'مكتمل')->where('user_id',$id)->count('status');
        $data['complete'] = Reports::where(['status' => 'مكتمل', 'user_id' => $id])->count('status');
        $data['all_reports'] = Reports::where(['user_id' => $id])->count('status');
        $data['active_reports'] = Reports::with(['user','type'])->where(function ($q){
            $q->where('status','غير مكتمل')->orwhere('status','انتظار الموافقة');
        })->where('user_id',$id)->get();

        $data['support'] =  Reports::with(['user','type'])->where(function ($q){
            $q->where('status','غير مكتمل')->orwhere('status','انتظار الموافقة');
        })->get();
        return view('dashboard.index',$data);

    }
}
