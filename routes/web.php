<?php
use App\Http\Controllers\AdminUserController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\ShowProduct;
use App\Http\Controllers\ShowOrder;
use App\Http\Controllers\ContactController;
use Illuminate\Support\Facades\Route;



Route::get('/', [ShowProduct::class,'show_product']);
Route::get('/single_product/{id}/{name}/{category_id}', [ShowProduct::class,'show_single_product']);
Route::get('/brands/{id}', [ShowProduct::class,'specific_brand']);
Route::get('/customer_reg', [CustomerController::class,'customer_reg']);
Route::post('/submit_reg', [CustomerController::class,'customer_store']);
Route::get('/customer_login', [CustomerController::class,'customer_login']);
Route::post('/submit_login', [CustomerController::class,'customer_auth']);
Route::post('/search', [ProductController::class,'search']);
Route::get('/about_us',function(){
    return view('about_us');
});
Route::group(['middleware'=>'customer_auth'],function(){
Route::get('/men_product', [ShowProduct::class,'show_men_product']);
Route::get('/contacts', [ContactController::class,'show_contacts']);
Route::get('/orders', [ShowOrder::class,'show_order_to_user']);


Route::post('/cart/{id}', [CartController::class,'add_to_cart'])->name('/cart/id');
Route::get('/cart', [CartController::class,'cart']);
Route::get('/delete_item_from_cart/{id}', [CartController::class,'delete_item_from_cart']);
Route::get('/checkout', [CartController::class,'proceed_to_checkout']);
Route::post('/order', [OrderController::class,'order']);
Route::get('customer_logout', function () {
    session()->forget('CUSTOMER_LOGIN');
    session()->forget('CUSTOMER_USERNAME');
    session()->forget('CUSTOMER_ID');
    session()->forget('CUSTOMER_EMAIL');
    session()->forget('k');
    session()->flash('error','Logout sucessfully');
    return redirect('/');
});
});






Route::get('/admin/admin_user/login',[AdminUserController::class,'admin_user_login']);
Route::get('/admin/admin_user/update',[AdminUserController::class,'update_admin']);
Route::post('/admin/admin_user/auth',[AdminUserController::class,'admin_user_auth'])->name('/admin/admin_user/auth');

Route::group(['middleware'=>'admin_user_auth'],function(){
Route::get('/admin/dashboard',[AdminUserController::class,'dashboard']);
Route::get('/admin/orders',[ShowOrder::class,'show_order']);
//Route::get('/admin/order/incomplete/{id}',[ShowOrder::class,'incomplete_order']);
Route::get('/admin/order/complete/{id}',[OrderController::class,'complete_order']);
Route::get('/admin/customers',[ShowOrder::class,'show_customers']);
Route::get('/admin/deactivate/{id}',[ShowOrder::class,'deactivate_customer']);
Route::get('/admin/activate/{id}',[ShowOrder::class,'activate_customer']);
Route::get('/admin/delete/{id}',[ShowOrder::class,'delete_customer']);


Route::get('admin/category/categories',[CategoryController::class,'index']);
Route::get('admin/category/add_category',[CategoryController::class,'add_category']);
Route::get('admin/category/edit_category/{id}',[CategoryController::class,'edit_category']);
Route::post('/admin/category/submit_category',[CategoryController::class,'store_category'])->name('/admin/category/submit_category');
Route::post('/admin/category/update_category/{id}',[CategoryController::class,'update_category'])->name('/update_category/{id}');
Route::get('admin/category/delete/{id}',[CategoryController::class,'delete']);
Route::get('admin/category/deactivate_category/{id}',[CategoryController::class,'deactivate_category']);
Route::get('admin/category/activate_category/{id}',[CategoryController::class,'activate_category']);


Route::get('admin/product/products',[ProductController::class,'index']);
Route::get('admin/product/add_product',[ProductController::class,'add_product']);
Route::post('admin/product/submit_product',[ProductController::class,'store_product'])->name('product.submit_product');
Route::get('admin/product/edit_product/{id}',[ProductController::class,'edit_product']);
Route::post('admin/product/update_product/{id}',[ProductController::class,'update_product'])->name('/update_product/{id}');
Route::get('admin/product/delete/{id}',[ProductController::class,'delete']);
Route::get('admin/product/deactivate_product/{id}',[ProductController::class,'deactivate_product']);
Route::get('admin/product/activate_product/{id}',[ProductController::class,'activate_product']);

Route::get('admin/logout', function () {
    session()->forget('ADMIN_LOGIN');
    session()->forget('ADMIN_USERNAME');
    session()->forget('ADMIN_ID');
    session()->flash('error','Logout sucessfully');
    return redirect('admin/admin_user/login');
});
});

