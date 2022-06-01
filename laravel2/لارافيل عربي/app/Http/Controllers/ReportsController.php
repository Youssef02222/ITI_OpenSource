<?php

namespace App\Http\Controllers;

use App\Http\Requests\ReportRequest;
use App\Models\Comments;
use App\Models\Reports;
use App\Models\Sections;
use App\Models\User;
use Illuminate\Http\Request;


class ReportsController extends Controller
{

    public function __construct()
    {

        $this->middleware('role:الدعم الفني|رئيس قسم')->only(['edit','update','destroy']);


    }



    public function index()
    {
        $data['reports']= Reports::where('user_id' , \Auth::id())->get();
        $data['manager']= Reports::all();
        return view('dashboard.reports.all_reports',$data);
    }

    public function complete()
    {
        $data['reports']= Reports::where(['user_id' => \Auth::id(),'status' => 'مكتمل'])->get();
        $data['manager']= Reports::where('status' , 'مكتمل')->get();

        return view('dashboard.reports.complete',$data);
    }

    public function incomplete()
    {
        $data['reports']= Reports::where(['user_id' => \Auth::id(),'status' => 'غير مكتمل'])->get();
        $data['manager']= Reports::where('status', 'غير مكتمل')->get();
        return view('dashboard.reports.incomplete',$data);
    }


    public function create()
    {
        $sections= Sections::all();
        return  view('dashboard.reports.create',compact('sections'));
    }


    public function store(ReportRequest $request)
    {
        $data = Reports::create([
                'title' =>$request->input('title'),
                'body' =>$request->input('body'),
                'hall_number' =>$request->input('hall_number'),
                'user_id'=> \Auth::id(),
                'section_id'=> $request->input('report_type')]);

        return redirect('/')->with('message', 'تم انشاء بلاغ جديد سيتم الاطلاع عليه من قبل الدعم الفني');

    }


    public function show($id)
    {

        $user = User::find(\Auth::id())->hasRole('الدعم الفني');
        if ($user){

            $data['report']  = Reports::where('id' , $id)->firstOrFail();
            $data['comments'] = $data ['report']->comments;
            $data['types'] = Sections::all(['id','name']);
            return view('dashboard.reports.show',$data);
        }
        $data['report'] = Reports::where(['id' => $id,'user_id' => \Auth::id()])->firstOrFail();
        $data['comments'] = $data ['report']->comments;
        $data['types'] = Sections::all(['id','name']);
        return view('dashboard.reports.show',$data);
    }


    public function edit($id): \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Contracts\Foundation\Application
    {
        $data = Reports::find($id);
        return view('edit',$data);
    }


    public function update(Request $request, Reports $Reports): void
    {
        //
    }





    public function destroy(Reports $reports,$id): \Illuminate\Routing\Redirector|\Illuminate\Contracts\Foundation\Application|\Illuminate\Http\RedirectResponse
    {
        $delete = $reports->find($id);
        $delete->delete();
         return redirect('/')->with('message', 'تم حذف البلاغ بنجاح');
    }


    public function close_report(Request $request): \Illuminate\Http\RedirectResponse
    {
        $report = Reports::findOrFail($request->get('id'));
        $report->update(['status' => 'مغلق']);
         return back()->with('message', 'تم اغلاق البلاغ بنجاح');

    }

    public function upload_report(Request $request): \Illuminate\Http\RedirectResponse
    {
        $report = Reports::findOrFail($request->get('id'));
        $report->update(['status' => 'انتظار الموافقة']);
        return back()->with('message', 'تم رفع البلاغ لرئيس القسم');

    }




}
