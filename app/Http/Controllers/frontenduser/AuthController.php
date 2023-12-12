<?php

namespace App\Http\Controllers\frontenduser;
use App\Http\Controllers\Controller;
use App\Models\Frontend\Authentication;
use Illuminate\Http\Request;
use App\Http\Requests\FrontendUser\Auth\SignupRequest;
use App\Http\Requests\FrontendUser\Auth\SigninRequest;
use Exception;
use Illuminate\Support\Facades\Hash;
use Toastr;

class AuthController extends Controller
{
    /**
     * Display a listing of the resource.
     */
   public function signUpForm(){
        return view('frontenduser.auth.register');
    }

    public function signUpStore(SignupRequest $request){
        try{
            $user=new Authentication;
            $user->name=$request->name;
            $user->email=$request->email;
            $user->contact=$request->contact;
            $user->password=Hash::make($request->password);
            if($user->save())
                return redirect('frontenduser/login')->with('success','Successfully Registred');
            else
                return redirect('frontenduser/login')->with('danger','Please try again');
        }catch(Exception $e){
            //dd($e);
            return redirect('frontenduser/login')->with('danger','Please try again');;
        }
    }

    public function signInForm(){
        return view('frontenduser.auth.login');
    }

    public function signInCheck(SigninRequest $request){
        try{
            $user=Authentication::where('contact',$request->username)
                        ->orWhere('email',$request->username)->first();
            if($user){
                if(Hash::check($request->password , $user->password)){
                    $this->setSession($user);
                    return redirect()->route('user.dashboard')->with('success','Successfully login');
                }else
                    return redirect()->route('frontenduser.auth.login')->with('error','Your phone number or password is wrong!');
            }else
                return redirect()->route('frontenduser.auth.login')->with('error','Your phone number or password is wrong!');
        }catch(Exception $e){
            //dd($e);
            return redirect()->route('frontenduser.auth.login')->with('error','Your phone number or password is wrong!');
        }
    }

    public function setSession($user){
        return request()->session()->put([
                'userId'=>encryptor('encrypt',$user->id),
                'userName'=>encryptor('encrypt',$user->name),
                'userEmail'=>encryptor('encrypt',$user->email)
            ]
        );
    }

    public function signOut(){
        request()->session()->flush();
        return redirect('/')->with('danger','Succfully Logged Out');
    }
}
