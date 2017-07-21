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
      if($req->name=="undefined"){
        return "name";
      }else if($req->age=="undefined"){
        return "age";
      }else if($req->address=="undefined"){
        return "address";
      }
      if($req->file('file')){            
  	    $file=$req->file;
        $validate=Validator::make($req->all(),
        [
          'file' =>'mimes:png,gif,jpg,jpeg|max:10000',
         ]
        ,[
          'file.mimes'=>"Do not images",
           'file.max'=>'Max size is 10mb',
        ]);
        if($validate->fails()){
          return response()->json([
            'error' => $validate,
          ]);
        }
        $path = 'upload/images';
        $fileName = time()."-".$file->getClientOriginalName();
        $file->move($path , $fileName); 
        $file = $fileName;
        $members= new Members();
        $members->name=$req->name;
        $members->age=$req->age;
        $members->address=$req->address;
        $members->images=$file;
        }else{
            $members= new Members();
            $members->name=$req->name;
            $members->age=$req->age;
            $members->address=$req->address;
            $members->images="zalo20.jpg";
        }	
          $members->save();
    	  return Members::orderBy('id','DESC')->get();
      }
    // }
    public function getEdit($id){
        $member= Members::find($id);
        return $member;
    }
    public function postEdit(Request $req, $id){
      $member=Members::find($id);
      if($req->name=="undefined"){
        return "name";
      }else if($req->age=="undefined"){
        return "age";
      }else if($req->address=="undefined"){
        return "address";
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
      $member=Members::find($id);
      $member->delete();
      return Members::orderBy('id','DESC')->get();
    }
}
