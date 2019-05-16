<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Employees;
use App\User;
use App\Holiday;
use DateTime;
use PHPExcel_IOFactory;
class AdministrationController extends Controller
{
    //
    public function index()
    {
        return view('administration.index');
    }

    public function getcreate()
    {
      $employee = Employees::all();
        return view('administration.create',['employee'=>$employee]);
    }

    public function postcreate(Request $request)
    {
        if ($request->input('submit')!="")
        {
            $this->validate($request,
            [
                'id'=>'required|unique:users,idManager',
            ],
            [
                'id.unique' => 'ID is existed',
            ]);
          $manager = new User;
          $manager->idManager = $request->id;
          $manager->idType = $request->idtype;
          $manager->email = $request->email;
          $manager->name = $request->name;
          $manager->password = bcrypt($request->password);
          $manager->nameType = $request->nametype;
          $manager->created_at = new DateTime();

          $manager->save();
          return redirect('administration/create.html')->with('success','Create new manager success!');
        }
        if ($request->input('submit2')!="")
        {
           $this->validate($request,
                [
                    'idemp'=>'required|unique:employees,idEmployee',
                    'dep'=>'required',
                    'subdep'=>'required',
                ],
                [
                    'idemp.unique' => 'ID is existed',
                    'dep.required' => 'Choose dep please',
                    'subdep.required' => 'Choose subdep please',
                ]);
              $employee = new Employees;
              $employee->idEmployee = $request->idemp;
              $employee->name = $request->nameemp;
              $employee->dep = $request->dep;
              $employee->subdep = $request->subdep;
              $employee->created_at = new DateTime();

              $employee->save();
              return redirect('administration/create.html')->with('success','Create new employee success!');
        }   
        if ($request->input('submit3')!="")
        {
            if ($request->hasFile('file'))
                {
                    $file = $request->file('file');
                    $duoi = $file->getClientOriginalExtension();
                    if($duoi!='xls' && $duoi!='xlsx')
                    {
                        return redirect('administration/create.html')->with('error','Wrong file name');   
                     }
                     else
                     {
                        

                        $objReader = PHPExcel_IOFactory::createReaderForFile($file);
                        $sheetnames = $objReader->listWorksheetNames($file);
                        $objReader->setLoadSheetsOnly($sheetnames);
                        $objReader->setLoadSheetsOnly($sheetnames[0]);
                        $objExcel = $objReader -> load($file);
                        $sheetData = $objExcel -> getActiveSheet() -> toArray('null',true,true,true);
                        $highestRow = $objExcel -> setActiveSheetIndex() -> getHighestRow();
                        $flag =0;
                        for ($row =1 ;$row <= $highestRow;$row++)
                        {
                            $checknameemployee=$sheetData[$row]['A'];
                            if ($checknameemployee == "EmployeeName")
                            {
                              $flag =1;
                              continue;
                            }
                            if ($flag ==1)
                            {
                              $employee = new Employees;
                              $idname =$sheetData[$row]['A'];
                              $id=substr($idname,0,4);
                              $name=substr($idname,5);
                              $employee->idEmployee = $id;
                              $checkemployee= Employees::where('idEmployee',$id)->exists();
                              if($checkemployee==0)
                              {
                                  $employee->name = $name ;
                                  $employee->dep = $sheetData[$row]['B'];
                                  $employee->subdep = $sheetData[$row]['C'];
                                  $employee->created_at = new DateTime();
                                  $employee->save();
                              }
                            }
                        }
                        //need to file exactly to inser database
                         return redirect('administration/create.html')->with('success','Import success!');
                    }
                }
        }
    }

    public function getlistmanager()
    {
        return view('administration.manager');
    }

    public function page_listmanager(Request $request)
    {
       if ($request->input('button2')!="")
       {
            $request->search = "";
       }
            $search = $request->search;
            $manager = User::where('idManager','like',"%$search%")->orWhere('idType','like',"%$search%")->orWhere('nameType','like',"%$search%")->orWhere('name','like',"%$search%")->orWhere('email','like',"%$search%")->paginate(10);
            return view('administration.manager',['manager'=>$manager]);
   }

    public function getdelete($id)
        {
            $manager = User::where('id',$id);
            $manager->delete();
            return redirect('administration/listmanager.html')->with('success','Delete  manager success!');
        }

    public function getadjustmanager($id)
    {
        $manager = User::where('id',$id)->first();
        return view('administration.adjustmanager',['manager'=>$manager]);
    }

    public function postadjustmanager(Request $request,$id)
    {
       if ($request->input('submit')!="")
        {
           $this->validate($request,
            [
                'id'=>'required|unique:users,idManager,'.$id,
            ],
            [
                'id.unique' => 'ID is existed',
            ]);  
          $manager = User::where('id',$id)->first();
          $manager->idManager = $request->id;
          $manager->idType = $request->idtype;
          $manager->name = $request->name;
          $manager->email = $request->email;
          $manager->nameType = $request->nametype;
          $manager->created_at = new DateTime();

          $manager->save();
          return redirect('administration/listmanager.html')->with('success','Update  manager success!');
        }

    }
    //employee
    public function getlistemployee()
    {
        return view('administration.employee');
    }

    public function page_listemployee(Request $request)
    {
       if ($request->input('button2')!="")
       {    
         $request->search="";
       }
            $search = $request->search;
            $employee = Employees::where('idEmployee','like',"%$search%")->orWhere('name','like',"%$search%")->orWhere('dep','like',"%$search%")->orWhere('subdep','like',"%$search%")->paginate(10);
            return view('administration.employee',['employee'=>$employee]);
    }

    public function getdeleteemployee($id)
    {
            $employee = Employees::where('id',$id)->first();
            $employee->delete();
            return redirect('administration/listemployee.html')->with('success','Delete  employee success!');;
    }

    public function getadjustemployee($id)
    {
        $employee = Employees::where('id',$id)->first();
        $employeefull = Employees::all();
        return view('administration.adjustemployee',['employee'=>$employee,'employeefull'=>$employeefull]);
    }

    public function postadjustemployee(Request $request,$id)
    {
       if ($request->input('submit2')!="")
        {
         $this->validate($request,
            [
                'idemp'=>'required|unique:employees,idEmployee,'.$id,
            ],
            [
                'idemp.unique' => 'ID is existed',
            ]);     
          $employee = Employees::where('id',$id)->first();
          // echo $employee->idemployee;
          // echo $employee->idType;
          $employee->idEmployee = $request->idemp;
          $employee->name = $request->nameemp;
          $employee->dep = $request->dep;
          $employee->subdep = $request->subdep;
          $employee->created_at = new DateTime();

          $employee->save();
          return redirect('administration/listemployee.html')->with('success','Update  employee success!');
        }

   }
   //setting holiday
    public function getaddholiday()
    {
      $holiday = Holiday::all();
      return view('administration.holiday',['holiday'=>$holiday]);
    }

    public function postaddholiday(Request $request)
    {
         if ($request->input('add')!="")
        {
            
          $holiday = new Holiday;
          $holiday->name = $request->name;
          $holiday->date = $request->date;
          $holiday->created_at = new DateTime();

          $holiday->save();
          return redirect('administration/addholiday.html')->with('success','Create new holiday success!');
        }
    }

    public function getdeleteholiday($id)
    {
          $holiday = Holiday::where('id',$id)->first();
          $holiday->delete();
          return redirect('administration/addholiday.html')->with('success','Delete  holiday success!');
    }
  
}


