<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class HomePageController extends Controller
{
    public function index(){

        return view('frontent.index');
    }
    public function getCars(){

        return view('frontent.car');
    }
    public function getContact()
    {
        return view('frontent.Contact');
    }

        public function getabout(){
        return view('frontent.about');
        }
        public function getblog(){
        return view('frontent.blog');
        }
        public function getblogdetail(){
        return view('frontent.blogdetail');
        }
        public function getfaq(){
        return view('frontent.faq');
        }
        public function getterms(){
        return view('frontent.terms');
        }
        public function gettestimonals(){
        return view('frontent.testimonals');
        }
        public function getteam(){
        return view('frontent.team');
        }
}
