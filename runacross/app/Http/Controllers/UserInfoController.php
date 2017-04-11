<?php

namespace App\Http\Controllers;

use App\User;
use App\Util\FileUploader;
use Illuminate\Http\Request;
use Log;

class UserInfoController extends Controller
{

    protected $User;
    protected $FileUploader;

    public function __construct(User $user, FileUploader $fileUploader )
    {

        $this->User=$user;
        $this->FileUploader = $fileUploader;
    }



    public function getUserInfo($userId){

        return view('user_profile');
    }

    public function updateUserInfo(Request $request,$userId){
        $inputs = $request->all();
        Log::info($inputs);

        $user = User::find($userId);
        if($user!=null){
            $result = true;
        }else{
            $result=false;
        }

        $file_name = $this->FileUploader->uploadPicture();

        if($file_name==null){
            $user->avatar = null;
            Log::info("file_name:".$file_name);
            $result=false;
        }else{
            $user->avatar = $this->FileUploader->getFilePathByFileName($file_name);
        }

        $nick_name = $inputs['nick_name'];
        $birthday = $inputs['birthday'];
        $email = $inputs['email'];
        $pattern = "/^([0-9A-Za-z\\-_\\.]+)@([0-9a-z]+\\.[a-z]{2,3}(\\.[a-z]{2})?)$/i";
        if ( !preg_match( $pattern, $email ) ){
            return ['result'=>false,'info'=>'请输入正确的邮箱格式' ];
        }
        $bio = $inputs['bio'];

        $user->nick_name = $nick_name;
        $user->birthday =$birthday;
        $user->email = $email;
        $user->biography=$bio;

        $user->save();
        $request->session()->forget('user');
        $request->session()->put('user',$user);

        Log::info($user);

        return redirect('/user/'.$userId.'/userInfo');
    }


}
