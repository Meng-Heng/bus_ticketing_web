@extends('web.backend.layout.admin')
@section('content')
<main>
    <div class="container-fluid">
        <h1 class="mt-4">Add Schedule</h1>
        <div class="card mb-4">
            <div class="card-body">
                @if (count($errors) > 0)
                <div class="alert alert-danger">
                    <strong>Something is Wrong</strong>
                    <br><br>
                    <ul>
                        @foreach ($errors->all() as $error)
                        <li>{!! $error !!}</li>
                        @endforeach
                    </ul>
                </div>
                @endif
                <form method="POST" action="{{ route('schedule.store') }}">
                    @csrf
                    <!-- Bus Selection -->
                    <label for="bus_id">Bus:</label>
                    <select name="bus_id" id="bus_id" class="form-control" required>
                        @foreach ($buses as $id => $plate)
                            <option value="{{ $id }}">{{ $plate }}</option>
                        @endforeach
                    </select>
                    <!-- Origin Selection -->
                    <label for="origin">Origin:</label>
                    <select name="origin" id="origin" class="form-control" required>
                        @foreach ($locations as $location)
                            <option value="{{ $location }}">{{ $location }}</option>
                        @endforeach
                    </select>
                    <label for="departure_date">Departure Date:</label>
                    <input type="text" name="departure_date" id="departure_date" class="form-control" required placeholder="2024-12-21">
                    <label for="departure_time">Departure Time:</label>
                    <input type="text" name="departure_time" id="departure_time" class="form-control" required placeholder="00:00:00">
                    <!-- Destination Selection -->
                    <label for="destination">Destination:</label>
                    <select name="destination" id="destination" class="form-control" required>
                        @foreach ($locations as $location)
                            <option value="{{ $location }}">{{ $location }}</option>
                        @endforeach
                    </select>
                    <label for="arrival_date">Arrival Date:</label>
                    <input type="text" name="arrival_date" id="arrival_date" class="form-control" required placeholder="2024-12-21">
                    <label for="arrival_time">Arrival Time:</label>
                    <input type="text" name="arrival_time" id="arrival_time" class="form-control" required placeholder="00:00:00">
                    <label for="sold_out">Sold Out:</label>
                    <input type="text" name="sold_out" id="sold_out" class="form-control" value="0" readonly>
                    <!-- Pattern Selection -->
                    {{-- <div class="form-group">
                        <label for="pattern">Pattern:</label>
                        <div>
                            @foreach ($patterns as $patternName => $pattern)
                                <label>
                                    <input type="radio" name="pattern" value="{{ $patternName }}" required>
                                    {{ $patternName }}
                                </label>
                                <br>
                            @endforeach
                        </div>
                    </div> --}}
                
                    <!-- Departure Date -->
                    
                    <br>
                    <button type="submit" class="btn btn-primary">Create Schedule</button>
                </form>
            </div>
        </div>
    </main>
@endsection