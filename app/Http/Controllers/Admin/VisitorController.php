<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Resources\VisitorInfo;
use App\Models\Visitor;
use Illuminate\Http\Request;

class VisitorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
    // * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $visitors=\App\Models\Visitor::all();
        $data['data']=response()->json(VisitorInfo::collection($visitors));
        return $data['data'];
        return view('dashboard.admin.visitors.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     //* @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data ['title']='Create Staff';
        $data ['visitors']=Visitor::all();
        return view('dashboard.admin.visitors.create', $data);
    }
      /**
     * Display the specified resource.
     *
     * @param  int  $id
     //* @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data ['visitors']=Visitor::find($id);
        $data ['title']='Visitor Details' . $data ['visitors'];
        return view('dashboard.admin.visitors.show', $data);
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     //* @return \Illuminate\Http\Response
     */
    public function save(Request $request)
    {
       // $validator=
    }

  

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
    // * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data ['title']='Edit Visitors';
        $data ['visitors']=Visitor::find($id);
        return view('dashboard.admin.visitors.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     //* @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $visitors=Visitor::find($id);
        $visitors->name=$request->name;
        $visitors->username=$request->username;
        $visitors->phone_number=$request->phone_number;
        $visitors->save();
        return back()->with('Success', 'Done');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
    // * @return \Illuminate\Http\Response
     */
    public function delete($id)
    {
        $visitors=Visitor::find($id);
        if($visitors !=NULL){
            $visitors->delete();
        }
        return back()->with('Success', 'Done');
    }
}
