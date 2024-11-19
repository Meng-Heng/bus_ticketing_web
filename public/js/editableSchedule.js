function search(data) {
    let row = data.parentElement

    let arrival = row.querySelector('.arrival').getAttribute('data-value')
    let origin = row.querySelector('.origin').getAttribute('data-value')
    // let departure_date = row.querySelector('.departure-date').getAttribute('data-value')

    $(document).ready(function () {
        $('#scheduleEdit').on('click' , (e) => {
            try {
                e.preventDefault();
                $('#editScheduleModal').modal('show')
            } catch(error) {
                console.error(error)
            }
        })
    })
}
