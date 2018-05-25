<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Genres;
class GenresController extends Controller
{
    //
    public function getList()
    {
    	$genres = Genres::all();
    	return view('admin.Genres.listGenres',['genres'=>$genres]);
    }

    public function getAdd()
    {
    	return view('admin.Genres.addGenres');
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
    	$genres = new Genres;
    	$genres->name_genres = $request->name;

    	$genres->save();
    	return redirect('admin/Genres/listGenres')->with('thongbao','Add Success');
    }

    public function getEdit($id_genres)
    {
    	$genres = Genres::find($id_genres);
    	return view('admin.Genres.editGenres',['genres'=>$genres]);
    }

    public function postEdit(Request $request,$id_genres)
    {
    	$genres = Genres::find($id_genres);
        $this->validate($request,
            [
                'name' =>'required|unique:album,name'
            ],
            [
                'name.required'=>'Bạn chưa nhập tên thể loại',
                'name.unique'=>'Tên thể loại đã tồn tại',
            ]);
        $genres->name_genres = $request->name;

        $genres->save();
        // return redirect('admin/Album/editAlbum/'.$id_album)->with('thongbao','Edit Success');
        return redirect('admin/Genres/listGenres')->with('thongbao','Edit Success');
    }

    public function getDel($id_genres)
    {
        $genres = Genres::find($id_genres);
        $genres->delete();

        return redirect('admin/Genres/listGenres')->with('thongbao','Delete Success');
    }
}
