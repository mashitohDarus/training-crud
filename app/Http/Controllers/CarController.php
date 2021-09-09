<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Car;
use File;
use Storage;

class CarController extends Controller
{

  public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
      // query all schedule from 'schedules' table to $schedules
    // select * from schedules - SQL query
    //$cars = Car::all();

    $user = auth()->user();
    $cars = $user->cars;
    $cars = $user->cars()->paginate(3);

    // return to view with $schedules
       return view('cars.index', compact('cars'));

    }

    public function create()
    {
      // this is schedule create form
        // show create form
        // resources/views/schedules/create.blade.php
      return view('cars.create');

    }

    public function store(Request $request)
    {
      //store input to table schedules using model schedules
      $car = new Car();
      $car->model = $request->model;
      $car->plate_number = $request->plate_number;
      $car->userid = auth()->user()->id;
      $car->save();

      if($request->hasFile('attachment')){
        // rename file
        $filename = $car->id.'-'.date("Y-m-d").'.'.$request->attachment->getClientOriginalExtension();

        // store attachment on storage
        Storage::disk('public')->put($filename, File::get($request->attachment));

        //update row
        $car->attachment = $filename;
        $car->save();

      }

      //return to index
      return redirect()->route('car:index')
      ->with([
        'alert-type' => 'alert-primary',
        'alert' => 'Your car information has been saved!'
    ]);
      
    }
    
    public function show(Car $car)
    {
      return view ('cars.show', compact('car'));
    }
    
    public function edit(Car $car)
    {
      return view ('cars.edit', compact('car'));
    }

    public function update(Car $car, Request $request)
    {
      $car->model=$request->model;
      $car->plate_number=$request->plate_number;
      $car->save();

      return redirect()->route('car:index');
    }

    public function destroy(Car $car)
    {
      if($car->attachment){
        Storage::disk('public')->delete('$car->attachment');
      }
     
      $car->delete();

      return redirect()->route('car:index')
      ->with([
        'alert-type' => 'alert-danger',
        'alert' => 'Your car information has been delete!'
    ]);
    }
}
