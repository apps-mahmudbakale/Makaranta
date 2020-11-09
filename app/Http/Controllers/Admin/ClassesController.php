<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyClassRequest;
use App\Http\Requests\StoreClassRequest;
use App\Http\Requests\UpdateClassRequest;
use App\Classes;
use App\Section;

class ClassesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        abort_unless(\Gate::allows('class_read'), 403);

        $classes = Classes::all();

        return view('admin.classes.index', compact('classes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        abort_unless(\Gate::allows('class_create'), 403);

        $sections = Section::all();

        return view('admin.classes.create', compact('sections'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreClassRequest $request)
    {
        abort_unless(\Gate::allows('class_create'), 403);

        $class = Classes::create($request->all());

        return redirect()->route('admin.class.index');
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
    public function edit(Classes $class)
    {
        abort_unless(\Gate::allows('class_edit'), 403);

        return view('admin.classes.edit', compact('class'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
   public function update(UpdateClassRequest $request, Classes $class)
   {
       abort_unless(\Gate::allows('class_edit'), 403);

       $class->update($request->all());

       return redirect()->route('admin.class.index');
   }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
   public function destroy(Classes $class)
   {
       abort_unless(\Gate::allows('class_delete'), 403);

       $class->delete();

       return back();
   }

   public function massDestroy(MassDestroyClassRequest $request)
   {
       Classes::whereIn('id', request('ids'))->delete();

       return response(null, 204);
   }
}
