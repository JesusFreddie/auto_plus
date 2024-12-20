<?php

namespace App\Http\Controllers;

use App\Models\Car;
use App\Models\Request as RequestModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RequestController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $cars = Car::where('user_id', Auth::user()->id)->get();

        return view('requests.create', compact('cars'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'problem' => ['required', 'string', 'max:255'],
            'car_id' => ['required'],
        ]);

        RequestModel::create([
            'problem' => $request->problem,
            'car_id' => $request->car_id,
            'user_id' => Auth::user()->id
        ]);

        return redirect(route('dashboard'));
    }

    /**
     * Display the specified resource.
     */
    public function show(RequestModel $request)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(RequestModel $request)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $req, RequestModel $request)
    {
        $req->validate([
            'repait_date' => ['required'],
        ]);

        RequestModel::where('id', $req->id)->update([
            'repait_date' => $req->repait_date,
        ]);

        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(RequestModel $request)
    {
        //
    }
}
