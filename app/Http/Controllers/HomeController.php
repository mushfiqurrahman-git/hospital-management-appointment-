<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;

use App\Models\User;
use App\Models\Doctor;
use App\Models\Appointment;

class HomeController extends Controller
{
    public function redirect()
    {
        if(Auth::id())
        {
            if(Auth::user()->usertype=='0')
            {
                $doctor = doctor::all();
                return view('user.home',compact('doctor'));
            }
            else
            {
                return view('admin.home');
            }
        }
        else
        {
            return redirect()->back();
        }
    }

    public function index()
    {
        if(Auth::id())
        {
            return redirect('home');
        }
        $doctor = doctor::all();

        return view('user.home',compact('doctor'));
    }

    public function appointment(Request $request)
    {
        $data = new appointment;

        $data->name=$request->name;

        $data->email =$request->email;
        
        $data->date=$request->date;

        $data->phone=$request->number;

        $data->message=$request->message;

        $data->doctor=$request->doctor;

        $data->status='In progress';

        if(Auth::id())
        {
            $data->user_id=Auth::user()->id;
        }



        // $tom = DB::table('appointments')->where('doctor',$data->doctor)
        // ->pluck('date')->exists();

        if (DB::table('appointments')->where('doctor',$data->doctor)
        ->where('date',$data->date)->exists()) 
        {
            return redirect()->back()->with('message','Appointment could not be made.
            Please select another date.');
        }
        else
        {
            $data->save();
            return redirect()->back()->with('message','Appointment succefully made.
            You will be contacted shortly');
        }

        

        // var_dump($data->date);

        // if($data->date == '2023-03-31')
        // if(DB::table('appointments')->where('doctor',$data->doctor)->value('date',$data->date)==$data->date)
        // {
        //     return redirect()->back()->with('message','Appointment could not be made.
        //     Please select another date.');
        // }
        // else
        // {
        //     $data->save();
        //     return redirect()->back()->with('message','Appointment succefully made.
        //     You will be contacted shortly');
        // }

        
        // $data->save();
        

        // return redirect()->back()->with('message','Appointment succefully made.
        // You will be contacted shortly');
    }
    
    public function myappointment()
    {
        if(Auth::id())
        {
            $userid=Auth::user()->id;

            $appoint = appointment::where('user_id',$userid)->get();

            return view('user.my_appointment',compact('appoint'));
        }
        else
        {
            return redirect()->back();
        }
    }

    public function cancel_appoint($id)
    {
        $data = appointment::find($id);

        $data->delete();

        return redirect()->back();

    }


}
