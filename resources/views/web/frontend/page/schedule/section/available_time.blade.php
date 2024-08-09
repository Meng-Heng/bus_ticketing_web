<div class="schedule-row">
	<div class="row mx-auto schedule-card">
		<div class="col col-lg-5">
			<h2 class="card-schedule-date justify-center">Date: {{ $origin_date }}</h2>
		</div>
		<div class="col">
			<div class="row">
				<h4>{{ $origin }}</h4>
			</div>	
			<div class="row">
				<h6 class="hint-country">Cambodia</h6>
			</div>	
		</div>
		<div class="col">
			<i class="fa-solid fa-circle-arrow-right schedule-arrow-right"></i>
		</div>
		<div class="col">
			<div class="row">
				<h4>{{ $arrived }}</h4>
			</div>
			<div class="row">
				<h6 class="hint-country">Cambodia</h6>
			</div>
		</div>
	</div>
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
					alt="Bus4U Logo"
					loading="lazy"
        />
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

@include('web.frontend.page.schedule.section.schedule') 

<script type="text/javascript" src="{{asset ('js/seat.js')}}"></script>

		{{-- // query1 = select bus_id where id = scheduleId
		// Get ID of the row on schedule id from view (with axios await and async + get) JS --> post to one route/{id}
		// Use that id to fetch all data within that id
		// Loop the data we want back to the modal using JS --}}

