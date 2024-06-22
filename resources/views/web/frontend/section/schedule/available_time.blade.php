<div class="container card-schedule">
	<div class="row mx-auto">
		<div class="col-md-5">
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
	<div class="row mx-auto">
		<p class="card-schedule-date justify-center">Date: {{ $origin_date }}</p>
	</div>
  </div>
</div>
@foreach ($result as $schedule)

<div class="container">
	<div class="row schedule-row">
		<div class="col origin-schedule">
			<div class="row origin-time">
			Departure: {{ $schedule->departure_time }}
			</div>
			<div class="row origin-start-point">
			{{ $schedule->origin }}
			</div>
			<div class="row boarding-point">
				@if($schedule->origin == 'Phnom Penh')
					<a href="">Boarding point</a>
				@else
					<a href="">N/A</a>
				@endif
			</div>
		</div>
		<div class="col schedule-info">
			<div class="row">Non Stop Travel</div><br>
			<div class="row">
				<a href="">Trip info</a>
			</div>
		</div>
		<div class="col destination-schedule">
			<div class="row destination-time">
			Arrival: {{ $schedule->arrival_time }}
			</div>
			<div class="row destination-depart">
			{{ $schedule->destination }}
			</div>
			<div class="row boarding-point">
				@if($schedule->destination == 'Phnom Penh')
					<a href="">Drop off point</a>
				@else
					<a href="">N/A</a>
				@endif
			</div>
		</div>
		<div class="col">
			<div class="row ticket-price">Price</div><br>
			<div class="row align-center">
			@if($schedule->sold_out == 0)
				<p>Limited seats left!</p>
			@else
				<p>Sold out </p>
			@endif
			</div>
		</div>
		<div class="col schedule-status">
			
			<div class="row">
				<button type="button" data-mdb-button-init data-mdb-ripple-init class="btn btn-primary" data-mdb-modal-init data-mdb-target="#exampleModal">POPUP</button>
			{{ Form::submit('BUY NOW', array('class' => "btn btn-primary buy-ticket")) }}
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