<div class="modal fade" id="bakongModal" tabindex="-1" role="dialog" aria-labelledby="bakongModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="bakongModalLabel">{{__("Scan to pay")}}</h5>
                <button  type="button" data-mdb-button-init data-mdb-ripple-init class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <canvas id="qrCodeCanvas">
                    {{-- Bakong KhQR --}}
                </canvas>
            </div>
        </div>
    </div>
</div> 
