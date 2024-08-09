var selectedSeat = []

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
    } else {
        document.getElementById('seat-selection-output').innerHTML = "<b>None</b>"
    }
}

$(document).ready(function() {
    $('.modal').on('hidden.bs.modal', function() {
        selectedSeat = []
        displaySelectedSeat()
        $('#seat-check input[type="checkbox"]').prop('checked', false)
    })
})

