<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Menu;
class MenuController extends Controller
{
    //
    public function getList()
    {
    	$menu = Menu::all();
    	return view('admin.Menu.listMenu',['menu'=>$menu]);
    }

    public function getAdd()
    {
    	return view('admin.Menu.addMenu');
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
    	$menu = new Menu;
    	$menu->name_mn = $request->name;

    	$menu->save();
    	return redirect('admin/Menu/listMenu')->with('thongbao','Add Success');
    }

    public function getEdit($id_menu)
    {
    	$menu = Menu::find($id_menu);
    	return view('admin.Menu.editMenu',['menu'=>$menu]);
    }

    public function postEdit(Request $request,$id_menu)
    {
    	$menu = Menu::find($id_menu);
        $this->validate($request,
            [
                'name' =>'required|unique:menu,name_mn'
            ],
            [
                'name.required'=>'Bạn chưa nhập tên menu',
                'name.unique'=>'Tên này đã tồn tại',
            ]);
        $menu->name_mn = $request->name;

        $menu->save();
        // return redirect('admin/Album/editAlbum/'.$id_album)->with('thongbao','Edit Success');
        return redirect('admin/Menu/listMenu')->with('thongbao','Edit Success');
    }

    public function getDel($id_menu)
    {
        $menu = Menu::find($id_menu);
        $menu->delete();

        return redirect('admin/Menu/listMenu')->with('thongbao','Delete Success');
    }
}
