<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Suppliers;
use App\Models\Product;
use App\Models\Imports;
use App\Models\ImportDetail;

class ImportController extends Controller
{
    public function getImport(){
        $supp=Suppliers::all();
        $user=Auth::user();
        $product=Product::all();
        return view('Admin/Import/Import',compact('supp','user'));
    }

    public function postImport(Request $req){
        
        $ImBill=Imports::create([
            "SupID"=>$req->supp,
            "UserID"=>Auth::id(),
            "Date"=>date('Y-m-d')
        ]);
        $user=Auth::user();
        $ImBill->save();
        
        
        $id=$ImBill->id;
        $product=Product::all();
        $billnew=DB::table('importbill')->join('users','importbill.UserID','=','users.id')
                                        ->join('suppliers','importbill.SupID','=','suppliers.SupplierID')
                                        ->where('importbill.id',$id)
                                        ->select('importbill.id','users.name','suppliers.CompanyName','importbill.Date')
                                        ->get();
        return view('Admin/Import/ImportProduct',compact('billnew','user','product'));
    }
    
    public function getImportPro($id){
        $id=Imports::max('id');
        $billnew=Imports::where('id',$id)->get();  
        return view('Admin/Import/ImportProduct',compact('billnew'));
    }

    public function postImportPro(Request $req){
        $ImBill=Imports::create([
            "SupID"=>$req->supp,
            "UserID"=>Auth::id(),
            "Date"=>date('Y-m-d')
        ]);
        $ImBill->save();
        $detalIM=ImportDetail::create([
            "ID_Import"=>$req->id,
            "ProductID"=>$req->prod,
            "Unit"=>$req->unit,
            "Quanity"=>$req->qty,
            "Price"=>$req->unit_price
        ]);
        $detalIM->save();
        $prod=Product::where('ProductID',$req->pro)->first();

        $prod=Product::update([
            "Quanity"=>($prod->Quanity+$req->qty)
        ]);
        $prod->save();
        return redirect('Import Prod post/{id}')->with('thongbao',"Thêm thành công");
    }
    public function getListImport(){
        $bill=DB::table('importbill')->join('users','importbill.UserID','=','users.id')
                                ->join('suppliers','importbill.SupID','=','suppliers.SupplierID')
                                ->select('importbill.id','users.name','suppliers.CompanyName','importbill.Date')
                                ->groupBy('importbill.id','users.name','suppliers.CompanyName','importbill.Date')                                
                                ->get();
        return view('/Admin/Import/List',compact('bill'));
    }

    public function getImportDetail($id){
        return view('Admin/Import/Detail');
    }
}