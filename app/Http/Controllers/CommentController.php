<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Song;
use App\User;
use App\User_comment;

class CommentController extends Controller
{
    //
    // public function getList()
    // {
    //     $comment = User_comment::all();
    // 	return view('admin.Comment.listComment',['comment'=>$comment]);
    // }

    public function getDel($id_comment,$id_song)
    {
    	$comment = User_comment::find($id_comment);
    	$comment->delete();

    	return redirect('admin/Song/editSong/'.$id_song)->with('thongbao','Delete Success');
    }
}
