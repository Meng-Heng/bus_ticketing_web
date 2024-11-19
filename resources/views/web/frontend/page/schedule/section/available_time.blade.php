<div class="schedule-row top-schedule">
	<h2 class="editable schedule-date" name="depature-date" data-value="{{$origin_date}}">Departure date: {{ $origin_date }}</h2>
	<div class="line"></div>
	<div class="row">
		<h4 class="editable origin" name="origin" data-value="{{$origin}}">{{ $origin }}</h4>
		<h6 class="hint-country">Cambodia</h6>
	</div>
		<i class="fa-solid fa-circle-arrow-right schedule-arrow-right"></i>
	<div class="row">
		<h4 class="editable arrival" name="arrival" data-value="{{$arrived}}">{{ $arrived }}</h4>
		<h6 class="hint-country">Cambodia</h6>
	</div>
	<button class="btn btn-success" id="scheduleEdit" onclick="search(this)"><i class="fa-solid fa-pencil"></i></button>
</div>

<div class="container" id="myScheduleBtn">
@foreach ($result as $schedule)
	<div class="row schedule-row daily-schedule" id="bus_schedule" >
		<div class="col origin-schedule">
			<div class="col">
				<h4>Departure time</h4>
			</div>
			<div class="col">
				<h4 class="schedule-time"><b>{{ $schedule->departure_time }}</b></h4>
			</div>
		</div>
		<div class="col right-arrow-icon">
			<div class="row">
				<img src="{{asset('images/background/schedule/line-right.svg')}}" style="color: #198754">
			</div>
		</div>
		<div class="col destination-schedule col-md-3">
			<div class="col">
				<h4>Estimated time of arrival</h4>
			</div>
			<div class="col">
				<h4 class="schedule-time"><b>{{ $schedule->arrival_time }}</b></h4>
			</div>
		</div>
		<div class="col ticket-price">
			<div class="col">
				<h2>{{ $price->currency }} {{ $price->price }}<h2>
			</div>
		</div>
		<div class="col schedule-status">
			<div class="row">
				<button type="button" data-id="{{ $schedule->id }}" class="btn btn-xs load-ajax-modal scheduleBtn" role="button">BUY NOW</button>
			</div>
		</div>
		<hr>
		<div class="col schedule-info">
			<div class="col">
				<i class="fa-solid fa-map-pin"></i>
				<button id="stationBtn">Boarding location</button>
			</div>
			<div class="col">
				<i class="fa-solid fa-circle-info"></i>
				<button id="tripBtn">Trip info</button>
			</div>
			<div class="col">
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
	@endforeach
</div>

@if ($result->hasPages())
    <div class="pagination-wrapper center">
         {{ $result->links() }}
    </div>
@endif
