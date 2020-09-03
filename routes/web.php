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
    return view('shop');
});

Route::get('/lss', function () {
    return view('lss');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/user', 'UserController@index')->name('user');
Route::get('/admin', 'AdminController@index')->name('admin');
Route::get('/category/{id}','CategoryController@showCates');
Route::get('productDetail/{id}','ProductController@detailpro');
Route::get('/cart','CartController@showcart');
Route::get('cart/additem/{id}','CartController@addItem');
Route::put('cart/update/{id}','CartController@update');
Route::get('cart/remove/{id}','CartController@destroy');
Route::get('checkout','CheckoutController@checkout');
Route::post('/admin/formvalidate','CheckoutController@address');
//Route::post('/admin/custamize','UserController@update');
Route::resource('users', 'AdminController');

//user routes
Route::get('/orders','UserController@orders');
Route::put('user/editaddress/{id}','UserController@updateaddress');
Route::get('/user/editaddress','UserController@changeaddress');
Route::get('/user/viewmyratings' ,'ProductReviewController@userreview');




//for button
Route::get('/admin/suppliers/managesuppliers',function(){
    return view('admin/suppliers/managesuppliers');
 });

Route::resource('suppliers', 'SupplierController');

Route::get('admin/suppliers/managesuppliers', 'SupplierController@list');

//Route::post('admin/suppliers/editsuppliers', 'SupplierController@edit');

//for button new suppliers
Route::get('admin/suppliers/admin/suppliers/suppliers/createsuppliers',function(){
    return view('admin/suppliers/createsuppliers');
 });




 
//category

Route::resource('categories', 'CategoryController');

//for button
Route::get('/admin/categories/managecategories',function(){
    return view('admin/categories/managecategories');
 });


//for button for new category
Route::get('admin/categories/admin/suppliers/suppliers/createsuppliers',function(){
    return view('admin/categories/createcategories');
 });
 

 Route::get('admin/categories/managecategories', 'CategoryController@list');

 
 






 //product

 Route::resource('products', 'ProductController');

// 
 Route::get('/admin/products/manageproduct',function(){
    return view('admin/products/manageproduct');
 });
 
//new product

Route::get('/admin/products/admin/product/admin/product/create',function(){
  return view('admin/products/create');
});


Route::get('admin/products/manageproduct', 'ProductController@list');

Route::get('admin/products/admin/product/admin/product/create', 'ProductController@datatoproduct');

Route::get('/','ProductController@producttoshop');
//to search product
Route::get('/searchproduct','ProductController@searchproduct');
Route::get('/searchhomepage','ProductController@searchhomepage');



    




//manage orders

//for button
Route::get('/admin/orders',function(){
    return view('admin/orders/manageorders');
 });



 Route::resource('manageorders', 'OrderController');

 Route::get('admin/orders', 'OrderController@orderlist');
 Route::get('admin/orders/edit/{id}','OrderController@editstatus');
Route::put('admin/orders/update/{id}','OrderController@updatestatus');


 //request

 //dashboard button
 Route::get('/user/viewrequest',function(){
     return view('user/request/viewrequest');
 });

 //admin dashboard button
 Route::get('/admin/requests',function(){
    return view('admin/Request/viewrequest');
});

 //new request button
Route::get('user/request/addrequest',function(){
    return view('user/request/addrequest');
});

Route::resource('requests', 'RequestController');

Route::get('user/viewrequest', 'RequestController@requestlist');
Route::get('admin/requests', 'RequestController@adminrequestlist');
Route::get('admin/requests/edit/{id}','RequestController@editstatus');
Route::put('admin/requests/update/{id}','RequestController@updatestatus');




//reports
Route::get('/admin/report',function(){
    return view('admin/Reports/dashboard');
});

//to sales report
Route::get('/admin/report/sales',function(){
    return view('admin/Reports/salesreport');
});
//load data to sales
//Route::get('admin/report/sales','SalesController@listproduct');
Route::post('admin/report/showsales','SalesController@monthlistproduct');




//generate pdf
Route::get('salespdf/{month}','SalesController@pdfshow');
Route::get('/inventrypdf','SalesController@pdfinventry');
Route::get('/invoice/{orderid}','OrderController@invoice');

//sold product button

Route::get('/admin/soldproduct',function(){
    return view('admin/Reports/soldproduct');
});

Route::get('admin/soldproduct', 'SalesController@listsoldproduct');



//review
Route::resource('productsreview', 'ProductReviewController');






 //charts
 Route::get('/admin', 'ChartController@soldproduct');


 //users
 Route::get('/admin/customers',function(){
    return view('/admin/customers');
 });

 Route::get('/admin/customers','AdminController@customerlist');

//shipping
Route::resource('shipping', 'ShippingController');

Route::get('/admin/shipping/{id}','ShippingController@edit');

Route::get('/admin/shippings',function(){
    return view('/admin/Shipping/manageShipping');
 });

 Route::get('/admin/shippings','ShippingController@list');
 Route::get('/searchshipping','ShippingController@searchshipping');
 Route::get('/searchshippingbyid','ShippingController@searchshippingbyid');



 Route::post('/admin/shippings/create','ShippingController@storecompany');

 Route::get('/admin/shippings/create',function(){
    return view('/admin/Shipping/createshipping');
 });

