<div class="ticket-container mb-5">
        <div class="card custom-bg w-75 p-4 d-flex">
            <div class="row">
                <div class="pb-3 h3 text-left">Where are you heading?</div>
            </div>
            <!-- {{ Form::open(array('id'=>"bus-form"))}} -->
            <form action="{{ url('available') }}" id="bus-form">
                <div class="row">   
                    <div class="form-group col-md align-items-start flex-column">
                        <label for="origin" class="d-inline-flex">From</label>
                        <select placeholder="City or Province" class="form-control" id="origin" name="origin"
                            required>
                                <option value="" disabled selected>City or Province</option>
                            @foreach($schedule as $schedules)
                                <option value="{{$schedules->start_point}}">{{ $schedules->start_point }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group col-md align-items-start flex-column">
                        <label for="arrival" class="d-inline-flex">To</label>
                        <select placeholder="City or Province" class="form-control" id="arrival" name="arrival"
                            required>
                            <option value="" disabled selected>City or Province</option>
                            @foreach($schedule as $schedules)
                                <option value="{{$schedules->destination}}">{{ $schedules->destination }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="row">
                    <div class="form-group col-md align-items-start flex-column">
                        <label for="departure-date" class=" d-inline-flex">Depart date</label>
                        <input type="date" class="form-control" id="departure-date" name="departure-date"
                            onkeydown="return false" required>
                    </div>
                    <div class="form-group col-md align-items-start flex-column">
                        <label for="return-date" class="d-inline-flex">Return date</label>
                        <input type="date" placeholder="One way" value=""
                            onChange="this.setAttribute('value', this.value)" class="form-control" id="return-date"
                            name="return-date">
                    </div>
                </div>
                <div class="row">
                    <div class="col-auto mt-2 align-items-end">
                        <button class="btn btn-primary" data-toggle="modal" data-target=#demoModal>Search Ticket</button>
                       <!--  {{ Form::submit('Search Ticket', array('class' => "btn btn-primary", 'data-toggle'=>"modal", 'data-target'=>"#demoModal")) }} -->
                    </div>
                </div>
            <!-- {{ Form::close() }} -->
            </form>
        </div>
    </div>
