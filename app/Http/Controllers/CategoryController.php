<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $result['data'] = Category::all();
        return view('admin_section.Categories',$result);
    } 
    // there are two datas processing through this function so we have distinguish them with and
    // if condition,then only the function can distinguish the process
    public function managecategory(Request $request,$id='')
    
    {
        if($id>0){
           $arr = Category::where(['id'=>$id])->get();

           $result['categoty_name'] = $arr['0']->categoty_name;
           $result['category_slug'] = $arr['0']->category_slug;
           $result['id'] = $arr['0']->id;
        }else{
            $result['categoty_name'] = '';
            $result['category_slug'] = '';
            $result['id'] = 0;
        }
        // echo '<pre>';
        // print_r($result)  ;
        // die();
        return view('admin_section.Manage_category',$result);
    } public function manage_category_process(Request $request)
    {
        $request->validate([
            'category_name'=>'required',
            'category_slug'=>'required|unique:categories,category_slug,'.$request->post('id')
        ]);
        if($request->post('id')>0){
            $model =Category::find($request->post('id'));
            $msg = "category updated";


        }else{
            $model = new Category();
            $msg = "category inserted";

        }
        $model->categoty_name = $request->category_name;
        $model->category_slug = $request->category_slug;
        $model->status = 1;
        $model->save(); 
        $request->session()->flash('messge',$msg);
        return redirect('admin/category');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function delete(Request $request,$id)
    {
        $model = Category::find($id);
        $model->delete();
        $request->session()->flash('messge','category deleted');
        return redirect('admin/category');  
    }
    public function status(Request $request,$status,$id)
    {

        $model = Category::find($id);
        $model->status = $status;
        $model->save();
        $request->session()->flash('messge','category deleted');
        return redirect('admin/category');  
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
    public function show(Category $category)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function edit(Category $category)
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
    public function update(Request $request, Category $category)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy(Category $category)
    {
        //
    }
}
