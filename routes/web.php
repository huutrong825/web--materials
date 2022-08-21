<?php

use Illuminate\Support\Facades\Route;



/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});




//Route Admin
Route::get('login',['as'=>'LoginAD', 'uses'=>'UserController@getLoginAdmin']);
Route::post('login',['as'=>'LoginAD', 'uses'=>'UserController@postLoginAdmin']);
Route::get('logout',['as'=>'LogoutAD', 'uses'=>'UserController@getLogoutAdmin']);

Route::group(['middleware'=>'adminLogin'],function(){

    Route::get('Admin',['as'=>'adminp','uses'=>'UserController@Admin']);

    Route::group(['prefix'=>'User'],function(){
        Route::get('/danhsach',['as'=>'userlist','uses'=>'UserController@getUserList']);
        Route::get("ProfileAD",['as'=>'ProfileAD', 'uses'=>'UserController@getProfile']);
        Route::post("ProfileAD",['as'=>'ProfileAD', 'uses'=>'UserController@postProfile']);
        Route::group(['middleware'=>'can:fix'],function($id){
            Route::get('/suaUser/{id}',['as'=>'SuaUser','uses'=>'UserController@getSuaUser']);
            Route::post('/suaUser/{id}',['as'=>'SuaUser','uses'=>'UserController@postSuaUser']);
        });
        Route::group(['middleware'=>'can:view'],function(){
            Route::get('/Thêm',['as'=>'ThemUser','uses'=>'UserController@getThemUser']);
            Route::post('/Thêm',['as'=>'ThemUser','uses'=>'UserController@postThemUser']);
        
            Route::get('/danhsach/{id}',['as'=>'XoaUser','uses'=>'UserController@getXoaUser']);
            Route::get('Change type',['as'=>'Change','uses'=>'UserController@ChangeType']);
            Route::get('/Change type/{UserID}',['as'=>'Changetype','uses'=>'UserController@postChangeType']);
        });
        
    });
    Route::group(['prefix'=>'Supplier'],function(){
        Route::get('Nhà cung ứng',['as'=>'supplist','uses'=>'SuppController@List']);
        Route::group(['middleware'=>'can:view'],function(){
        Route::get('Thêm nhà cung ứng', ['as'=>'ThemSupp', 'uses'=>'SuppController@Them']);
        Route::post('Thêm nhà cung ứng', ['as'=>'ThemSupp', 'uses'=>'SuppController@postThem']);
    
        Route::get('suaSupp/{SupplierID}',['as'=>'SuppFix','uses'=>'SuppController@getSuppFix']);
        Route::post('suaSupp/{SupplierID}',['as'=>'SuppFix','uses'=>'SuppController@postSuppFix']);
    
        Route::get('Nhà cung ứng/{SupplierID}',['as'=>'DelSupp','uses'=>'SuppController@getDelSupp']);
        });
    });
    Route::group(['prefix'=>'Product'],function(){
        Route::get('All Product',['as'=>'allprod','uses'=>'ProductController@AllProduct']);
        Route::get('productlist',['as'=>'prodlist','uses'=>'ProductController@listProduct']);
        
        Route::get('addproduct', ['as'=>'prodadd', 'uses'=>'ProductController@addProduct']);
        Route::post('addproduct', ['as'=>'insert', 'uses'=>'ProductController@insertProduct']);
        Route::get('sua/{ProductID}',['as'=>'ProdFix','uses'=>'ProductController@getProdFix']);
        Route::post('sua/{ProductID}',['as'=>'ProdFix','uses'=>'ProductController@postProdFix']);
    
        Route::get('danhsach/{ProductID}',['as'=>'DelProd','uses'=>'ProductController@getDelProd']);
        
    });
    Route::group(['prefix'=>'Category'],function(){
        Route::get('categorylist',['as'=>'catelist','uses'=>'CategoryController@listCategory']);
        Route::group(['middleware'=>'can:view'],function(){
        Route::get('Add Category', ['as'=>'AddCate', 'uses'=>'CategoryController@getAddCategory']);
        Route::post('Add Category', ['as'=>'AddCate', 'uses'=>'CategoryController@postAddCategory']);
    
        Route::get('Fix Cate/{CategoryID}',['as'=>'FixCate','uses'=>'CategoryController@getCateFix']);
        Route::post('Fix Cate/{CategoryID}',['as'=>'Fixate','uses'=>'CategoryController@postCateFix']);
    
        Route::get('danhsach/{CategoryID}',['as'=>'DelCate','uses'=>'CategoryController@getDelCate']);
        });
    });
    Route::group(['prefix'=>'Statistical'],function(){
        Route::get('All',['as'=>'all','uses'=>'StatisticalController@All']);
        Route::get('List Order',['as'=>'BillOrder','uses'=>'StatisticalController@Bill']);
        Route::get('Detail Order/{OrderID}',['as'=>'DetailBill','uses'=>'StatisticalController@DetailBill']);
    
        Route::get('Doanh thu',['as'=>'turnoner','uses'=>'StatisticalController@getFill']);
        Route::post('Doanh thu',['as'=>'turnoner','uses'=>'StatisticalController@postFill']);
    
    });
    Route::group(['prefix'=>'Imports'],function(){
        Route::get('Import',['as'=>'inputImp','uses'=>'ImportController@getImport']);
        Route::post('Import Input',['as'=>'postinputImp','uses'=>'ImportController@postImport']);
    
        Route::get('Import Prod/{Imid}',['as'=>'ProdImp','uses'=>'ImportController@getImportPro']);
        Route::post('Import Prod post',['as'=>'ProdImp','uses'=>'ImportController@postImportPro']);
    
        Route::get('List Import Bill',['as'=>'listImp','uses'=>'ImportController@getListImport']);
    
    
    });
    
});







//Route pagemain
Route::get('Trang chủ',['as'=>'home','uses'=>'PageController@index']);
Route::get('Liên hệ',['as'=>'contact','uses'=>'PageController@getContact']);
Route::post('Liên hệ',['as'=>'contact','uses'=>'PageController@postContact']);

Route::get('Tin tức',['as'=>'news','uses'=>'PageController@getNews']);
Route::get('Dịch vụ',['as'=>'service','uses'=>'PageController@getService']);

Route::get('search',['as'=>'search', 'uses'=>'PageController@getSearch']);
Route::get('Loại/{CategoryID}',['as'=>'ListOfCate', 'uses'=>'PageController@getProdOfCate']);



Route::get('Đăng nhập',['as'=>'Login', 'uses'=>'PageController@getLogin']);
Route::post('Đăng nhập',['as'=>'Login', 'uses'=>'PageController@postLogin']);

Route::get("Logout",['as'=>'Logout', 'uses'=>'PageController@getLogout']);
Route::get('Đăng ký',['as'=>'Register', 'uses'=>'PageController@getRegister']);
Route::post('Đăng ký',['as'=>'Register', 'uses'=>'PageController@postRegister']);
Route::get("Profile",['as'=>'Profile', 'uses'=>'PageController@getProfileUser']);
Route::post("Profile",['as'=>'Profile', 'uses'=>'PageController@postProfileUser']);
Route::get('Giỏ hàng',['as'=>'DetailCart','uses'=>'PageController@getCart']);
Route::get('AddCart/{ProductID}',['as'=>'AddCart','uses'=>'PageController@AddCart']);
Route::get('Detail/{ProductID}',['as'=>'DetailProd','uses'=>'PageController@Detail']);
Route::get('Xóa item/{ProductID}',['as'=>'DelItemCart','uses'=>'PageController@DelItemCart']);
Route::post('Update item/{ProductID}',['as'=>'UpdateItemCart','uses'=>'PageController@UpdateItem']);

Route::get('Check Order',['as'=>'CheckOrder','uses'=>'PageController@getCheckOrder']);
Route::post('Order',['as'=>'Order','uses'=>'PageController@postOrder']);

