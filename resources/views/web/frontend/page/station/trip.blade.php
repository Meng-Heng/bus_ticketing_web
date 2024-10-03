<div class="modal fade" id="tripModal" tabindex="-1" role="dialog" aria-labelledby="tripModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                    <h5 class="modal-title" id="tripModalLabel">{{__("Trip information")}}</h5>
                    <button  type="button" data-mdb-button-init data-mdb-ripple-init class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body row">
                <div class="card mb-5 rounded-10">
                    <div class="row g-0">
                        <div class="col-md-4">
                            <div class="card-body">
                            <h2 class="card-title text-left">{{__("Description")}}</h2>
                            <br>
                            <h5 class="card-text text-left">{{__("$origin – $arrived")}}</h5>
                                <ul>
                                    <li id="openStation">{{__("Boarding Terminal")}}: <b>{{$origin}} {{__("Station")}}</b></li>
                                    <li>{{__("One stop per trip (Half way to $arrived)")}}</li>
                                    <li id="openBusStation">{{__("Arrival")}}: <b>{{$arrived}} {{__("Station")}}</b></li>
                                    <li><b>Note:</b> {{__("Stop for restroom offered upon request.")}}</li>
                                </ul>
                            </div>
                        </div>
                        <div class="col md-8">
                            <div class="card-body">
                                <h2 class="card-title text-left">{{__("Amenities")}}</h2>
                                <div data-v-22ea3b9a="" class="amenities">
                                    <div data-v-22ea3b9a="" class="air_bus"><img data-v-22ea3b9a="" src="https://vetticket.utlog.net/public/amenities/1988932233.png" alt="" style="width: 45px; height: 45px;">
                                        <div data-v-22ea3b9a="" class="text">Drinking Water</div>
                                    </div>
                                    <div data-v-22ea3b9a="" class="air_bus"><img data-v-22ea3b9a="" src="https://vetticket.utlog.net/public/amenities/1053627869.png" alt="" style="width: 45px; height: 45px;">
                                        <div data-v-22ea3b9a="" class="text">Air Conditioned</div>
                                    </div>
                                    <div data-v-22ea3b9a="" class="air_bus"><img data-v-22ea3b9a="" src="https://vetticket.utlog.net/public/amenities/1708163063.png" alt="" style="width: 45px; height: 45px;">
                                        <div data-v-22ea3b9a="" class="text">Trained Drivers</div>
                                    </div>
                                    {{-- <div data-v-22ea3b9a="" class="air_bus"><img data-v-22ea3b9a="" src="https://vetticket.utlog.net/public/amenities/721072688.png" alt="" style="width: 45px; height: 45px;">
                                        <div data-v-22ea3b9a="" class="text">GPS System</div>
                                    </div> --}}
                                    <div data-v-22ea3b9a="" class="air_bus"><img data-v-22ea3b9a="" src="https://vetticket.utlog.net/public/amenities/1795527295.png" alt="" style="width: 45px; height: 45px;">
                                        <div data-v-22ea3b9a="" class="text">Toilet</div>
                                    </div>
                                    <div data-v-22ea3b9a="" class="air_bus"><img data-v-22ea3b9a="" src="https://vetticket.utlog.net/public/amenities/2026670714.png" alt="" style="width: 45px; height: 45px;">
                                        <div data-v-22ea3b9a="" class="text">Camera</div>
                                    </div>
                                    <div data-v-22ea3b9a="" class="air_bus"><img data-v-22ea3b9a="" src="https://vetticket.utlog.net/public/amenities/1077025677.png" alt="" style="width: 45px; height: 45px;">
                                        <div data-v-22ea3b9a="" class="text">Power outlet</div>
                                    </div>
                                    <div data-v-22ea3b9a="" class="air_bus"><img data-v-22ea3b9a="" src="https://vetticket.utlog.net/public/amenities/1370341241.png" alt="" style="width: 45px; height: 45px;">
                                        <div data-v-22ea3b9a="" class="text">Fire Extinguisher</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
