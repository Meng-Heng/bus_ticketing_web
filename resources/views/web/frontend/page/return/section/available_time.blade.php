@if(isset($departureData))
<div class="schedule-row">
	<h2 class="editable schedule-date" name="depature-date" data-value="{{$departureData['return_date']}}">Date: {{ $departureData['return_date'] }}</h2>
	<div class="line"></div>
	<div class="row">
		<h4 class="editable origin" name="origin" data-value="{{$departureData['origin']}}">{{ $departureData['origin'] }}</h4>
		<h6 class="hint-country">Cambodia</h6>
	</div>
		<i class="fa-solid fa-circle-arrow-left schedule-arrow-right"></i>
	<div class="row">
		<h4 class="editable arrival" name="arrival" data-value="{{$departureData['arrived']}}">{{$departureData['arrived']}}</h4>
		<h6 class="hint-country">Cambodia</h6>
	</div>
	<button class="btn btn-primary" id="scheduleEdit" onclick="search(this)"><i class="fa-solid fa-pencil"></i></button>
</div>
<div class="container" id="myScheduleBtn">
	@foreach($result as $returnSchedule)
		<div class="row schedule-row" id="bus_schedule" >
			<div class="col origin-schedule">
					<h4><b>Departure time</b> {{ $returnSchedule->departure_time }}</h4>
			</div>
			<div class="col right-arrow-icon">
					<img src="{{asset('images/background/schedule/line-right.svg')}}">
			</div>
			<div class="col destination-schedule col-md-3">
					<h4><b>Estimated time of arrival</b> {{ $returnSchedule->arrival_time }}</h4>
			</div>
			<div class="col ticket-price">
					<h3>{{ $departureData['price']->currency }} {{ $departureData['price']->price }}<h3>
			</div>
			<div class="col schedule-status">
				<div class="row">
					<button type="button" data-id="{{ $returnSchedule->id }}" class="btn btn-primary btn-xs load-ajax-modal scheduleBtn" role="button">BUY NOW</button>
				</div>
			</div>
			<hr>
			<div class="row schedule-info">
				<div class="col col-2">
					<i class="fa-solid fa-map-pin"></i>
					<button id="stationBtn">Boarding location</button>
				</div>
				<div class="col col-2">
					<i class="fa-solid fa-circle-info"></i>
					<button id="tripBtn">Trip info</button>
				</div>
				<div class="col col-2">
					<i class="fa-solid fa-location-dot"></i>
					<button id="station_btn">Drop off location</button>
				</div>
				<div class="col col-4">
					<img class="schedule-logo"
						src="{{ asset('images/logo/logo.png')}}"
						height="40"
						alt="Bus4U Logo"/>
				</div>
			</div>
		</div>
	</div>
	@endforeach

@if ($result->hasPages())
    <div class="pagination-wrapper center">
         {{ $result->links() }}
    </div>
@endif

@endif
