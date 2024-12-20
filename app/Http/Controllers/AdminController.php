<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Request as RequestModel;

class AdminController extends Controller
{
    public function index()
    {
        $requests = RequestModel::all();
        return view('admin.index', compact('requests'));
    }
}
