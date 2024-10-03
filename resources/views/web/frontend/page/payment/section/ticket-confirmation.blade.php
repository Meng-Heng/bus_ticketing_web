<div class="container row">
    <h1 class="upcomming">Your Bus Ticket</h1>
    <div class="item col">
        <div class="item-right">
          <img class="mb-5" src="{{ asset('images/logo/logo.png')}}" height="100" alt="Bus4U Logo"/>
          <div class="col text-center">
            <div class="row">
              <h3>Bus: {{$buses->bus_plate}}</h3>
            </div>
            <div class="row">
              <h3>Seats number: {{$seats}}</h3>
            </div>
              <span class="up-border"></span>
              <span class="down-border"></span>
          </div> 
        </div>
        <!-- end item-right -->
        <div class="item-left">
          <form method="POST" action="{{route('ticket.store')}}">
            <input type="hidden" name="user" value="{{$users->id}}">
            <input type="hidden" name="schedule" value="{{$schedules->id}}">
            <input type="hidden" name="storage" value="{{$storages->id}}">
            <input type="hidden" name="price" value="{{$prices->id}}">
          <p class="event">{{$users->username}}</p>
          <div class="row">
            <div class="col">
              <h2 class="title">{{$schedules->origin}}</h2>
            </div>
            <div class="col">
              <h3>To</h3>
            </div>
            <div class="col">
              <h2 class="title">{{$schedules->destination}}</h2>
              <h2 class="title">Plate {{$buses->bus_plate}}</h2>
              <h2 class="title">{{$storages->luggage}}</h2>
              <h2 class="title">{{$prices->price}}</h2>
            </div>
          </div>
          <div class="sce">
            <div class="icon">
              <i class="fa fa-bus"></i>
            </div>
            <div class="row">
              <div class="col">
                <h2 class="title">Seat </h2>
              </div>
              <div class="col">
                <h3>To</h3>
              </div>
              <div class="col">
                <h2 class="title"></h2>
              </div>
            </div>
                          <p>Monday 15th 2016 <br/> 15:20Pm & 11:00Am</p>
                        </div>
                        <div class="fix"></div>
                        <div class="loc">
                          <div class="icon">
                            <i class="fa fa-map-marker"></i>
                          </div>
                          <p>North,Soth, United State , Amre <br/> Party Number 16,20</p>
                        </div>
                        <div class="fix"></div>
                        <button class="tickets">Tickets</button>
                      </div> <!-- end item-right -->
          </form>
                    </div> <!-- end item -->
                  </div>
