<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Projects;
use App\Customers;
use App\Orders;
use App\Panels;
use App\Columns;
use DateTime;
use PHPExcel_IOFactory;
use PHPExcel; 
use PHPExcel_Writer_Excel2007; 
use App\Panel_type;


class ProjectController extends Controller
{
    //
    public function index()
    {
        return view('project.index');
    }

    public function getcreate()
    {
        return view('project.project.create');

    }

    public function postcreate(Request $request)
    {
        if ($request->input('submit')!="")
        {
            $this->validate($request,
            [
                'id'=>'required|unique:projects,idProject|min:6|max:6',
            ],
            [
                'id.unique' => 'ID is existed',
                'id.max' => 'Only 6 character in ID project',
                'id.min' => 'Only 6 character in ID project',
            ]);
          $project = new Projects;
          $project->idProject = $request->id;
          $project->name = $request->name;
          $project->created_at = new DateTime();

          $project->save();
          return redirect('project/create.html')->with('success','Create new project success!');
        }
    }

    public function getlistproject()
    {
        return view('project.project.project');
    }

    public function page_listproject(Request $request)
    {
      if ($request->input('button2')!="")
       {
            $request->search = "";
       }
            $search = $request->search;
            $project = Projects::where('idProject','like',"%$search%")->orWhere('name','like',"%$search%")->paginate(10);
            return view('project.project.project',['project'=>$project]);
    }

    public function getdelete($id)
        {
            $project = Projects::where('id',$id);
            $project->delete();
            return redirect('project/listproject.html')->with('success','Delete  project success!');
        }

    public function getadjustproject($id)
    {
       $project = Projects::where('id',$id)->first();
        return view('.project.project.adjustproject',['project'=>$project]);
    
    }

    public function postadjustproject(Request $request,$id)
    {
       if ($request->input('submit')!="")
        {
           $this->validate($request,
            [
                'id'=>'required|min:6|max:6|unique:projects,idProject,'.$id,
                'name'=>'required',
            ],
            [
                'id.unique' => 'ID is existed',
                'id.required' => 'Fill id project',
                'id.min' => 'Only 6 character',
                'id.max' => 'Only 6 character',
                'name.required' => 'Fill name project',
            ]);  
          $project = Projects::where('id',$id)->first();
          if ($project->idProject!=$request->id)
          {
            $panelObj = Panels::where('idProject','=',$id)->get();
            foreach ($panelObj as $panel)
            {
              $idPanel = $panel->id;
              $columnObj = Columns::where('idPanel','=',$idPanel)->get();
              foreach ($columnObj as $col)
              {
                $mskhungtu = $col->idColumn;
                $lenght=strlen($mskhungtu);
                $temp=substr($mskhungtu,6,$lenght-6);
                $col->idColumn=$request->id.$temp;
                $col->save();
              }
              $mstu = $panel->idPanel;
              $lenght=strlen($mstu);
              $temp = substr($mstu,6,$lenght-6);
              $panel->idPanel=$request->id.$temp;
              $panel->save();
            }
            $project->idProject = $request->id;
          }
          $project->name = $request->name;
          $project->created_at = new DateTime();

          $project->save();
          //edit idpanel and column



          return redirect('project/listproject.html')->with('success','Update  project success!');
        }

    }
    // 
    // 
    ///////custome/////////////////////////////////////
    public function getcreatecustomer()
    {
        return view('project.customer.create');

    }

    public function postcreatecustomer(Request $request)
    {
        if ($request->input('submit')!="")
        {
            $this->validate($request,
            [
                'phone'=>'required|unique:customers,phone',
                'id'=>'min:3|max:3',
            ],
            [
                'phone.unique' => 'Phone is existed',
                'id.min' => 'Id has only 3 character',
                'id.max' => 'Id has only 3 character',

            ]);
          $customer = new Customers;
          $customer->idCustomer = $request->id;
          $customer->name = $request->name;
          $customer->company = $request->company;
          $customer->address = $request->address;
          $customer->phone = $request->phone;
          $customer->created_at = new DateTime();

          $customer->save();
          return redirect('project/createcustomer.html')->with('success','Create new customer success!');
        }
    }

    public function getlistcustomer()
    {
        return view('project.customer.customer');
    }

    public function page_listcustomer(Request $request)
    {
      if ($request->input('button2')!="")
       {
            $request->search = "";
       }
            $search = $request->search;
            $customer = Customers::where('idCustomer','like',"%$search%")->orWhere('name','like',"%$search%")->orWhere('address','like',"%$search%")->orWhere('company','like',"%$search%")->orWhere('phone','like',"%$search%")->paginate(10);
            return view('project.customer.customer',['customer'=>$customer]);
    }

    public function getdeletecustomer($id)
        {
            $customer = Customers::where('id',$id)->first();
            $orderObj = $customer->orders;
            foreach ($orderObj as $orderObj)
            {
              $idProject = $orderObj->projects->idProject;
              $idCustomer = $orderObj->customers->idCustomer;
              $prefixPanel=$idProject."-".$idCustomer."-".$orderObj->idOrder;
              $panel = Panels::where('idPanel','like',"$prefixPanel%");
              $panel->delete();
              $orderObj->delete();
              
            }
            $customer->delete();
            return redirect('project/listcustomer.html')->with('success','Delete  customer success!');
        }

    public function getadjustcustomer($id)
    {
       $customer = Customers::where('id',$id)->first();
        return view('project.customer.adjustcustomer',['customer'=>$customer]);
    
    }

    public function postadjustcustomer(Request $request,$id)
    {
       if ($request->input('submit')!="")
        {
           $this->validate($request,
            [
                'phone'=>'required|unique:customers,phone,'.$id,
                'name'=>'required',
                'id'=>'required|min:3|max:3',
                'company'=>'required',
                'address'=>'required',
            ],
            [
                'phone.unique' => 'Phone is existed',
                'phone.required' => 'Enter phone number',
                'id.required' => 'Enter id customer',
                'id.min' => 'Id has only 3 character',
                'id.max' => 'Id has only 3 character',
                'company.required' => 'Enter company',
                'address.required' => 'Enter address',
            ]);  
          $customer = Customers::where('id',$id)->first();
          if ($customer->idCustomer != $request->id)
          {
            //start
            $orderObj = $customer->orders;
            foreach ($orderObj as $orderObj)
            {
              $idProject = $orderObj->projects->idProject;
              $idCustomer = $orderObj->customers->idCustomer;
              $prefixPanel=$idProject."-".$idCustomer."-".$orderObj->idOrder;
              $panel = Panels::where('idPanel','like',"$prefixPanel%")->get();
              foreach ($panel as $panel) 
              {
                # code...
                foreach ($panel->columns as $columnObj )
                {
                  $idColumn = $columnObj->idColumn;
                  $objColumn = Columns::where('idColumn','=',$idColumn)->first();
                  # code...
                  $lenght=strlen($idColumn);
                  $msduan=substr($idColumn, 0,7);
                  $temp=substr($idColumn,10,$lenght-10);
                  $mskhungtu1=$msduan.$request->id.$temp;
                  $objColumn->idColumn=$mskhungtu1;
                  $objColumn->save();
                }
                $idPanel = $panel->idPanel;
                $objPanel = Panels::where('idPanel','=',$idPanel)->first();
                $lenght=strlen($idPanel);
                $msduan=substr($idPanel,0,7);
                $temp = substr($idPanel,10,$lenght-10);
                $mstu1=$msduan.$request->id.$temp;
                $objPanel->idPanel=$mstu1;
                $objPanel->save();
                  // echo $mstu1."<br>";
              }
            }
            //end
            //change id cua panel and column
             $customer->idCustomer = $request->id;
          }
          $customer->name = $request->name;
          $customer->company = $request->company;
          $customer->address = $request->address;
          $customer->phone = $request->phone;
          $customer->created_at = new DateTime();

          $customer->save();

          return redirect('project/listcustomer.html')->with('success','Update  customer success!');
        }

    }
    /////////////////////////////////////////////////////////////////////////
    ////////////////////////ORDER////////////////////////////////////////////
    /////////////////////////////////////////////////////////////////////////
    public function getcreateorder()
    {
        $customer = Customers::all();
        $project = Projects::all();
        return view('project.order.create',['customer'=>$customer,'project'=>$project]);

    }

    public function postcreateorder(Request $request)
    {
      //function 1
      /*
          insert ProjectId and CustomerId into table Order
          check xem don hang co ton tai hay khong, tu dong gan gia tri tang len 1

      */
        if ($request->input('submit')!="")
        {
            $this->validate($request,
            [
                'customer'=>'required',
                'idProject'=>'required',
                 'file' => 'required',
            ]);
          $idProject = $request->idProject;
          $idCustomer = $request->customer; //id primary key cua table customer
          //bug xay ra tai vi mac du cai idcustomer la giong nhau, nhung primary la khac nhau, nen no se lam bien count sai
          $idCustomerReal = Customers::where('id','=',$idCustomer)->first()->idCustomer;
          $idCustomerRealObj = Customers::where('idCustomer','=',$idCustomerReal)->get();
          $count = 1; // bien de dem gia tri order
          foreach ($idCustomerRealObj as $obj)
          {
            $temp =Orders::where([
            ['idProject','=',$idProject], //so snah index primary key
            ['idCustomer','=',$obj->id]
            ])->get()->count();
            $count +=$temp;
            # code...
          }
          
          //count variable in order to count value in table order, ( bien so lan dat hang)
          if ($count <10)
            $count="0".$count;

          // echo $count.$idProject.$idCustomer;
          $order = new Orders;
          $order->idOrder = $count;
          $order->idProject = $idProject;
          $order->idCustomer = $idCustomer;
          $order->created_at = new DateTime();

          $order->save();
          //end function1
          //function2
          /*
          function import list of panel into table panel
          import file excel co format san, trong folder public
          */
          $project = Projects::where('id','=',$idProject)->first()->idProject;
          $customer = Customers::where('id','=',$idCustomer)->first()->idCustomer;
          if ($request->hasFile('file'))
                {
                    $file = $request->file('file');
                    $duoi = $file->getClientOriginalExtension();
                    if($duoi!='xls' && $duoi!='xlsx')
                    {
                        return redirect('project/createorder.html')->with('error','Wrong file name');   
                    }
                    else
                    {

                        $objReader = PHPExcel_IOFactory::createReaderForFile($file);
                        $sheetnames = $objReader->listWorksheetNames($file);
                        $objReader->setLoadSheetsOnly($sheetnames);
                        $objReader->setLoadSheetsOnly($sheetnames[0]);
                        $objExcel = $objReader->load($file);
                        $sheetData = $objExcel->getActiveSheet()->toArray('null',true,true,true);
                        $highestRow = $objExcel->setActiveSheetIndex()->getHighestRow();
                        //dac thu file excel cua cty vui tinh lam
                        /*
                        item cua file thuoc row C
                        nen chay row 1 tu cho toi khi dung item cua file
                        sua do break ra lam insert vao
                        */
                        for ($row =1 ;;$row++)
                        {
                            $checkItem=$sheetData[$row]['C'];
                            if ($checkItem == 1)
                            {
                              break;
                            }
                        }
                        /*
                        sau khi tim duoc vi tri item roi, thi tu do moi column lay ra id va name
                        sau do gan ma so panel = <MsProject>-<MsCus>-<Mslandat>-<prefix>
                        sau do insert vao bang
                        va cho row chay toi khi row C = null, vi file excel la nhu v
                        */
                        for (;;$row++)
                        {
                              $prefixNumberPanel = $sheetData[$row]['C'];
                              $NamePan = $sheetData[$row]['D'];
                              if ( $prefixNumberPanel=='null')
                               break;
                              if ($prefixNumberPanel <10)
                                $prefixNumberPanel="00".$prefixNumberPanel;
                              else if ($prefixNumberPanel <100)
                                $prefixNumberPanel = "0".$prefixNumberPanel;
                              $NumberPanel=$project.'-'.$customer.'-'.$count.'-'.$prefixNumberPanel;
                        
                        //insert vao table panel
                        $panel = new Panels;
                        $panel->idPanel = $NumberPanel;
                        $panel->idProject = $idProject;
                        $panel->name = $NamePan;
                        $panel->idPaneltype = 5;
                        $panel->save();
                        }
                    }
                }
          // endfunction2
          return redirect('project/createorder.html')->with('success','Create new order success!');
        }
    }

    public function getlistorder()
    {
        $order = Orders::paginate(5);
        return view('project.order.order',['order'=>$order]);
    }


    public function getdeleteorder($id)
        {
            $order = orders::where('id',$id)->first();
            $idProject = $order->projects->idProject;
            $idCustomer = $order->customers->idCustomer;
            $prefixPanel=$idProject."-".$idCustomer."-".$order->idOrder;
            $panel = Panels::where('idPanel','like',"$prefixPanel%");
            $panel->delete();
            $order->delete();
            return redirect('project/listorder.html')->with('success','Delete  order success!');
        }
 /////////////////////////////////////////////////////////////////////////
    ////////////////////////PANEL////////////////////////////////////////////
    /////////////////////////////////////////////////////////////////////////
    public function getcreatepanel()
    {
        $customer = Customers::all();
        $project = Projects::all();
        $order = Orders::all();
        return view('project.panel.create',['customer'=>$customer,'project'=>$project,'order'=>$order]);

    }

    public function postcreatepanel(Request $request)
    {
        $mstustring="mstu1";
        $mstu=$_POST["$mstustring"];
        $prefixPanel=substr($mstu,0,13);
        // echo $varcheck; //check ktra xem so luong da create
        $panel = Panels::where('idPanel','like',"%$prefixPanel%")->whereNull('expectFat')->whereNull('expectDelivery')->get();
        $numrow_tu=count($panel);
        // echo $numrow_tu;
        for ($i=1;$i <=$numrow_tu ;$i++)
        {
          $indexstring=(string)$i;
          $mstustring="mstu$indexstring";
          $numbercolumnstring="numbercolumn$indexstring";
          $fatstring="fat$indexstring";
          $deliverystring="delivery$indexstring";
          $type="type$indexstring";

          $mstu=$_POST["$mstustring"];
          $varcheck=substr($mstu,0,13); //check ktra xem so luong da create
          $numbercolumn=$_POST["$numbercolumnstring"];
          $fat=$_POST["$fatstring"];
          $delivery=$_POST["$deliverystring"];
          $type=$_POST["$type"];

             if ( ($numbercolumn!="")&&  ($fat!="") && ($delivery!=""))
             {
                $panel = Panels::where('idPanel','=',$mstu)->first();
                $panel->expectFat = $fat;
                $panel->expectDelivery = $delivery;
                $panel->idPaneltype = $type;
                $panel->save();

                for ( $indextemp=1;$indextemp<= $numbercolumn;$indextemp++)
                 {
                    if ($indextemp <10)
                    {
                        $mskhungtu=$mstu.'-'.'00'.$indextemp;
                        $name="$mskhungtu$indextemp";
                        $name=$_POST["$name"];
                          $column = new Columns;
                        if ($name !='')
                        {
                          $column->idColumn = $mskhungtu;
                          $column->name = $name;
                          $column->idPanel = $panel->id;
                          $column->save();
                        }
                        else
                        {
                          $column->idColumn = $mskhungtu;
                          $column->idPanel = $panel->id;
                          $column->save();

                        }
                    }
                    else if ($indextemp <100)
                    {
                        $mskhungtu=$mstu.'-'.'0'.$indextemp;
                        $name="$mskhungtu$indextemp";
                        $name=$_POST["$name"];
                        if ($name !='')
                        {
                          $column->idColumn = $mskhungtu;
                          $column->name = $name;
                          $column->idPanel = $panel->id;
                          $column->save();

                        }
                        else
                        {
                          $column->idColumn = $mskhungtu;
                          $column->idPanel = $panel->id;
                          $column->save();

                        }
                    }
                    else
                    {
                        $mskhungtu=$mstu.'-'.$indextemp;
                        $name="$mskhungtu$indextemp";
                        $name=$_POST["$name"];
                        if ($name !='')
                        {
                          $column->idColumn = $mskhungtu;
                          $column->name = $name;
                          $column->idPanel = $panel->id;
                          $column->save();

                        }
                        else
                        {
                          $column->idColumn = $mskhungtu;
                          $column->idPanel = $panel->id;
                          $column->save();

                        }

                    }
                }
             }
        }
          return redirect('project/createpanel.html')->with('success','Create new panel success!');
    }

    public function getlistpanel()
    {
       $customer = Customers::all();
        $project = Projects::all();
        return view('project.panel.list',['customer'=>$customer,'project'=>$project]);
    }


    public function getdeletepanel($id)
        {
            $panel = panels::where('id',$id);
            $panel->delete();
            return redirect('project/listpanel.html')->with('success','Delete  panel success!');
        }
    public function getexport(Request $request)
        {
          $idProject = $request->idProject;      
          $idOrder = $request->order;      
          $projectObj = Projects::where('id','=',$idProject)->first();
          $orderObj = Orders::where('id','=',$idOrder)->first();

          $msduan = $projectObj->idProject;
          $order  = $orderObj->idOrder;
          
          $tenduan = $projectObj->name;
          $sdt    = $orderObj->customers->phone;
          $mskh   = $orderObj->customers->idCustomer;
          $tencongty = $orderObj->customers->company;
          $mstutemp=$msduan.'-'.$mskh.'-'.$order;
          $panel = Panels::where('idPanel','like',"$mstutemp%")->get();
          if (count($panel) !='')
          {
            $objExcel = new PHPExcel;
            $objExcel->setActiveSheetindex(0);
            $sheet = $objExcel -> getActiveSheet() ->setTitle('sheet1');

            $rowCount =1;
            $sheet ->setCellValue('A'.$rowCount,'Project');
            $sheet ->setCellValue('B'.$rowCount,'Company');
            $sheet ->setCellValue('C'.$rowCount,'Name of Panel');
            $sheet ->setCellValue('D'.$rowCount,'Name of Column');
            $sheet ->setCellValue('E'.$rowCount,'Column ID');
            

            foreach ($panel as $tu)
            {
              $mstu = $tu->idPanel;
              $tentu = $tu->name;
              $idtu = $tu->id;
              $column = Columns::where('idPanel','=',$idtu)->get();
              foreach ($column as $row) 
              {
                $rowCount++;
                $sheet ->setCellValue('A'.$rowCount,$tenduan);
                $sheet ->setCellValue('B'.$rowCount,$tencongty);
                $sheet ->setCellValue('C'.$rowCount,$tentu);
                $sheet ->setCellValue('D'.$rowCount,$row->name);
                $sheet ->setCellValue('E'.$rowCount,$row->idColumn);
              }
            }
            $objWriter = new PHPExcel_Writer_Excel2007($objExcel);
            $filename = "ColumnID_Project-$tenduan.xlsx";
            $objWriter -> save($filename);
            ob_end_clean();
            header('Content-Disposition: attachment; filename="' . $filename . '"');
            header('Content-Type: application/vnd.openxmlformatsofficedocument.spreadsheetml.sheet');
            header('Content-Length: ' . filesize($filename));
            header('Content-Transfer-Encoding: binary');
            header('Cache-Control: must-revalidate');
            header('Pragma: no-cache');
            readfile($filename);
            ob_end_clean();
          }
            return redirect('project/listpanel.html')->with('success','Export  panel success!');
        }   
    public function geteditpanel()
          {
             $customer = Customers::all();
              $project = Projects::all();
              $paneltype= Panel_type::all();
              return view('project.panel.edit_panel',['customer'=>$customer,'project'=>$project,'paneltype'=>$paneltype]);
          } 

    public function posteditpanel(Request $request)
          {
          // variable in form edit pass to controller 
            $idPanel = $request->idPanel;  // id cua table panel
            $idPanelEdit= $request->idPaneledit;
            $name = $request->name;
            $type = $request->type;
            $numbercolumn = $request->col;
            $fat = $request->fat;
            $delivery = $request->delivery;
            $adjfat = $request->adjfat;
            $adjdelivery = $request->adjdelivery;
            $act = $request->act;

            $panelObj = Panels::where('id','=',$idPanel)->first();
            if ($name !="")
              $panelObj->name = $name;
             if ($idPanelEdit !="")
              $panelObj->idPanel = $idPanelEdit;
            if ($type !="")
              $panelObj->idPaneltype = $type;
            if ($fat !="")
              $panelObj->expectFat = $fat;
            if ($delivery !="")
              $panelObj->expectDelivery = $delivery;
            if ($adjfat !="")
              $panelObj->adjustFat = $adjfat;
            if ($adjdelivery !="")
              $panelObj->adjustDelivery = $adjdelivery;
            if ($act !="")
              $panelObj->Delivery = $act;
            // kiem tra xem neu khung tu ton tai roi thi k lam gi, neu chua thi insert vao
            if($numbercolumn !="")
            {
              for ($index = 1 ; $index <=$numbercolumn; $index++)
              {
                if ($index <10)
                {
                  $idColumn = $panelObj->idPanel.'-'.'00'.$index;
                  $columnObj = Columns::where('idColumn','=',$idColumn)->first();
                  if (count($columnObj)!=0);
                  else
                  {
                    $columnObj = new Columns;
                    $columnObj->idColumn = $idColumn;
                    $columnObj->idPanel  = $panelObj->id;
                    $columnObj->save();
                  }
                }
                else if ($index <100)
                {
                  $idColumn = $panelObj->idPanel.'-'.'0'.$index;
                  $columnObj = Columns::where('idColumn','=',$idColumn)->first();
                  if (count($columnObj)!=0);
                  else
                  {
                    $columnObj = new Columns;
                    $columnObj->idColumn = $idColumn;
                    $columnObj->idPanel  = $panelObj->id;
                    $columnObj->save();
                  }
                }
                else
                {
                  $idColumn = $panelObj->idPanel.'-'.$index;
                  $columnObj = Columns::where('idColumn','=',$idColumn)->first();
                  if (count($columnObj)!=0);
                  else
                  {
                    $columnObj = new Columns;
                    $columnObj->idColumn = $idColumn;
                    $columnObj->idPanel  = $panelObj->id;
                    $columnObj->save();
                  }
                }

              }
              // kiem tra neu du khung tu thi xoa di
              for ($index = $numbercolumn+1 ; $index <=1000; $index++)
              {
                if ($index <10)
                {
                  $idColumn = $panelObj->idPanel.'-'.'00'.$index;
                  $columnObj = Columns::where('idColumn','=',$idColumn)->first();
                  if (count($columnObj)!=0)
                  {
                    $columnObj->delete();
                   
                  }
                }
                else if ($index <100)
                {
                  $idColumn = $panelObj->idPanel.'-'.'0'.$index;
                  $columnObj = Columns::where('idColumn','=',$idColumn)->first();
                  if (count($columnObj)!=0)
                  {
                    $columnObj->delete();
                   
                  }
                }
                else
                {
                  $idColumn = $panelObj->idPanel.'-'.$index;
                  $columnObj = Columns::where('idColumn','=',$idColumn)->first();
                  if (count($columnObj)!=0)
                  {
                    $columnObj->delete();
                   
                  }
                }
              }

            }

            $panelObj->save();
            return redirect('project/editpanel.html')->with('success','Edit  panel success!');
          }

          //edit column
          public function geteditcolumn()
          {
             $customer = Customers::all();
              $project = Projects::all();
              $paneltype= Panel_type::all();
              return view('project.panel.edit_column',['customer'=>$customer,'project'=>$project,'paneltype'=>$paneltype]);
          } 
          public function geteditcolumn_action($idColumn,$idColumnNew,$name,$idPanel,$mode)
          {         
                if($mode ==1)
                {

                    $columnObj = new Columns;
                    $columnObj->idColumn = $idColumn;
                    if ($name !="xxx")
                    $columnObj->name = $name;
                    $columnObj->idPanel  = $idPanel;
                    $columnObj->save();
                    return 1;
                }
                else if ($mode ==2)
                {
                    $columnObj = Columns::where('id','=',$idColumn);
                    $columnObj->delete();
                    return 1;
                }
                else if ($mode ==3)
                {
                  //neu ma = xxx thi tuong tu gia tri null, vi URL get null se bi loi nen phai xai xxx xem nhu la 1 kieu dang null de check
                    if ($idColumnNew!="xxx" || $name !="xxx")
                    {
                      $columnObj = Columns::where('id','=',$idColumn)->first();
                      if ($idColumnNew !="xxx")
                        $columnObj->idColumn = $idColumnNew;
                      if ($name !="xxx")
                        $columnObj->name = $name;
                      $columnObj->idPanel  = $idPanel;
                      $columnObj->save();
                      return 1;
                      
                    }
                    else
                      return 0;

                }
          }
}
