<?php

namespace App\Http\Controllers\Frontend;

use App\Brand;
use App\Car;
use App\Faq;
use App\Team;
use App\Http\Controllers\Controller;
use App\Testomonial;
use Illuminate\Http\Request;

class HomePageController extends Controller
{
    public function index(){
        $cars = Car::all();
        return view('frontent.index',compact('cars'));
    }
    public function getCars(){
        $cars = Car::all();
        $brands = Brand::all();
        return view('frontent.car',compact('cars','brands'));
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
        $faqs = Faq::all();
        return view('frontent.faq',compact('faqs'));
        }
        public function getterms(){
        return view('frontent.terms');
        }
        public function gettestimonals(){
        $testomonals = Testomonial::all();
        return view('frontent.testimonals',compact('testomonals'));
        }
        public function getteam(){
        $teams = Team::all();
        return view('frontent.team',compact('teams'));
        }
}
