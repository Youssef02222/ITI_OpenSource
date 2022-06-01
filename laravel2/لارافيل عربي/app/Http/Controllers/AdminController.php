<?php

namespace App\Http\Controllers;

use App\Models\Management;
use App\Models\Reports;
use App\Models\Sections;

use App\Models\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function __construct()
    {
        $this->middleware('role:الدعم الفني|رئيس قسم');
    }

    // public function login(){
    //     return view('admin.index');
    // }

    public function index ()
    {
        $data['incomplete'] = Reports::where('status' , '!=' ,'مكتمل')->count('status');
        $data['complete'] = Reports::where('status' , 'مكتمل')->count('status');
        $data['all_reports'] = Reports::count('status');
        $data['active_reports'] = Reports::with(['user','type'])->where(function ($q){
            $q->where('status','غير مكتمل')->orwhere('status','انتظار الموافقة');
        })->get();
       
        $manager = Management::with('section')->where('user_id',\Auth::id())->first();
       // dd($manager);
        $data['managers'] =Sections::with(['reports'=> function($q)
        {$q->where('status','انتظار الموافقة');
        }
        ])->where('id',$manager->section_id)->get();

        return view('admin.index',$data);

    }

    public function show($id)
    {
        $data['report'] = Reports::find($id);

        $data['comments'] = $data ['report']->comments;
        $data['types'] = Sections::all(['id','name']);
        return view('admin.reports.show',$data);
    }

    public function change_status(Request $request)
    {

       $report = Reports::find($request->get('id'));

        $report->update([
            'status'=> $request->input('status')
        ]);
        return back()->with('successfully', 'تم تغير حالة البلاغ بنجاح');
    }


}
