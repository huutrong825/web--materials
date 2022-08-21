<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Models\Suppliers;

class SuppController extends Controller
{
    public function List(){
        $supp=Suppliers::all();
        return view('/Admin/Supplier/SuppList',compact('supp'));
    }

    public function Them()
    {
               
        return view('/Admin/Supplier/AddSupp');

    }

    public function postThem(Request $request)
    {
        
        
        $supp=Suppliers::create(
            ['SupplierID'=>$request->suppid,
            'CompanyName'=>$request->name,
            'Address'=>$request->address,
            'Phone'=>$request->phone
        ]);

        
        return redirect('Thêm nhà cung ứng')->with('thongbao','Thêm thành công');
    }

    public function getSuppFix($id){
        $supp=Suppliers::where('SupplierID',$id)->first();

        return view('/Admin/Supplier/FixSupp',compact('supp'));
    }

    public function postSuppFix(Request $request,$id){ 
             
        $supp=Suppliers::where('SupplierID',$id)->first();
        $supp->update(           
            ['SupplierID'=>$request->suppid,
            'CompanyName'=>$request->name,
            'Address'=>$request->address,
            'Phone'=>$request->phone
        ]);
      
        $supp->save();
        
        return redirect('suaSupp/{SupplierID}')->with('thongbao','Chỉnh sửa thành công');
    }

    public function getDelSupp($id){
        $record=Suppliers::where('SupplierID',$id)->first();
        Suppliers::where('SupplierID',$id)->delete();
        $supp=Suppliers::all();
        return view('/Admin/Supplier/SuppList',compact('supp'));
    }
}

