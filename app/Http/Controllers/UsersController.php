<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Auth;
use Validator;

class UsersController extends Controller
{
    //
    public function active_idcode($idcode,$id){
      $user = User::findOrFail($id)->where('idcode', $idcode)->select('id', 'idcode', 'verification');
      $user->update(['verification' => 1]);
      return view('user.true');
    }

    public function ShowProfile()
    {
      // code...
      $user = User::findOrFail(Auth::id());
      return view('user.edit',compact('user'));
    }

    public function EditProfile(Request $request)
    {
      // code...
      $user = User::findOrFail(Auth::id());
      $input = $request->all();

      $validator = Validator::make($input, [
        'name' => 'required|string|max:255',
        'email' => 'required|string|email|max:255|unique:users,email,'.$user->id,
        //'password' => 'required|string|min:6|confirmed',
        'hobbies' => 'required|string',
        'gender' => 'required|string|max:255',
        'image' => 'image|mimes:jpeg,png,jpg|max:2048',
      ]);
      if ($validator->fails()) {
          return view('user.edit',compact('user'))->withErrors($validator);
      } else {
          // store data ...
          $credentials = $request->only('name','email','hobbies', 'gender', 'image');
          if ($request->file('image') != null) {
              $image = app('App\Http\Controllers\Auth\UploadController')->UploadImage('image');
              $credentials['image'] = $image['new_name'];
          }
          Auth::user()->update($credentials);
          return view('user.edit',compact('user'))->with('success', true);
      }
    }

    public function close()
    {
      // code...
      $user = User::findOrFail(Auth::id());
      return view('user.close',compact('user'));
    }

    public function PostClose(Request $request)
    {
      // code...

      $user = User::select('id', 'reason', 'close')->findOrFail(Auth::id());
      $input = $request->all();

      $validator = Validator::make($input, [
        'reason' => 'required|string|max:255',
      ]);
      if ($validator->fails()) {
          return view('user.close',compact('user'))->withErrors($validator);
      } else {
          // store data ...
          $credentials = $request->only('reason');
          $credentials['close'] = 1;
          Auth::user()->update($credentials);
          return view('user.close',compact('user'))->with('success', true);
      }
    }

    public function users(){
        $returns=	User::all();

        $returns = collect($returns->all())->map(function ($item) {
            return  [
                'id'=>$item->id,
                'name'=>$item->name,
                'email'=>$item->email,
            ];
        });
        return response()->json($returns);
    }
}
