<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\Users\UpdateProfileRequest;
use App\User;

class UsersController extends Controller
{   
    public function notifications()
    {
        // mark as read
        auth()->user()->unreadNotifications->markAsRead();
        //display all notifications
        return view('users.notifications',[
            'notifications' => auth()->user()->notifications()->paginate(5),
        ]);
    }

    public function index(){
        return view('users.index')->with('users',User::all());
    }


    public function edit(){
        return view('users.edit')->with('user', auth()->user());
    }


    public function update(UpdateProfileRequest $request){
        $user = auth()->user();

        $user->update([
            'name' => $request->name,
            'about' => $request->about,

        ]);

        session()->flash('success','Profile updated successfully');

        return redirect()->back();

    }


    public function makeAdmin(User $user){
        $user->role = 'admin';

        $user->save();

        session()->flash('success','User successfully made Admin');

        return redirect(route('users.index'));
    }
    public function removeAdmin(User $user){
        $user->role = 'reader';

        $user->save();

        session()->flash('success','User successfully removed as Admin');

        return redirect(route('users.index'));
    }
}
