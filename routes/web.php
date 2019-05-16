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
    return view('welcome');
});
Route::get('index.html',function(){
	return view('pages.home');
});
Route::get('login','UserController@getlogin');
Route::post('login','UserController@postlogin');

Route::get('logout','UserController@getlogout');

Route::get('changePass','UserController@getchangepass');
Route::post('changePass','UserController@postchangepass');

Route::group(['prefix'=>'administration','middleware'=>'admin'],function(){
		// admin/theloai/danhsach TheLoaiController
		Route::get('index.html','AdministrationController@index');
		//create employee and manager
		Route::get('create.html','AdministrationController@getcreate');
		Route::post('create.html','AdministrationController@postcreate');
		//manager
		Route::get('listmanager.html','AdministrationController@getlistmanager');
		Route::get('page_listmanager.html','AdministrationController@page_listmanager');
		
		Route::get('deletemanager.html/{id}','AdministrationController@getdelete');
		
		Route::get('adjustmanager.html/{id}','AdministrationController@getadjustmanager');
		Route::post('adjustmanager.html/{id}','AdministrationController@postadjustmanager');
		//employee
		Route::get('listemployee.html','AdministrationController@getlistemployee');
		Route::get('page_listemployee.html','AdministrationController@page_listemployee');
		
		Route::get('deleteemployee.html/{id}','AdministrationController@getdeleteemployee');
		

		Route::get('adjustemployee.html/{id}','AdministrationController@getadjustemployee');
		Route::post('adjustemployee.html/{id}','AdministrationController@postadjustemployee');
		//holiday
		Route::get('addholiday.html','AdministrationController@getaddholiday');
		Route::post('addholiday.html','AdministrationController@postaddholiday');

		Route::get('deleteholiday.html/{id}','AdministrationController@getdeleteholiday');
	});
Route::group(['prefix'=>'ajax'],function(){
		Route::get('dep/{dep}','AjaxController@getemployeedep');
		Route::get('managerid/{id}','AjaxController@getmanagerid');
		Route::get('employeeid/{id}','AjaxController@getemployeeid');
		//project
		Route::get('projectid/{id}','AjaxController@getprojectid');
		//customer phone
		Route::get('phoneid/{phone}','AjaxController@getphone');
		//order customer
		Route::get('orderproject/{idProject}','AjaxController@getorderproject');
		// route khi select project, se chon ra customer tuong ung voi sdt
		Route::get('orderproject_customerphone/{idProject}','AjaxController@getorderproject_customerphone');

		Route::get('ordercustomer/{idCustomer}','AjaxController@getordercustomer');
		//sdt thay doi thi order se thay doi
		Route::get('ordercustomerorder/{idCustomer}/{idProject}','AjaxController@getordercustomerorder');
		//order thay doi thi display column
		Route::get('orderproject_column/{idOrder}/{idCustomer}/{idProject}','AjaxController@getorderproject_column');

		Route::get('Create_Panel_ajax_createname_column/{mstu}/{number_of_column}','AjaxController@getCreate_Panel_ajax_createname_column');
		Route::get('Create_Pannel_ajax_review','AjaxController@getCreate_Pannel_ajax_review');
		//list panel
		Route::get('panel_list_order/{idProject}','AjaxController@getpanel_list_order');
		Route::get('panel_list_info/{idProject}','AjaxController@getpanel_list_info');
		Route::get('panel_list_order_panel/{idOrder}/{idProject}','AjaxController@getpanel_list_order_panel');
		
		Route::get('edit_panel_list_order/{idProject}','AjaxController@getedit_panel_list_order');
		//display infor name+id tu in file eidt
		Route::get('edit_display_panel_info/{idProject}/{idOrder}','AjaxController@getedit_display_panel_info');
		//dispaly full infor panel
		Route::get('edit_display_panel_info_full/{idProject}','AjaxController@getedit_display_panel_info_full');

	});

Route::group(['prefix'=>'project'],function(){
		// admin/theloai/danhsach TheLoaiController
		Route::get('index.html','ProjectController@index');
		//create employee and manager
		Route::get('create.html','ProjectController@getcreate');
		Route::post('create.html','ProjectController@postcreate');
		//manager
		Route::get('listproject.html','ProjectController@getlistproject');
		Route::get('page_listproject.html','ProjectController@page_listproject');
		//
		Route::get('deleteproject.html/{id}','ProjectController@getdelete');
		
		Route::get('adjustproject.html/{id}','ProjectController@getadjustproject');
		Route::post('adjustproject.html/{id}','ProjectController@postadjustproject');
		//customer
		Route::get('createcustomer.html','ProjectController@getcreatecustomer');
		Route::post('createcustomer.html','ProjectController@postcreatecustomer');

		Route::get('listcustomer.html','ProjectController@getlistcustomer');
		Route::get('page_listcustomer.html','ProjectController@page_listcustomer');
		//
		Route::get('deletecustomer.html/{id}','ProjectController@getdeletecustomer');
		
		Route::get('adjustcustomer.html/{id}','ProjectController@getadjustcustomer');
		Route::post('adjustcustomer.html/{id}','ProjectController@postadjustcustomer');
		//Order
		Route::get('createorder.html','ProjectController@getcreateorder');
		Route::post('createorder.html','ProjectController@postcreateorder');

		Route::get('listorder.html','ProjectController@getlistorder');
		//
		Route::get('deleteorder.html/{id}','ProjectController@getdeleteorder');
		
		//Panel
		Route::get('createpanel.html','ProjectController@getcreatepanel');
		Route::post('createpanel.html','ProjectController@postcreatepanel');

		Route::get('listpanel.html','ProjectController@getlistpanel');
		//
		Route::get('deletepanel.html/{id}','ProjectController@getdeletepanel');
		//export
		Route::post('export.html','ProjectController@getexport');
		//editpanel
		Route::get('editpanel.html','ProjectController@geteditpanel');
		Route::post('editpanel.html','ProjectController@posteditpanel');
		
		
	});
