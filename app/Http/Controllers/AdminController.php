<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use App\Models\Booking;
use App\Models\ClientCheckinout;
use App\Models\Faq;
use App\Models\Gallery;
use App\Models\Newsletter;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\support\Str;

class AdminController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    public function Dashboard()
    {
        $totsale = ClientCheckinout::select('amount_paid')->get();
        $todayssale = ClientCheckinout::select('amount_paid')->whereDate('created_at',Carbon::now())->get();
        return view('admin.dashboard')->with('totsale', $totsale->sum('amount_paid'))
                                      ->with('tdsale', $todayssale->sum('amount_paid'))
                                    ->with('totcheckin',ClientCheckinout::count())
                                     ->with('chinsct',ClientCheckinout::where('status','1')->count())
                                    ->with('choutct',ClientCheckinout::where('status','0')->count())
                                      ->with('bkcount',Booking::where('bstatus','1')->count());;
    }

    public function profile(){
      
        return view('admin.profile');
    }

      //all transactor admin users
      public function adminuser(){
        // $admin = Auth::guard('admin')->user()->all();
        return view('admin.users')->with('adusers', Admin::all());
          
      }
      //change password view
  public function changepassword(){
     return view('admin.changepassword');
  }
  
  
  public function updateprofile(Request $request){
    Admin::where('id',$request->id)->update([
      'name' => $request->name,
      'username' => $request->username,
  ]);
  return redirect()->back()->with('success', 'profile Updated');
  }

    public function create()
    {
         return view('admin.createuser');
    }

    public function store(Request $request)
    {
        $this->validate($request,[
            'username' => ['required','string'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);

        Admin::create([
            'name' => $request->name,
            'username' => $request->username,
           'password' => Hash::make($request->password),
           'seepassword' => $request->password,
           'roles' => '0'
        ]);
          return redirect()->route('user.account')->with('success','New Account Created Successfully');
    }


    public function destroy($id)
    {
         $remove = Admin::findorfail($id);
        $remove->delete();
          return redirect()->route('user.account')->with('success','Account Deleted Successfully');
    }
   //make admin user permissions
 public function make_admin(Request $r){
       Admin::where('id',$r->id)->update([
        'roles' => $r->actype
       ]);
       

        return redirect()->route('user.account')->with('success','Permission Changed Successfully');
    }

    //change password
 public function change_pass(Request $request){
    $this->validate($request, [
     'password' => ['required', 'string', 'min:8', 'confirmed'],
 ]);
    Admin::where('id',$request->id)->update([
       'password' => Hash::make($request->password),
       'seepassword' => $request->password
   ]);

    return redirect()->route('password.change')->with('success','Password Changed Successfully');
 }

     //faq
     public function faqpage(){
        return view('admin.faq.index')->with('faqlist',Faq::all());                               
      }
      public function addfaq(Request $request){
          $this->validate($request,[
           'name' => ['required','string'],        
           'body' => ['required','string'],
         ]);
            
         $posts = Faq::create([           
             'name' => $request->name,
             'body' => $request->body,  
             'faqid' => Str::random(5),
         ]);
  
         return redirect()->route('admin.faq')->with('success', 'Record Saved');
          }
  
          public function faqedit($id){
            return view('admin.faq.edit')->with('edfq',Faq::findorfail($id));
                                            
          }
  
             //update faq
              public function faqupdate(Request $request,$id){
                   $this->validate($request,[
           'name' => ['required','string'],
           'body' => ['required','string'],
        
         ]);
  
             $fq = Faq::findorfail($id); 
          
             $fq->name = $request->name;
             $fq->body = $request->body;
            
             $fq->save();
         return redirect()->route('admin.faq')->with('success', 'Record Updated');
              }
              
              //delete service
              public function faqdelete($id){
  
        $faqdel = Faq::findorfail($id); 
          $faqdel->delete();
          //Comment::where('post_id',$posts->id)->delete();
           return redirect()->route('admin.faq')->with('success', 'Record Deleted');
  
              }
  

        //newsletter 
        public function managenewsletter(){
            return view('admin.newsletter')->with('adnews',Newsletter::all()); 
        }
        public function deletenewsletter($id){
              $subcribedel = Newsletter::findorfail($id);
              $subcribedel->delete();

              return redirect()->route('news')->with('success','Subcriber Deleted Successfully');
        }
        //show send broadcast message
        public function showbroadcast(){
           
            return view('admin.sendbroadcast')->with('allemail', Newsletter::all());
        }
        
 //send broadcast message 
        public function sendbroadcast(Request $request){
              $this->validate($request, [
            'subject' => ['required', 'string'],
            'message' => ['required','string'],
        ]);

         
                  Mail::send(['html' => 'mails.sendmail'],[
                    'msg' => $request->message
                    ],function($subc)use($request){
                    $subc->from('no-reply@ehotel.com','E-Hotel'); 
                      foreach ($request->email as $emails) {                
                    $subc->to(explode(',',$emails));   
                      }                 
                    $subc->subject($request->subject);
                  });
                
              return redirect()->route('news')->with('success','Broadcast Message Sent Successfully');
        }

        //gallery section
        public function gallerypage(){
            return view('admin.gallery.galleries')->with('galleries',Gallery::all());
         }
               //gallery
     public function addgallery(Request $request){
         $this->validate($request,[
          'caption' => ['required','string'],        
          'imagefile' => ['required'],
        ]);
       
        
            if($request->imagefile){
                 $imagePath = $request->file('imagefile');
                 foreach ($imagePath as $value) {
           $imageNewName = time()."_".$value->getClientOriginalName();
             $value->move('imageupload', $imageNewName);
        
         
                $posts = Gallery::create([           
                    'caption' => $request->caption,
                    'imagefile' => 'imageupload/'.$imageNewName
                ]);
            }
         }
    
        return redirect()->route('admin.gallery')->with('success', 'Record created Successfully');
         }
    
    
           //edit gallery
             public function galleryedit($id) {
                     $galedit = Gallery::findorfail($id);
                     return view('admin.gallery.edit')->with('edt', $galedit);
             }
    
             //update gallery
             public function galleryupdate(Request $request,$id){
                  $this->validate($request,[
          'caption' => ['required','string'],
          
       
        ]);
    
            $gall = Gallery::findorfail($id); 
    
        if ($request->hasFile('imagefile')) {
            if (file_exists($gall->imagefile)) {
                unlink($gall->imagefile);
              }
             $imagePath = $request->file('imagefile');
           $imageNewName = time().$imagePath->getClientOriginalName();
             $imagePath->move('imageupload', $imageNewName);
              $gall->imagefile = 'imageupload/'.$imageNewName;
        }
         
            $gall->caption = $request->caption;
           
           
            $gall->save();
        return redirect()->route('admin.gallery')->with('success', 'Record Updated Successfully');
             }
             
             //delete gallery
             public function gallerydelete($id){
    
                   $gal = Gallery::findorfail($id); 
    
         if (file_exists($gal->imagefile)) {
            unlink($gal->imagefile);
         }
         $gal->delete();
         
          return redirect()->route('admin.gallery')->with('success', 'Record Deleted Successfully');
    
             }


             public function report()
             {
                 return view('admin.report');
             }
         
             public function generate_report(Request $r)
             {
                 $this->validate($r,[
                   'date_from' => 'required | string',
                   'date_to' => 'required | string',
                 ]);
         
              $reports = ClientCheckinout::whereBetween('created_at',[date("Y-m-d",strtotime($r->date_from)),date("Y-m-d",strtotime($r->date_to))])
                                          ->orderBy('created_at','DESC')->get(); 
                   //return $transct; 
                 return view('admin.printreport')->with('reports', $reports);
             }
}
