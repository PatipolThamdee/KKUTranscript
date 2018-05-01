<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;
use App\User;
use DB;
use Hash;
use Auth;

class UserManageController extends Controller
{

  public function showPage(Request $request){
    $page = $request->input('page');
    $sort_by = $request->input('sort_by');
    $sorting = $request->input('sorting');
    $query = $request->input('q');
    if(!isset($sort_by)){
      $sort_by = 'id';
      $sorting  = 'desc';
    }else{
      if(!isset($sorting)){
        $sorting = 'desc';
      }
    }

    if(!isset($page) || !is_numeric($page)){
      $page = 1;
    }
    // $users = DB::select('select * from users');
    $users = DB::table('users')
              ->where('users.name', 'LIKE', "%$query%")
              ->orWhere('users.email', 'LIKE', "%$query%")
              ->limit(10)
              ->offset(($page-1)*10)
              ->orderBy($sort_by, $sorting)
              ->get();
    $allPage = DB::table('users')
              ->count();
    $max_page = floor($allPage/10.0)+1;
    // dd($users);
    $current_sorting = $sorting;
    if($sorting == 'desc'){
      $sorting = 'asc';
    }else{
      $sorting = 'desc';
    }
    return view('usermanage', ['users' => $users,'page' => $page,'maxpage' => $max_page,'default_sort' => $sort_by,'sorting' => $sorting,'q' => $query,'current_sorting' => $current_sorting]);

}


  protected function addNewUser(Request $request){
    $request->validate([
      'name' => 'required|string|max:255',
      'email' => 'required|string|email|max:255|unique:users',
      'password' => 'required|string|min:6|confirmed',
]);
    // $insert = DB::table('users')->insert([
    //       'name' => $request->input('name'),
    //       'email' => $request->input('email'),
    //       'password' => bcrypt($request->input('password')),
    //   ]);

    try{$insert =  User::create([
          'name' => $request->input('name'),
          'email' => $request->input('email'),
          'password' => bcrypt($request->input('password')),
          'user_type' => 'admin',
          'image' => 'images/admin-default.svg',
      ]);
      Session::flash('success', 'Created user successfully');
      return back();
    }catch(Exception $exception){
        $errorInfo = $exception->errorInfo;

        $err = '';
        foreach ($errorInfo as $errorInf) {
          $err .= $errorInf;
        }
        $msg = "Can't create user".$err;
        Session::flash('error', $msg);
        return back();
        // dd($errorInfo);
      }
  }


  protected function deleteUser($id)
  {

      DB::table('users')->where('id', $id)->delete();
      return redirect('/usermanage/');
  }
  public function showChangePasswordForm(){
        return view('auth.changepassword');
    }
  public function changePassword(Request $request){
    if (!(Hash::check($request->get('current-password'), Auth::user()->password))) {
      // The passwords matches
      return redirect()->back()->with("error","Your current password does not matches with the password you provided. Please try again.");
    }
    if(strcmp($request->get('current-password'), $request->get('new-password')) == 0){
      //Current password and new password are same
      return redirect()->back()->with("error","New Password cannot be same as your current password. Please choose a different password.");
    }
    $validatedData = $request->validate([
      'current-password' => 'required',
      'new-password' => 'required|string|min:6|confirmed',
    ]);
    //Change Password
    $user = Auth::user();
    $user->password = bcrypt($request->get('new-password'));
    $user->save();
    return redirect()->back()->with("success","Password changed successfully !");
  }

}
