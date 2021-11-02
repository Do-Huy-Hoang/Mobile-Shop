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
Route::get('/', [
        'as' => 'Home.index',
        'uses' => 'IndexController@index'
]);
Route::get('/about-us', [
    'as' => 'about_us',
    'uses' => 'IndexController@about_us'
]);
Route::get('/search', [
    'as' => 'search',
    'uses' => 'IndexController@search'
]);
    Auth::routes();
    Route::get('/home',[
        'as'=>'home',
        'uses' => 'HomeController@index'
    ]);
    Route::prefix('/product')->group(function () {
        Route::get('/{id}', [
            'as' => 'product',
            'uses' => 'ProductController@index'
        ]);
        Route::get('/product-details/{id}', [
            'as' => 'product_details',
            'uses' => 'ProductController@product_details'
        ]);

    });
    //cart
    Route::prefix('/cart')->group(function () {
        Route::get('/', [
            'as' => 'cart',
            'uses' => 'ProductController@ShowCart'
        ]);
        Route::get('/add-to-cart/{id}', [
            'as' => 'add_to_cart',
            'uses' => 'ProductController@AddToCart'
        ]);
        Route::get('/update-cart/', [
            'as' => 'update_cart',
            'uses' => 'ProductController@UpdateCart'
        ]);
        Route::get('/delete-cart/', [
            'as' => 'delete_cart',
            'uses' => 'ProductController@DeleteCart'
        ]);
        Route::get('/order/', [
            'as' => 'order',
            'uses' => 'OrderController@index'
        ]);
        Route::post('/create-order/{id}', [
            'as' => 'create-order',
            'uses' => 'OrderController@create'
        ]);
    });


    // information customer
    Route::prefix('user/account')->group(function (){
        // profile
        Route::get('/profile',[
            'as'=>'profile',
            'uses' => 'ProfileController@profile'
        ]);
        Route::post('/update/{id}',[
            'as'=>'profile.update',
            'uses' => 'ProfileController@ProfileUpdate'
        ]);
        //update email
        Route::get('/email',[
            'as'=>'email',
            'uses' => 'ProfileController@email'
        ]);
        Route::post('/email',[
            'as'=>'email_confirm',
            'uses' => 'ProfileController@email'
        ]);
        Route::post('/email/update/{id}', [
            'as'=>'email_update',
            'uses' => 'ProfileController@EmailUpdate'
        ]);

        //update phone
        Route::get('/phone',[
            'as'=>'phone',
            'uses' => 'ProfileController@phone'
        ]);
        Route::post('/phone',[
            'as'=>'phone_confirm',
            'uses' => 'ProfileController@phone'
        ]);
        Route::post('/phone/update/{id}', [
            'as'=>'phone_update',
            'uses' => 'ProfileController@PhoneUpdate'
        ]);

        //update password
        Route::get('/password',[
            'as'=>'password.index',
            'uses' => 'ProfileController@PasswordIndex'
        ]);
        Route::post('/password/update/{id}', [
            'as'=>'password_update',
            'uses' => 'ProfileController@PasswordUpdate'
        ]);
        //My order
        Route::get('/my-order', [
            'as'=>'my_order',
            'uses' => 'OrderController@MyOrder'
        ]);
    });


Route::prefix('admin')->group(function (){
    Route::get('/home', [
        'as'=>'AdminHome.index',
        'uses' => 'AdminHomeController@index'
    ]);
    // Category
    Route::prefix('/category')->group(function (){
        Route::get('/', [
            'as' => 'category.index',
            'uses' => 'AdminCategoryController@index',
            'middleware'=>'can:category-list'
        ]);
        Route::get('/create',[
            'as' => 'category.create',
            'uses' => 'AdminCategoryController@create',
            'middleware'=>'can:category-add'
        ]);
        Route::post('/store',[
            'as' => 'category.store',
            'uses' => 'AdminCategoryController@store'
        ]);
        Route::get('/edit/{id}',[
            'as' => 'category.edit',
            'uses' => 'AdminCategoryController@edit',
            'middleware'=>'can:category-edit'
        ]);
        Route::post('/update/{id}',[
            'as' => 'category.update',
            'uses' => 'AdminCategoryController@update'
        ]);
        Route::get('/delete/{id}',[
            'as' => 'category.delete',
            'uses' => 'AdminCategoryController@delete',
            'middleware'=>'can:category-delete'
        ]);
        Route::prefix('/Category-Trash')->group(function (){
            Route::get('/',[
                'as' => 'category-trash',
                'uses' => 'AdminCategoryController@garbage_can',
                'middleware'=>'can:category-delete'
            ]);
            Route::get('/untrash/{id}',[
                'as' => 'category_untrash',
                'uses' => 'AdminCategoryController@un_trash',
                'middleware'=>'can:category-delete'
            ]);
            Route::get('/permanently-deleted/{id}',[
                'as' => 'category_permanently_deleted',
                'uses' => 'AdminCategoryController@permanently_deleted',
                'middleware'=>'can:category-delete'
            ]);
        });
    });
    //Product
    Route::prefix('/product')->group(function (){
        Route::get('/', [
            'as' => 'product.index',
            'uses' => 'AdminProductController@index',
            'middleware'=>'can:product-list'
        ]);
        Route::get('/create',[
            'as' => 'product.create',
            'uses' => 'AdminProductController@create',
            'middleware'=>'can:product-add'
        ]);
        Route::post('/store',[
            'as' => 'product.store',
            'uses' => 'AdminProductController@store'
        ]);
        Route::get('/edit/{id}', [
            'as' => 'product.edit',
            'uses' => 'AdminProductController@edit',
            'middleware'=>'can:product-edit'
        ]);
        Route::post('/update/{id}',[
            'as' => 'product.update',
            'uses' => 'AdminProductController@update',
        ]);
        Route::get('/delete/{id}',[
            'as' => 'product.delete',
            'uses' => 'AdminProductController@delete',
            'middleware'=>'can:product-delete'
        ]);
        Route::prefix('/Product-Trash')->group(function (){
            Route::get('/',[
                'as' => 'product-trash',
                'uses' => 'AdminProductController@garbage_can',
                'middleware'=>'can:product-delete'
            ]);
            Route::get('/untrash/{id}',[
            'as' => 'un_trash',
            'uses' => 'AdminProductController@un_trash',
            'middleware'=>'can:product-delete'
            ]);
            Route::get('/permanently-deleted/{id}',[
                'as' => 'permanently_deleted',
                'uses' => 'AdminProductController@permanently_deleted',
                'middleware'=>'can:product-delete'
            ]);
        });
    });
    //Orders
    Route::prefix('/order')->group(function () {
        Route::get('/', [
            'as' => 'order_index',
            'uses' => 'AdminOrderController@index',
            'middleware'=>'can:orders-list'
        ]);
        Route::get('/view/{id}', [
            'as' => 'order_view',
            'uses' => 'AdminOrderController@view',
        ]);
        Route::get('/update/', [
            'as' => 'order_update',
            'uses' => 'AdminOrderController@update',
            'middleware'=>'can:orders-edit'
        ]);
    });
    //Sliders
    Route::prefix('/slider')->group(function (){
        Route::get('/', [
            'as' => 'slider.index',
            'uses' => 'AdminSliderController@index',
            'middleware'=>'can:slider-list'
        ]);
        Route::get('/create',[
            'as' => 'slider.create',
            'uses' => 'AdminSliderController@create',
            'middleware'=>'can:slider-list'
        ]);
        Route::post('/store',[
            'as' => 'slider.store',
            'uses' => 'AdminSliderController@store',
        ]);
        Route::get('/edit/{id}', [
            'as' => 'slider.edit',
            'uses' => 'AdminSliderController@edit',
            'middleware'=>'can:slider-list'
        ]);
        Route::post('/update/{id}',[
            'as' => 'slider.update',
            'uses' => 'AdminSliderController@update',
        ]);
        Route::get('/delete/{id}',[
            'as' => 'slider.delete',
            'uses' => 'AdminSliderController@delete',
            'middleware'=>'can:slider-list'
        ]);
    });
    //Settings
    Route::prefix('/setting')->group(function (){
        Route::get('/', [
            'as' => 'setting.index',
            'uses' => 'AdminSettingController@index',
            'middleware'=>'can:settings-list'
        ]);
        Route::get('/create',[
            'as' => 'setting.create',
            'uses' => 'AdminSettingController@create',
            'middleware'=>'can:settings-add'
        ]);
        Route::post('/store',[
            'as' => 'setting.store',
            'uses' => 'AdminSettingController@store',
        ]);
        Route::get('/edit/{id}', [
            'as' => 'setting.edit',
            'uses' => 'AdminSettingController@edit',
            'middleware'=>'can:settings-edit'
        ]);
        Route::post('/update/{id}',[
            'as' => 'setting.update',
            'uses' => 'AdminSettingController@update'
        ]);
        Route::get('/delete/{id}',[
            'as' => 'setting.delete',
            'uses' => 'AdminSettingController@delete',
            'middleware'=>'can:settings-delete'
        ]);
    });
    //user
    Route::prefix('/user')->group(function (){
        Route::get('/', [
            'as' => 'user.index',
            'uses' => 'AdminUserController@index',

        ]);
        Route::get('/edit/{id}', [
            'as' => 'user.edit',
            'uses' => 'AdminUserController@edit',
            'middleware'=>'can:user-edit'
        ]);
        Route::post('/update/{id}',[
            'as' => 'user.update',
            'uses' => 'AdminUserController@update'
        ]);
        Route::get('/delete/{id}',[
            'as' => 'user.delete',
            'uses' => 'AdminUserController@delete',
            'middleware'=>'can:user-delete'
        ]);
    });
    //Role
    Route::prefix('/roles')->group(function (){
        Route::get('/', [
            'as' => 'roles.index',
            'uses' => 'AdminRolesController@index',
            'middleware'=>'can:role-list'
        ]);
        Route::get('/create',[
            'as' => 'roles.create',
            'uses' => 'AdminRolesController@create',
            'middleware'=>'can:role-add'
        ]);
        Route::post('/store/',[
            'as' => 'roles.store',
            'uses' => 'AdminRolesController@store'
        ]);
        Route::get('/edit/{id}', [
            'as' => 'roles.edit',
            'uses' => 'AdminRolesController@edit',
            'middleware'=>'can:role-edit'
        ]);
        Route::post('/update/{id}',[
            'as' => 'roles.update',
            'uses' => 'AdminRolesController@update'
        ]);
        Route::get('/delete/{id}',[
            'as' => 'roles.delete',
            'uses' => 'AdminRolesController@delete',
            'middleware'=>'can:role-delete'
        ]);
    });
    //permission
    Route::prefix('/permission')->group(function (){
        Route::get('/create',[
            'as' => 'permission.create',
            'uses' => 'AdminPermissionController@CreatePermission',
            'middleware'=>'can:permission-add'
        ]);
        Route::post('/store',[
            'as' => 'permission.store',
            'uses' => 'AdminPermissionController@store'
        ]);
    });
    //Customer
    Route::prefix('/customer')->group(function (){
        Route::get('/',[
            'as' => 'customer.index',
            'uses' => 'AdminCustomerController@index',
            'middleware'=>'can:customer-list'
        ]);
    });
});


