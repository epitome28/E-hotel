<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use App\Models\ClientCheckinout;
use App\Models\Duration;
use App\Models\HotelBranch;
use App\Models\hours;
use App\Models\Room;
use App\Models\RoomFeature;
use App\Models\Roomimage;
use Carbon\Carbon;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HotelController extends Controller
{
    public function __construct(){
        $this->middleware('auth:admin');
    }

    public function index(){
        return view('admin.hotel.index')->with('allhotels',HotelBranch::orderBy('created_at','DESC')->get());
    }

    public function store_hotel_branch(Request $r){
       $this->validate($r,[
        'hotel_name' => ['required','string'],
        'location' => ['required','string'],
        'address' => ['required','string'],
        'image' => ['required','image','mimes:jpg,jpeg,png,bmp'],
       ]);

       $filePath = $r->file('image');
       $fileNewName = time()."_".$filePath->getClientOriginalName();
       $filePath->move('imageupload', $fileNewName);

       HotelBranch::create([
         'hotel_name' => $r->hotel_name,
         'hotel_slug' => Str::Slug($r->hotel_name),
         'location' => $r->location,
         'address' => $r->address,
         'image' => 'imageupload/'.$fileNewName
       ]);

       return redirect()->route('htl')->with('success','Record Save successfully');
    }

    public function edit_hotel_branch($id){
        return view('admin.hotel.edit')->with('hid',HotelBranch::findorfail($id));
    }

    public function update_hotel_branch(Request $r,$id){
        $this->validate($r,[
            'hotel_name' => ['required','string'],
            'location' => ['required','string'],
            'address' => ['required','string']
           ]);
    
        $hbrh = HotelBranch::findorfail($id);

        if($r->hasFile('image')){
            if(file_exists($hbrh->image)){
                unlink($hbrh->image);
            }
            $filePath = $r->file('image');
            $fileNewName = time()."_".$filePath->getClientOriginalName();
            $filePath->move('imageupload', $fileNewName);
            $hbrh->image = 'imageupload/'.$fileNewName;
        }
       
            $hbrh->hotel_name = $r->hotel_name;
            $hbrh->hotel_slug = Str::Slug($r->hotel_name);
            $hbrh->location = $r->location;
            $hbrh->address = $r->address; 
            $hbrh->save();
            return redirect()->route('htl')->with('success','Record Updated successfully');
    } 
    
    public function delete_hotel_branch($id){
        $hbrh = HotelBranch::findorfail($id);
        if(file_exists($hbrh->image)){
            unlink($hbrh->image);
        }
        $rooms = Room::where('hotel_branches_id',$id)->get();
        foreach($rooms as $rm){
            $rmimgs = Roomimage::where('room_id',$rm->id)->get();
            foreach($rmimgs as $rming){
              if (file_exists($rming->images)) {
                unlink($rming->images);
               }
               $rmimgs = Roomimage::where('room_id',$rm->id)->delete();
            }
        }
        Room::where('hotel_branches_id',$id)->delete();
        $hbrh->delete();
        return redirect()->route('htl')->with('success','Record Deleted successfully');
    } 

    //rooms
    public function rooms($id){
        return view('admin.hotel.room')->with('htlname', HotelBranch::findorfail($id))
                                       ->with('allrooms',Room::where('hotel_branches_id',$id)->orderBy('created_at','DESC')->get());
    }

    public function rooms_create(){
        return view('admin.hotel.create_room');
    }

    public function store_room(Request $r){
        $this->validate($r,[
            'room_type' => ['required','string'],
            'room_name' => ['required','string'],
            'bookingoption' => ['required','string'],
            'room_description' => ['required','string'],
            'state' => ['required','string'],
            'city' => ['required','string'],
            'icons.*' => ['required','string'],
            'room_capacity' => ['required','string'],
            'images.*' => ['required','image','mimes:jpg,jpeg,png,bmp'],
           ]);

    $rid = Room::create([
              'hotel_branches_id' => $r->hotel_id,
              'room_name' => $r->room_name,
              'room_slug' => Str::Slug($r->room_name),
              'room_type' => $r->room_type,
              'room_capacity' => $r->room_capacity,
              'room_description' => $r->room_description,
              'bookoption' => $r->bookingoption,
              'state' => $r->state,
            'city' => $r->city,
           ]);

           $imges = $r->file('images');
           foreach($imges as $img){
             $imgfilename = time()."_".$img->getClientOriginalName();
             $img->move('imageupload',$imgfilename);

             Roomimage::create([
                'room_id' => $rid->id,
                'images' => 'imageupload/'.$imgfilename
             ]);
            }
             if($r->bookingoption == "by hour" || $r->bookingoption == "by day" || $r->bookingoption == "by night"){
                foreach($r->room_durations as $key => $rmdurat){
                 Duration::create([
                    'room_id' => $rid->id,
                    'hour' =>  $rmdurat,
                    'price' => $r->price[$key]
                  ]);
                }
             
             }else{
                Duration::create([
                    'room_id' => $rid->id,
                    'price' => $r->price
                  ]);
             }
               foreach($r->icons as $key => $icon){
                RoomFeature::create([
                    'room_id' => $rid->id,
                    'icon' => $icon,
                    'icon_name' => $r->description[$key]
                ]);
               }

               return redirect($r->redirect_url)->with('success','Room Created Successfully');
           
    }

    public function client_checkinout_details($id){
        return view('admin.checkindetails')->with('ch',ClientCheckinout::findorfail($id));
    }

    public function edit_room($id){
        return view('admin.hotel.edit_room')->with('edrm',Room::findorfail($id));
    }

    public function update_room(Request $r,$id){
        $this->validate($r,[
            'room_type' => ['required','string'],
            'room_name' => ['required','string'],
            'bookingoption' => ['required','string'],
            'room_description' => ['required','string'],
            'room_capacity' => ['required','string'],
           ]);

        Room::findorfail($id)->update([
              'room_name' => $r->room_name,
              'room_slug' => Str::Slug($r->room_name),
              'room_type' => $r->room_type,
              'room_capacity' => $r->room_capacity,
              'room_description' => $r->room_description,
              'bookoption' => $r->bookingoption,
              'state' => empty($r->state) ? $r->st : $r->state,
            'city' => empty($r->city) ? $r->ct : $r->city,
           ]);

          if($r->hasFile('images')){
            $imges = $r->file('images');
            foreach($imges as $img){
              $imgfilename = time()."_".$img->getClientOriginalName();
              $img->move('imageupload',$imgfilename);
 
              Roomimage::create([
                 'room_id' => $id,
                 'images' => 'imageupload/'.$imgfilename
              ]);
             }
          }

             if($r->bookingoption == "by hour" || $r->bookingoption == "by day" || $r->bookingoption == "by night"){
                foreach($r->room_durations as $key => $rmdurat){
                 Duration::create([
                    'room_id' => $id,
                    'hour' =>  $rmdurat,
                    'price' => $r->price[$key]
                  ]);
                }
             
             }else{
                Duration::create([
                    'room_id' => $id,
                    'price' => $r->price
                  ]);
             }
             
             if(!empty($r->icons)){
                foreach($r->icons as $key => $icon){
                    RoomFeature::create([
                        'room_id' => $id,
                        'icon' => $icon,
                        'icon_name' => $r->description[$key]
                    ]);
                   }
             }

               return redirect($r->redirect_url)->with('success','Room Created Successfully');
    }

    public function delete_room($id){
        Room::findorfail($id)->delete();
        $dimg = Roomimage::where('room_id',$id)->get();
        foreach($dimg as $im){
             if(file_exists($im->images)){
                    unlink($im->images);
                }
           Roomimage::where('room_id',$id)->delete();
        }
        Duration::where('room_id',$id)->delete();
        RoomFeature::where('room_id',$id)->delete();
        return redirect()->back()->with('success','Room Deleted Successfully');
    }

    public function delete_room_duration($id){
        Duration::findorfail($id)->delete();
        return redirect()->back();
    }
    public function delete_room_image($id){
        $dimg = Roomimage::findorfail($id);
        if(file_exists($dimg->images)){
            unlink($dimg->images);
        }
        $dimg->delete();
        return redirect()->back();
    }
    public function delete_room_features($id){
        RoomFeature::findorfail($id)->delete();
        return redirect()->back();
    }

    public function gethours(){
        $hrs = array();
            $geths = hours::where('room_options',request()->typ)->get();
        //    return $geths;
        if(empty($geths)){
            return 0;
        }else{
            foreach($geths  as $gv){
                $hrs[] = "<option value='".$gv->hours."'>".$gv->hours."</option>";
            }
        
            return $hrs;
        }
       
    }

    public function client_checkin(){
        return view('admin.checkin')->with('chins',ClientCheckinout::where('status','1')->orderBy('created_at','DESC')->get());
    }
    public function client_checkout(){
        return view('admin.checkout')->with('chouts',ClientCheckinout::where('status','0')->orderBy('created_at','DESC')->get());
    }
    public function client_booking(){
        return view('admin.booking')->with('allboks',Booking::orderBy('created_at','DESC')->get());
    }

    public function getbookingcount()
    {
      $getbook = array();
      $getbook[] = Booking::where('bstatus','1')->count();
    
      return $getbook;
    }

    public function check_booking_code(Request $r){
        
         if($r->ajax()){
            $chkbk = Booking::where('booking_code',$r->code)->first();
            if(empty($chkbk)){
                return 0;
            }else{
                $rmtype =  Room::select('room_type')->where('id',$chkbk->room_id)->first();
                return array(
                    'bookid' => $chkbk->id,
                    'cname' => $chkbk->client_name,
                    'cpone' => $chkbk->client_phone,
                    'em' => $chkbk->email,
                    'htbloca' => $chkbk->hotel_name." : ".$chkbk->booked_location,
                    'rmty' => $rmtype->room_type,
                    'pmethod' => $chkbk->payment_method,
                    'pstat' => $chkbk->payment_status == 1 ? 'Paid' : 'Not Paid',
                    'roomid' => $chkbk->room_id,
                    'arriv' => date("h:ia",strtotime($chkbk->arrival_time)),
                    'bopt' => $chkbk->bookoption,
                    'checkin' => date("d-m-Y",strtotime($chkbk->checkin_date)),
                    'checkout' => !is_null($chkbk->checkout_date) ? date("d-m-Y",strtotime($chkbk->checkout_date)) : 'Same Day',
                    'period' => $chkbk->timing,
                    'amout' => number_format($chkbk->amount_paid)
                );
            }
         }
         
    }

    public function getrooms(Request $r){
        $rm =array();
        if($r->ajax()){
         $rooms = Room::select('id','room_name')->where('room_type',strtolower($r->rmtyp))->get();
         if(empty($rooms)){
            return 0;
         }else{
            foreach($rooms as $rms){
              $rm[] = '<option value='.$rms->id.'>'.$rms->room_name.'</option>';
            }
            return $rm;
         }
        }
    }
     public function getrooms_price(Request $r){
        $pr =array();
        $pri =array();
        if($r->ajax()){
            $roomsprics = Room::select('id')
                         ->where('room_type',$r->rmtyp)
                         ->where('bookoption',$r->opt)->first();
         if(empty($roomsprics)){
            return 0;
         }else{
            $durations = Duration::where('room_id',$roomsprics->id)->get();
            //return $durations;
         if($r->opt == "by hour" || $r->opt == "by day" || $r->opt == "by night"){
            foreach($durations as $prs){
               $hor = explode("-",$prs->hour);
               $dt = date("h:i",strtotime($hor[1]));
              $pr[] = '<option value="'.$prs->hour.'" data-hour="'.$dt.'" data-price="'.$prs->price.'">'.$prs->hour.' : &#x20A6;'.$prs->price.'</option>';
           }
           return $pr; 
        }else{
            foreach($durations as $psr){
            $pri[] = '<label class="form-label">Price: &#x20A6;'.$psr->price.'</label>
                    <input class="number" name="price"  class="form-control border px-3" value="'.$psr->price.'">';
                   
                }
                return $pri;
            }
        }
        }
     }

     //check client in 
     public function store_checkins(Request $r){
       $this->validate($r,[
        'room_id' => ['required','string'],
        'customer_name' => ['required','string'],
        'customer_mobile' => ['required','string'],
        'booking_option' => ['required','string'],
        'checkin' => ['required','string'],
        'checkout' => ['required','string'],
        'customer_name' => ['required','string'],
        'people' => ['required','string'],
       ]);
       
       $p = empty($r->amount_paid) ? $r->price : $r->amount_paid;
       $rm = Room::findorfail($r->room_id);
        $chins =  ClientCheckinout::where('room_id',$r->room_id)
                                    ->where('status','1')->first();
        if(empty($chins)){
          if($r->people > $rm->room_capacity){
            return array(
                'rmcap' => $rm->room_capacity,
                'cp' => 2
            );
          }else{
                    $bkins =  Booking::where('room_id',$r->room_id)
                    ->where('status','1')->first(); 
        if(empty($bkins)){

            $chkid = ClientCheckinout::create([
            'room_id' => $r->room_id,
            'client_name' => $r->customer_name,
            'client_phone' => $r->customer_mobile,
            'bookoption' => $r->booking_option,
            'client_alt_phone' => $r->alternative_mobile,
            'room_type' => $r->roomtype,
            'duration' => $r->durations,
            'timing' => $r->timing,
            'amount_paid' => $p,
            'checkin' => $r->checkin,
            'checkout' => $r->checkout,
            'time_in' => Carbon::now(),
            'time_alert' => $r->timeout,
            'checkedin_by' => Auth::guard('admin')->user()->name,
            'no_people' => $r->people,
            'status' => '1',
            'payment_method' => $r->payment_method,
            'discount' => $r->discount,
            'autorized_by' => $r->autorize
            ]);

            return array(
                'success' => '1',
                'id' => $chkid->id
            );
        }else{
            session()->put('data',[
            'room_id' => $r->room_id,
            'client_name' => $r->customer_name,
            'client_phone' => $r->customer_mobile,
            'bookoption' => $r->booking_option,
            'client_alt_phone' => $r->alternative_mobile,
            'room_type' => $r->roomtype,
            'duration' => $r->durations,
            'timing' => $r->timing,
            'amount_paid' => $p,
            'checkin' => $r->checkin,
            'checkout' => $r->checkout,
            'time_in' => Carbon::now(),
            'time_alert' => $r->timeout,
            'status' => '1',
            'payment_method' => $r->payment_method,
            'no_people' => $r->people,
            'discount' => $r->discount,
            'autorized_by' => $r->autorize
            ]);
                return array(
                'client_name' => $bkins->client_name,
                'client_phone' => $bkins->client_phone,
                'checkin_date' => $bkins->checkin_date,
                'checkout_date' => $bkins->checkout_date,
                'payment_status' => $bkins->payment_status == 1 ? 'Paid' : 'Not Paid',
                'bst' => '0'
                );
            }
        }
            }else{
                session()->put('data',[
                    'room_id' => $r->room_id,
                    'client_name' => $r->customer_name,
                    'client_phone' => $r->customer_mobile,
                    'bookoption' => $r->booking_option,
                    'client_alt_phone' => $r->alternative_mobile,
                    'room_type' => $r->roomtype,
                    'duration' => $r->durations,
                    'timing' => $r->timing,
                    'amount_paid' => $p,
                    'checkin' => $r->checkin,
                    'checkout' => $r->checkout,
                    'time_in' => Carbon::now(),
                    'time_alert' => $r->timeout,
                    'status' => '1',
                    'payment_method' => $r->payment_method,
                    'no_people' => $r->people
                ]);
            
                return array(
                    'client_name' => $chins->client_name,
                    'client_phone' => $chins->client_phone,
                    'checkin_date' => $chins->checkin,
                    'checkout_date' => $chins->checkout,
                    'checkedin_by' => $chins->checkedin_by,
                    'chk' => 'Checked in',
                    'chkst' => '0',
                );
        }
        
     }

     public function continue_tocheckin(){
        $chid = ClientCheckinout::create([
            'room_id' => session()->has('data') ? session()->get('data')['room_id'] : "",
            'client_name' => session()->has('data') ? session()->get('data')['client_name'] : "",
            'client_phone' => session()->has('data') ? session()->get('data')['client_phone'] : "",
            'bookoption' => session()->has('data') ? session()->get('data')['bookoption'] : "",
            'client_alt_phone' => session()->has('data') ? (!empty(session()->get('data')['client_alt_phone']) ? session()->get('data')['client_alt_phone'] : "") : "",
            'room_type' => session()->has('data') ? session()->get('data')['room_type'] : "",
            'duration' => session()->has('data') ? session()->get('data')['duration'] : "",
            'timing' => session()->has('data') ? session()->get('data')['timing'] : "",
            'amount_paid' => session()->has('data') ? session()->get('data')['amount_paid'] : "",
            'checkin' => session()->has('data') ? session()->get('data')['checkin'] : "",
            'checkout' => session()->has('data') ? session()->get('data')['checkout'] : "",
            'checkedin_by' => Auth::guard('admin')->user()->name,
            'time_in' => session()->has('data') ? session()->get('data')['time_in'] : "",
            'time_alert' => session()->has('data') ? session()->get('data')['time_alert'] : "",
            'no_people' => session()->has('data') ? session()->get('data')['no_people'] : "",
            'status' => session()->has('data') ? session()->get('data')['status'] : "",
            'payment_method' => session()->has('data') ? session()->get('data')['payment_method'] : "",   
             
        ]);
       
        return array(
            'success' => '1',
            'id' => $chid->id
        );
     }

     public function checkin_client_via_booking(){
        $bkup = Booking::where('id',request()->uid)->first();
        if(!empty($bkup)){
            $bkup->update([
                'bstatus' => '0',
                'status' => '0',
            ]);
            $dte = explode("-",$bkup->timing);
            $rm = Room::findorfail($bkup->room_id);
            $chins =  ClientCheckinout::where('room_id',$bkup->room_id)
                                        ->where('status','1')->first();
             if(empty($chins)){
                
        $chid = ClientCheckinout::create([
            'room_id' => $bkup->room_id,
            'client_name' => $bkup->client_name,
            'client_phone' => $bkup->client_phone,
            'bookoption' => $bkup->bookoption,
            'room_type' => $rm->room_type,
            'duration' => $bkup->duration,
            'timing' => $bkup->timing,
            'amount_paid' =>$bkup->amount_paid,
            'checkin' => $bkup->checkin_date,
            'checkout' => $bkup->checkout_date,
            'time_in' => Carbon::now(),
            'time_alert' => date("h:i",strtotime($dte[1])),
            'checkedin_by' => Auth::guard('admin')->user()->name,
            'no_people' => $bkup->no_people,
            'status' => '1',
            'payment_method' => !empty(request()->payment_method) ? request()->payment_method : $bkup->payment_method,
            ]);
   
            return array(
                'success' => '1',
                'id' => $chid->id
            );
          }else{
            session()->put('data',[
                'room_id' => $bkup->room_id,
            'client_name' => $bkup->client_name,
            'client_phone' => $bkup->client_phone,
            'bookoption' => $bkup->bookoption,
            'room_type' => $rm->room_type,
            'duration' => $bkup->duration,
            'timing' => $bkup->timing,
            'amount_paid' =>$bkup->amount_paid,
            'checkin' => $bkup->checkin_date,
            'checkout' => $bkup->checkout_date,
            'time_in' => Carbon::now(),
            'time_alert' => date("h:i",strtotime($dte[1])),
            'checkedin_by' => Auth::guard('admin')->user()->name,
            'no_people' => $bkup->no_people,
            'status' => '1',
            'payment_method' => !empty(request()->payment_method) ? request()->payment_method : $bkup->payment_method,
            ]);
        
            return array(
                'client_name' => $chins->client_name,
                'client_phone' => $chins->client_phone,
                'checkin_date' => $chins->checkin,
                'checkout_date' => $chins->checkout,
                'checkedin_by' => $chins->checkedin_by,
                'chk' => 'Checked in',
                'chkst' => '0',
            );
          }
        }
     }
  
     public function checkins_out($id){
        ClientCheckinout::findorfail($id)->update([
            'time_out' => Carbon::now(),
            'status' => '0',
            'checkedout_by' => Auth::guard('admin')->user()->name,
        ]);

        $bkup = Booking::where('room_id',request()->roomid)->first();
        if(!empty($bkup)){
            $bkup->update([
                'bstatus' => '0',
                'status' => '0'
            ]);
        }
        return redirect()->back()->with('success','Check out successful');
     }

     public function searchquery(){
        $rom = Room::where('room_name',request()->q)->first();
        if($rom){
          return view('admin.searchpage')->with('sears',ClientCheckinout::where('room_id',$rom->id)->get());
        }else{
            $resl = ClientCheckinout::where('client_name','like','%'.request()->q.'%')
                                      ->orWhere('client_phone','like','%'.request()->q.'%')->get();
            return view('admin.searchpage')->with('sears',$resl); 
        }
       
     }

     public function print_recipt(){
        session()->forget('data');
        return view('admin.print_recipt')->with('recpt',ClientCheckinout::findorfail(request()->chkid));
     }

     public function bookingopt_index(){
        return view('admin.hotel.bookoption')->with('bookopts',hours::all());
     }
     public function bookingopt_store(Request $r){
        $this->validate($r,[
            'booking_option.*' => ['required','string'],
            'duration.*' => ['required','string']
        ]);

        foreach($r->booking_option as $key => $val){
            hours::create([
              'room_options' => $val,
              'hours' => $r->duration[$key]
            ]);
        }
        return redirect()->back()->with('success','record saved');
     }
     public function bookingopt_update(Request $r){
        $upbk = hours::findorfail($r->uid);
        $upbk->room_options = $r->bookopt;
        $upbk->hours = $r->duration;
        $upbk->save();
        return redirect()->back()->with('success','record updated');
     }

     public function bookingopt_delete($id){
       $hdel = hours::findorfail($id);
       $hdel->delete();
        return redirect()->back()->with('success','record deleted');
     }

     public function get_time_out(){
        $expdata = array();
        $expis = ClientCheckinout::whereTime('time_alert', '>=', date('h:i'))
                                   ->where('status','1')->get();
        if(!empty($expis)){
            foreach($expis as $exp){
                $expdata[] = '<div class="bg-danger text-white mb-2">
                               <p class="mb-0">Please time for the customer in room: '.ucwords($exp->room->room_name).' have expired</p>
                               <span>Expiry Time: '.date('h:ia',strtotime('time_alert')).'</span>
                              </div>';
            }
            return array(
                'records' => $expdata,
                'result' => '1'
            );       
        }
     }
}
