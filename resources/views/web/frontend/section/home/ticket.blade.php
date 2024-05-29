<div class="ticket-box my-5 mx-6">
        <form class="row g-3" id="ticket-box">
            <h2>Where are you heading?</h2>
            <div class="col-md-10">
                <div class="input-group origin-box">
                    <div class="row">
                        <i class="fas fa-location md-3"></i>
                        <input id="txtBusOrigin" name="txtOrigin" class="form-control origin md-5" type="text" placeholder="Leaving from..." autocomplete="off">
                        </input>
                    </div>
                </div>
            </div>
            <!-- @include('web.frontend.component.calendar') -->
            <div class="col-12">
                <button type="submit" class="btn btn-primary">Search Tickets</button>
            </div>
        </form>
</div>