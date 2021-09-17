<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
        $this->middleware('admin');
    }

    public function index()
    {
        $users = User::orderBy('created_at','DESC')->get();
        return view('pages.dashboard_pages.users.users',compact('users'));
    }

    // public function show($slug){
    //     $users=$batch->users;
    //     return view('pages.dashboard_pages.settings.batch.viewUsers',compact('users'));
    // }

    // public function edit($id)
    // {
    //     $user = User::find($id);
    //     return view('pages.dashboard_pages.users.editUser',compact('user'));
    // }

    // public function update(Request $request, $id)
    // {
    //     $user = User::find($id);
    //     $validators = [
    //         'name' => ['required', 'string', 'max:255'],
    //         'username' => ['required', 'string', 'max:255'],
    //         'role'=>['required'],
    //         'student_mobile'=>['required'],
    //         'parent_mobile'=>['required'],
    //         'batch_id'=>['required'],
    //     ];
    //     if(request('password')){
    //         $validators['password'] = ['string','min:8','confirmed'];
    //     }
    //     $data = $request->validate($validators);
    //     if(request('password'))
    //         $data['password']= bcrypt($data['password']);

    //     $checkuser = User::where('username',$data['username'])->first();
    //     if($checkuser && $checkuser->id!=$user->id){
    //         return back()->with('error',"Cannot update. Username ".$data['username'] ." already in use.");
    //     }
    //     if(Auth::user()->role=='admin'&&$user->role!='student'){
    //          return back()->with('error',"Cannot update.You have no permission");
    //     }
    //     $user->update($data);
    //     return redirect('/users')->with('success',"User ".$user->name ."'s details updated.");
    // }

    // public function destroy($id)
    // {
    //     $user = User::find($id);

    //     $results = Result::where('user_id',$user->id)->get();
    //     foreach($results as $result){
    //         $result->delete();
    //     }
    //     $answers = Answer::where('user_id',$user->id)->get();
    //     foreach($answers as $answer){
    //         $details = AnswerDetail::where('answer_id',$answer->id)->get();
    //         foreach($details as $detail){
    //             $detail->delete();
    //         }
    //         $answer->delete();
    //     }
    //     $name = $user->name;
    //     $user->delete();

    //     return back()->with('success',"User ".$name."'s account deleted.");
    // }
    // public function showUsersPerformance(){
    //     $users = User::orderBy('created_at','DESC')->get();
    //     return view('pages.dashboard_pages.performance.users',compact('users'));
    // }
    // public function showUserPerformance($id){
    //     $user = User::find($id);
    //     $results = Result::where('user_id',$user->id)->orderBy('created_at','DESC')->get();
    //     return view('pages.dashboard_pages.performance.userPerformance',compact('user','results'));
    // }
}
