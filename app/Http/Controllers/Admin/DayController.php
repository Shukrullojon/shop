<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Day;
use App\Models\Module;
use Illuminate\Http\Request;

class DayController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $days = Day::orderBy('id','DESC')->paginate(20);
        return view('admin.day.index', [
            'days' => $days
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $modules = Module::latest()->get();
        return view('admin.day.create',[
            'modules' => $modules,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'module_id' => 'required',
        ]);
        Day::create($request->post());
        return redirect()->route('dayIndex')->with('success', 'Day has been created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $day = Day::find($id);
        return view('admin.day.show', [
            'day' => $day,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $day = Day::find($id);
        $modules = Module::latest()->get();
        return view('admin.day.edit', [
            'day' => $day,
            'modules' => $modules,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
        ]);
        $day = Day::find($id);
        $day->fill($request->post())->save();
        return redirect()->route('dayIndex')->with('success','Day Has Been updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function delete($id)
    {
        Day::where('id',$id)->delete();
        return redirect()->route('dayIndex')->with('success','Day has been deleted successfully');
    }
}
