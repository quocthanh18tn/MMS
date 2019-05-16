<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\User;

class UserController extends Controller
{
    //
    public function getlogin()
    {
        return view('login');
    }
    public function postlogin(Request $request)
    {
    	 if(Auth::attempt(['idManager'=>$request->id,'password'=>$request->password]))
        	{
                $user = Auth::user();
                if ($user->idType=='1')
                {
                    return redirect('administration/index.html')->with('success','Have a good day!');
                }
                else if($user->idType=='2')
                {
                    return redirect('project/index.html')->with('success','Have a good day!');
                }
                else if($user->idType=='3')
                {
                }

            }
        else
        		return redirect('login')->with('error','Wrong pass or id');
    }
 
    public function getlogout()
    {
        
        Auth::logout();
        return redirect('login')->with('success','See you later!!');

    }
    public function getchangepass()
    {
        return view('password.index');
    }
    public function postchangepass(Request $request)
    {
         $this->validate($request,
            [
                'newpassword1'=>'required',
                'newpassword2'=>'required|same:newpassword1',
            ],
            [
                'newpassword1.required' => 'Please enter password',
                'newpassword2.required' => 'Please enter password',
                'newpassword2.same' => 'Password does not match!! Try again!!',
            ]);
          $id = $request->id;
          $password = $request->oldpassword;

          $flag = User::where('idManager',$id)->orWhere('password',$password)->exists();
          if ($flag ==1)
          {
            //change pass
          $manager = User::where('idManager',$id)->first();
          $manager->password = bcrypt($request->newpassword1);
          $manager->save();

          }
          else
          {
          return redirect('changePass')->with('error','Wrong ID or Password!! Please try again');

          }

          return redirect('changePass')->with('success','Change password success!!');
    }
 
}



