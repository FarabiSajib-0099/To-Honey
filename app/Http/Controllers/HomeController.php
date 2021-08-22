<?php

namespace App\Http\Controllers;
use App\Mail\NewsLetter;
use Mail;
use Illuminate\Http\Request;
use App\User;
use App\Contact;
use Illuminate\Support\Facades\Storage;
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
       
        return view('home',[
          'users'=>User::Latest()->simplePaginate(3),
          'total_users'=>User::count(),
       
        ]);
    
}

public function sendnewsletter()
{
   foreach (User::all()->pluck('email') as $email) {
   Mail::to($email)->send(new NewsLetter());
   }
   return back();

}


public function contactinfo(){

  return view('admin.contact_info.index',[
    'contacts'=>Contact::all()
  ]);
}


public function contactuploaddownload($contact_id){

return Storage::download(Contact::findOrFail($contact_id)->contact_attachment);
}



}