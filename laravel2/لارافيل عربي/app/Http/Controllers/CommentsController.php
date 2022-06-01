<?php

namespace App\Http\Controllers;

use App\Models\Comments;
use App\Models\Reports;
use Illuminate\Http\Request;

class CommentsController extends Controller
{



    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        $report = Reports::where('status','مغلق')->find($request->get('id'));

        if ($report):
            return back()->with('error', 'عذرا لاتستطيع كتابة تعليق والبلاغ مغلق');
        endif;
        $request->validate(['body' => 'Required']);
        $data =[
            'comment' => $request->input('body'),
            'user_id'=> \Auth::id(),
            'report_id'=> $request->input('id')
        ];
        $comment = Comments::create($data);
        return back()->with('message', 'تم ارسال التعليق بنجاح');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Comments  $comments
     * @return \Illuminate\Http\Response
     */
    public function show(Comments $comments)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Comments  $comments
     * @return \Illuminate\Http\Response
     */
    public function edit(Comments $comments)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Comments  $comments
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Comments $comments)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Comments  $comments
     * @return \Illuminate\Http\Response
     */
    public function destroy(Comments $comments)
    {
        //
    }
}
