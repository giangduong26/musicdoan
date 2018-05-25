<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;
// use Auth;
use App\User;


class UserController extends Controller
{
    //
    public function getList()
    {
    	// $album = Album::paginate(5); lấy ra 5 bản ghi
        $user = User::all();
    	return view('admin.User.listUser',['user'=>$user]);
    }

    public function getAdd()
    {
        $user = User::all();
    	return view('admin.User.addUser',['user'=>$user]);
    }

    public function postAdd(Request $request)
    {
    	$this->validate($request,
    		[
    			'name' => 'required|min:3'
    		],
    		[
    			'name.required'=>'Bạn chưa nhập tên user',
    			'name.min'=>'Kí tự >=3',

    		]);
    	$user = new User;
    	$user->name = $request->name;
    	$user->lvl = $request->lvl;
    	$user->email = $request->email;
    	$user->password = bcrypt($request->password);
    	$user->phone = $request->phone;
    	$user->address = $request->address;
    
    	if ($request->hasFile('imageuser')) {
            $file = $request->file('imageuser');
            $duoi = $file->getClientOriginalExtension();
            if ($duoi != 'jpg' && $duoi != 'png') {
                return redirect('admin/User/editUser')->with('loi','Only pictures.OK!');
            }
            $name = $file->getClientOriginalName();
            $nameimage = str_random(4)."_".$name;
            while(file_exists("upload/image/".$name)){
                $nameimage = str_random(4)."_".$name;
            }
            $file->move("upload/image",$nameimage);

            // unlink("upload/image_video/".$song->path_image);
            $user->image = $nameimage;
        }
        else{
            $user->image = "";
        }

    	$user->save();
    	return redirect('admin/User/listUser')->with('thongbao','Add Success');
    }

    public function getEdit($id_user)
    {
        $user = User::find($id_user);
    	return view('admin.User.editUser',['user'=>$user]);
    }

    public function postEdit(Request $request,$id_user)
    {
        $user = User::find($id_user);
        $this->validate($request,
            [
                'name' =>'required|unique:users,name'
            ],
            [
                'name.required'=>'Name already exists!',
                'name.unique'=>'Name already exists!',
            ]);

        $user->name = $request->name;
    	$user->lvl = $request->lvl;
    	$user->email = $request->email;
    	$user->phone = $request->phone;
    	$user->address = $request->address;
    	if($request->changePassword == "on")
    	{	
    		$this->validate($request,
    			[
    				'password' => 'required|min:3|max:32',
    				'passwordAgain' =>'required|same:password'
    			]
    			,
    			[
    				'password.required' => "bạn chưa nhập mật khẩu",
    				'password.min' => 'password >= 3 kí tự',
    				'password.max' => 'password <= 32',
    				'passwordAgain.same' => 'Mật khẩu nhập lại chưa khớp'
    			]);
    		$user->password = bcrypt($request->password);
        }
        
       	if ($request->hasFile('imageuser')) {
            $file = $request->file('imageuser');
            $duoi = $file->getClientOriginalExtension();
            if ($duoi != 'jpg' && $duoi != 'png') {
                return redirect('admin/User/editUser')->with('loi','Only pictures.OK!');
            }
            $name = $file->getClientOriginalName();
            $nameimage = str_random(4)."_".$name;
            while(file_exists("upload/image/".$name)){
                $nameimage = str_random(4)."_".$name;
            }
            $file->move("upload/image",$nameimage);

            // unlink("upload/image_video/".$song->path_image);
            $user->image = $nameimage;
        }

        $user->save();
        return redirect('admin/User/listUser')->with('thongbao','Edit Success');
    }

    public function getProfile($id_user)
    {
         $user = User::find($id_user);
        return view('admin.User.profileuser',['user'=>$user]);
    }

    public function getDel($id_user)
    {
        $user = User::find($id_user);
        $user->delete();

        return redirect('admin/User/listUser')->with('thongbao','Delete Success');
    }

    public function getloginAdmin()
    {
        return view('admin.login');
    }

    public function postloginAdmin(Request $request)
    {
        // $this->validate($required,
        //     [
        //         'email' =>'required',
        //         'password' =>'required|min:3|max:32'
        //     ],
        //     [
        //         'email.required' => 'Bạn chưa nhập Email',
        //         'password.required' => 'Bạn chưa nhập Password',
        //         'password.min' => 'password >= 3 kí tự',
        //         'password.max' => 'password <= 32',
        //     ]);
        if(Auth::attempt(['email'=>$request->email,'password'=>$request->password]))
        {
            return redirect('home');
        }
        else
        {
            return redirect('admin/login')->with('loi', 'Đăng nhập thất bại');
        }
    }
    public function getlogoutAdmin()
    {
        Auth::logout();
        return redirect('admin/login');
    }
}
