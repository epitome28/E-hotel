<?php

namespace App\Http\Controllers;

use App\Models\Compareprice;
use Illuminate\Http\Request;
use App\Models\Pagesetting;

class PagesettingsController extends Controller
{
    public function __construct(){
        $this->middleware('auth:admin');
    }


public function bio(){
     return view('admin.about')->with('abt',Pagesetting::where('caption','about page')->first());
                                          
 }
 public function contactpg(){
  return view('admin.contact')->with('cont',Pagesetting::where('caption','contact page')->first());
 }
 public function termpg(){
  return view('admin.term_condition')->with('trm', Pagesetting::where('caption','term_service')->first());
 }
 
 public function privacypg(){
     return view('admin.privacy')->with('prv', Pagesetting::where('caption','privacy')->first());
    }



 public function contact_save(Request $r){
     $caption2 = "contact page";
     // if (!empty($r->savecontact)) {
          $checkcont = Pagesetting::where('caption','contact page')->first();
          if (empty($checkcont)) {                
             Pagesetting::create([
              'caption' => $caption2,
               'email' => $r->email,
               'phone' => $r->phone,
               'address' => $r->address,
               'fax' => $r->fax,
               'location' => $r->location
          ]);
          } else {
             Pagesetting::where('caption','contact page')->update([
              'caption' => $caption2,
               'email' => $r->email,
               'phone' => $r->phone,
               'address' => $r->address,
               'fax' => $r->fax,
               'location' => $r->location
          ]);
          }
           return redirect()->back()->with('success', 'Data Saved');

      //}
}

public function save_bio(Request $r){
     $caption1 = "about page";
     if (!empty($r->content1)) {
          $checkabt = Pagesetting::where('caption','about page')->first();
          if (empty($checkabt)) {
               Pagesetting::create([
             'caption' => $caption1,
              'content' => $r->content1
         ]);
          } else {
               Pagesetting::where('caption','about page')->update([
             'caption' => $caption1,
              'content' => $r->content1
         ]);
          }
          
         return redirect()->back()->with('success', 'Data Saved');

     }
}

//disclaimer
public function save_privacy(Request $r){
     $caption3 = "privacy";  
     if (!empty($r->content)) {
          $checksto = Pagesetting::where('caption','privacy')->first();
          if (empty($checksto)) {
               Pagesetting::create([
             'caption' => $caption3,
              'content' => $r->content
         ]);
          } else {
               Pagesetting::where('caption','privacy')->update([
             'caption' => $caption3,
              'content' => $r->content
         ]);
          }
          
         return redirect()->back()->with('success', 'Data Saved');

     }
}
//mission statement
public function save_terms(Request $r){
     $caption4 = "term_service";  
     if (!empty($r->content)) {
          $checksto = Pagesetting::where('caption','term_service')->first();
          if (empty($checksto)) {
               Pagesetting::create([
             'caption' => $caption4,
              'content' => $r->content
         ]);
          } else {
               Pagesetting::where('caption','term_service')->update([
             'caption' => $caption4,
              'content' => $r->content
         ]);
          }
          
         return redirect()->back()->with('success', 'Data Saved');

     }
}


}//endclass
