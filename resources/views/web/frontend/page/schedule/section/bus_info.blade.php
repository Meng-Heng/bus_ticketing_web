<table class="table table-responsive" action="/employee" method="POST">
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
                            <div>
                                <td><button  type="submit" class="btn btn-primary">{{__("Proceed")}}</button></td>
                            </div>
</table>
