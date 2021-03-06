<?php

namespace App\Http\Controllers;

use App\Http\Requests\ActivityRequest;
use App\Models\Activity;

class ActivityController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->authorize('activity.index');
        $activities = Activity::paginate(env('PAGINATION'));
        return view("contents.admin.activity.index", compact("activities"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $this->authorize('activity.create');
        return view('contents.admin.activity.form');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ActivityRequest $request)
    {
        $this->authorize('activity.create');
        Activity::create($request->all());
        return redirect()
            ->route("activity.index")
            ->with('success' , __('item created successfully'));

    }

    

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Activity $activity)
    {
        $this->authorize('activity.edit');
        return view('contents.admin.activity.form' , compact(
            "activity"
        ));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  Department  $department
     * @return \Illuminate\Http\Response
     */
    public function update(ActivityRequest $request, Activity $activity)
    {
        $this->authorize('activity.edit');
        $activity->update($request->all());
        return redirect()
                ->route("activity.index")
                ->with('warning' , __('item updated successfully'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Activity $activity)
    {
        $this->authorize('department.delete');
        try{
            $activity->delete();
            return redirect()
                    ->route("activity.index")
                    ->with('danger' , __('item deleted successfully'));
        }catch (\Exception $e){
            return redirect()
            ->route("activity.index")
            ->with('danger' , __('Delete is not Completed, Please check child of this activity'));
        }
        
    }


}
