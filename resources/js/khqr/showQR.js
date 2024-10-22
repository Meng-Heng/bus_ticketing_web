import { generateQRCode } from './generateQR.js';

$(document).ready(function () {
    $('#paymentBtn').on('click', async (e) => {
        try {
            e.preventDefault()
            axios.get('generate-qr').then(function(response) {
                $('#paymentModal .modal-body').html (
                    // document.getElementById("image").src = "https://api.qrserver.com/v1/create-qr-code/?size=150x150&data=" + encodeURIComponent(response.generateQRCode)
                )
                $('#paymentModal').modal('show')    
            })
        } catch (error) {
            console.log('All Found Errors: ' + console.error)
        }
    })
})

// document.getElementById("image").src = "https://api.qrserver.com/v1/create-qr-code/?size=150x150&data=" + encodeURIComponent(qrResponse.data.qr);