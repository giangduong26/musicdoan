<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Song;
use App\Menu;
use App\Genres;
use App\Album;
use App\Singer;
use App\User_comment;

class SongController extends Controller
{
    //
    public function getList()
    {
    	// $album = Album::paginate(5); lấy ra 5 bản ghi
        $song = Song::orderBy('id_song','DESC')->get();
    	return view('admin.Song.listSong',['song'=>$song]);
    }
    public function getAdd()
    {
    	$menu = Menu::all();
    	$genres = Genres::all();
    	$album = Album::all();

    	return view('admin.Song.addSong',['menu'=>$menu,'genres'=>$genres,'album'=>$album]);
    }
    public function postAdd(Request $request)
    {
    	$this->validate($request,
    		[
    			'name' => 'required|min:3|max:100'
    		],
    		[
    			'name.required'=>'Bạn chưa nhập tên bài hát',
    			'name.min'=>'Kí tự >=3',
    			'name.max'=>'Kí tự <=100',
    		]);
    	$song = new Song;
    	$song->name_song = $request->name;
    	$song->slug_name = $request->slug_name;
    	$song->id_menu = $request->menu;
    	$song->id_genres = $request->genres;
    	$song->id_album = $request->album;
    	$song->view = $request->view;
    	$song->viewcountweek = $request->viewcountweek;
    	$song->national = $request->national;
    	$song->creator = $request->creator;
    	$song->lyric = $request->lyric;
    	$song->status = $request->status;
        $song->type = $request->type;
    	
    	if ($request->hasFile('image')) {
    		$file = $request->file('image');
    		$duoi = $file->getClientOriginalExtension();
    		if ($duoi != 'jpg' && $duoi != 'png') {
    			return redirect('admin/Song/addSong')->with('loi','Only pictures.OK!');
    		}
    		$name = $file->getClientOriginalName();
    		$nameimage = str_random(4)."_".$name;
    		while(file_exists("upload/image_video/".$name)){
    			$nameimage = str_random(4)."_".$name;
    		}
    		$file->move("upload/image_video",$nameimage);
    		$song->path_image = $nameimage;
    	}
    	else
    	{
    		$song->path_image = "";
    	}

    	$song->save();
    	return redirect('admin/Song/listSong')->with('thongbao','Add Success');

    }

    public function getEdit($id_song)
    {
    	$song = Song::find($id_song);
    	$menu = Menu::all();
    	$genres = Genres::all();
    	$album = Album::all();
        

    	return view('admin.Song.editSong',['song'=>$song,'menu'=>$menu,'genres'=>$genres,'album'=>$album]);
    }

    public function postEdit(Request $request,$id_song)
    {	
    	$song = Song::find($id_song);
    	$this->validate($request,
    		[
                'name' => 'required|min:2|max:100',
    		],
    		[
    			'name.required'=>'Bạn chưa nhập tên bài hát',
    			'name.min'=>'Kí tự >=3',
    			'name.max'=>'Kí tự <=100',
    		]);
    	$song->name_song = $request->name;
    	$song->slug_name = $request->slug_name;
    	$song->id_menu = $request->menu;
    	$song->id_genres = $request->genres;
    	$song->id_album = $request->album;
    	$song->view = $request->view;
    	$song->viewcountweek = $request->viewcountweek;
    	$song->national = $request->national;
    	$song->creator = $request->creator;
    	$song->lyric = $request->lyric;
    	$song->status = $request->status;
        $song->type = $request->type;
    	
    	if ($request->hasFile('image')) {
    		$file = $request->file('image');
    		$duoi = $file->getClientOriginalExtension();
    		if ($duoi != 'jpg' && $duoi != 'png') {
    			return redirect('admin/Song/editSong')->with('loi','Only pictures.OK!');
    		}
    		$name = $file->getClientOriginalName();
    		$nameimage = str_random(4)."_".$name;
    		while(file_exists("upload/image_video/".$name)){
    			$nameimage = str_random(4)."_".$name;
    		}
    		$file->move("upload/image_video",$nameimage);

    		// unlink("upload/image_video/".$song->path_image);
    		$song->path_image = $nameimage;
    	}

    	$song->save();
    	return redirect('admin/Song/listSong')->with('thongbao','Edit Success');
    }

    public function getDel($id_song)
    {
        $song = Song::find($id_song);
        $song->delete();

        return redirect('admin/Song/listSong')->with('thongbao','Delete Success');
    }
}
