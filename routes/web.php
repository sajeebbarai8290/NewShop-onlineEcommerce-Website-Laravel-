<?php

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

Route::get('/',[
    'uses'=>'NewShopController@index',
    'as'=>'/'
]);
Route::get('/category-product/{id}',[
    'uses'=>'NewShopController@categoryProduct',
    'as'=>'category-product'
]);
Route::get('product/details/{id}/{name}',[
    'uses'=>'NewShopController@productDetails',
    'as'=>'product-details'
]);

Route::post('/cart/add',[
    'uses'=>'CartController@addToCart',
    'as'=>'add-to-cart'
]);

Route::get('/cart/show',[
    'uses'=>'CartController@showCart',
    'as'=>'show-cart'
]);

Route::get('/cart/delete/{id}',[
    'uses'=>'CartController@deleteCart',
    'as'=>'delete-cart-item'
]);
Route::post('/cart/update',[
    'uses'=>'CartController@updateCart',
    'as'=>'update-cart'
]);

Route::get('/checkout',[
    'uses'=>'CheckoutController@index',
    'as'=>'checkout'
]);
Route::post('/customer/registration',[
    'uses'=>'CheckoutController@customerSignUp',
    'as'=>'/customer/sign-up'
]);
Route::post('/checkout/customer-login',[
    'uses'=>'CheckoutController@customerLoginCheck',
    'as'=>'customer-login'
]);
Route::post('/checkout/customer-logout',[
    'uses'=>'CheckoutController@customerLogout',
    'as'=>'customer-logout'
]);
Route::get('/checkout/new-customer-login',[
    'uses'=>'CheckoutController@newCustomerLogin',
    'as'=>'new-customer-login'
]);
Route::get('/checkout/shipping',[
    'uses'=>'CheckoutController@shippingForm',
    'as'=>'checkout-shipping'
]);
Route::post('/shipping/save',[
    'uses'=>'CheckoutController@saveShippingInfo',
    'as'=>'new-shipping'
]);
Route::get('/checkout/payment',[
    'uses'=>'CheckoutController@paymentForm',
    'as'=>'checkout-payment'
]);
Route::post('/checkout/order',[
    'uses'=>'CheckoutController@newOrder',
    'as'=>'new-order'
]);
Route::get('/complete/order',[
    'uses'=>'CheckoutController@completeOrder',
    'as'=>'complete-order'
]);
Route::group(['middleware' => ['new']], function () {
    Route::get('/order/manage-order',[
    'uses'=>'OrderController@manageOrderInfo',
    'as'=>'/manage-order'
    ]);

    Route::get('/order/view-order-detail/{id}',[
        'uses'=>'OrderController@viewOrderDetail',
        'as'=>'view-order-detail'
    ]);
    Route::get('/order/view-order-invoice/{id}',[
        'uses'=>'OrderController@viewOrderInvoice',
        'as'=>'view-order-invoice'
    ]);

    Route::get('/order/download-order-invoice/{id}',[
        'uses'=>'OrderController@downloadOrderInvoice',
        'as'=>'download-order-invoice'
    ]);
});



Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

/*category info*/
Route::get('/category/add',[
    'uses'=>'CategoryController@index',
    'as'=>'/add-category'
]);
Route::get('/category/manage',[
    'uses'=>'CategoryController@manageCategory',
    'as'=>'/manage-category'
]);

Route::post('/category/save',[
    'uses'=>'CategoryController@saveCategory',
    'as'=>'new-category'
]);

Route::get('/category/unpublished/{id}',[
    'uses'=>'CategoryController@unpublishedCategoryInfo',
    'as'=>'unpublished-category'
]);

Route::get('/category/published/{id}',[
    'uses'=>'CategoryController@publishedCategoryInfo',
    'as'=>'published-category'
]);

Route::get('/category/edit/{id}',[
    'uses'=>'CategoryController@editCategoryInfo',
    'as'=>'edit-category'
]);

Route::post('/category/update',[
    'uses'=>'CategoryController@updateCategoryInfo',
    'as'=>'update-category'
]);

Route::get('/category/delete/{id}',[
    'uses'=>'CategoryController@deleteCategoryInfo',
    'as'=>'delete-category'
]);
/* category info*/
/*manufacture info*/
Route::get('/manufacturer/add',[
    'uses'=>'ManufacturerController@index',
    'as'=>'/add-maufacture'
]);

Route::get('/manufacturer/manage',[
    'uses'=>'ManufacturerController@manageManufacturerInfo',
    'as'=>'/manage-manufacture'
]);

Route::post('/manufacturer/save',[
    'uses'=>'ManufacturerController@saveManufacturerInfo',
    'as'=>'new-manufacturer'
]);

Route::get('/manufacturer/unpublished/{id}',[
    'uses'=>'ManufacturerController@unpublishedManufacturerInfo',
    'as'=>'unpublished-manufacturer'
]);

Route::get('/manufacturer/published/{id}',[
    'uses'=>'ManufacturerController@publishedManufacturerInfo',
    'as'=>'published-manufacturer'
]);

Route::get('/manufacturer/edit/{id}',[
    'uses'=>'ManufacturerController@editManufacturerInfo',
    'as'=>'edit-manufacturer'
]);

Route::post('/manufacturer/update',[
    'uses'=>'ManufacturerController@updateManufacturerInfo',
    'as'=>'update-manufacturer'
]);

Route::get('/manufacturer/delete/{id}',[
    'uses'=>'ManufacturerController@deleteManufacturerInfo',
    'as'=>'delete-manufacturer'
]);
/*manufacturer Info*/
/*Product Info*/
Route::get('/product/add',[
    'uses'=>'ProductController@index',
    'as'=>'/add-product'
]);

Route::post('/product/save',[
    'uses'=>'ProductController@saveProductInfo',
    'as'=>'save-product'
]);

Route::get('/product/manage',[
    'uses'=>'ProductController@manageProductInfo',
    'as'=>'/manage-product'
]);
Route::get('/product/edit/{id}',[
    'uses'=>'ProductController@editProductInfo',
    'as'=>'edit-product'
]);
Route::post('/product/update',[
    'uses'=>'ProductController@updateProductInfo',
    'as'=>'update-product'
]);

/*slider info*/
Route::get('/add-slider',[
    'uses'  =>  'SliderController@index',
    'as'    =>  'add-slider'
]);
Route::post('/save-slider',[
    'uses'  =>  'SliderController@saveSlider',
    'as'    =>  'save-slider'
]);
Route::get('/manage-slider',[
    'uses'  =>  'SliderController@manageSlider',
    'as'    =>  'manage-slider'
]);
Route::get('/edit-slider/{id}',[
    'uses'  =>  'SliderController@editSlider',
    'as'    =>  'edit-slider'
]);
Route::post('/Update-slider',[
    'uses'  =>  'SliderController@updateSlider',
    'as'    =>  'Update-slider'
]);
Route::get('/unpublished-slider/{id}',[
    'uses'  =>  'SliderController@unpublishedSlider',
    'as'    =>  'unpublished-slider'
]);
Route::get('/published-slider/{id}',[
    'uses'  =>  'SliderController@publishedSlider',
    'as'    =>  'published-slider'
]);