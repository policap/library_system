<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Book;
use Illuminate\Foundation\Testing\Concerns\MakesHttpRequests;
use Illuminate\Http\Request;

class BookResource extends Controller
{
    /**
     * Display a listing of the resource.
     *
    //  * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data ['title']='Book Index';
        $data ['books']=Book::all();
        return view('dashboard.admin.book.index', $data);
        
    }
       /**
     * Display the specified resource.
     *
     * @param  int  $id
     //* @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data ['book']=Book::find($id);
        $data ['title']='Book Details' . $data ['book']->name;
        return view('dashboard.admin.book.show', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     //* @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data ['title']='Create Book';
        return view('dashboard.admin.book.create', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     //* @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //title, author, size, 
        $validator=\Illuminate\Support\Facades\Validator::Make($request->all(), ['title'=>'required|title', 'author'=>'required|author','size'=>'required|size']);
        if($validator->fails()){
            return back()->with('error',$validator->errors()->first());
           
        }
        $data=['title'=>$request->title, 'author'=>$request->author, 'size'=>$request->size];
        $book=new Book($data);
        $book->save();
        return back()->with('Success', "Done");
    }   

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     //* @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data ['title']='Edit Book';
        $data ['book']=Book::find($id);
        return view('dashboard.admin.book.edit', $data);
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
        $book=Book::find($id);
        $book->title=$request->title;
        $book->author=$request->author;
        $book->shelf_id=$request->Shelf_id;
        $book->save();
        return back()->with('success', 'Done');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     //* @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $book=Book::find($id);
        if($book != NULL){
            $book->delete();
        }
        return back()->with('Success', 'Done');
    }
    public function search()
    {
        return view('dashboard.admin.book.search');
    }
    public function do_search(Request $request)
    {
        $q=$request->search_data;
        //$q=data from search form 
        $data=Book::where('title', 'LIKE', '%'.$q.'%')->where('author', 'LIKE', '%'.$q.'%')->take(10)->get();
        return response()->json(['data'=>$data]);
    }

}

