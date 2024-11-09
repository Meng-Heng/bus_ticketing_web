<h2 class="feedback-header">Leave a Review</h2>
@if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
@endif
@if($errors->any())
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <ul class="mb-0">
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
<form class="feedback-form" action="{{ route('review.store') }}" method="POST">
    @csrf
    <div class="form-group">
        <label for="star">Rating:</label>
        <select name="star" id="star" class="form-control" required>
            <option value="5">5 Stars</option>
            <option value="4">4 Stars</option>
            <option value="3">3 Stars</option>
            <option value="2">2 Stars</option>
            <option value="1">1 Star</option>
        </select>
    </div>
    <div class="form-group">
        <label for="ticket_id">-- Choose your Ticket --</label>
        <select name="payment" id="ticket_id" class="form-control" required>
            @foreach($tickets as $ticket)
                <option value="{{ $ticket['payment_id'] }}">
                    {{ $ticket['ticket_id'] }} | {{ $ticket['payment_id'] }} 
                    - Schedule: from {{ $ticket['schedule']['origin'] }} to {{ $ticket['schedule']['destination'] ?? 'N/A' }}
                    - Date: from {{ $ticket['schedule']['departure_date'] ?? 'N/A' }} to {{ $ticket['schedule']['arrival_date'] ?? 'N/A' }}
                </option>
            @endforeach
        </select>
    </div>
    <div class="form-group">
        <label for="feedback">Feedback:</label>
        <textarea name="feedback" id="feedback" class="form-control" rows="4" placeholder="Maximum 255 characters" required></textarea>
    </div>
    <button type="submit" class="btn green-btn text-white">Submit Review</button>
</form>