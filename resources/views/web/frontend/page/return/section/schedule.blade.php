<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">{{__("Select your seat")}}</h5>
                    <button  type="button" data-mdb-button-init data-mdb-ripple-init class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
                <form action="{{route('ticket.confirmation')}}" method="GET" id="scheduleForm">
                    {{ method_field('GET')}}
                    @csrf
                    <div class="modal-body">
                        <!-- Insert Schedule Information Later -->
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
