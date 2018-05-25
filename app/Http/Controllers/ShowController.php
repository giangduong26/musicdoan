<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Song;
use App\Singer;
use App\Singer_show;

class ShowController extends Controller
{
    //
    public function getList()
    {
        $show = Singer_show::all();
    	return view('admin.Singer_show.listShow',['show'=>$show]);
    }
    public function getAdd()
    {
    	$song = Song::all();
    	$singer = Singer::all();

    	return view('admin.Singer_show.addShow',['song'=>$song,'singer'=>$singer]);
    }
    public function postAdd(Request $request)		
    {
    	$this->validate($request,
    		[
    			'pathsong'=>'required',
    		],
    		[
    			
    			'pathsong.required'=>'Bạn chưa tải bài hát lên',

    		]);
    	$show = new Singer_show;
    	$show->id_song = $request->song;
    	$show->id_singer = $request->singer;

    	$fileadd = $request->pathsong;
        $fileadd->move('upload/file', 'upload/file/'.$fileadd->getClientOriginalName());

        $show->path = $fileadd->getClientOriginalName();

        // if ($request->pathsong->getClientOriginalExtension() == 'mp4') {
        //     $imagevideo = $request->song->path_image;
        //     $imagevideo->move('upload/image_video', 'upload/image_video/'.$imagevideo->getClientOriginalName());
        //     $show->song->path_image = 'upload/image_video/'.$imagevideo->getClientOriginalName();
        // }

        $show->save();
        return redirect('admin/Singer_show/listShow')->with('thongbao','Add Success');
    }
    public function getEdit($id_show)
    {
    	$show = Singer_show::find($id_show);
    	$song = song::all();
    	$singer = singer::all();

    	return view('admin.Singer_show.editShow',['song'=>$song,'show'=>$show,'singer'=>$singer]);
    }

    public function postEdit(Request $request,$id_show)
    {
    	$show = Singer_show::find($id_show);
    	$this->validate($request,
    		[
    			'pathsong'=>'required',
    		],
    		[    			
    			'pathsong.required'=>'Bạn chưa tải bài hát lên',
    		]);
    	$show->id_song = $request->song;
    	$show->id_singer = $request->singer;

    	$fileadd = $request->pathsong;
        $fileadd->move('upload/file', 'upload/file/'.$fileadd->getClientOriginalName());

        $show->path = $fileadd->getClientOriginalName();

        // if ($request->pathsong->getClientOriginalExtension() == 'mp4') {
        //     $imagevideo = $request->song->path_image;
        //     $imagevideo->move('upload/image_video', 'upload/image_video/'.$imagevideo->getClientOriginalName());
        //     $show->song->path_image = 'upload/image_video/'.$imagevideo->getClientOriginalName();
        // }

        $show->save();
        return redirect('admin/Singer_show/listShow')->with('thongbao','Add Success');
    }

    public function getDel($id_show)
    {
    	$show = Singer_show::find($id_show);
    	$show->delete();

    	return redirect('admin/Singer_show/listShow')->with('thongbao','Delete Success');
    }
}
