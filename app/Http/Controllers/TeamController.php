<?php

namespace App\Http\Controllers;

use App\Models\Team;
use Illuminate\Http\Request;

class TeamController extends Controller
{
    public function  __construct(){
        $this->middleware('auth:admin');
   }
   /**
    * Display a listing of the resource.
    *
    * @return \Illuminate\Http\Response
    */
   public function index()
   {
       return view('admin.team.index')->with('allteams', Team::orderBy('id','DESC')->get());
   }

   /**
    * Show the form for creating a new resource.
    *
    * @return \Illuminate\Http\Response
    */
   public function create()
   {
        return view('admin.team.create');
   }

   /**
    * Store a newly created resource in storage.
    *
    * @param  \Illuminate\Http\Request  $request
    * @return \Illuminate\Http\Response
    */
   public function store(Request $request)
   {
        $this->validate($request,[
          'name' => ['required','string'],
          'file' => ['required','image']
       ]);

       $pods = $request->file('file');
       $newpodpath = time()."_".$pods->getClientOriginalName();
       $pods->move('imageupload',$newpodpath);
           
       Team::create([
           'name' => $request->name,         
           'position' => $request->position,
           'image' => 'imageupload/'.$newpodpath
       ]);
       
     
         return redirect()->route('team.index')->with('success','Team Added');
   }

   /**
    * Display the specified resource.
    *
    * @param  int  $id
    * @return \Illuminate\Http\Response
    */
   public function show($id)
   {
       //
   }

   /**
    * Show the form for editing the specified resource.
    *
    * @param  int  $id
    * @return \Illuminate\Http\Response
    */
   public function edit($id)
   {
       return view('admin.team.edit')->with('edt', Team::findorfail($id));
   }

   /**
    * Update the specified resource in storage.
    *
    * @param  \Illuminate\Http\Request  $request
    * @param  int  $id
    * @return \Illuminate\Http\Response
    */
   public function update(Request $request, $id)
   {  
        $this->validate($request,[
          'name' => ['required','string'],        
        //   'details' => ['required','string'],
       ]);


        $mypod = Team::findorfail($id);

            if ($request->hasFile('file')) {
             if(file_exists($mypod->image)){
              unlink($mypod->image);
             }
             $updateimg = $request->file('file');
       $updateimgpath = time()."_".$updateimg->getClientOriginalName();
       $updateimg->move('imageupload',$updateimgpath);
         $mypod->image = 'imageupload/'.$updateimgpath;
        }

        $mypod->name = $request->name;
        $mypod->position = $request->position;

        $mypod->save();

         return redirect()->route('team.index')->with('success','Team Updated');
   }

   /**
    * Remove the specified resource from storage.
    *
    * @param  int  $id
    * @return \Illuminate\Http\Response
    */
   public function destroy($id)
   {
       $podel = Team::findorfail($id);

       if (file_exists($podel->image)) {
          unlink($podel->image);
        }
        $podel->delete();

         return redirect()->route('team.index')->with('success','Team Deleted');
   }
}
