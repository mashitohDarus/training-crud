<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Schedule;
use File;
use Storage;

class ScheduleController extends Controller
{

    public function index(Request $request)
    {
      if($request->keyword){

        $user = auth()->user();
        $schedules = $user->schedules;
        $schedules = $user->schedules()
          ->where('title', 'LIKE', '%'.$request->keyword.'%')
          ->orwhere('description', 'LIKE', '%'.$request->keyword.'%')
          ->paginate(2);

      }else{

      // query all schedule from 'schedules' table to $schedules
    // select * from schedules - SQL query
    //$schedules = Schedule::all();

    $user = auth()->user();
    $schedules = $user->schedules;
    $schedules = $user->schedules()->paginate(2);
      }
    // return to view with $schedules
       return view('schedules.index', compact('schedules'));

    }

    public function create()
    {
      // this is schedule create form
        // show create form
        // resources/views/schedules/create.blade.php
      return view('schedules.create');

    }


  

    public function store(Request $request)
    {
      //store input to table schedules using model schedules
      $schedule = new Schedule();
      $schedule->title = $request->title;
      $schedule->description = $request->description;
      $schedule->userid = auth()->user()->id;
      $schedule->save();

      if($request->hasFile('attachment')){
        // rename file
        $filename = $schedule->id.'-'.date("Y-m-d").'.'.$request->attachment->getClientOriginalExtension();

        // store attachment on storage
        Storage::disk('public')->put($filename, File::get($request->attachment));

        //update row
        $schedule->attachment = $filename;
        $schedule->save();

      }

      //return to index
      return redirect()->route('schedule:index')
      ->with([
        'alert-type' => 'alert-primary',
        'alert' => 'Your schedule has been saved!'
    ]);
    }

    public function show(Schedule $schedule)
    {
      return view ('schedules.show', compact('schedule'));
    }
    
    public function edit(Schedule $schedule)
    {
      return view ('schedules.edit', compact('schedule'));
    }

    public function update(Schedule $schedule, Request $request)
    {
      $schedule->title=$request->title;
      $schedule->description=$request->description;
      $schedule->save();

      return redirect()->route('schedule:index');
    }

    public function destroy(Schedule $schedule)
    {
     if($schedule->attachment){
       Storage::disk('public')->delete('$schedule->attachment');
     }

      $schedule->delete();

      return redirect()->route('schedule:index')
      ->with([
        'alert-type' => 'alert-danger',
        'alert' => 'Your schedule has been delete!'
    ]);
    }

    public function forceDestroy(Schedule $schedule)
    {
        $schedule->forceDelete();

        return redirect()->route('schedule:index')->with([
            'alert-type' => 'alert-danger',
            'alert' => 'Your schedule has been force deleted!'
        ]);
      }
}
