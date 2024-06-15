<div class="card card-schedule">
  <div class="card-body text-white">
	<div class="row">
		<div class="col">
			<div class="row">
				<h4 class="card-title">{{ $origin }}</h4>
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
	<div class="row">
		<p class="card-text">Date: {{ $origin_date }}</p>
	</div>
  </div>
</div>
@foreach ($result as $schedule)
<div class="container">
	<div class="row schedule-row">
		<div class="col origin-schedule">
			<div class="row origin-time">
			{{ $schedule->departure_time }}
			</div>
			<div class="row origin-start-point">
			{{ $schedule->start_point }}
			</div>
		</div>
		<div class="col schedule-info">
			Non Stop Travel
		</div>
		<div class="col destination-schedule">
			<div class="row destination-time">
			{{ $schedule->arrival_time }}
			</div>
			<div class="row destination-depart">
			{{ $schedule->destination }}
			</div>
		</div>
		<div class="col ticket-price">
			<div class="row">Price</div>
		</div>
		<div class="col schedule-status">
			@if($schedule->sold_out == 0)
				<p>Limited seats left!</p>
			@else
				<p>Sold out </p>
			@endif
		</div>
	</div>
</div>

@endforeach