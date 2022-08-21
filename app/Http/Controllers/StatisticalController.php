<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;
use App\Models\User;
use App\Models\Customer;
use App\Models\Cart;
use App\Models\OrderBill;
use App\models\OrderDetail;

class StatisticalController extends Controller
{
    public function All(){
        $user_num=User::count();
        $user_ad=User::whereIn('Type',array('ADMIN','SUPER'))->count();
        $cus=Customer::count();
        $bill=OrderDetail::groupBy('OrderID')->get('OrderID')->count();
        $totalPro=OrderDetail::groupBy('ProductID')->get('ProductID')->count();
        $totalQty=OrderDetail::sum('Quanity');
        $Qty=Product::sum('Quanity');

        $all=['num'=>$user_num,'ad'=>$user_ad,'cus'=>$cus,'bill'=>$bill,'Pro'=>$totalPro,
        'qty'=>$totalQty,'ProQty'=>$Qty];
        
        return view('Admin/Statistical/All',compact('all'));
    }
    public function Bill(){
        
        $bill=DB::table('orderbill')->join('customer','customer.CusID','=','orderbill.CusID')
                                ->join('order_detail','orderbill.OrderID','=','order_detail.OrderID')
                                ->select('orderbill.OrderID','Name','Email','Address','orderbill.Order_Date')
                                ->groupBy('orderbill.OrderID','Name','Email','Address','orderbill.Order_Date')                                
                                ->paginate(10);
        return view('/Admin/Statistical/ListbillOrder',compact('bill'));
    }

    public function DetailBill($id){


        $bill=DB::table('orderbill')->join('customer','customer.CusID','=','orderbill.CusID')
                                ->join('order_detail','orderbill.OrderID','=','order_detail.OrderID')
                                ->where('orderbill.OrderID',$id)->get();
                                
        $product= DB::table('orderbill')->join('order_detail','orderbill.OrderID','=','order_detail.OrderID')
                                ->join('product','product.ProductID','=','order_detail.ProductID')
                                ->where('orderbill.OrderID',$id)                                
                                ->select('ProductName','order_detail.Quanity','product.Unit','product.Price')
                                ->get();
        return view('Admin/Statistical/DetailOrder',compact('bill','product'));
    }
    public function getFill(){
        
        return view('Admin/Statistical/Fill');
    }

    public function postFill(Request $req){
              $text=0;                            
        switch($req->key){   
            
                         
            case "Day":
                $this->validate(request(),[           
                    'from_date'=>'required'                    
                ],[
                    "from_date.required"=>"Nhập ngày cần lọc"
                ]);
                if($req->to_date==null)
                {
                $total=DB::select(
                    'select orderbill.Order_date as time,sum(orderbill.TotalPrice) as dt,count(orderbill.OrderID) as dh,count(order_detail.ProductID) as sp,sum(order_detail.Quanity) as sl
                    from orderbill, order_detail
                    where orderbill.OrderID=order_detail.OrderID and DAY(orderbill.Order_date)=:date
                    group by orderbill.Order_date
                    ',['date'=>$req->from_date]
                );
                }else{
                    $total=DB::select(
                        'select orderbill.Order_date as time,sum(orderbill.TotalPrice) as dt,count(orderbill.OrderID) as dh,count(order_detail.ProductID) as sp,sum(order_detail.Quanity) as sl
                        from orderbill, order_detail
                        where orderbill.OrderID=order_detail.OrderID and ( DAY(orderbill.Order_date) between ? and ?)
                        group by orderbill.Order_date
                        ',[$req->from_date,$req->to_date]
                    );
                }
                return view('Admin/Statistical/Fill',compact('total','text'));
                break;
            case "Month":
                if($req->to_date==null)
                {
                    $total=DB::select(
                        'select orderbill.Order_date as time,sum(orderbill.TotalPrice) as dt,count(orderbill.OrderID) as dh,count(order_detail.ProductID) as sp,sum(order_detail.Quanity) as sl
                        from orderbill, order_detail
                        where orderbill.OrderID=order_detail.OrderID and MONTH(orderbill.Order_date)=?
                        group by orderbill.Order_date
                        ',[$req->from_date]
                    );
                }else{
                    $total=DB::select(
                        'select orderbill.Order_date as time, sum(orderbill.TotalPrice) as dt,count(orderbill.OrderID) as dh,count(order_detail.ProductID) as sp,sum(order_detail.Quanity) as sl
                        from orderbill, order_detail
                        where orderbill.OrderID=order_detail.OrderID and ( MONTH(orderbill.Order_date) between ? and ?)
                        group by orderbill.Order_date
                        ',[$req->from_date,$req->to_date]
                    );
                }
                return view('Admin/Statistical/Fill',compact('total','text'));
                break;
            case "Year":                
                if($req->to_date==null)
                {
                    $total=DB::select(
                        'select orderbill.Order_date as time, sum(orderbill.TotalPrice) as dt,count(orderbill.OrderID) as dh,count(order_detail.ProductID) as sp,sum(order_detail.Quanity) as sl
                        from orderbill, order_detail
                        where orderbill.OrderID=order_detail.OrderID and YEAR(orderbill.Order_date)=?
                        group by orderbill.Order_date
                        ',[$req->from_date]
                    );
                }else{
                    $total=DB::select(
                        'select YEAR(orderbill.Order_date),sum(orderbill.TotalPrice),count(orderbill.OrderID),count(order_detail.ProductID),sum(order_detail.Quanity)
                        from orderbill, order_detail
                        where orderbill.OrderID=order_detail.OrderID and ( YEAR(orderbill.Order_date) between ? and ?)
                        group by orderbill.Order_date
                        ',[$req->from_date,$req->to_date]
                    );
                }
                return view('Admin/Statistical/Fill',compact('total','text'));
                break;                
        }
        return view('Admin/Statistical/Fill',compact('total'));
    }
}