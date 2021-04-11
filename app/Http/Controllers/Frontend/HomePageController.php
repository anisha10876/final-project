<?php

namespace App\Http\Controllers\Frontend;

use App\Blog;
use App\Brand;
use App\Car;
use App\Faq;
use App\Team;
use App\Http\Controllers\Controller;
use App\Setting;
use App\Testomonial;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Brian2694\Toastr\Facades\Toastr;

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
            $settings = Setting::all()->pluck('value','key')->toArray();
            return view('frontent.about', compact('settings'));
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

    public function calculateResalePage(){
        $brands = Brand::all();
        return view('frontent.resalePage', compact('brands'));
    }

    public function calculateResalePost(Request $request){
        $price = $request->price;
        $year = $request->year;
        $currentDate = Carbon::now();
        $boughtDate = Carbon::createFromFormat('Y-m-d', $year.'-01-01');
        $diff_in_months = $currentDate->diffInMonths($boughtDate);
        $years = $diff_in_months/12;
        $resale_value = $price*(pow((1-0.07),$years));
        $lowResale = $resale_value - 0.1*$resale_value;
        $highResale = $resale_value + 0.1*$resale_value;
        $formSubmit = true;
        $brands = Brand::all();
        return view('frontent.resalePage', compact('lowResale','highResale', 'formSubmit','brands'));
    }
}
