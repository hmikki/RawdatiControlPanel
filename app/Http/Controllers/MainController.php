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
    public function selectKindergartenLocation(Request $request){
        $postData = [
            'name' => 'روضة دنيا الألوان',
            'lat' => $request['lat']?$request['lat']:"",
            'long' => $request['lng']?$request['lng']:"",
        ];
        $postRef = $this->database->getReference( "kindergarten".'/'."rawdati")->update($postData);

        $lang = $request['lang'] ;
         return redirect()->back();

    }


public function attendance(){
 return view('attendance')->with('isFirst' , true);
}

public function get_attendance(Request $request){
   $day = $request['day'];
   $month = $request['month'];
   $students = $this->database->getReference('students')->getValue();

        if($day){
          $date = '2022' .'/' . $month . '/' . $day ;
          //dd($date);
          $attendances_firebase = $this->database->getReference('attendances')->getValue();
          $attendances = array();
          foreach ($attendances_firebase as $key => $value) {
            //dd($value['date']);
             if ($value['date'] == $date) {
             $attendances[$key]  = $value;
            }

            /*if ($day == -1 || $month == -1) {
              $attendances = $this->database->getReference("attendances")->getValue();
              return view('attendance');
         
            }
           elseif ( strcmp($value['date'], $date)) {
              //dd($value['name']) ;
             $attendances[$key]  = $value;
            }*/
          }
            return view('attendance')->with('attendances',$attendances)->with('students' ,$students )->with('isFirst' , false);
      }
       $attendances = $this->database->getReference("attendances")->getValue();
       return view('attendance')->with('isFirst' , false);
            
      
  
}

}
