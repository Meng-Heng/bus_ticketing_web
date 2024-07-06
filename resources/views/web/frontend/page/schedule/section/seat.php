@foreach($result as $schedule)
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">{{__("Select your seat")}}</h5>
                    <button  type="button" data-mdb-button-init data-mdb-ripple-init class="btn-close" data-dismiss="modal" aria-label="Close"></button>
            </div>
                <div class="modal-body">
                    <div class="seat-form">
                        <div class="seat-status">
                            <div class="row d-flex align-items-center">
                                <div class="col">{{__("Available")}}</div>
                                <div class="col">{{__("Occupied")}}</div>
                                <div class="col">{{__("Selected")}}</div>
                            </div>
                        </div>
                            <ol class="bus fuselage">
                                <p class="center">{{_("The Front of the bus")}}</p>
                            <li class="row row--0">
                                <ol class="seats" type="Z">
                                    <li class="seat">
                                        <input type="checkbox" id="Driver" disabled />
                                        <label for="Driver"><i class="fa-solid fa-user"></i></label>
                                    </li>
                                    <li class="seat">
                                    </li>
                                    <li class="seat">
                                    </li>
                                    <li class="seat">
                                    </li>
                                    <li class="seat">
                                        <labe><i class="fa-solid fa-door-open"></i></label>    
                                    </li>
                                </ol>
                                </li>
                                <li class="row row--1">
                                <ol class="seats" type="A">
                                    <li class="seat">
                                        <input type="checkbox" id="A1" />
                                        <label for="A1">A1</label>
                                    </li>
                                    <li class="seat">
                                        <input type="checkbox" id="A2" />
                                        <label for="A2">A2</label>
                                    </li>
                                    <li class="seat">
                                    </li>
                                    <li class="seat">
                                        <input type="checkbox" id="A4" />
                                        <label for="A4">A4</label>
                                    </li>
                                    <li class="seat">
                                        <input type="checkbox" id="A5" />
                                        <label for="A5">A5</label>
                                    </li>
                                </ol>
                                </li>
                            </ol>
                    </div>
                    <div class="bus-info">
                        <table class="table table-responsive">
                            <tr class="row">
                                <td class="col">
                                    <p>{{__("Bus' Plate Number ")}}</p>
                                </td>
                                <td class="col">
                                    <p><b>{{$schedule->bus->bus_plate}}</b></p>
                                </td>
                            </tr>
                            <tr class="row">
                                <td class="col">
                                    <p>{{__("Departure at: ")}}</p>
                                </td>
                                <td class="col">
                                    <p><b>{{$schedule->departure_date}} ({{$schedule->departure_time}})</b></p>
                                </td>
                            </tr>
                            <tr class="row">
                                <td class="col">
                                    <p>{{__("Your transportation: ")}}</p>
                                </td>
                                <td class="col">
                                    <p><b>{{$schedule->origin}}</b></p>
                                </td>
                            </tr>
                            <tr class="row">
                                <td class="col">
                                    <p>{{__("Your destination: ")}}</p>
                                </td>
                                <td class="col">
                                    <p><b>{{$schedule->destination}}</b></p>
                                </td>
                            </tr>
                            <tr class="row">
                                <td class="col">
                                    <p>{{__("Storage Capacity: ")}}</p>
                                </td>
                                <td class="col">
                                    <p><b>{{ $storage->luggage}} {{ $storage->measurement}}</b></p>
                                </td>
                            </tr>
                            <tr class="row">
                                <td class="col">
                                    <p>{{__("Bus fare: ")}}</p>
                                </td>
                                <td class="col">
                                    <p><b>{{ $price->currency}} {{ $price->price}}</b></p>
                                </td>
                            </tr>
                            <tr class="row">
                                <td class="col">
                                    <p>{{__("Your seat: ")}}</p>
                                </td>
                                <td class="col">
                                    <p><b>??</b></p>
                                </td>
                            </tr>
                            <tr class="row">
                                <td class="col">
                                    <p>{{__("User ID: ")}}</p>
                                </td>
                                <td class="col">
                                    <p><b>??</b></p>
                                </td>
                            </tr>
                        </table>
                    </div>
                </div>
                <div class="modal-footer">
                    <button  type="button" class="btn btn-primary">{{__("Proceed")}}</button>
            </div>
        </div>
    </div>
</div>
@endforeach