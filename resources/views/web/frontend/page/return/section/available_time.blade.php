<div class="schedule-row">
	<h2 class="editable schedule-date" name="depature-date" data-value="{{$origin_date}}">Date: {{ $origin_date }}</h2>
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
	<button class="btn btn-primary" id="scheduleEdit" onclick="search(this)"><i class="fa-solid fa-pencil"></i></button>
</div>

<div class="container" id="myScheduleBtn">
@foreach ($result as $schedule)
	<div class="row schedule-row" id="bus_schedule" >
		<div class="col origin-schedule">
				<h4><b>Departure time</b> {{ $schedule->departure_time }}</h4>
		</div>
		<div class="col right-arrow-icon">
				<img src="{{asset('images/background/schedule/line-right.svg')}}">
		</div>
		<div class="col destination-schedule col-md-3">
				<h4><b>Estimated time of arrival</b> {{ $schedule->arrival_time }}</h4>
		</div>
		<div class="col ticket-price">
				<h3>{{ $price->currency }} {{ $price->price }}<h3>
		</div>
		<div class="col schedule-status">
			<div class="row">
				<button type="button" data-id="{{ $schedule->id }}" class="btn btn-primary btn-xs load-ajax-modal scheduleBtn" role="button">BUY NOW</button>
			</div>
		</div>
		<hr>
		<div class="row schedule-info">
			<div class="col col-2">
				<i class="fa-solid fa-map-pin"></i>
					<a href="/station">Boarding location</a>
			</div>
			<div class="col col-2">
				<i class="fa-solid fa-circle-info"></i>
					<a href="">Trip info</a>
			</div>
			<div class="col col-2">
				<i class="fa-solid fa-location-dot"></i>
				<a href="/station">Drop off location</a>
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
