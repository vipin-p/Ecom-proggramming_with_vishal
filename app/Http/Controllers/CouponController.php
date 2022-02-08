<?php

namespace App\Http\Controllers;

use App\Models\Coupon;
use Illuminate\Http\Request;

class CouponController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $result['data'] = coupon::all();
        return view('admin_section.coupon',$result);
    } 
    // there are two datas processing through this function so we have distinguish them with and
    // if condition,then only the function can distinguish the process
    public function managecoupon(Request $request,$id='')
    
    {
        if($id>0){
           $arr = coupon::where(['id'=>$id])->get();

           $result['title'] = $arr['0']->title;
           $result['code'] = $arr['0']->code;
           $result['value'] = $arr['0']->value;
           $result['id'] = $arr['0']->id;
        }else{
            $result['title'] = '';
            $result['code'] = '';
            $result['value'] = '';
            $result['id'] = 0;
        }
        // echo '<pre>';
        // print_r($result)  ;
        // die();
        return view('admin_section.manage_coupon',$result);
    }
     public function manage_coupon_process(Request $request)
    {
        $request->validate([
            'title'=>'required',
            'code'=>'required|unique:coupons,code,'.$request->post('id')
        ]);
        if($request->post('id')>0){
            $model =coupon::find($request->post('id'));
            $msg = "category updated";


        }else{
            $model = new coupon();
            $msg = "category inserted";

        }
        $model->title = $request->title;
        $model->code = $request->code;
        $model->value = $request->value;
        $model->save(); 
        $request->session()->flash('messge',$msg);
        return redirect('admin/Coupon');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function delete(Request $request,$id)
    {
        $model = coupon::find($id);
        $model->delete();
        $request->session()->flash('messge','category deleted');
        return redirect('admin/Coupon');  
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function show(coupon $category)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function edit(coupon $category)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, coupon $category)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy(coupon $category)
    {
        //
    }
}
