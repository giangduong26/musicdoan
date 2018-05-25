<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Menu;
use App\Genres;
use App\Album;
use App\Song;
use App\Singer;
use App\Singer_show;
use App\User_favorite;
use App\User;
use App\User_comment;
use Redirect;
use Session;
use Illuminate\Support\Facades\URL;
class pagesController extends Controller
{
    //
	public function __construct()
	{
		$genres = Genres::all();
    	$menu = Menu::all();
    	$album = Album::all();
    	$singer = Singer::all();
    	$song = Song::all();
        $lsong = Song::where('type','0')->orderByDesc('id_song')->take(10)->get();
        $mp4 = Song::where('type','1')->take(8)->get();

    	view()->share('genres',$genres);
    	view()->share('menu',$menu);
    	view()->share('song',$song);
    	view()->share('album',$album);
    	view()->share('singer',$singer);
        view()->share('lsong',$lsong);
        view()->share('mp4',$mp4);
	}

    public function trangchu()
    {
    	return view('pages.trangchu');
    }

    public function genres()
    {
    	return view('pages.trangchu');
    }

    public function song()
    {
        $songs = Song::where('type','0')->Paginate(4); 
    	return view('pages.song',['songs'=>$songs]);
    }

    public function playsong(Request $request)
    {
        //lấy kiểu định dạng giống nhau
        $songs = Song::where('id_song',$request->song)->where('type','0')->Paginate(4);
        $show = Singer_show::where('id_song',$request->song)->where('id_show',$request->show)->get();
        view()->share('show',$show);
        return view('pages.song',['songs'=>$songs, 'show' =>$show]);
    }

    public function album()
    {
    	$albums = Album::Paginate(16);
    	return view('pages.album',['albums'=>$albums]);
    }

    public function detailAlbum($id_album)
    {
    	$detailalbum = Album::find($id_album);
    	$song = Album::where('id_album',$detailalbum->id_album)->take(5)->get();
    	return view('pages.detailAlbum',['detailalbum'=>$detailalbum,'song'=>$song]);
    }

    public function albumsong(Request $request)
    {
		$detailalbum = Album::find($request->id_album);
    	$showsongalbum = Singer_show::where('id_song',$request->song)->where('id_singer',$request->singer)->get();
        $view = Song::find($request->song);
        $view->view = $view->view+1;
        $view->save();
    	view()->share('showsongalbum',$showsongalbum);
    	return view('pages.detailAlbum',['detailalbum'=>$detailalbum, 'showsongalbum' =>$showsongalbum]);
    }

    public function singer()
    {
        $singers = Singer::Paginate(16);
    	return view('pages.singer',['singers'=>$singers]);
    }

    public function detailSinger($id_singer)
    {
    	$detailsinger = Singer::find($id_singer);
    	$al = Album::where('id_singer', $detailsinger->id_singer)->take(4)->get();
    	return view('pages.detailSinger',['detailsinger'=>$detailsinger,'al'=>$al]);
    }

    public function singersong($id_show,$id_singer)
    {
		$detailsinger = Singer::find($id_singer);
    	$showw = Singer_show::find($id_show);
    	$al = Album::where('id_singer', $detailsinger->id_singer)->take(4)->get();
    	view()->share('showw',$showw);
    	return view('pages.detailSinger',['detailsinger'=>$detailsinger, 'al'=>$al, 'showw' =>$showw]);
    }

    public function addToPlaylist($id_song,Request $request)
    {
    	if(Auth::check()){
	    	if(count(User_favorite::where('id_user',Auth::user()->id_user)->where('id_song',$id_song)->get()) > 0){
	    		return redirect()->back()->with('loi', 'Song already exists in your playlist!');;
	    	}
	    	else
	    	{
	    		$list = new User_favorite;
		    	$list->id_user = Auth::user()->id_user;
		    	$list->id_song = $id_song;
		    	$list->save();
		    	return redirect()->back()->with('thanhcong', 'Add the song to your playlist successfully !!!');;
	    	}
    	}
    	else
    	{
    		return redirect()->back()->with('loi', 'Please sign in  !!!');
    	}	
    }

    public function delToPlaylist($id_favorite)
    {
        $list = User_favorite::find($id_favorite);
        $list->delete();

        return redirect()->back()->with('thanhcong','You have remove a song success!');
    }

    public function getplayList($id)
    {
    	$list = User_favorite::where('id_user',$id)->get();
    	return view('pages.playList',['list'=>$list]);
    }

    public function postplayList(Request $request)
    {
        $list = User_favorite::where('id_user',Auth::user()->id_user)->get();
        $postplayList = Singer_show::where('id_song',$request->song)->where('id_singer',$request->singer)->get();
        view()->share('postplayList',$postplayList);
        return view('pages.playList',['list'=>$list]);
    }

    public function listright(Request $request)
    {

        $rlist = Singer_show::where('id_song',$request->song)->where('id_singer',$request->singer)->get();
        $view = Song::find($request->song);
        $view->view = $view->view+1;
        $view->save();
        view()->share('rlist',$rlist);
        return view('pages.trangchu',['rlist'=>$rlist]);
    }

    public function postlogin(Request $request)
    {
        Session::put('url.intended', URL::previous());
    	$this->validate($request,[
    		'email' => 'required',
    		'password' => 'required|min:3|max:32'
    	],
    	[
    		'email.required'=>'Bạn chưa nhập Email',
    		'password.required'=>'Bạn chưa nhập password',
    		'password.min'=>'Password không được nhỏ hơn 3 kí tự',
    		'password.max'=>'Password không được lớn hơn 32 kí tự'
    	]);
    	if(Auth::attempt(['email'=>$request->email,'password'=>$request->password]))
        {            
            return Redirect::to(Session::get('url.intended'));
        }
        else
        {
            return redirect('indexx')->with('loi', 'Đăng nhập thất bại');
        }
    }

    public function getlogout()
    {
    	Session::put('url.intended', URL::previous());
        Auth::logout();
        return Redirect::to(Session::get('url.intended'));
    }
    
    public function search(Request $request)        
    {
        $search = $request->search;
        $searchsong = Song::where('name_song', 'like', "%$search%")->Paginate(4);
        $searchalbum = Album::where('name', 'like', "%$search%")->get();
        return view('pages.search',['searchsong'=> $searchsong,'search'=>$search,'searchalbum'=>$searchalbum]);
    }

    public function postsearch(Request $request)
    {
        $listensongsearch = Singer_show::where('id_song',$request->song)->where('id_singer',$request->show)->get();
        $search = $request->search;
        $searchsong = Song::where('name_song', 'like', "%$search%")->Paginate(4);
        $searchalbum = Album::where('name', 'like', "%$search%")->get();
        view()->share('listensongsearch',$listensongsearch);
        return view('pages.search',['searchsong'=> $searchsong,'search'=>$search,'searchalbum'=>$searchalbum]);
    }

    public function detailgenres($id_genres)
    {
        $detailgenres = Song::where('id_genres',$id_genres)->Paginate(4);
        $nameGenres = Genres::find($id_genres);
        return view('pages.detailGenres',['detailgenres'=>$detailgenres,'nameGenres'=>$nameGenres]);
    }

    public function detailmenu($id_menu)
    {
        $detailmenu = Song::where('id_menu',$id_menu)->Paginate(4);
        $nameMenu = Menu::find($id_menu);
        return view('pages.detailmenu',['detailmenu'=>$detailmenu,'nameMenu'=>$nameMenu]);
    }

    public function getcreateacc()
    {
        return view('pages.create');
    }

    public function postcreateacc(Request $request)
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
        $user->lvl = 0;
        $user->email = $request->Email;
        $user->password = bcrypt($request->password);
        $user->phone = $request->phone;
        $user->address = $request->address;
    
        $user->save();
        return redirect('createacc')->with('message','Bạn đã đăng kí thành công!!');
    }

    public function proFile($id_user)
    {
        $user = User::find($id_user);
        return view('pages.profile',['user'=>$user]);
    }

    public function postprofile(Request $request,$id)
    {        
        $this->validate($request,
            [
                'name' =>'required|unique:users,name'
            ],
            [
                'name.required'=>'Name already exists',
                'name.unique'=>'Name already exists',
            ]);

        $user = User::find($id);
        $user->name = $request->name;
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
                    'password.required' => "You have not entered a password yet",
                    'password.min' => 'password >= 3 characters',
                    'password.max' => 'password <= 32 characters',
                    'passwordAgain.same' => 'Input password is not matched'
                ]);
            $user->password = bcrypt($request->password);
        }        

        $user->save();
        return redirect('indexx')->with('message','You have changed password successful!!');
    }

    public function video()
    {
        $video = Song::where('type','1')->Paginate(16);
        return view('pages.listmp4',['video'=>$video]);
    }

    public function playVideo($id_song)
    {
        $playvideo = Singer_show::where('id_song',$id_song)->first();
        $comment = User_comment::orderBy('id_comment', 'desc')->get();
        $view = Song::find($id_song);
        $view->view = $view->view+1;
        $view->save();
        return view('pages.playmp4',['playvideo'=>$playvideo,'comment'=>$comment]);
    }

    public function postcomment($id,Request $request)
    {
        $id_song = $id;
        $song = Song::find($id);
        $comment = new User_comment;
        $comment->id_song = $id_song;
        $comment->id_user = Auth::user()->id_user;
        $comment->content = $request->cmt;
        $comment->save();
        return redirect("playvideo/".$id);
    }
}
