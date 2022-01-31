<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Kreait\Firebase\Database;
use Illuminate\Support\Str;
use BaconQrCode\Renderer\ImageRenderer;
use BaconQrCode\Renderer\Image\ImagickImageBackEnd;
use BaconQrCode\Renderer\RendererStyle\RendererStyle;
use BaconQrCode\Writer;
use Mail;




class TeacherController extends Controller
{
     public function __construct(Database $database)
    {
        $this->database = $database;
        $this->table_name = "teachers";
    }
	public function index(){
		$teachers = $this->database->getReference($this->table_name)->getValue();
		return view('teacher.index')->with('teachers',$teachers);
	}
     public function create(){
    	return view('teacher.create');
    }
 
    public function store(Request $request){
    	$pass = Str::random(10);

      $ref = $this->database->getReference($this->table_name)->push()->getKey();
        //dd($ref);
        $renderer = new ImageRenderer(
          new RendererStyle(400),
          new ImagickImageBackEnd()
          );
          $writer = new Writer($renderer);
          $writer->writeFile('Hello World!', 'qrcode.png');
          $image = base64_encode($writer->writeString($ref));

    	$postData = [
          'name' => $request['name']?$request['name']:"",
          'identification_number' => $request['identification_number']?$request['identification_number']:"",
          'email' => $request['email']?$request['email']:"",
          'phone' => $request['phone']?$request['phone']:"",
          'gender' => $request['gender']?$request['gender']:"",
          'notification_id' => '',
          'teacher_qr' => $image,
          'password' => $pass ,
          'in_bus' => false ,
    	];
        $postRef = $this->database->getReference( $this->table_name.'/'.$ref)->update($postData);

         if($postData){
              $data = array('name'=>"{{$request['name']}}" , 'password' => "{{$pass}}");
                 
                Mail::send(['text'=>'mail'], $data, function($message) use($request) {
                  $email_address = $request['email'] ;
                   $message->to($email_address, 'Tutorials Point')->subject
                      ('Rawdati App');
                   $message->from('ameera.alanqar@gmail.com','Rawdati App');
                   
               });
             }
             // return redirect('teacher');
             $lang = $request['lang'] ;
         return redirect($lang.'/teacher')->with( ['data' => $postData] );
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
    	$teacher = $this->database->getReference($this->table_name)->getChild($id)->getValue();
    	$gender = ["Male" , "Female"];
      $lang = request()->get('lang');

    	return view('teacher.edit')->with('teacher' , $teacher)->with('gender' , $gender)->with('id',$id);  
    }
    public function update(Request $request ,$id){
    	$key = $id ;
    	$updateData = [
          'name' => $request['name'],
          'identification_number' => $request['identification_number'],
          'email' => $request['email'],
          'phone' => $request['phone'],
          'gender' => $request['gender'],
    	];
        $res_updated = $this->database->getReference( $this->table_name.'/'.$key)->update($updateData);
        $isUpdated = false ;
        if($res_updated){
          $isUpdated = true ;
        }
              $lang = request()->get('lang');

        
    	return redirect($lang. '/teacher')->with('update' , $isUpdated);  

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

          return redirect($lang.'/teacher' )->with('deleted' , $isDeleted);	
    }

    
    
    public function details($id)
    {
      $teacher = $this->database->getReference($this->table_name)->getChild($id)->getValue();
      return view('teacher.details')->with('teacher' ,$teacher)->with('id',$id);
    }



}
