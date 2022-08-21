<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\User;
use App\Models\Customer;
use App\Models\Profile;

class UserController extends Controller
{
    public function Admin(){        
        return view('/Admin/adminpage');
    }

   
    public function getUserList(){
        $user=User::whereIn('Type',array('ADMIN','SUPER'))->get();
        return view('/Admin/User/userList',compact('user'));
    }

    public function getThemUser(){        
        return view('/Admin/User/AddUser');
    }

    public function postThemUser(Request $request){        
        $this->validate(request(),[           
            'repass'=>'same:password'
            
        ],[
            "repass.same"=>"Mật khẩu nhập lại sai"
        ]);

        $user=User::create([
            "name"=>$request->fullname,
            "email"=>$request->mail,
            "password"=>Hash::make($request->repass),
            "Type"=>$request->type
        ]);        
        $user->save();

        $profile=Profile::create([
            "UserID"=>$user->id
        ]);
        $profile->save();

        return redirect('User/Thêm')->with('thongbao','Thêm thành công');
    }

    public function getSuaUser($id){
        $user=User::where('id',$id)->first();
        $type=Auth::user()->Type;
        if (Auth::id()==$id)
        {
            $this->authorize('fix');
        }else{
            $this->authorize('view');
        }

        return view('/Admin/User/FixUser',compact('user','type'));
    }

    public function postSuaUser(Request $request,$id){ 
             
        $user=User::where('id',$id)->first();
        $user->update([            
            "name"=>$request->fullname,  
        ]);
        if ($request->check=="on")
        {
            User::where('id',$id)->first()->update([
                "password"=>Hash::make($request->repass)
            ]);
        }
        $user->save();
        
        $user=User::all();
        return view('/Admin/User/userList',compact('user'));
    }

    public function getXoaUser($id){
        $record=User::where('id',$id)->first();
        $user=Auth::user();
        if($user->id==$record->id)
        {
            $this->authorize('view');
        }
        else{
            $this->authorize('delete');
        }
        User::where('id',$id)->delete();
        $user=User::all();
        return view('userList',compact('user'));
    }

    public function getLoginAdmin(){
        return view('/Admin/loginAdmin');
    }
    public function postLoginAdmin(Request $request){
        $this->validate($request,[
            "email"=>"required",
            "password"=>"required"
        ]);
        if(Auth::attempt(['email'=>$request->email,'password'=>$request->password]))
        {
            return redirect('Admin');
        }
        else{
            return redirect('login')->with('thongbao','Đăng nhập không thành công');
        }
    }

    public function getLogoutAdmin(){
        Auth::logout();
        return redirect('login');
    }
    public function ChangeType(){
        $user=User::whereIn('Type',array('ADMIN','SUPER'))->get();
        return view('/Admin/User/ChangeType',compact('user'));
    }
    public function postChangeType(Request $req,$id){
        $user=User::where('id',$id)->first();

        $user->update([
            "Type"=>$req->type
        ]);
        $user->save();

        return redirect('User/Change type')->with('thongbao','Thay đổi quyền thành công');
    }

    public function getProfile(){
        if(Auth::check())
        {
            $id=Auth::id();
            $user=DB::table('users')->join('profile','users.id','=','profile.UserID')
            ->where('users.id',$id)->get();
        }
        return view('Admin/User/ProfileAdmin',compact('user'));
    }

    public function postProfile(Request $req){
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

        return redirect('User/ProfileAD')->with('thongbao','Lưu thông tin thành công');
    }
}
