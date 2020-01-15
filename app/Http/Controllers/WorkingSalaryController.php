<?php

namespace App\Http\Controllers;

use App\WorkingSalary;
use Illuminate\Http\Request;

class WorkingSalaryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $working_salaries = WorkingSalary::all();
        return view('admin-dashboard.working-salary-management.all-working-salaries',compact('working_salaries'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin-dashboard.working-salary-management.add-working-salary');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $from = $request->from;
        $to = $request->to;
        $working_salary = WorkingSalary::create([
            'from' => $from,
            'to' => $to,

        ]);
        return redirect()->route('working_salary.index')->with('success','Working Salary Added successfully!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\WorkingSalary  $workingSalary
     * @return \Illuminate\Http\Response
     */
    public function show(WorkingSalary $workingSalary)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\WorkingSalary  $workingSalary
     * @return \Illuminate\Http\Response
     */
    public function edit(WorkingSalary $workingSalary)
    {
        return view('admin-dashboard.working-salary-management.edit-working-salary',compact('workingSalary'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\WorkingSalary  $workingSalary
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, WorkingSalary $workingSalary)
    {
        $from = $request->from;
        $to = $request->to;
        $workingSalary->from = $from;
        $workingSalary->to = $to;
        $workingSalary->save();
        return redirect()->route('working_salary.index')->with('success','Working Salary from '.$workingSalary->from.' to '.$workingSalary->to.' Updates successfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\WorkingSalary  $workingSalary
     * @return \Illuminate\Http\Response
     */
    public function destroy(WorkingSalary $workingSalary)
    {
        $workingSalary->delete();
        return redirect()->route('working_salary.index')->with('success','Working Salary from '.$workingSalary->from.' to '.$workingSalary->to.' Deleted successfully!');
    }
}
