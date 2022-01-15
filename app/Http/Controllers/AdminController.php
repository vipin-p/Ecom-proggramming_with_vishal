<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin_section.login');
    }

   public function auth(Request $request){
       $email = $request->post('email');
       $password = $request->post('password');

       $Result = Admin::where(['email'=>$email,'password'=>$password])->get();
       if(isset($Result['0']->id)){
        $request->session()->put('ADMIN_LOGIN',true);
        $request->session()->put('ADMIN_ID',$Result['0']->id);
        return redirect('admin/dashboard');
       }else{
           session()->flash('message','Enter valid login details');
            return redirect('admin');
       }
   }
   public function dashboard(){
       return view('admin_section.dashboard');
   }
}
