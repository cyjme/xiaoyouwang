<?php

namespace App\Http\Controllers;

use App\Chat;
use App\User;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class AdminController extends Controller
{
    public function login()
    {
        return view('adminlogin');
    }
    public function index()
    {
        $xcxy = User::where('school_name', '许昌学院')
            ->get();
        $zzdx=User::where('school_name','郑州大学')
            ->get();
        $hndx = User::where('school_name','河南大学')
            ->get();
        $zzqg = User::where('school_name','郑州轻工业学院')
            ->get();
        $number = ['xcxy'=>count($xcxy),'zzdx'=>count($zzdx),'hndx'=>count($hndx),'zzqg'=>count($zzdx)];
        return view('admin',compact('number'));
    }

    public function school($id)
    {
        if ($id == 'xcxy') {
            $schoolname = '许昌学院';
            $data = User::where('school_name', '许昌学院')
                ->get();

            return view('adminschool',compact('data','schoolname'));
        }
        if ($id =='zzdx') {
            $schoolname = '郑州大学';
            $data = User::where('school_name', '郑州大学')
                ->get();

            return view('adminschool',compact('data','schoolname'));
        }
        if ($id == 'hndx') {
            $schoolname = '河南大学';
            $data = User::where('school_name', '河南大学')
                ->get();

            return view('adminschool',compact('data','schoolname'));
        }
        if ($id == 'zzqg') {
            $schoolname = '郑州轻工业';
            $data = User::where('school_name', '郑州轻工业')
                ->get();

            return view('adminschool',compact('data','schoolname'));
        }
    }

    public function tongzhi()
    {
        return view('xitongtongzhi');
    }

    public function posttongzhi(Request $request)
    {
        $new = $request->new;
        $users = User::all();
        foreach ($users as $user){
            $id = $user->id;
            $chat = new Chat();
            $chat->user_id = $id;
            $chat->new = $new;
            $chat->send_user_id = 10000;
            $chat->have_read = '0';
            $chat->save();
        }

        return redirect('/admin');
    }
    public function getNumber()
    {
        $xcxy = User::where('school_name', '许昌学院')
            ->get();
        $zzdx=User::where('school_name','郑州大学')
            ->get();
        $hndx = User::where('school_name','河南大学')
            ->get();
        $zzqg = User::where('school_name','郑州轻工业学院')
            ->get();

        $school_number = ['xcxy'=>count($xcxy),'zzdx'=>count($zzdx),'hndx'=>count($hndx),'zzqg'=>count($zzdx)];
        
        return response()->json($school_number);
    }
}
