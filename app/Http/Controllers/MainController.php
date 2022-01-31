<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Kreait\Firebase\Database;


class MainController extends Controller
{
	
	public function __construct(Database $database)
    {
        $this->database = $database;
        $this->table_name = "teachers";
    }

    public function index(){
    	$teachers = $this->database->getReference($this->table_name)->getValue();
    	return view('dashboard')->with('teachers',$teachers);
    }
      public function selectTeacher (Request $request){
      	 $teachers = $this->database->getReference($this->table_name)->getValue();
      	 foreach ($teachers as $key => $value) {
			    	$updateData = [
			          'in_bus' => ($request['bus_teacher'] == $key)?true:false,
			    	];
			        $res_updated = $this->database->getReference( $this->table_name.'/'.$key)->update($updateData);
			        $isUpdated = false ;
			        if($res_updated){
			          $isUpdated = true ;
			        }
      	 }
      	 $lang = $request['lang'] ;
      	 return redirect($lang.'/' .'index?name=admin&password=123456');
      }
      public function index2(){
    	return view('pages.ui-features.buttons');
    }
     public function create(){
    	return view('teacher.create');
    }


}
