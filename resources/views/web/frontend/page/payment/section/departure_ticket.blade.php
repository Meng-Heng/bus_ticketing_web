<header>
    <div class="row flight">
        <div class="col logo">
            <img src="{{ asset('images/logo/logo.png')}}" height="50" class="logo bg-white">
        </div>
        <div class="col text-white">
            <h3>Departure Ticket</h3>
        </div>
        <div class="col bus text-white">
            <strong>Bus' License Plate</strong>
            <strong>{{ $departure_seat['schedule']->bus->bus_plate }}</strong>
        </div>
    </div>
</header>
<section class="cities">
    <div class="city">
    <small>From</small>
    <strong><button id="openStation">{{ $departure_data['origin'] }}</button></strong>
    </div>
    <div class="city">
    <small>To</small>
    <strong><button id="openBusStation">{{ $departure_data['arrived'] }}</button></strong>
    </div>
    <svg class="airplane">
    <use xlink:href="#airplane"></use>
    </svg>
</section>
<section class="infos">
    <div class="places">
    <div class="box">
        <small>Seat</small>
        <strong>
                @foreach( $departure_seat['departureSeatNumber'] as $seatNumber) 
                        {{ $seatNumber . " "}}
                @endforeach
        </strong>
    </div>
    <div class="box">
        <small>Station</small>
        <a><strong>{{ $departure_data['origin'] }} Station</strong></a>
    </div>
    <div class="box">
        <small>Luggage</small>
        <strong>{{ $departure_seat['storage']->luggage }} {{ $departure_seat['storage']->measurement }}</strong>
    </div>
    <div class="box">
        <small>Price</small>
        <strong>{{ $departure_data['price']->currency }} {{ $departure_data['price']->price }}</strong>
    </div>
    <div class="box">
        <small>Calculation</small>
        <strong>{{ $departure_seat['departureSeatCount'] }} Seat(s) * {{ $departure_data['price']->price }}</strong>
    </div>
    <div class="box">
        <small>Total</small>
        <strong>{{ $departure_data['price']->currency }} {{ $paywayData['total_sum_departure'] }}</strong>
    </div>
    </div>
    <div class="times">
    <div class="box">
        <small>Departure</small>
        <strong>{{ $departure_data['origin_date'] }}</strong>
    </div>
    <div class="box">
        <small>Time</small>
        <strong>{{ $departure_seat['schedule']->departure_time }}
        </strong>
    </div>
    <div class="box">
        <small>Arrival</small>
        <strong>{{ $departure_seat['schedule']->arrival_date }}</strong>
    </div>
    <div class="box">
        <small>Time</small>
        <strong>{{ $departure_seat['schedule']->arrival_time }}
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
        <a href="{{route('backtoschedule')}}" class="btn btn-success">Check other dates</a>
    </div>
    <svg class="qrcode">
        <use xlink:href="#qrcode"></use>
    </svg>
</section>