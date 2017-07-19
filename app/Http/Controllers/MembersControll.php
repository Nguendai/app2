<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator;
use App\Members;

class MembersControll extends Controller
{
    public function getList(){
    	return Members::orderBy('id','DESC')->get();
    }
    public function postAdd(Request $req){
        // return $req->name;
        $validate=Validator::make($req->all(),
            [
                 'name' => 'required|max:100',
                 'age'=> 'required|max:100',
                 'address'=> 'required|max:300',
                 'file' =>'required|mimes:png,gif,jpg,jpeg|max:10000',

             ],
             [
                 'name.required'=>"Please,Enter your name",
                 'name.max'=>'Name must be less than 100 char',
                 'age.required'=>'Please,Enter age',
                 'age.max'=>'age must be less than 100',
                 'address.required'=>"Please,Enter address",
                 'address.max'=>'Error'   ,
                 'file.required'=>'Please,Enter Image',
                 'file.mimes'=>"Do not images",
                 'file.max'=>'Max size is 10mb',

             ]);
        if($validate->fails()){
            return "errors";
        }else{

            if($req->file('file')){            
        	    $file=$req->file;
                $path = 'upload/images';
                $fileName = time()."-".$file->getClientOriginalName();
                $file->move($path , $fileName); 
                $file = $fileName;
            }
            	$members= new Members();
            	$members->name=$req->name;
            	$members->age=$req->age;
            	$members->address=$req->address;
            	$members->images=$file;
            	$members->save();
        	  return Members::orderBy('id','DESC')->get();
        }     

    }
    public function getEdit($id){
        $member= Members::find($id);
        return $member;
    }
    public function postEdit(Request $req, $id){
        $member=Members::find($id);
         $validate=Validator::make($req->all(),
            [
             'name' => 'required|max:100',
             'age'=> 'required|max:100',
             'address'=> 'required|max:300',
            ],
            [
             'name.required'=>"Please,Enter your name",
             'name.max'=>'Name must be less than 100 char',
             'age.required'=>'Please,Enter age',
             'age.max'=>'age must be less than 100',
             'address.required'=>"Please,Enter address",
             'address.max'=>'Error'   ,
            ]);
          if($validate->fails()){
            return "errors";
          }
        if($req->file('file')){
           $file=$req->file;
            $validate=Validator::make($req->all(),
            [
             'file' =>'required|mimes:png,gif,jpg,jpeg|max:10000',
            ],
            [   
             'file.required'=>'Please,Enter file',
             'file.mimes'=>"Do not images",
             'file.max'=>'Max size is 10mb',
            ]);
            if($validate->fails()){
            return "errors";
          }

           $path = 'upload/images';
           $fileName = time()."-".$file->getClientOriginalName();
           $file->move($path , $fileName); 
           $file = $fileName;
           $member->name=$req->name;
           $member->age=$req->age;
           $member->address=$req->address;
           $member->images=$file;
           $member->save();
       }else{
           $member->name=$req->name;
           $member->age=$req->age;
           $member->address=$req->address;
            $member->save();
       }
       return Members::orderBy('id','DESC')->get();
       // 
    }
    public function postDelete($id){
         // return $id;
        $member=Members::find($id);
        $member->delete();
       return Members::orderBy('id','DESC')->get();
    }
}
