<div class="form-box align-items-center">
        <form class="row g-3" id="ticket-box">
            <h2>Where are you heading?</h2>
            <div class="col-md-5">
                <div class="input-group origin-box">
                    <input id="txtBusOrigin" name="txtOrigin" class="form-control search-control" type="text" placeholder="Leaving from..." autocomplete="off">
                        <span class="input-group-btn">
                            <a class="btn btn-default btn-search-control-addon" id="btnRemoveBusOrigin">
                                <span class="glyphicon glyphicon-remove">
                                    <!-- Insert -->
                                </span>
                            </a>
                        </span>
                    </input>
                </div>
            </div>
            <!-- @include('web.frontend.component.calendar') -->
            <div class="col-12">
                <button type="submit" class="btn btn-primary">Search Tickets</button>
            </div>
        </form>
</div>