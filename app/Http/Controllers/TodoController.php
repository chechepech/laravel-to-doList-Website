<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Todo;

class TodoController extends Controller
{   

    /**
    *
    *
    *
    */
    public function done($id){
        $todo = Todo::findOrfail($id);
        $todo->status = '1';
        $todo->save();
        return back();
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('tasks.index',['todos' => Todo::latest()->paginate()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('tasks.create',['todo' => new Todo]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->request->add(['status' => '0']);
        $fields = request()->validate([
            'task' => 'required|string',
            'status' => 'nullable|max:1'
        ]);
        Todo::create($fields);
        return redirect()->route('tasks.index')->with('success','Post was created successfully!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $todo = Todo::findOrfail($id);
        return view('tasks.show')->with(['todo'=> $todo]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $todo = Todo::findOrfail($id);
        return view('tasks.edit')->with(['todo'=> $todo]);
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
        $todo = Todo::findOrfail($id);
        //validate checkbox
        //if checked POST = 1
        if($request->has('status')) {$request->request->add(['status'=>'1']);}
        //NO POST assign 0;
        else{$request->request->add(['status'=>'0']);}

        //validate fields
        $fields = request()->validate([
            'task' => 'required|string',
            'status' => 'nullable|max:1'
        ]);        
        $todo->update($fields);
        return back()->with('status','Task has been updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Todo::findOrfail($id)->delete();
        return back()->with('status','Task has been deleted successfully!');
    }
}
