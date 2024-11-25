<div class="modal fade" id="ticketModal" tabindex="-1" role="dialog" aria-labelledby="ticketModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                    <h5 class="modal-title" id="ticketModalLabel">{{__("Your Ticket")}}</h5>
                    <button  type="button" data-mdb-button-init data-mdb-ripple-init class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                @if(session('not_found'))
                <div class="alert alert-success">
                        {{ session('not_found') }}
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                @endif
                {{-- Ticket will be place here --}}
            </div>
        </div>
    </div>
</div>
