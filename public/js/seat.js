var selectedSeat = []
var seatCount = 0;

/* Departure & Return seats */
function displaySeatNumber(checkbox) {
    let seatNumber = checkbox.getAttribute('data-seat')
    if(checkbox.checked) {
        selectedSeat.push(seatNumber)
    } else {
        selectedSeat = selectedSeat.filter(seat => seat != seatNumber)
    }
    selectedSeat.sort()
    displaySelectedSeat()
}

function displaySelectedSeat() {
    if(selectedSeat.length > 0) {
        document.getElementById('seat-selection-output').innerHTML = "<p style='color:red'><b>" + selectedSeat.join(', ') + "</b></p>"
        document.getElementById('seat').value = selectedSeat
        seatCount = selectedSeat.length
        document.getElementById('selectedSeatCount').value = seatCount
    } else {
        document.getElementById('seat-selection-output').innerHTML = "<b>None</b>"
        document.getElementById('seat').value = ""
        document.getElementById('selectedSeatCount').value = ""
    }
}

$(document).ready(function() {
    $('.modal').on('hidden.bs.modal', function() {
        selectedSeat = []
        displaySelectedSeat()
        $('#seat-check input[type="checkbox"]').prop('checked', false)
    })
})
