 <!-- Modal by hour-->
 <div class="modal fade" id="hourModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5 text-dark" id="exampleModalLabel">Hotel by Hour</h1>
          <button type="button" class="btn-close text-dark font-wieght-bold" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <p>
            Need a hotel room, but only for a few hours during the day?<br>
            Room by hour allows you to book a room at any time during the day for a period. <br>
            Need to take a nap between flights or cut a busy work day.
          </p>
         
        </div>
        
      </div>
    </div>
  </div>

  {{-- by day --}}
  <div class="modal fade" id="dayModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5 text-dark" id="exampleModalLabel">Hotel by Day</h1>
          <button type="button" class="btn-close text-dark font-wieght-bold" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <p>
            Need a hotel room, but only for a few hours during the day or Whether you expect it to be a private fantasy or a nest for loved birds for few hours in the day.
          </p>
        </div>
        
      </div>
    </div>
  </div>

  {{-- night stay --}}
  <div class="modal fade" id="nightModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5 text-dark" id="exampleModalLabel">Hotel by night</h1>
          <button type="button" class="btn-close text-dark font-wieght-bold" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <p>
            The room by night is an elegant and comfortable room that is perfect suited to businessmen preparing for 
            a meeting and need a private time or wanting to catch a flight between the early hours of the day.
          </p>
        </div>
        
      </div>
    </div>
  </div>

  {{-- group stay --}}
  <div class="modal fade" id="groupModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5 text-dark" id="exampleModalLabel">Group Stay</h1>
          <button type="button" class="btn-close text-dark font-wieght-bold" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <p>
            Having a family celebration,a reunion or having birthday party.
          </p>
        </div>
        
      </div>
    </div>
  </div>

  {{-- short stay --}}
  <div class="modal fade" id="shortModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5 text-dark" id="exampleModalLabel">Short Stay</h1>
          <button type="button" class="btn-close text-dark font-wieght-bold" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <p>
            Having a family vacation,a reunion.
          </p>
        </div>
        
      </div>
    </div>
  </div>

  {{-- long stay --}}
  <div class="modal fade" id="longModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5 text-dark" id="exampleModalLabel">Long Stay</h1>
          <button type="button" class="btn-close text-dark font-wieght-bold" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <p>
            Whether you are staying with us for one night or a longer period, your health and well-being is our priority.<br>
            You will love the discreet luxury and cosy atmosphere.
          </p>
        </div>
        
      </div>
    </div>
  </div>

{{-- service apartment --}}
  <div class="modal fade" id="serviceModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5 text-dark" id="exampleModalLabel">Service Apartment</h1>
          <button type="button" class="btn-close text-dark font-wieght-bold" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <p>
            Enjoy the homey feeling of an apartment with the luxury service at your needs. 
          </p>
        </div>
        
      </div>
    </div>
  </div>

  {{-- user account --}}
  <div class="modal fade" id="userModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5 text-dark" id="exampleModalLabel">Account Credentials</h1>
          <button type="button" class="btn-close text-dark font-wieght-bold" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <form action="{{route('checkaccot')}}" id="valiem" method="get">
            <div class="form-group">
              <input type="email" name="email" autocomplete="off" class="form-control" required id="eme" placeholder="Enter Email Address">
            </div>
            <span class="emtxt"></span>
            <div class="form-group mt-3">
              <button type="submit" class="btn btn-dark float-end rounded-3" id="cemail">Submit</button>
            </div>
          </form>
        </div>
        
      </div>
    </div>
  </div>

  {{-- avaliable rooms --}}
  <div class="modal fade" id="avaroomModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5 text-dark" id="exampleModalLabel">Other Available Rooms</h1>
          <button type="button" class="btn-close text-dark font-wieght-bold" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body" id="rmcontnt">
        </div>
        
      </div>
    </div>
  </div>