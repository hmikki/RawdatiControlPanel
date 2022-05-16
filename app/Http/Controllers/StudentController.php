<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Kreait\Firebase\Database;
use BaconQrCode\Renderer\ImageRenderer;
use BaconQrCode\Renderer\Image\ImagickImageBackEnd;
use BaconQrCode\Renderer\RendererStyle\RendererStyle;
use BaconQrCode\Writer;
use Illuminate\Support\Str;
use Mail;


class StudentController extends Controller
{
    

    public function __construct(Database $database)
    {

        $this->database = $database;
        $this->table_name = "students";
    }
	public function index(Request $request){
    $lang=$request['lang'];
    $word = $request['search'] ;
    if($word){
      $students_firebase = $this->database->getReference($this->table_name)->getValue();
      $students = array();
      foreach ($students_firebase as $key => $value) {
        if (strpos(strtolower($value['name']) , strtolower($word)) !== false) {
          //dd($value['name']) ;
         $students[$key]  = $value;
        }
      }
      // dd($students);
          return view('student.index')->with('students',$students);
    }
		$students = $this->database->getReference($this->table_name)->getValue();
		return view('student.index')->with('students',$students);
	}
  public function search(Request $request){

      $word = $request['search'] ;
      $students_firebase = $this->database->getReference('students')->getValue();
      $students = array();
      foreach ($students_firebase as $key => $value) {
        if (strpos(strtolower($value['name']) , strtolower($word)) !== false) {
          //dd($value['name']) ;
         $students[]  = $value;
        }
      }

      //dd($students);
    return view('student.index')->with('students',$students);
  }
     public function create(){
        $sections = $this->database->getReference('sections')->getValue();
    	return view('student.create')->with('sections',$sections);
    }
 
    public function store(Request $request){
    	$pass = Str::random(10);
      $ref = $this->database->getReference($this->table_name)->push()->getKey();
        //dd($ref);
        $sections = $this->database->getReference('sections')->getValue();
        $renderer = new ImageRenderer(
          new RendererStyle(400),
          new ImagickImageBackEnd()
          );
          $writer = new Writer($renderer);
          $writer->writeFile('Hello World!', 'qrcode.png');
          $image = base64_encode($writer->writeString($ref));
          //dd($image);


    	$postData = [
          'name' => $request['name']?$request['name'] : "",
          'identification_number' => $request['identification_number']?$request['identification_number']:"",
          'email' => $request['email'] ? $request['email']:"",
          'address' => $request['address'] ? $request['address'] : "",
          'phone' => $request['phone']? $request['phone']:"",
          'gender' => $request['gender']?$request['gender']:"",
          'section' => $request['section']?$request['section'] :"",
          'notification_id' => '',
          'password' => $pass ,
          'student_qr' => $image,
          'image' => "",
          'lat' => $request['lat']?$request['lat']:"",
          'long' => $request['lng']?$request['lng']:"",
    	];
      $authData = [
          'user_id' =>$ref,
          'identification_number' => $request['identification_number']?$request['identification_number']:"",
          'password' => $pass ,
          'user_type' => "student",
      ];
        
            $isAdded = false ;
        
              
              // $postRef = $ref->setValue($postData);
              // dd($postRef);
            $postRef = $this->database->getReference( $this->table_name.'/'.$ref)->update($postData);
            $authRef = $this->database->getReference( "users".'/'.$ref)->update($authData);

             if($postRef && $authRef){
              $data = array('name'=>$request['name'] , 'password' => $pass);
                 
                Mail::send(['text'=>'mail'], $data, function($message) use($request) {
                  $email_address = $request['email'] ;
                   $message->to($email_address, 'Tutorials Point')->subject
                      ('Rawdati App');
                   $message->from('ameera.alanqar@gmail.com','Rawdati App');
                   
               });
                $isAdded = true;
             }
             //dd($isAdded);

           //return redirect()->back()->withInput()->with('error','check your internet connection');
              
           $id =$postRef->getKey();
           $student = $this->database->getReference($this->table_name)->getChild($id)->getValue();
           $sections = $this->database->getReference('sections')->getValue();

           
           try {  
               $email = $request['email'];  
               $password = $pass;  
               $authRef = app('firebase.auth')->createUser([  
                  'email' => $email,  
                 'password' => $password  ,
                 'uid' => $ref
               ]);  
              
           }   
           catch (\Kreait\Firebase\Exception\Auth\EmailExists $ex) {  
             //echo 'email already exists';  
           }  

        


        // return view('student.details')->with( ['student'=>$student , 'sections'=>$sections , 'id'=>$id] )->with('isAdded' , $isAdded );
        // if($postRef){
        // 	//alert('Teacher Not Added ');
        //     // return view('teacher.create')->with('status' , 'Teacher Added Successfully');
        //     return redirect()->back() ->with('alert', 'Teacher Added Successfully');

        // }else{
        // 	return redirect()->back() ->with('alert', 'Teacher Not Added');
        // 	// return view('teacher.create')->with('status' , 'Teacher Not Added ');
        // }
           $lang = $request['lang'];

           //dd("done");
            
           return redirect("student/details/$ref?lang=" .$lang);
        
    }

    public function edit($id){
        $student = $this->database->getReference($this->table_name)->getChild($id)->getValue();
        $sections = $this->database->getReference('sections')->getValue();
        // $clientIP = '103.239.147.187'; 
        // $ip = \Request::getClientIp(true);
  
        // $data = \Location::get(request()->ip());
        // dd($data);
    	$gender = ["Male" , "Female"];
    	return view('student.edit')->with('student' , $student)->with('sections' , $sections)->with('gender' , $gender)->with('id',$id);  
    }
    public function update(Request $request ,$id){
    	$key = $id ;
    	$updateData = [
         'name' => $request['name'],
          'identification_number' => $request['identification_number'],
          'email' => $request['email'],
          'address' => $request['address'],
          'phone' => $request['phone'],
          'gender' => $request['gender'],
          'section' => $request['section'],  
          'lat' => $request['lat'] ,
          'long' => $request['lng'],

    	];
        $res_updated = $this->database->getReference( $this->table_name.'/'.$key)->update($updateData);
        $isUpdated = false ;
        if($res_updated){
          $isUpdated = true ;
        }
        $lang = $request['lang'] ;

      return redirect($lang.'/student')->with('update' , $isUpdated);

        // if($res_updated){
        //   return redirect('teacher.edit')->with('status' , 'Contact Updated Successfully');	
        // }else{
        //   return redirect('teacher.edit')->with('status' , 'Contact Not Updated ');	
        // }
    }
    public function destroy($id){
    	
        $deleted_data =$this->database->getReference($this->table_name.'/'.$id)->remove();
        $isDeleted = false ;
        if($deleted_data){
          $isDeleted = true ;
        }
        $lang = request()->get('lang');

          return redirect($lang.'/'.'student'.'?lang=' . $lang)->with('deleted' , $isDeleted);	
    }
    public function details($id)
    {
      $student = $this->database->getReference($this->table_name)->getChild($id)->getValue();
      $sections = $this->database->getReference('sections')->getValue();
       
      return view('student.details')->with('student' ,$student)->with('sections' , $sections)->with('id',$id);
    }

     public function basic_email() {
      $data = array('name'=>"Virat Gandhi");
   
      Mail::send(['text'=>'mail'], $data, function($message) {
         $message->to('ameera.alanqar@gmail.com', 'Tutorials Point')->subject
            ('Laravel Basic Testing Mail');
         $message->from('ameera.alanqar@gmail.com','Virat Gandhi');
         
      });
      echo "Basic Email Sent. Check your inbox.";
   }

   public function location(){
     return view('map2');
    
   }
   public function submit_location(Request $request){
    $lat = $request['lat'];
    $lng = $request['lng'];
    $lang2 = $request['lang'];

    $lang = request()->get('lang');
    return redirect( $lang .'/student/create')->with('lat',$lat)->with('lng',$lng);
   }

   public function edit_location(Request $request){
    $lat = $request['lat'];
    $lng = $request['lng'];
    $id = $request['id'];
    $lang2 = $request['lang'];
    $lang = request()->get('lang');

    return redirect('student/edit/'.$id.'?lang=' .$lang)->with('lat',$lat)->with('lng',$lng);
   }
}


