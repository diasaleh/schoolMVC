<?php
/**
 * Created by PhpStorm.
 * User: Mazen
 * Date: 4/30/2016
 * Time: 11:55 PM
 */

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class loginController extends Controller {


    public function getLogin(){
        if(Auth::check()){
            $user= Auth::user();
            if($user->type=='admin'){
                return redirect()->route('adminFirst');
            }
            if($user->type=='teacher') {
                return redirect()->route('teacherFirst');
            }
            if($user->type=='student'){
                return redirect()->route('studentFirst');
            }
            if($user->type=='supervisor'){
                return redirect()->route('supervisorFirst');
            }
        }
        return view('login');
    }

    public function postLogin(Request $request){
        $this->validate($request,[
            'inputName' => 'required', 'inputPassword' => 'required'
        ]);

        if(!Auth::attempt(['id'=>$request['inputName'],'password'=>$request['inputPassword']])){
          return redirect()->back()->with(['fail'=>'Could not login you']);
        }
        $user= Auth::user();
        if($user->type=='admin'){
            return redirect()->route('adminFirst');
        }
        if($user->type=='teacher'){
            return redirect()->route('teacherFirst');
        }
        if($user->type=='student'){
            return redirect()->route('studentFirst');
        }
        if($user->type=='supervisor') {
            return redirect()->route('supervisorFirst');
        }
    }
}