<?php

namespace App\Http\Controllers\Frontend;

use App\Blog;
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
        $blogs = Blog::all();
        $testimonials = Testomonial::all();
        return view('frontent.index',compact('blogs','cars','testimonials'));
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
            $blogs  = Blog::orderBy('created_at','desc')->get();
            return view('frontent.blog', compact('blogs'));
        }

        public function getblogdetail($id){
            $blog = Blog::find($id);
            return view('frontent.blogdetail', compact('blog'));
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
