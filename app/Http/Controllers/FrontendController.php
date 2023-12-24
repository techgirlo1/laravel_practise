<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Portfolio;
class FrontendController extends Controller
{
   

    public function portfolio(){
        $port=Portfolio::all();
        return view('portfolio.portfolio',compact('port'));
    }

    public function portfoliodetails(){
        $port=Portfolio::all();
        return view('portfolio.portfolio_details',compact('port'));
    }
}
