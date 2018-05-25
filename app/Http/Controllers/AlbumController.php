<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;

use App\Singer;
use App\Album;

class AlbumController extends Controller
{
    //
    public function getList()
    {
    	// $album = Album::paginate(5); lấy ra 5 bản ghi
        $album = Album::all();
    	return view('admin.Album.listAlbum',['album'=>$album]);
    }

    public function getAdd()
    {
        $singer = Singer::all();
    	return view('admin.Album.addAlbum',['singer'=>$singer]);
    }

    public function postAdd(Request $request)
    {
    	$this->validate($request,
    		[
    			'name' => 'required|min:3|max:100'
    		],
    		[
    			'name.required'=>'Bạn chưa nhập tên Album',
    			'name.min'=>'Kí tự >=3',
    			'name.max'=>'Kí tự <=100',
    		]);
    	$album = new Album;
    	$album->name = $request->name;
    	$album->year_release = $request->year;
    	$album->id_singer = $request->singer;
        $album->hot = $request->hot;
    	if ($request->hasFile('imagealbum')) {
            $file = $request->file('imagealbum');
            $duoi = $file->getClientOriginalExtension();
            if ($duoi != 'jpg' && $duoi != 'png') {
                return redirect('admin/Album/editAlbum')->with('loi','Only pictures.OK!');
            }
            $name = $file->getClientOriginalName();
            $nameimage = str_random(4)."_".$name;
            while(file_exists("upload/image_video/".$name)){
                $nameimage = str_random(4)."_".$name;
            }
            $file->move("upload/image_video",$nameimage);

            // unlink("upload/image_video/".$song->path_image);
            $album->image = $nameimage;
        }
        else{
            $album->image = "";
        }

    	$album->save();
    	return redirect('admin/Album/listAlbum')->with('thongbao','Add Success');
    }

    public function getEdit($id_album)
    {
        $album = Album::find($id_album);
        $singer = Singer::all();
    	return view('admin.Album.editAlbum',['album'=>$album,'singer'=>$singer]);
    }

    public function postEdit(Request $request,$id_album)
    {
        $album = Album::find($id_album);
        $this->validate($request,
            [
                'name' =>'required|unique:album,name'
            ],
            [
                'name.required'=>'Bạn chưa nhập tên Album',
                'name.unique'=>'Tên Album đã tồn tại',
            ]);
        $album->name = $request->name;
        $album->year_release = $request->year;
        $album->id_singer = $request->singer;
        $album->hot = $request->hot;
        
        if ($request->hasFile('imagealbum')) {
            $file = $request->file('imagealbum');
            $duoi = $file->getClientOriginalExtension();
            if ($duoi != 'jpg' && $duoi != 'png') {
                return redirect('admin/Album/editAlbum')->with('loi','Only pictures.OK!');
            }
            $name = $file->getClientOriginalName();
            $nameimage = str_random(4)."_".$name;
            while(file_exists("upload/image_video/".$name)){
                $nameimage = str_random(4)."_".$name;
            }
            $file->move("upload/image_video",$nameimage);

            // unlink("upload/image_video/".$song->path_image);
            $album->image = $nameimage;
        }

        $album->save();
        return redirect('admin/Album/listAlbum')->with('thongbao','Edit Success');
    }

    public function getDel($id_album)
    {
        $album = Album::find($id_album);
        $album->delete();

        return redirect('admin/Album/listAlbum')->with('thongbao','Delete Success');
    }
}
