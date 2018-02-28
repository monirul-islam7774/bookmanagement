<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\User;
use App\Book;

class BookController extends Controller
{
    public function addBook(Request $request){

        $user=User::where('name',$request->writer)->first();

        if($user){

            $books=new Book();
            $books->user_id=$user->id;
            $books->book_name=$request->book;
            $books->published=$request->year;
            $books->save();

        }else{
            $name=User::create([
               'name'=>$request->writer
            ]);
            $books=new Book();
            $books->user_id=$name->id;
            $books->book_name=$request->book;
            $books->published=$request->year;
            $books->save();
        }

        return back()->with('success','Successfully Added.');

    }


    public function showBook(){
        $users=User::all();
        return view('showBooks',compact('users'));
    }

    public function fetchData(Request $request){
        $data=User::find($request->id);
        return response()->json($data->book);
    }
}
