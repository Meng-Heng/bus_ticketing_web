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
	<div class="row schedule-row" id="bus_schedule" method="GET">
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
				<button type="button" data-id="{{ $schedule->id }}" class="btn btn-primary btn-xs load-ajax-modal scheduleBtn" role="button" id="myScheduleId">BUY NOW</button>
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

@include('web.frontend.page.schedule.section.schedule') 

<script type="text/javascript">

	$(document).ready(function () {
		$('#myScheduleId').on('click', async (e) => {
			try {
			e.preventDefault();
				var id = $(e.target).data('id')
				$('#exampleModal').modal('show')
					axios.get('available/{schedule_id}', {
						param: {
							schedule_id: id
						}
					}).then((response) => {
						console.log(response);
					})
				console.log(id)
			} catch (error) {
				console.log(error)
			}
		})
	})

	// $(document).ready(function () {
	// 	$('#myScheduleId').on('click', () => {
	// 		try {
	// 			var id = $('.scheduleBtn').$(this).data('id')
	// 			$('#exampleModal').modal('show')
	// 			$.get('available/'+id, function(data){
	// 				$('#exampleModal .modal-body').html(data);
	// 			});
	// 			console.log(id)
	// 		} catch (error) {
	// 			console.log(error)
	// 		}
	// 	})
	// })

	// myId = document.getElementById('myScheduleId')
	// $(document).ready(function () {
	// 	$('#myScheduleId').on('click', () => {
	// 		try {
	// 		const res = axios.get('/testing2',{
	// 			params: {
	// 				id_schedule: myId
	// 			}
	// 		})
	// 		console.log(id_schedule)
	// 		} catch (error) {
	// 			console.log(error)
	// 		}
	// 	})
	// })
		// $('#exampleModal'.modal('show'))
		// var scheduleId = $('#bus_schedule').value();

		// scheduleId.on('click','.scheduleBtn', function() {

		// 	var data = scheduleId.data();
		// 	console.log(data);
		// 	$('#scheduleForm').attr('action','/available/'+data)
		// 	$('#exampleModal'.modal('show'))
		// })
		// // $seat_count = Bus::whereHas('bus_schedule', function ($q) use ($schedule_id) {
        // //     $q->where('id', $schedule_id);
        // // })->first()->total_seat;

		// query1 = select bus_id where id = scheduleId
		// Get ID of the row on schedule id from view (with axios await and async + get) JS --> post to one route/{id}
		// Use that id to fetch all data within that id
		// Loop the data we want back to the modal using JS

</script>
