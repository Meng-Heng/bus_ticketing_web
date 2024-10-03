  
    <div class="p-3">
        <p class="mb-0 fw-bold h4">Your ticket information</p>
    </div>
    <div class="boarding-pass">
    <header>
      <img src="{{ asset('images/logo/logo.png')}}" height="50" class="logo bg-white">
      <div class="flight">
        <strong>Bus' License Plate</strong>
        <strong>{{$buses->bus_plate}}</strong>
      </div>
    </header>
    <section class="cities">
      <div class="city">
        <small>From</small>
        <strong><button id="openStation">{{$schedules->origin}}</button></strong>
      </div>
      <div class="city">
        <small>To</small>
        <strong><button id="openBusStation">{{$schedules->destination}}</button></strong>
      </div>
      <svg class="airplane">
        <use xlink:href="#airplane"></use>
      </svg>
    </section>
    <section class="infos">
      <div class="places">
        <div class="box">
          <small>Seat</small>
          <strong>{{$seats}}</strong>
        </div>
        <div class="box">
          <small>Station</small>
          <a><strong>{{$schedules->origin}} Station</strong></a>
        </div>
        <div class="box">
          <small>Luggage</small>
          <strong>{{$storages->luggage}} {{$storages->measurement}}</strong>
        </div>
        <div class="box">
          <small>Price</small>
          <strong>{{$prices->price}} {{$prices->currency}}</strong>
        </div>
      </div>
      <div class="times">
        <div class="box">
            <small>Departure</small>
            <strong>{{$schedules->departure_date}}</strong>
        </div>
        <div class="box">
            <small>Time</small>
            <strong>{{$schedules->departure_time}}
              @if($schedules->departure_time >= "12:00:00")
                  PM
              @else
                  AM
              @endif
            </strong>
        </div>
        <div class="box">
          <small>Arrival</small>
          <strong>{{$schedules->arrival_date}}</strong>
        </div>
        <div class="box">
            <small>Time</small>
            <strong>{{$schedules->arrival_time}}
              @if($schedules->arrival_time >= "12:00:00")
                  PM
              @else
                  AM
              @endif
            </strong>
        </div>
      </div>
    </section>
    <section class="strap">
      <div class="box">
        <small>passenger information</small>
        <div class="passenger">
          <small class="item-1">ID:</small>
          <strong class="item-1">{{$users->id}}</strong>
          <small class="item-2">Username:</small>
          <strong class="item-2">{{$users->username}}</strong>
          <small class="item-3">Gender:</small>
          @if($users->gender == 1)
          <strong class="item-3">Male</strong>
          @elseif($users->gender == 2)
          <strong class="item-3">Female</strong>
          @else
          <strong class="item-3">Prefer Not to Say</strong>
          @endif
          <small class="item-4">Contact:</small>
          <strong class="item-4">{{$users->contact}}</strong>
        </div>
      </div>
      <div class="box">
        <div class="date">
          <small>Issued Date</small>
          <strong>{{$current_time}}</strong>
        </div>
      </div>
      <div class="box box-2">
          <a href="{{route('backtoschedule')}}" class="btn btn-danger">Check other dates</a>
        </div>
      <svg class="qrcode">
        <use xlink:href="#qrcode"></use>
      </svg>
    </section>
  </div>