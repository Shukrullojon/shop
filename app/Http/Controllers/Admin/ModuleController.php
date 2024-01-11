<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Module;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ModuleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $modules = Module::latest()->paginate(20);
        return view('admin.module.index', [
            'modules' => $modules
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.module.create', [

        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
        ]);
        if (isset($request->image)){
            $filePath = 'images/'.time().'.'.$request->image->extension();
            Storage::disk('my_files')->put($filePath, file_get_contents($request->image));
        }
        Module::create([
            'name' => $request->name,
            'image' => (isset($filePath)) ? $filePath : "",
            'info' => $request->info,
        ]);
        return redirect()->route('moduleIndex')->with('success', 'Module has been created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $module = Module::find($id);
        return view('admin.module.show', [
            'module' => $module,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $module = Module::find($id);
        return view('admin.module.edit', [
            'module' => $module
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
        ]);

        $module = Module::find($id);
        if (isset($request->image)){
            $filePath = 'images/'.time().'.'.$request->image->extension();
            Storage::disk('my_files')->put($filePath, file_get_contents($request->image));
        }
        $module->update([
            'name' => $request->name,
            'info' => $request->info,
            'image' => (isset($filePath)) ? $filePath :  $module->image,
        ]);
        return redirect()->route('moduleIndex')->with('success', 'Module has been updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete($id)
    {
        Module::where('id', $id)->delete();
        return redirect()->route('moduleIndex')->with('success', 'Module has been deleted successfully');
    }
}
