<?php

namespace App\Http\Controllers;

use App\Http\Requests\PlanRequest;
use App\Models\Plan;

class PlanController extends Controller
{
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->authorize('plan.index');
        $plans = Plan::paginate();
        return view("contents.admin.plan.index", compact("plans"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $this->authorize('plan.create');
        return view('contents.admin.plan.form');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\planRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PlanRequest $request)
    {
        $this->authorize('plan.create');
        Plan::create($request->all());
        return redirect()
            ->route("plan.index")
            ->with('success' , __('item created successfully'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Plan $plan)
    {
        $this->authorize('plan.edit');        
        return view('contents.admin.plan.form' , compact(
            "plan"
        ));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(PlanRequest $request, Plan $plan)
    {
        $this->authorize('plan.edit');
        $plan->update($request->all());
        return redirect()
                ->route("plan.index")
                ->with('warning' , __('item updated successfully'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Plan $plan)
    {
        $this->authorize('plan.delete');
        $plan->delete();
        return redirect()
                ->route("plan.index")
                ->with('danger' , __('item deleted successfully'));
    }


}
