<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Order;

class UserController extends Controller
{
    //
    public function index(){
        $users = User::all();
        return view('admin.users.index', compact('users'));
    }


    public function active($id){
        $user = User::find($id);

        //Update User
        $user->update([
            'status'=> 1
        ]);

        //Message 
        session()->flash('msg', 'User is now active');

        //Redirect
        return redirect('/users');


    }
    public function block($id){
        $user = User::find($id);

        $user->update([
            'status'=> 0
        ]);

        session()->flash('msg', 'User has been blocked');

        return redirect('/users');

    }

    public function show($id){
        $orders = Order::where('user_id',$id)->get();
        return view('admin.users.details', compact('orders'));
    }
}
