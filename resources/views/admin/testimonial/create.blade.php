@extends('layouts.app')
@section('title')
    Testimonial
@endsection
@section('pagetitle')
    Testimonial
@endsection
@section('adcontent')
<div class="row">
       <div class="card">
           <div class="card-header">
              <div class="float-right">
                Testimonial <a href="{{route('tst.index')}}" class="btn btn-info btn-sm float-end">Back</a>
              </div>
           </div>
           <div class="card-body">
               @include('includes.errors')
                            <form action="{{route('tst.store')}}" method="post" enctype="multipart/form-data" onsubmit="thisform(this)">
                                @csrf 
                                
                                        <div class="form-group">
                                          <input type="text" name="name" id="name" class="form-control border mb-3 px-2" value="{{old('name')}}" placeholder="Enter Name">     
                                        </div>                          
                                       <div class="form-group">
                                           <textarea name="content" id="content" cols="30" rows="10">{{old('content')}}</textarea>
                                     </div> 
                                                                     
                                     <div class="form-group mt-3">
                                         <button type="submit" id="btn" class="btn btn-success px-3 bts">Save</button> 
                                 </div>                          
                            </form>
                        </div>
                    </div>
             
             </div>
             
                          
@endsection

@section('adscript')
     <script>
      CKEDITOR.replace('content');
      </script>
{{-- <script type="text/javascript">
    const form = document.querySelector("#tstcret");
    form.addEventListener('submit',(e) =>{
        e.preventDefault();
        document.querySelector("#shwstatus").style.display='block';
        document.querySelector(".bts").disabled = true;
        axios.post(form.getAttribute('action'),form.FormData([0]))
        .then((res)=>{
           if(res.data == 'success'){
            Toastify({
            text: res.message,
            duration: 3000,
            close:true,
            gravity:"top",
            position: "right",
            backgroundColor: "#4fbe87",
        }).showToast();
           }
           document.querySelector(".bts").disabled = false;
        })
        .catch((error) =>{
            const err = error.response.data.errors;
            Object.keys(err).forEach(key => {
                Toastify({
                    text: err[key],
                    duration: 3000,
                    close:true,
                    gravity:"top",
                    position: "right",
                    backgroundColor: "#e85050",
                }).showToast();
            });
            document.querySelector(".bts").disabled = false;
            document.querySelector("#shwstatus").style.display='none';
        });
    });
    
</script> --}}
@endsection