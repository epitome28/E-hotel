<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use App\Models\ClientCheckinout;
use App\Models\Faq;
use App\Models\Gallery;
use App\Models\HotelBranch;
use App\Models\Newsletter;
use App\Models\Pagesetting;
use App\Models\Room;
use App\Models\Team;
use App\Models\Testimonial;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Mail;
use ProtoneMedia\LaravelCrossEloquentSearch\Search;

class ForntendController extends Controller
{
    public function welcome()
    {
        return view('welcome')->with('hotels',HotelBranch::take(6)->get())
                                ->with('ho',HotelBranch::all())
                             ->with('testis',Testimonial::all())
                             ->with('gallas',Gallery::take(12)->get())
                             ->with('abtpg', Pagesetting::where('caption','about page')->first())
                              ->with('contpg', Pagesetting::where('caption','contact page')->first());
    }

    public function about(){
        return view('about')->with('teams',Team::all())
                            ->with('abtpg', Pagesetting::where('caption','about page')->first())
                            ->with('contpg', Pagesetting::where('caption','contact page')->first());
    }
    public function services(){
        return view('services')->with('abtpg', Pagesetting::where('caption','about page')->first())
                               ->with('contpg', Pagesetting::where('caption','contact page')->first());
    }

    public function gallery(){
        return view('gallery')->with('galls', Gallery::all())
                               ->with('contpg', Pagesetting::where('caption','contact page')->first());
    }
    public function hotels(){
        return view('hotel')->with('hotels',HotelBranch::all())
                               ->with('contpg', Pagesetting::where('caption','contact page')->first());
    }

    public function room($rm){
        $htl = HotelBranch::where('hotel_slug',$rm)->first();
        return view('room')->with('rooms', Room::where('hotel_branches_id',$htl->id)->get())
                         ->with('contpg', Pagesetting::where('caption','contact page')->first());
    }
    public function room_details($slug){
        $romm = Room::where('room_slug',$slug)->first();
        return view('room-details')->with('rmdetail',$romm)
                                    ->with('oths',Room::where('id','!=',$romm->id)->get())
                                    ->with('contpg', Pagesetting::where('caption','contact page')->first());
    }
    public function contact(){
        return view('contact')->with('abtpg', Pagesetting::where('caption','about page')->first())
                             ->with('contpg', Pagesetting::where('caption','contact page')->first());
    }
    public function privacy(){
        return view('privacy')->with('prv', Pagesetting::where('caption','privacy')->first())
                            ->with('contpg', Pagesetting::where('caption','contact page')->first());
    }
    public function terms(){
        return view('terms')->with('trm', Pagesetting::where('caption','term_service')->first())
                            ->with('contpg', Pagesetting::where('caption','contact page')->first());
    }
    public function faq(){
        return view('faq')->with('faqs', Faq::all())
                            ->with('contpg', Pagesetting::where('caption','contact page')->first());
    }
    public function support(){
        return view('support')->with('abtpg', Pagesetting::where('caption','about page')->first())
                            ->with('contpg', Pagesetting::where('caption','contact page')->first());
    }
    public function thankyou(){
        return view('thankyou')->with('abtpg', Pagesetting::where('caption','about page')->first())
                            ->with('contpg', Pagesetting::where('caption','contact page')->first());
    }

    //contact form
    public function sendcontactmail(Request $request){
        $this->validate($request,[
           'name' => ['required','string'],
           'email' => ['required','string','email'],
           'subject' => ['required','string'],
           'message' => ['required','string'],
        ]);

            Mail::send(['html'=>'mails.sendmail'],[
        'msg' => $request->message
        ],function($contactmail)use($request){
           $contactmail->from($request->email,$request->name);
           $contactmail->to('info@e-hotel.com');
           $contactmail->subject($request->subject);
        });

        return "success";
        //back()->with('success', 'Thank You for Contacting Us');
    }

       //newsletter
public function newsletter(Request $request){
    $this->validate($request,[
      'email' => ['required','string','email'],    
    ]);

    Newsletter::create([
        'email' => $request->email
    ]);

     Mail::send(['html'=>'mails.sendmail'],[
        'msg' => 'Welcome to E-hotel Newsletter, Thank you for subcribing to our newsletter.'
        ],function($newsmail)use($request){
           $newsmail->from('no-reply@e-hotel.com','E-hotel');
           $newsmail->to($request->email);
           $newsmail->subject('E-hotel Newsletter');
        });
        return "success";
        //redirect()->back()->with('success', 'You have successfully subcribed to Transactor BDC Newsletter');
}

    //support form
    public function sendsupportmail(Request $request){
        $this->validate($request,[
           'name' => ['required','string'],
           'email' => ['required','string','email'],
           'phone' => ['required','string'],
           'subject' => ['required','string'],
           'message' => ['required','string'],
        ]);
          
            Mail::send(['html'=>'mails.sendmail'],[
        'msg' => "name:  ".$request->name."<br><br> Phone:  ".$request->phone."<br><br>".$request->message
        ],function($contactmail)use($request){
           $contactmail->from($request->email,$request->name);
           $contactmail->to('tech@e-hotel.com');
           $contactmail->subject($request->subject);
        });

        return "success";
        //back()->with('success', 'Thank You for Contacting Us');
    }

    public function checkout(){
        $room = Room::where('id',request()->roomid)->first();
        return view('checkout')->with('rm',$room)
                            ->with('contpg', Pagesetting::where('caption','contact page')->first());
    }

public function searchdropdown()
{
    $data = array();
    $data2 = array();
    $s = request()->q;

    $results = Search::add(HotelBranch::class,['hotel_name'])
                    ->add(Room::class, ['state','city'])
                    ->paginate(10)
                    ->beginWithWildcard()
                    ->search($s);
//return $results;
$data[] = '<p class="px-3"><strong>Hotels</strong></p>';
   foreach($results as $res){
    $data[] = '<li class="resl mx-3" id="hv" data-id="'.$res->id.'" style="cursor:pointer;font-size:14px;color:#000">'.$res->hotel_name.'</li>';
   }
   $data2[] = '<p class="px-3"><strong>Places</strong></p>';
   foreach($results as $res2){
    $data2[] = '<li class="resl mx-3" id="hv" data-city="'.$res2->city.'" data-state="'.$res2->state.'" style="cursor:pointer;font-size:14px; color:#000">'.$res2->state.' '.$res2->city.'</li>';
   }
    return array(
        'hotels' => $data,
        'places' => $data2
    );
}

public function searchresult(){
   $cin = !empty(request()->cin) ? request()->cin : request()->date;
     $hotels= HotelBranch::where('id',request()->hotelid)->first();
     $rm = Room::where('state',request()->state)->orWhere('city',request()->city)
                 ->orWhere('bookoption',request()->bookingType)->get();
        
    // $searchresult = $hotels->merge($rm);
    session()->put('search',[
        'checkin' => $cin,
        'checkout' => request()->cout,
        'adult' => request()->adult,
        'children' => request()->children,
    ]);
    // return $searchresult;
    return view('room_search')->with('hotl',$hotels)
                                ->with('rooms',$rm)
                                ->with('contpg', Pagesetting::where('caption','contact page')->first());
}

public function checkaccount(){
    $user = User::where('email',request()->email)->first();
    if(empty($user)){
      return 0;  
    }else{
        return array(
            'fname' => $user->firstname,
            'lname' => $user->lastname,
            'em' => $user->email,
            'phne' => $user->phone,
        );
    } 
}

public function store_checkout(Request $r){
    $this->validate($r,[
        'first_name' => ['required','string'],
        'last_name' => ['required','string'],
        'email' => ['required','string','email'],
        'phone_number' => ['required','string'],
    ]);
   
            if($r->usersave == '1'){
                User::firstOrCreate([
                    'firstname' => $r->first_name,
                    'lastname' => $r->last_name,
                    'email' => $r->email,
                    'phone' => $r->phone_number,
                ]);
            } 

            $bcode = Str::random(6);
            $bcin = !empty($r->checkin) ? $r->checkin : $r->pickdate;
            $bcot = !empty($r->checkout) ? $r->checkout : $r->pickdate;
            $p = $r->payment_type == "at location" ? "0" : "1";
            $ppl = $r->adult + $r->children;
            
            $dte = explode("-",$r->timing);
            Booking::create([
                'room_id' => $r->roomid,
                'booking_code' => $bcode,
                'client_name' => $r->last_name." ".$r->first_name,
                'client_phone' => $r->phone_number,
                'email' => $r->email,
                'arrival_time' => $r->arrival_time,
                'hotel_name' => $r->hotel_name,
                'booked_location' => $r->book_location,
                'bookoption' => $r->bookoption,
                'checkin_date' => $bcin,
                'checkout_date' => $bcot,
                'duration' => $r->duration, 
                'timing' => $r->timing,
                'amount_paid' => $r->price,
                'payment_method' => $r->payment_type,
                'payment_status' => $p,
                'no_people' => $ppl,
                'bstatus' => "1",
                'status' => "1"
            ]);

            Mail::send(['html'=>'mails.sendmail'],[
                'msg' => "Hello : ".$r->last_name." ".$r->first_name." below is your booking details. <br><br> Booking code: ".$bcode." 
                <br><br>Hotel: ".$r->hotel_name."
                <br><br>Booking Location: ".$r->book_location."
                <br><br>Booking Option: ".$r->bookoption."
                <br><br>Check In Date: ".$bcin."
                <br><br>Check Out Date: ".$bcot."
                <br><br>Check-in no sooner than: ".$dte[0]."
                <br><br>Check-out no later than: ".$dte[1]."
                <br><br>Expected time of arrival: ".$r->arrival_time."
                <br><br>Please keep it for safe, for it is going to be used to validate your booking."
                ],function($bookingmail)use($r){
                   $bookingmail->from("no-reply@e-hotel.com","E-hotel");
                   $bookingmail->to($r->email);
                   $bookingmail->subject("E-hotel Booking Details");
                });
         
                session()->forget('search');
                
   return redirect()->route('thankyou')->with('success','Booking Successfull...Your Booking Details Sent to these email:'.$r->email);
}

public function checkroombooking(){
    $getemtrm = array();
    $chins =  ClientCheckinout::where('room_id',request()->roomid)
                              ->where('status','1')->first();
  if(empty($chins)){
        $bkins =  Booking::where('room_id',request()->roomid)
                            ->where('status','1')->first();
    $bkins =  Booking::where('room_id',request()->roomid)
                        ->where('status','1')->first(); 
  if(empty($bkins)){
     return "ok";
    }else{
        $bkis = "";
      $rooms = Room::select('id','room_slug','room_name','room_capacity')->where('id','!=',request()->roomid)->get();
        foreach($rooms as $ckrm){
            $bkis .=  Booking::where('room_id','!=',$ckrm->id)
                             ->where('status','0')
                             ->orWhere('room_id',$ckrm->id)->first();
         }
           if(empty($bkis)){
            $prce = "";
            $getemtrm[] = '<div class="row">';
            foreach($rooms as $rm){
                foreach ($rm->roomdurations->take(1) as $rditem) {
                    $prce = number_format($rditem->price);
                    }
                $getemtrm[] .= '<a href="'.route('roomdetails',['slug' => $rm->room_slug]).'">
                <div class="col-md-12 col-sm-12 col-lg-12 my-2 py-2 border px-2 rounded-3" style="cursor: pointer">
                 <span class="float-start text-dark font-weight-bold">'.ucwords($rm->room_name).'</span>
                 <span class="float-end text-dark">'.$rm->room_capacity.' <i class="fas fa-user"></i></span><br>
                 <span class="text-dark font-weight-bold">Price From &#x20A6; '.$prce.'</span>';
             }
            $getemtrm[] .='</div></a>';
           }
        
        return array(
            'record' =>  $getemtrm,
            "bk2" => '1'
        );
    }
    }else{
        $chis ="";
        $rooms = Room::select('id','room_slug','room_name','room_capacity')->whereNot('id',request()->roomid)->get();
        
        foreach($rooms as $clkrm){
            $chis .=  ClientCheckinout::where('room_id',$clkrm->id)
                              ->where('status','1')->first();
          }
          
           if(empty($chis)){
            $prce = "";
            $getemtrm[] = '<div class="row">';
            foreach($rooms as $rm){
                foreach ($rm->roomdurations->take(1) as $rditem) {
                    $prce = number_format($rditem->price);
                    }
                $getemtrm[] .= '<a href="'.route('roomdetails',['slug' => $rm->room_slug]).'">
                <div class="col-md-12 col-sm-12 col-lg-12 my-2 py-2 border px-2 rounded-3" style="cursor: pointer">
                 <span class="float-start text-dark font-weight-bold">'.ucwords($rm->room_name).'</span>
                 <span class="float-end text-dark">'.$rm->room_capacity.' <i class="fas fa-user"></i></span><br>
                 <span class="text-dark font-weight-bold">Price From &#x20A6; '.$prce.'</span>';
             }
            $getemtrm[] .='</div></a>';
           }
        
        return array(
            'record' => $getemtrm,
            "bk1" => '1'
        );
    }   
}

}//end class
