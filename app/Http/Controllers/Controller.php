<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Organization;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\Validator;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
    public function import(){
        $data ['title']='Import organizations'; 
        return view('dashboard.admin.import_organizations.import', $data);
    }
    public function import_organizations(Request $request){
        $validator=Validator::make($request->all(), ['file'=>'required|mimes:csv']);
        if($validator->fails()){
            return back()->with('error', $validator->errors()->first());
            
        }
        $file =$request->file('file');
        if($file!=null){
            $file->storeAs('files', 'organizations.csv');
            $file_reader=fopen(storage_path('app/files/organizations.csv'), 'r');
            //'r'=>read, 'w'=write, 'rw'=>read and write and same time, 'a'=>append to the end of the file

            $file_data =[];
            $counter=0;
           
            try {
                while(($row=fgetcsv($file_reader, 1000)) !=null){
                    $counter++;
                    if($counter==1)continue;
                    $file_data []=[
                        'organization_id'=>$row[1],
                        'name'=>$row[2],
                        'website'=>$row[3],
                        'country'=>$row[4],
                        'description'=>$row[5],
                        'founded'=>$row[6],
                        'industry'=>$row[7],
                        'number_of_employees'=>$row[8]
                    ];
    
                }
                    fclose($file_reader);
                    \DB::beginTransaction();
                    Organization::insert($file_data);
                    \DB::commit();
                    return back()->with('success', 'Done');
            } catch (\Throwable $th) {
                \DB::rollBack();
                return back()->with('error', $th->getMessage());

            }

        }
        
    }
    public function export_organizations($size=200){
        $data= Organization::take($size)->get();
        $file= storage_path('app/files/exported_organizations.csv');
        $file_writer =fopen($file, 'w');
        foreach ($data as $key => $value) {
            $row=[
                'organization_id'=>$value->organization_id,
                'name'=>$value->name,
                'website'=>$value->website,
                'country'=>$value->country,
                'description'=>$value->description,
                'founded'=>$value->founded,
                'industry'=>$value->industry,
                'number_of_employees'=>$value->number_of_employees
            ];
            fputcsv($file_writer, $row);
        }
        
        fclose($file_writer);
        return response()->file($file);
    }
    
    //Assignment export 750 books
    public function import_one(){
        $data ['title']='Import books'; 
        return view('dashboard.admin.import_books.import_one', $data);
    }
    public function import_books(Request $request){
        $validator=Validator::make($request->all(), ['file'=>'required|mimes:csv']);
        if($validator->fails()){
            return back()->with('error', $validator->errors()->first());
            
        }
        $file =$request->file('file');
        if($file!=null){
            $file->storeAs('files', 'books.csv');
            $file_reader=fopen(storage_path('app/files/books.csv'), 'r');
            //'r'=>read, 'w'=write, 'rw'=>read and write and same time, 'a'=>append to the end of the file

            $file_data =[];
            $counter=0;
           
            try {
                while(($row=fgetcsv($file_reader, 1000)) !=null){
                    $counter++;
                    if($counter==1)continue;
                    $file_data []=[
                        
                        'title'=>$row[1],
                        'author'=>$row[2],
                        'size'=>$row[3],
                        'shelf_id'=>$row[4]
                    ];
    
                }
                    fclose($file_reader);
                    \DB::beginTransaction();
                    Organization::insert($file_data);
                    \DB::commit();
                    return back()->with('success', 'Done');
            } catch (\Throwable $th) {
                \DB::rollBack();
                return back()->with('error', $th->getMessage());

            }

        }
        
    }
    public function export_books($size=750){
        $data= Book::take($size)->get();
        $file= storage_path('app/files/exported_books.csv');
        $file_writer =fopen($file, 'w');
        foreach ($data as $key => $value) {
            $row=[
                'open_column'=>random_int(1,$value->size),
                'title'=>$value->title,
                'author'=>$value->author,
                'size'=>$value->size,
                'shelf_id'=>$value->shelf_id,
                'close_column'=>\Hash::make($value->author)
            ];
            fputcsv($file_writer, $row);
        }
        
        fclose($file_writer);
        return response()->file($file);
    }
}
