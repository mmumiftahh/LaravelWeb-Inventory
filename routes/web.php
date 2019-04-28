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

Route::get('/', function () {
    if (Auth()->check()) {
        return view('home');    
    }else{
        return view('auth.login');
    }
});

Route::group(['prefix'=>'employee', 'middleware'=>'employee'],function(){
    Route::get('/dashboard','EmployeeController@dashboard')->name('employee.dashboard');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::resources([
	'type'=>'TypeController',
	'room'=>'RoomController',
	'employee'=>'EmployeeController',
	'item'=>'ItemController',
	'user'=>'UserController',
	'borrow'=>'BorrowController',
	'detail_borrow'=>'BorrowDetailController',
	'maintenance'=>'MaintenanceController',
]);

Route::get('borrow/detail/{borrow}','BorrowController@detail')->name('borrow.detail');

Route::group(['prefix'=>'supply'],function(){
    Route::get('/{item}','SupplyController@item')->name('supply.item');
    Route::post('/','SupplyController@store')->name('supply.item.store');
});

Route::group(['prefix' => 'reportborrow'], function() {
    Route::get('/','ReportBorrowController@index')->name('reportborrow.index');
    Route::get('/{param}','ReportBorrowController@borrow')->name('reportborrow.borrow');
});

Route::group(['prefix' => 'reportroom'], function() {
    Route::get('/','ReportRoomController@index')->name('reportroom.index');
    Route::post('/store','ReportRoomController@itemRoom')->name('reportroom.room');
});

Route::group(['prefix' => 'reportitem'], function() {
    Route::get('/','ReportItemController@index')->name('reportitem.index');
    Route::post('/store','ReportItemController@itemreport')->name('reportitem.item');
});

Route::get('login/emp','EmployeeAuth\LoginController@show')->name('emp.show');
Route::post('login/emp','EmployeeAuth\LoginController@login')->name('emp.login');
Route::post('logout/emp','EmployeeAuth\LoginController@logout')->name('emp.logout');