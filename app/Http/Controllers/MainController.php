<?php

namespace App\Http\Controllers;

use App\Models\Car;
use App\Models\Request;
use Illuminate\Support\Facades\Auth;

class MainController extends Controller
{
    public function index()
    {
        $cars = Car::where('user_id', Auth::user()->id)->get();
        $requests = Request::where('user_id', Auth::user()->id)->get();
        return view('dashboard', compact('cars', 'requests'));
    }
}
