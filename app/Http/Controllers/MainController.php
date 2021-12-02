<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MainController extends Controller
{
    public function index(){
    	return view('dashboard');
    }
      public function index2(){
    	return view('pages.ui-features.buttons');
    }
     public function create(){
    	return view('teacher.create');
    }


}
