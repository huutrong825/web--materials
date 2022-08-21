<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;

class CategoryController extends Controller
{
    
    public function listCategory()
    {
        $category=Category::paginate(6);
        return view('/Admin/Category/listCategory',compact('category'));
    }

    public function getAddCategory()
    {
        
        return view('/Admin/Category/AddCate');

    }

    public function postAddCategory(Request $request)
    {
        
        $filename="";
        if ($request->file('fileUpload')->isValid())
        {
            $this->validate(request(),['Categoryname'=>'required']);
            $filename=$request->fileUpload->getClientOriginalName();
            $request->fileUpload->move('imgcate/',$filename);

        }


        $category=Category::create(
            ['CategoryName'=>$request->Categoryname,
            'Image'=>$filename,
            'State'=>$request->state
        ]);

        
        return redirect('Add Category')->with('thongbao','Thêm sản phẩm thành công');
    }

    public function getCateFix($id){
        $c=Category::where('CategoryID',$id)->first();

        return view('/Admin/Category/CateFix',compact('c'));
    }

    public function postCateFix(Request $request,$id){ 
             
        $Category=Category::where('CategoryID',$id)->first();
        $filename=$Category->Image;
        $category=Category::update(
            ['CategoryName'=>$request->Categoryname,
            'Image'=>$filename,
            'State'=>$request->state
        ]);
      
        $Category->save();
        
        return redirect('Fix Cate/{CategoryID}')->with('thongbao','Chỉnh sửa thành công');
    }

    public function getDelCate($id){
        $record=Category::where('CategoryID',$id)->first();
        Category::where('CategoryID',$id)->delete();
        $Category=Category::all();
        return view('/Admin/Category/listCategory',compact('Category'));
    }
}