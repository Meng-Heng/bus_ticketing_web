<div class="ticket-container mb-5">
        <div class="card custom-bg w-75 p-4 d-flex">
            <div class="row">
                <div class="pb-3 h3 text-left">{{ __("Where are you heading?") }}</div>
            </div>
            <form action="/available" id="bus-form" method="POST">
                {{ method_field('POST')}}
                {{ csrf_field()}}
                <div class="row">   
                    <div class="form-group col-md align-items-start flex-column">
                        <label for="origin" class="d-inline-flex">{{ __("From") }}</label>
                        <select placeholder="City or Province" class="form-control" id="origin" name="origin"
                            required>
                                <option value="" disabled selected>{{__("City or Province")}}</option>
                            @foreach($location as $locations)
                                <option value="{{$locations}}">{{ $locations }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group col-md align-items-start flex-column">
                        <label for="arrival" class="d-inline-flex">{{__("To")}}</label>
                        <select placeholder="City or Province" class="form-control" id="arrival" name="arrival" required>
                            <option value="" disabled selected>{{__("City or Province")}}</option>
                            @foreach($location as $locations)
                                <option value="{{$locations}}">{{ $locations }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="row">
                    <div class="form-group col-md align-items-start flex-column">
                        <label for="departure-date" class=" d-inline-flex">{{__("Depart date")}}</label>
                        <input type="date" class="form-control" id="departure-date" name="departure-date"
                            onkeydown="return false" required>
                    </div>
                    <div class="form-group col-md align-items-start flex-column">
                        <label for="return-date" class="d-inline-flex">{{ __("Return date") }}</label>
                        <input type="date" placeholder="One way" value=""
                            onChange="this.setAttribute('value', this.value)" class="form-control" id="return-date"
                            name="return-date">
                    </div>
                </div>
                <div class="row">
                    <div class="col-auto mt-2 align-items-end">
                        <button class="btn btn-primary">{{ __("Search Ticket")}}</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
