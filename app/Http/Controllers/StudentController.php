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
	public function index(){
		$students = $this->database->getReference($this->table_name)->getValue();
		
		return view('student.index')->with('students',$students);
	}
     public function create(){
        $sections = $this->database->getReference('sections')->getValue();
    	return view('student.create')->with('sections',$sections);
    }
 
    public function store(Request $request){
    	$pass = Str::random(10);

        $sections = $this->database->getReference('sections')->getValue();
        $renderer = new ImageRenderer(
          new RendererStyle(400),
          new ImagickImageBackEnd()
          );
          $writer = new Writer($renderer);
          $writer->writeFile('Hello World!', 'qrcode.png');
          $image = base64_encode($writer->writeString($request['identification_number']));
          //dd($image);


    	$postData = [
          'name' => $request['name'],
          'identification_number' => $request['identification_number'],
          'email' => $request['email'],
          'address' => $request['address'],
          'phone' => $request['phone'],
          'gender' => $request['gender'],
          'section' => $request['section'],
          'notification_id' => '',
          'password' => $pass ,
          'student_qr' => $image,
          'lat' => '',
          'long' => '',
    	];
        

        
              $postRef = $this->database->getReference($this->table_name)->push($postData);
             if($postData){
              $data = array('name'=>"{{$request['name']}}" , 'password' => "{{$pass}}");
                 
                Mail::send(['text'=>'mail'], $data, function($message) use($request) {
                  $email_address = $request['email'] ;
                   $message->to($email_address, 'Tutorials Point')->subject
                      ('Rawdati App');
                   $message->from('ameera.alanqar@gmail.com','Rawdati App');
                   
               });
             }
           
           //return redirect()->back()->withInput()->with('error','check your internet connection');
              


           
        


        return redirect('student')->with( ['data' => $postData] );
        // if($postRef){
        // 	//alert('Teacher Not Added ');
        //     // return view('teacher.create')->with('status' , 'Teacher Added Successfully');
        //     return redirect()->back() ->with('alert', 'Teacher Added Successfully');

        // }else{
        // 	return redirect()->back() ->with('alert', 'Teacher Not Added');
        // 	// return view('teacher.create')->with('status' , 'Teacher Not Added ');
        // }
        
    }

    public function edit($id){
        $student = $this->database->getReference($this->table_name)->getChild($id)->getValue();
        $sections = $this->database->getReference('sections')->getValue();
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
    	];
        $res_updated = $this->database->getReference( $this->table_name.'/'.$key)->update($updateData);
        
    	return redirect('student');  

        // if($res_updated){
        //   return redirect('teacher.edit')->with('status' , 'Contact Updated Successfully');	
        // }else{
        //   return redirect('teacher.edit')->with('status' , 'Contact Not Updated ');	
        // }
    }
    public function destroy($id){
    	
        $deleted_data =$this->database->getReference($this->table_name.'/'.$id)->remove();
          return redirect('student');	
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
}
