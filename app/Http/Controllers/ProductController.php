<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;
use App\Models\Users;
use App\Models\Customer;

class ProductController extends Controller
{
    

    public function AllProduct(){
        $product=Product::paginate(12);
        return view('/Admin/Product/AllProd',compact('product'));
    }

    public function listProduct(){
        $product=Product::paginate(10);
        return view('/Admin/Product/productlist',compact('product'));
    }

    public function addProduct(){
        
        return view('/Admin/Product/addproduct');

    }

    public function insertProduct(Request $request){
        
        $filename="";
        if ($request->file('fileUpload')->isValid())
        {
            $this->validate(request(),['productname'=>'required']);
            $filename=$request->fileUpload->getClientOriginalName();
            $request->fileUpload->move('imgpro/',$filename);

        }


        $product=Product::create(
            ['ProductName'=>$request->productname,
            'Title'=>$request->title,
            'Price'=>$request->price,
            'Unit'=>$request->unit,
            'Quanity'=>$request->quanity,
            'Image'=>$filename,
            'CategoryID'=>$request->categories
        ]);

        
        return redirect('Product/addproduct')->with('thongbao','Thêm sản phẩm thành công');
    }

    public function getProdFix($id){
        $product=Product::where('ProductID',$id)->first();

        return view('/Admin/Product/ProdFix',compact('product'));
    }

    public function postProdFix(Request $request,$id){ 
             
        $product=Product::where('ProductID',$id)->first();
        $filename=$product->Image;
        $product->update(           
            [
            'ProductName'=>$request->productname,
            'Title'=>$request->title,
            'Price'=>$request->price,
            'Unit'=>$request->unit,
            'Quanity'=>$request->quanity,
            'Image'=>$filename,
            'CategoryID'=>$request->categories
        ]);
      
        $product->save();
        
        return redirect('Product/sua/{ProductID}')->with('thongbao','Chỉnh sửa thành công');
    }

    public function getDelProd($id){
        $record=Product::where('ProductID',$id)->first();
        Product::where('ProductID',$id)->delete();
        $product=Product::all();
        return view('/Admin/Product/productlist',compact('product'));
    }
}
