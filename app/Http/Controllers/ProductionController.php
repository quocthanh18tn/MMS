<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Projects;
use App\Employees;
use App\Customers;
use App\Orders;
use App\Panels;
use App\Columns;
use DateTime;
use App\Panel_type;


class ProductionController extends Controller
{
    //
    public function index()
    {
        return view('production.index');
    }

    public function getlistemployee()
    {
        return view('production.employee');
    }

    public function page_listemployee(Request $request)
    {
       if ($request->input('button2')!="")
       {    
         $request->search="";
       }
            $search = $request->search;
            $employee = Employees::where('idEmployee','like',"%$search%")->orWhere('name','like',"%$search%")->orWhere('dep','like',"%$search%")->orWhere('subdep','like',"%$search%")->paginate(10);
            return view('production.employee',['employee'=>$employee]);
    }
    public function gettaskAssigment()
    {
        $projectObj = Projects::all();
        return view('production.task',['projectObj'=>$projectObj]);
    }
}
