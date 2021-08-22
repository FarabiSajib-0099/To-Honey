<?php namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\User;
use Auth;
use Carbon\carbon;
use Hash;
use Image;
use Mail;
use App\Mail\ChangePasswordMail;

class ProfileController extends Controller {
    public function profile() {

        return view('admin.profile.index');
    }

    public function profileeditpost(Request $request) {
        $request->validate([ 'name'=>'required'

            ]);

        if(Auth::user()->updated_at->addDays(30) < Carbon::now()) {
            Auth::user()->id;
            User::find(Auth::user()->id)->update([ 'name'=>$request->name]);
            return back()->with('name_status', 'Your Profile name updated success');
        }

        else {

            echo $left_days=Carbon::now()->diffInDays(Auth::user()->updated_at->addDays(30));
            return back()->with('name_change_status', 'You Can Update after'. $left_days.'Days');
        }




    }

    function editpasswordpost(Request $request) {

        $request->validate([ 'password'=>'confirmed|min:8',

            ]);

        if (Hash::check($request->old_pass, Auth::user()->password)) {
            if($request->old_pass==$request->password) {
                return back()->with('pass_error', 'You used same password as like ld pass');

            }

            else {

                User::find(Auth::id())->update([ 'password'=>Hash::make($request->password)]);

                //  send a password change notification email start

                Mail::to(Auth::user()->email)->send(new ChangePasswordMail(Auth::user()->name));

                return back();
                //  send a password change notification email end
            }
        }

        else {
            return back()->with('pass_error', 'Your Password does not match with your database');
        }
    }


    function changeprofilephoto(Request $request) {

        if($request->hasFile('profilepic')) {

            $upload_photo=$request->file('profilepic');

            $new_photo_name=Auth::id().'.'.$upload_photo->getClientOriginalExtension();
            $new_photo_location='public/uploads/profilepic/'. $new_photo_name;
            Image::make($upload_photo)->resize(150, 150)->save(base_path($new_photo_location), 50);

            User::find(Auth::id())->update([ 'profilepic'=>$new_photo_name]);
            return back();
        }

        else {
            echo 'nai';
        }
    }
}
