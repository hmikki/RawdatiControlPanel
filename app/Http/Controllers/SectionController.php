<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Kreait\Firebase\Database;
use App ;


class SectionController extends Controller
{
	 public function __construct(Database $database)
    {
        $this->database = $database;
        $this->table_name = "sections";
    }
    public function index(Request $request){
       $filter = $request['filter'];
       $teachers = $this->database->getReference('teachers')->getValue();

        if($filter){
          $sections_firebase = $this->database->getReference($this->table_name)->getValue();
          $sections = array();
          foreach ($sections_firebase as $key => $value) {
            if ($filter == -1) {
              $sections = $this->database->getReference($this->table_name)->getValue();
              return view('section.index')->with('sections',$sections)->with('teachers' , $teachers)->with('filter_word' , $filter );
         
            }
           elseif (strpos($value['category'] , $filter) !== false) {
              //dd($value['name']) ;
             $sections[$key]  = $value;
            }
          }
            return view('section.index')->with('sections',$sections)->with('teachers' , $teachers)->with('filter_word' , $filter );
      }
       $sections = $this->database->getReference($this->table_name)->getValue();
       return view('section.index')->with('sections',$sections)->with('teachers' , $teachers)->with('filter_word' , -1 );
            
    	
	}
     public function create(){
     	$teachers = $this->database->getReference('teachers')->getValue();
    	return view('section.create')->with('teachers',$teachers);
    }
        public function store(Request $request){
    	$postData = [
          'name' => $request['name'],
          'category' => $request['category'],
          'teacher_id' => $request['teacher_id'],
    	];
        $postRef = $this->database->getReference($this->table_name)->push($postData);

        return redirect('section')->with( ['data' => $postData] );
        
    }
    public function edit($id){
    	$section = $this->database->getReference($this->table_name)->getChild($id)->getValue();
		$teachers = $this->database->getReference('teachers')->getValue();
    	$categories = ["تمهيدي" , "بستان"];

    	return view('section.edit')->with('teachers' , $teachers)->with('section' , $section)->with('categories',$categories)->with('id',$id);  
    }
    public function update(Request $request ,$id){
    	$key = $id ;
    	$updateData = [
          'name' => $request['name'],
          'category' => $request['category'],
          'teacher_id' => $request['teacher_id'],
    	];
        $res_updated = $this->database->getReference( $this->table_name.'/'.$key)->update($updateData);
        $isUpdated = false ;
        if($res_updated){
          $isUpdated = true ;
        }
    	return redirect('section')->with('update' , $isUpdated);  

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
          return redirect('section')->with('deleted' , $isDeleted);	
    }


    public function details($id)
    {
      $section = $this->database->getReference($this->table_name)->getChild($id)->getValue();
      $teachers = $this->database->getReference('teachers')->getValue();
      $students = $this->database->getReference('students')->getValue();
      return view('section.details')->with('section' ,$section)->with('teachers' ,$teachers)->with('students' ,$students)->with('id',$id);
    }
    public function generate($id){
      $renderer = new ImageRenderer(
          new RendererStyle(400),
          new ImagickImageBackEnd()
      );
      $writer = new Writer($renderer);
      $writer->writeFile('Hello World!', 'qrcode.png');
      $image = base64_encode($writer->writeString($id));
      $pass = Str::random(10);

 



      return view('firebase.contact.qr')->with("key" ,$id)->with("qr_image" ,$image )->with('pass' , $pass);
    }
    public function qr($id){
      

    }
    public function index2()
    {
      return view('firebase.contact.qr');
    }
    public function map(){

      return view('student.map_view');
    }

    public function test(){
      $req_uri = $_SERVER['REQUEST_URI'];
      $path = substr($req_uri,0,strrpos($req_uri,'/'));
      dd($req_uri);
    }
    




}
