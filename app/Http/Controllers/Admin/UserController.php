<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
//Custom
use Spatie\Permission\Models\Role;
use App\Notifications\SomeNotification;
use Illuminate\Support\Facades\Notification;
use App\Notifications\WelcomeUserNotification;

// use RajTechnologies\FCM\Models\FCM;
class UserController extends Controller
{
    public function index(Request $request)
    {
        $data = User::orderBy('id','DESC')->paginate(5);
        return view('admin.users.index',compact('data'))
            ->with('i', ($request->input('page', 1) - 1) * 5);
    }
    public function create()
    {
        $roles = Role::pluck('name','name')->all();
        return view('admin.users.create',compact('roles'));
    }
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|same:confirm-password',
            'roles' => 'required'
        ]);


        $input = $request->all();

        $input['password'] = Hash::make($input['password']);

        $user = User::create($input);
        $user->password = $input['password'];
        Notification::send($user, new WelcomeUserNotification());
        $user->assignRole($request->input('roles'));


        return redirect()->route('users.index')
                        ->with('success','User created successfully');
    }
    public function show($id)
    {
        $user = User::find($id);
        return view('admin.users.show',compact('user'));
    }
    public function edit($id)
    {
        $user = User::find($id);
        $roles = Role::pluck('name','name')->all();
        $userRole = $user->roles->pluck('name','name')->all();


        return view('admin.users.edit',compact('user','roles','userRole'));
    }
 	public function update(Request $request, $id)
    {
        $this->validate($request, [
            'name' => 'required',
            'email' => 'required|email|unique:users,email,'.$id,
            //'password' => 'same:confirm-password',
            'roles' => 'required'
        ]);


        $input = $request->all();
        // if(!empty($input['password'])){ 
        //     $input['password'] = Hash::make($input['password']);
        // }else{
        //     $input = array_except($input,array('password'));    
        // }

        $user = User::find($id);
        $user->update($input);
        DB::table('model_has_roles')->where('model_id',$id)->delete();
        $user->assignRole($request->input('roles'));

        return redirect()->route('admin.users.index')
                        ->with('success','User updated successfully');
    }
  	public function destroy($id)
    {
        User::find($id)->delete();
        return redirect()->route('admin.users.index')
                        ->with('success','User deleted successfully');
    }
    // public function sendNotification()
    // {
    //     $user = User::first();
  
    //     $details = [
    //         'greeting' => 'Hi Artisan',
    //         'body' => 'This is my first notification from RajTechnologies.com',
    //         'thanks' => 'Thank you for using RajTechnologies.com tuto!',
    //         'actionText' => 'View My Site',
    //         'actionURL' => url('/'),
    //         'order_id' => 101
    //     ];
  
    //     Notification::send($user, new UserNotification($details));
   
    //     dd('done');
    // }
    public function sendNotification()
    {
        //$fcm = FCM::get();
        
        

        $user = User::first();
        dd($user->fcm);
        // Notification::send($user, new SomeNotification());
   
        dd('done');
    }
}
