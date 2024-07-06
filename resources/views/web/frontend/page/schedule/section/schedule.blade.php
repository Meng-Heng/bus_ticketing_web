
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">{{__("Select your seat")}}</h5>
                    <button  type="button" data-mdb-button-init data-mdb-ripple-init class="btn-close" data-dismiss="modal" aria-label="Close"></button>
            </div>
                <div class="modal-body">
                    <div class="seat-form">
                        @include('web.frontend.page.schedule.section.seat')
                    </div>
                    <div class="bus-info">
                        @include('web.frontend.page.schedule.section.bus_info')
                    </div>
                </div>
                <div class="modal-footer">
                    <button  type="button" class="btn btn-primary">{{__("Proceed")}}</button>
                </div>
            </div>
        </div>
    </div>
</div>
