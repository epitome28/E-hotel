<?php

namespace App\Http\Controllers;

use App\Models\Testimonial;
use Illuminate\Http\Request;

class TestimonialController extends Controller
{
    public function __construct(){
        $this->middleware('auth:admin');
    }

    public function index(){
        return view('admin.testimonial.index')->with('txtm',Testimonial::all());
    }

    public function create(){
        return view('admin.testimonial.create');
    }

    public function store(Request $r){
        $this->validate($r,[
            'name' => ['required'],
            'content' => ['required'],
        ]);
       
        Testimonial::create([
            'name' => $r->name,
            'content' => $r->content,
        ]);
        return redirect()->route('tst.index')->with('success','Record created');
    }

    public function edit($id){
        return view('admin.testimonial.edit')->with('tsed',Testimonial::findorfail($id));
    }

    public function update(Request $r,$id){
        $this->validate($r,[
            'name' => ['required'],
            'content' => ['required']
        ]);
        $tst =  Testimonial::findorfail($id);
       $tst->update([
            'name' => $r->name,
            'content' => $r->content
        ]);
        return redirect()->route('tst.index')->with('success','Record Updated');
    }

    public function destroy($id){
        $delts = Testimonial::findorfail($id);
      
        $delts->delete();
        return redirect()->back()->with('success','Record Deleted');
    }
}
