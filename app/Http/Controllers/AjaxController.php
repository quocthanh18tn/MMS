<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Employees;
use App\User;
use App\Projects;
use App\Customers;
use App\Orders;
use App\Panels;
use App\Panel_type;
use App\Columns;
class AjaxController extends Controller
{
    
      public function getemployeedep($dep)
    {
        $employee = Employees::select('subdep')->where('dep',$dep)->distinct()->get();
        foreach ($employee as $emp) {
           echo "<option value='".$emp->subdep."'>".$emp->subdep."</option>";
        }
    
    } 
     public function getmanagerid($id)
    {
        // echo $id;
        $manager = User::where('idManager',$id)->exists();
        if ($manager==1)
            echo "<span style='color: red; text-align: center;font-size:15px;'> ID is existed</span>";
        else
            echo "<span style='color: green; text-align: center;font-size:15px;'> ID is valid</span>";
          
    
    } 
    public function getemployeeid($id)
    {
        // echo $id;
    	$employee = Employees::where('idEmployee',$id)->exists();
        if ($employee==1)
            echo "<span style='color: red; text-align: center;font-size:15px;'> ID is existed</span>";
        else
            echo "<span style='color: green; text-align: center;font-size:15px;'> ID is valid</span>";
    }

    public function getprojectid($id)
    {
        // echo $id;
        $project = Projects::where('idProject',$id)->exists();
        if ($project==1)
            echo "<span style='color: red; text-align: center;font-size:15px;'> ID is existed</span>";
        else
            echo "<span style='color: green; text-align: center;font-size:15px;'> ID is valid</span>";
    }
     public function getphone($phone)
    {
        // echo $id;
        $customer = Customers::where('phone',$phone)->exists();
        if ($customer==1)
            echo "<span style='color: red; text-align: center;font-size:15px;'> Phone is existed</span>";
        else
            echo "<span style='color: green; text-align: center;font-size:15px;'> Phone is valid</span>";
    }
    public function getorderproject($idProject)
    {
        $project = Projects::where('id','=',$idProject)->first();
        $view = view('project.order.create_ajax_infor_project',['project'=>$project])->render();
            return $view;
        //return view ajax
    } 
    public function getorderproject_customerphone($idProject)
    {
        $order = Orders::select('idCustomer')->where('idProject','=',$idProject)->distinct()->get();
        echo "<option value=''>SELECT</option>";
        foreach ($order as $order)
           echo "<option value='".$order->idCustomer."'>".$order->customers->name."</option>";
        //return view ajax
    } 
    public function getordercustomer($idCustomer)
    {
        $customer = Customers::where('id','=',$idCustomer)->first();
        $view = view('project.order.create_ajax_infor_customer',['customer'=>$customer])->render();
            return $view;
        //return view ajax
    }

    public function getordercustomerorder($idCustomer,$idProject)
    {   
        $order = Orders::select('idOrder','id')->where([
            ['idCustomer','=',$idCustomer],
            ['idProject','=',$idProject]
            ])->get();

        echo "<option value=''>SELECT</option>";
        foreach ($order as $or)
           echo "<option value='".$or->id."'>".$or->idOrder."</option>";
    }
    public function getorderproject_column($idOrder,$idCustomer,$idProject)
    {   
       // echo "thanh";
        $project = Projects::select("idProject")->where('id','=',$idProject)->first()->idProject;
        $customer = Customers::select("idCustomer")->where('id','=',$idCustomer)->first()->idCustomer;
        $paneltype= Panel_type::all();
        $order = Orders::select("idOrder")->where('id','=',$idOrder)->first()->idOrder;
        //do id panel gom msproject-idcustomer-idorder-sdt nen ta lay 3 truong dau sau do t query like de ra
        // panel, sau do display ve trang kia
        $prefixPanel = $project.'-'.$customer.'-'.$order;
        $panel = Panels::where('idPanel','like',"%$prefixPanel%")->whereNull('expectFat')->whereNull('expectDelivery')->get();
        // select ma so tu ra, sau do truyen cai object qua view khac de show
         $view = view('project.panel.create_ajax_infor_panel',['panel'=>$panel,'customer'=>$customer,'order'=>$order,'paneltype'=>$paneltype])->render();
            return $view;
    }

    public function getCreate_Panel_ajax_createname_column($mstu,$number_of_column)
    {
        $view = view('project.panel.Create_Panel_ajax_createname_column',['mstu'=>$mstu,'number_of_column'=>$number_of_column])->render();
        return $view;
    }

    public function getCreate_Pannel_ajax_review(Request $request)
    {
        // var_dump($request->all());
        $idProject = $request->idProject;
        $idCustomer = $request->customer;
        $idOrder = $request->order;
        // echo $idProject.$idCustomer.$idOrder;


        $project = Projects::select("idProject")->where('id','=',$idProject)->first()->idProject;//id project
        $customer = Customers::where('id','=',$idCustomer)->first(); //object customer
        $phone_customer = $customer->phone;
        $name_customer = $customer->name;
        $id_customer = $customer->idCustomer;
        $order = Orders::select("idOrder")->where('id','=',$idOrder)->first()->idOrder;
        $paneltype= Panel_type::all();


        $prefixPanel = $project.'-'.$id_customer.'-'.$order;
        // echo $prefixPanel;

        $panel = Panels::where('idPanel','like',"%$prefixPanel%")->whereNull('expectFat')->whereNull('expectDelivery')->get();
        // var_dump($panel);
        // echo $panel->first()->projects->idProject;
        $view = view('project.panel.Create_Panel_ajax_review',['panel'=>$panel,'customer'=>$customer,'order'=>$order,'paneltype'=>$paneltype])->render();
        return $view;
        // echo $project.$phone_customer.$name_customer.$id_customer;
    }

     public function getpanel_list_order($idProject)
    {
        $order = Orders::where('idProject','=',$idProject)->get();
        echo "<option value=''>Select</option>";
        echo "<option value='0'>Show all</option>";
        foreach ($order as $order)
           echo "<option value='".$order->id."'>".$order->idOrder."</option>";
        //return view ajax
    } 
    public function getpanel_list_info($idProject)
    {
        $order = Orders::where('idProject','=',$idProject)->get();
        $view = view('project.panel.list_ajax',['order'=>$order])->render();
        return $view;
        //return view ajax
    }
    public function getpanel_list_order_panel($idOrder,$idProject)
    {
        if ($idOrder == 0) //show all panel
        {
            $panel = Panels::where('idProject','=',$idProject)->get();
            // $NoColumn = count(Columns::where('idPanel','=',$panel->id));
            // echo $NoColumn;

        }
        else 
        {
            $order = Orders::where('id','=',$idOrder)->first();
            $idProject = $order->projects->idProject;
            $idCustomer = $order->customers->idCustomer;
            $idOrder = $order->idOrder;
            $prefixPanel = $idProject."-".$idCustomer."-".$idOrder;
            $panel = Panels::where('idPanel','like',"$prefixPanel%")->get();

        }
        $view = view('project.panel.list_ajax_panel',['panel'=>$panel])->render();
        return $view;
    } 

    public function getedit_panel_list_order($idProject)
    {
        $order = Orders::where('idProject','=',$idProject)->get();
        echo "<option value=''>Select</option>";
        foreach ($order as $order)
           echo "<option value='".$order->id."'>".$order->idOrder."</option>";
        //return view ajax
    } 
    public function getedit_display_panel_info($idProject,$idOrder)
    {
        $order = Orders::where('id','=',$idOrder)->first();
        $idProject = $order->projects->idProject;
        $idCustomer = $order->customers->idCustomer;
        $idOrder = $order->idOrder;
        $prefixPanel = $idProject."-".$idCustomer."-".$idOrder;
        $panel = Panels::where('idPanel','like',"$prefixPanel%")->get();

        echo "<option value=''>Select</option>";
        foreach ($panel as $panel)
           echo "<option value='".$panel->id."'>".$panel->idPanel." :".$panel->name."</option>";
        //return view ajax
    }  
    public function getedit_display_panel_info_full($idPanel)
    {
         $panel = Panels::where('id','=',$idPanel)->first();
         $view = view('project.panel.edit_ajax_panel',['panel'=>$panel])->render();
         return $view;
        //return view ajax
    } 
    //display column infor
     public function getedit_display_column_info_full($idPanel)
    {
        $panel = Panels::where('id','=',$idPanel)->first();
         $view = view('project.panel.edit_ajax_column',['panel'=>$panel])->render();
         return $view;
    }  


}

