<?php

namespace App\Http\Controllers;

use App\Models\color;
use Illuminate\Http\Request;

class ColorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $result['data'] = color::all();
        return view('admin_section/color',$result);
    } 
    // there are two datas processing through this function so we have distinguish them with and
    // if condition,then only the function can distinguish the process
    public function managecolor (Request $request,$id='')
    
    {
        if($id>0){
           $arr = color::where(['id'=>$id])->get();

           $result['color'] = $arr['0']->color;
           $result['size'] = $arr['0']->size;
           $result['id'] = $arr['0']->id;
        }else{
            $result['color'] = '';
            $result['size'] = '';
            $result['id'] = 0;
        }
        // echo '<pre>';
        // print_r($result)  ;
        // die();
        return view('admin_section.Manage_color',$result);
    } public function manage_color_process(Request $request)
    {
        $request->validate([
            'color'=>'required|unique:colors,color,'.$request->post('id')
        ]);
        if($request->post('id')>0){
            $model =color::find($request->post('id'));
            $msg = "size updated";


        }else{
            $model = new color();
            $msg = "color inserted";

        }
        $model->color = $request->post('color');
        $model->status = 1;
        $model->save(); 
        $request->session()->flash('messge',$msg);
        return redirect('admin/color');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function delete(Request $request,$id)
    {
        $model = color::find($id);
        $model->delete();
        $request->session()->flash('messge','category deleted');
        return redirect('admin/color');  
    }
    public function status(Request $request,$status,$id)
    {

        $model = color::find($id);
        $model->status = $status;
        $model->save();
        $request->session()->flash('messge','size');
        return redirect('admin/color');  
    }

}
