<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Singer;

class SingerController extends Controller
{
    //
    public function getList()
    {
    	$singer = Singer::all();
    	return view('admin.Singer.listSinger',['singer'=>$singer]);
    }

    public function getAdd()
    {
    	return view('admin.Singer.addSinger');
    }

    public function postAdd(Request $request)
    {
        $this->validate($request,
            [
                'name' => 'required|min:3|max:100'
            ],
            [
                'name.required'=>'Bạn chưa nhập tên singer',
                'name.min'=>'Kí tự >=3',
                'name.max'=>'Kí tự <=100',
            ]);
        $singer = new Singer;
        $singer->name = $request->name ;
        $singer->nickname = $request->nickname;
        $singer->birthday = $request->birthday;
        $singer->national = $request->national;
        $singer->introduct = $request->introduct;
        if ($request->hasFile('imagesinger')) {
            $file = $request->file('imagesinger');
            $duoi = $file->getClientOriginalExtension();
            if ($duoi != 'jpg' && $duoi != 'png') {
                return redirect('admin/Singer/addSinger')->with('loi','Only pictures.OK!');
            }
            $name = $file->getClientOriginalName();
            $nameimage = str_random(4)."_".$name;
            while(file_exists("upload/image/".$name)){
                $nameimage = str_random(4)."_".$name;
            }
            $file->move("upload/image",$nameimage);
            $singer->image = $nameimage;
        }
        else
        {
            $singer->image = "";
        }

        $singer->save();
        return redirect('admin/Singer/listSinger')->with('thongbao','Add Success');
    }

    public function getEdit($id_singer)
    {
        $singer = Singer::find($id_singer);
    	return view('admin.Singer.editSinger',['singer'=>$singer]);
    }

    public function postEdit(Request $request,$id_singer)
    {
        $singer = Singer::find($id_singer);
        $this->validate($request,
            [
                'name' =>'required|unique:album,name'
            ],
            [
                'name.required'=>'Bạn chưa nhập tên ca sĩ',
                'name.unique'=>'Tên ca sĩ đã tồn tại',
            ]);
        $singer->name = $request->name;
        $singer->nickname = $request->nickname;
        $singer->birthday = $request->birthday;
        $singer->national = $request->national;
        $singer->introduct = $request->introduct;
        if ($request->hasFile('imagesinger')) {
            $file = $request->file('imagesinger');
            $duoi = $file->getClientOriginalExtension();
            if ($duoi != 'jpg' && $duoi != 'png') {
                return redirect('admin/Singer/editSinger')->with('loi','Only pictures.OK!');
            }
            $name = $file->getClientOriginalName();
            $nameimage = str_random(4)."_".$name;
            while(file_exists("upload/image/".$name)){
                $nameimage = str_random(4)."_".$name;
            }
            $file->move("upload/image",$nameimage);

            // unlink("upload/image_video/".$song->path_image);
            $singer->image = $nameimage;
        }

        $singer->save();
        return redirect('admin/Singer/listSinger')->with('thongbao','Edit Success');
    }
    public function getDel($id_singer)
    {
        $singer = Singer::find($id_singer);
        $singer->delete();

         return redirect('admin/Singer/listSinger')->with('thongbao','Delete Success');
    }
}
