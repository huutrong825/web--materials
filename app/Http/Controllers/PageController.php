<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\DB;
use App\Models\Product;
use App\Models\Category;
use App\Models\User;
use App\Models\Customer;
use App\Models\Cart;
use App\Models\OrderBill;
use App\models\OrderDetail;
use App\Models\Profile;
use App\Mail\SendMail;
use Session;

class PageController extends Controller
{   //trang chủ
    public function index()
    {        
        $product=Product::all();
        return view('/Page/index',compact('product'));
    }
    //chi tiết sp
    public function Detail($id){        
        $product=Product::where('ProductID',$id)->first();
        return view('/Page/DetailProd',compact('product'));
    }
    //trang liên hệ
    public function getContact(){
        return view('/Page/Contact');
    }
    public function postContact(Request $req){
        $mail=$req->email;
        $name=$req->name;
        $sub=$req->subject;
        $mes=$req->message;
        $cart=['name'=>$name,'sub'=>$sub,'mes'=>$mes,'mail'=>$mail];
        Mail::to("examplemailvr@gmail.com")->send(new SendMail($cart,null));
        
    }
    //trang tin tức
    public function getNews(){
        return view('/Page/News');
    }
    //trang dịch vụ
    public function getService(){
        return view('/Page/Service');
    }
    //tìm kiếm sản phẩm
    public function getSearch(Request $request){       
        $product=Product::where('ProductName','like','%'.$request->search.'%')->get();       
        return view('Page/Search',compact('product'));
    }
    //tìm kiếm sp theo loại
    public function getProdOfCate($id){
        $product=Product::where("CategoryID",$id)->get();
        return view('Page/Search',compact('product'));
    }
    //trang login
    public function getLogin(){
        return view('/Page/login');
    }
    //thực hiện login
    public function postLogin(Request $request){
        $record=array('Email'=>$request->email,'Password'=>$request->password);
        if(Auth::attempt(['email'=>$request->email,
        'password'=>$request->password])){
            return redirect('Profile')->with('thongbao','Đăng nhập thành công');
        }
        else{
            return redirect('Đăng nhập')->with('thongbao','Đăng nhập không thành công');
        }
    }
    //đăng xuất
    public function getLogout(){
        Auth::logout();
        return redirect('Trang chủ');
    }
    //trang đkí tài khoản
    public function getRegister(){        
        return view('/Page/register');
    }
    //thực hiện đkí
    public function postRegister(Request $request){

        $this->validate(request(),[           
            'Re_password'=>'same:password'
            
        ],[
            "Re_password.same"=>"Mật khẩu nhập lại sai"
        ]);

        $user=User::create([
            "name"=>$request->username,
            "email"=>$request->email,
            "password"=>Hash::make($request->Re_password),
            "Type"=>$request->types
        ]);
        $user->save();

        $profile=Profile::create([
            "UserID"=>$user->id
        ]);
        $profile->save();

        return redirect('Đăng ký')->with('thongbao','Đăng ký thành công');
    }
    //trang hồ sơ người dùng
    public function getProfileUser(){
        if(Auth::check())
        {
            $id=Auth::id();
            $user=DB::table('users')->join('profile','users.id','=','profile.UserID')
            ->where('users.id',$id)->get();
        }
        return view('Page/ProfileUser',compact('user'));
    }

    public function postProfileUser(Request $req){
        $id=Auth::id();
        $user=User::where('id',$id)->first();
        $profile=Profile::where('UserID',$id)->first();
        $user->update([
            'name'=>$req->name
        ]);
        if ($req->password!=null ||$req->repass!=null )
        {
            $this->validate(request(),['repass'=>'required|same:password']);
            $user->update([
                'password'=>Hash::make($req->repass)
            ]);
        }
        $user->save();

        $filename="";
        if ($req->file('fileUpload')!=null)
        {
            if ($req->file('fileUpload')->isValid())
            {
                $this->validate(request(),['productname'=>'required']);
                $filename=$req->fileUpload->getClientOriginalName();
                $req->fileUpload->move('imgUser/',$filename);

            }
        }
        $profile->update([
            'Sex'=>$req->sex,
            "Phone"=>$req->phone,
            "Birth"=>$req->birth,
            "Address"=>$req->address,
            "Image"=>$filename
        ]);
        $profile->save();

        return redirect('Profile')->with('thongbao','Lưu thông tin thành công');
    }

    //giỏ hàng
    public function getCart()    {
        return view('/Page/DetailCart');
    }
    //thêm sp vào giỏ
    public function AddCart(Request $request,$id){        
        $product=Product::where('ProductID',$id)->first();
        if($product!=null)
        {
            $oldcart=Session('Cart')?Session('Cart'):null;
            $newcart=new Cart($oldcart);
            $newcart->AddCart($product,$id);

            $request->session()->put('Cart',$newcart);
        }
        
        return redirect('Giỏ hàng');
    }
    //xóa sp trong giỏ
    public function DelItemCart($id){
        $oldcart=Session::has('Cart')?Session::get('Cart'):null;
        $newcart=new Cart($oldcart);
        $newcart->DelItemCart($id);
        if(count($newcart->products)>0){
            Session::put('Cart',$newcart);
        }
        else{
            Session::forget('Cart',$newcart);
        }
        return redirect('Giỏ hàng');
    }

    public function UpdateItem(Request $req,$id){
        $oldcart=Session::has('Cart')?Session::get('Cart'):null;
        $newcart=new Cart($oldcart);
        $SL=$req->txtSoluong;
        $newcart->UpdateItemCart($id,$SL);
        Session::put('Cart',$newcart);
        return redirect('Giỏ hàng');
    }
    //xác nhận đặt hàng
    public function getCheckOrder(){
        $id=Auth::id();
        $user=DB::table('users')->join('profile','users.id','=','profile.UserID')
        ->where('users.id',$id)->get();
        $oldcart=Session::has('Cart')?Session::get('Cart'):null;
        $newcart=new Cart($oldcart);
        if (Auth::check()){
            return view('Page/CheckOrder',compact('newcart','user'));
        }
        else{
            return redirect('Đăng nhập')->with('thongbao','Đăng nhập để mua hàng');
        }
    }
    //thực hiện đặt hàng và nhận mail
    public function postOrder(Request $request){

        $cart=Session::get('Cart');
        
        $cus=Customer::create([
            "Name"=>$request->name,
            "Sex"=>$request->sex,
            "Email"=>$request->email,
            "Address"=>$request->address,
            "Phone"=>$request->phone,
            "Note"=>$request->note
        ]);

        $cuss=$cus->where('CusID',$cus->CusID)->get();
        $bill=OrderBill::create([
            "CusID"=>$cus->id,
            "Order_date"=>date('Y-m-d'),
            "TotalPrice"=>$cart->totalPrice,
            "Payment"=>$request->payment,
            "Note"=>$request->note
        ]);
        $bill->save();

        foreach($cart->products as $p)
        {
            $detail=OrderDetail::create([
                "OrderID"=>$bill->id,
                "ProductID"=>$p['prodInfo']->ProductID,
                "Quanity"=>$p['quanity'],
                "Unit"=>$p['prodInfo']->Unit,
                "Price"=>$p['prodInfo']->Price
    
            ]);
            $detail->save();
        }
        foreach($cart->products as $p)        
        {   
            $qty=Product::where('ProductID',$p['prodInfo']->ProductID)->select('Quanity')->get();
            foreach($qty as $q){
                $quanity=$q['Quanity'];
            }
            $product=Product::where('ProductID',$p['prodInfo']->ProductID)->first();
            $product->update([
                
                "Quanity"=> ($quanity - $p['quanity'])
            ]);
            $product->save();
        }
        Mail::to($request->email)->send(new SendMail($cart));
    
        Session::forget('Cart');        
        return redirect('Check Order')->with('thongbao',"Đặt hàng thành công");
       
    }

}