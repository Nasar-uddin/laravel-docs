<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PageController extends Controller
{
    public function index(){
    	$title = "Welcome to laravel";
        // return view("pages.index",compact('title'));
        // First way to pass data into view
        // return view("pages.index")->with('title',$title);
        return view("pages.index")->with('title',$title);
    }
    public function about(){
    	$title = "About us";
        return view("pages.about")->with('title',$title);
    }
    public function services(){
    	$data = [
    				"title"=>"Services of us",
    				"services"=>["UI DESIGN","WEB DEVELOPENT","SOFTWARE PROGRAMMING"]
    			];
        return view("pages.services")->with($data);
    }
}
