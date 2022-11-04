<div class="container-fluid booking pb-5 wow fadeIn" id="book-room" data-wow-delay="0.1s">
    <div class="container-fluid">
        <div class="bg-white shadow">
            <div class="row g-2">
                <div class="hotel-search-box">
                    <div class="container-fluid">
                        <div class="banner-search-form">
                            <p class="type"><span class="bookingIcon">Booking Type</span></p>
                            <div class="search-filters-wrap wow fadeInUp" data-wow-duration="0.4s" data-wow-delay="0.5s">
                                <form action="{{route('search')}}" class="booking-form">
                                    <div class="bookingTypRow text-center radio-warp">
                                        <div class="radioCol">
                                            <input type="radio" name="bookingType" id="hourly" value="by hour'" autocomplete="off" onchange="shwtime('by hour')" />
                                            <label for="hourly">Hotel by Hour</label>
                                        </div>
                                        <div class="radioCol">
                                            <input type="radio" name="bookingType" id="daily" value="by day" autocomplete="off" onchange="shwtime('by day')" checked/>
                                            <label for="daily">Hotel by Day</label>
                                        </div>
                                        <div class="radioCol">
                                            <input type="radio" name="bookingType" id="night" value="by night" autocomplete="off" onchange="shwtime('by night')"/>
                                            <label for="night">Hotel by night</label>
                                        </div>
                                        <div class="radioCol">
                                            <input type="radio" name="bookingType" id="grop" value="group stay" autocomplete="off" onchange="shwtime('group stay')"/>
                                            <label for="grop">Group Stay</label>
                                        </div>

                                        <div class="radioCol">
                                            <input type="radio" name="bookingType" id="weekly" value="short stay" autocomplete="off" onchange="shwtime('short stay')"/>
                                            <label for="weekly">Short Stay</label>
                                        </div>
                                        <div class="radioCol">
                                            <input type="radio" name="bookingType" id="monthly" value="long stay" autocomplete="off" onchange="shwtime('long stay')"/>
                                            <label for="monthly">Long Stay</label>
                                        </div>
                                        <div class="radioCol">
                                            <input type="radio" name="bookingType" id="annual" value="service apartment" autocomplete="off" onchange="shwtime('service apartment')"/>
                                            <label for="annual">Service Apartment</label>
                                        </div>
                                    </div>
                                    <div class="search-filter-Row clearfix">
                                        <div class="common-cols city-coloumn position-relative">
                                            <label  class="cityicon ccl"><i class="fas fa-map-marker-alt"></i>&nbsp;City or Place</label>
                                            <input type="text" id="searchText" class="form-control" name="cp" autocomplete="off" placeholder="Enter City or Hotel name">
                                            <ul class="list-unstyled py-3 bg-white text-dark position-absolute w-75 rounded-3 shadow-lg d-none" id="list" style="z-index:1;">
                                             <li class="htl py-2 border-bottom"></li>
                                             <li class="palc py-2"></li>
                                            </ul>   
                                        </div>
                                        <div id="coin">
                                        <div class="common-cols chkin-field">
                                            <label for="txtChkIn" class="calenderIcon ccl"><i class="fas fa-calendar-alt"></i>&nbsp;Check In</label>
                                            <input id="txtChkIn" type="date" class="form-control" name="cin" autocomplete="off">
                                        </div>
                                        
                                        <div class="common-cols chkin-field">
                                            <label for="txtChkOut" class="calenderIcon ccl"><i class="fas fa-calendar-alt"></i>&nbsp;Check Out</label>
                                            <input id="txtChkOut" type="date" class="form-control" name="cout" autocomplete="off">
                                        </div>
                                        </div>
                                        <div class="my" id="tm" style="display: none">
                                            <div class="common-cols chkin-field">
                                                <label for="txtChkIn" class="calenderIcon ccl"><i class="fas fa-calendar-alt"></i>&nbsp;Pick a day</label>
                                                <input id="txtChkIn" type="date" class="form-control w-100" name="date" autocomplete="off">
                                            </div>
                                        </div>
                                        <div class="common-cols common-cols-lg chkin-field">
                                            <label  class="adultIcon ccl"><i class="fas fa-user"></i>&nbsp;Adults</label>
                                            <input type="number" id="txtAdult" name="adult" class="form-control" value="0" min="0" max="50" step="1" autocomplete="off" />
                                        </div>
                                        <div class="common-cols common-cols-lg chkin-field">
                                            <label for="children" class="childrenIcon ccl"><i class="fas fa-child"></i>&nbsp;Children</label>
                                            <input type="number" id="children" name="children" class="form-control" value="0" min="0" max="50" step="1" autocomplete="off" />
                                        </div>

                                    </div>
                                    <input type="hidden" autocomplete="off" name="hotelid" id="hid" value="">
                                    <input type="hidden" autocomplete="off" name="state" id="stat" value="">
                                    <input type="hidden" autocomplete="off" name="city" id="cit" value="">
                                    <div class="btn-row">
                                        <input type="submit" id="btnSearch" class="common-btn" value="Search" />
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

{{-- <div class="common-cols common-cols-lg has-caret chkin-field">
    <label for="price" class="priceIconWrap ccl">₦&nbsp;Price</label>
    <select id="price" class="form-control" autocomplete="off">
        <option value="1000-2000">&#8358; 1,000 - 2,000</option>
        <option value="2000-5000">&#8358; 2,000 - 5,000</option>
        <option value="5000-10000">&#8358; 5,000 - 10,000</option>
        <option value="10000-20000">&#8358; 10,000 - 20,000</option>
        <option value="10000-20000">&#8358; 20,000 - 30,000</option>
        <option value="10000-20000">&#8358; 30,000 - 40,000</option>
        <option value="10000-20000">&#8358; 40,000 - 50,000</option>
        <option value="10000-20000">&#8358; 50,000 - 60,000</option>
        <option value="10000-20000">&#8358; 60,000 - 70,000</option>
        <option value="10000-20000">&#8358; 70,000 - 80,000</option>
        <option value="10000-20000">&#8358; 80,000 - 90,000</option>
        <option value="10000-20000">&#8358; 90,000 - 100,000</option>
        <option value="10000-20000">&#8358; 100,000 and Above</option>
        <option selected value="0">any</option>
    </select>
</div> --}}
<script>
    function shwtime(d){
    if(d === 'by hour'){
      document.getElementById('tm').style.display='block';
      document.getElementById('tm').style.width='100%';
      document.getElementById('coin').style.display='none';
      $("#hourModal").modal('show');
    }else if(d === 'by day'){
        document.getElementById('tm').style.display='block';
      document.getElementById('tm').style.width='100%';
      document.getElementById('coin').style.display='none';
       $("#dayModal").modal('show');
    }else if(d === 'by night'){
        document.getElementById('tm').style.display='block';
      document.getElementById('tm').style.width='100%';
      document.getElementById('coin').style.display='none';
       $("#nightModal").modal('show');
    }else if(d === 'group stay'){
      document.getElementById('tm').style.display='none';
       document.getElementById('coin').style.display='block';
       $("#groupModal").modal('show');
    }else if(d === 'short stay'){
      document.getElementById('tm').style.display='none';
       document.getElementById('coin').style.display='block';
       $("#shortModal").modal('show');
    }else if(d === 'long stay'){
      document.getElementById('tm').style.display='none';
       document.getElementById('coin').style.display='block';
       $("#longModal").modal('show');
    }else if(d === 'service apartment'){
      document.getElementById('tm').style.display='none';
       document.getElementById('coin').style.display='block';
       $("#serviceModal").modal('show');
    }
    }
</script>

