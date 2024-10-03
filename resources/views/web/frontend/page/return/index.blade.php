@extends('web.frontend.template.layout')

@section('schedule-style')
    <!-- Bus Schedule Styles -->    
    <link href="{{asset('css/main/schedule.css')}}" rel="stylesheet" />
    <link href="{{asset('css/main/seat.css')}}" rel="stylesheet" />
    <meta name="_token" content="{{ csrf_token() }}" />
@endsection

@section('content')
    @include('web.frontend.page.return.section.available_time')

    @include('web.frontend.page.return.section.schedule') 

    @include('web.frontend.page.return.section.editSchedule') 
@endsection

@section('schedule-script')
    <script type="text/javascript" src="{{asset ('js/seat.js')}}"></script>
    <script type="text/javascript" src="{{asset ('js/editableSchedule.js')}}"></script>
    <script type="text/javascript" src="{{asset('js/seat.js')}}"></script>
    <!-- Bus Schedule Scrips -->   
    <script type="text/javascript">
    // Onclick with the button on every schedule row when the document is ready
        $(document).ready(function () {
            $('#myScheduleBtn').on('click', 'button.scheduleBtn', async (e) => {
                try {
                    e.preventDefault();
                    var id = $(e.target).data('id') // get id from data-id class of the schedule button
                    axios.get('available/'+id).then(function(response) {
                        // store the number of seats
                        seatCount = response.data.seat
                        // seat header
                        seatHeader = `
                        <div class="seat-status">
                            <div class="row status-box">
                                <div class="col box-status">
                                    <p class="box red"></p>
                                    <p>{{__("Available")}}</p>
                                </div>
                                <div class="col box-status">
                                    <p class="box gray"></p>
                                    <p>{{__("Occupied")}}</p>
                                </div>
                                <div class="col box-status">
                                    <p class="box green"></p>
                                    <p>{{__("Selected")}}</p>
                                </div>
                            </div>
                        <ol class="bus fuselage">
                            <p class="front-bus">{{_("The Front of the vehicle")}}</p>
                            <li class="row">
                                <ol class="seats">
                                    <li class="seat">
                                        <label for="Driver"><i class="fa-solid fa-user"></i></label>
                                    </li>
                                    <li class="seat">
                                    </li>
                                    <li class="seat">
                                    </li>
                                    <li class="seat">
                                        <label><i class="fa-solid fa-door-open"></i></label>
                                    </li>
                                </ol>
                            </li>
                        `
                        // seat content
                        function generateSeatLabel(seatRow, seatNumber, isLastRow) {
                            const rowLetter = String.fromCharCode(65 + seatRow)
                            let seatNum = seatNumber + 1

                            if(seatNum >= 3 && !isLastRow) {
                                seatNum += 1
                            }
                            return rowLetter + seatNum
                        }

                        seatHtml = ``
                                if(seatCount == 37) {
                                    seatPerRow = 4;
                                    seatPerLastRow = 5;
                                    fullSeatRow = Math.floor((seatCount - 5) / seatPerRow) // set the amount of rows
                                    remainingSeat = seatCount % seatPerRow // get the amount of last seats
                                    
                                    for(row=0; row<fullSeatRow; row++) {
                                        seatHtml += `<li class="row"><ol class="seats">`
                                        for(i=0;i<seatPerRow;i++) {
                                            seatHtml += `
                                                <li class="seat">
                                                    <input type="checkbox" id="seat-check seat-${generateSeatLabel(row,i, false)}" data-seat="${generateSeatLabel(row,i, false)}" onclick="displaySeatNumber(this)"/>
                                                    <label for="seat-check seat-${generateSeatLabel(row,i, false)}">${generateSeatLabel(row,i, false)}</label>
                                                </li>
                                            `
                                        }
                                        seatHtml += `</ol></li>`
                                    }
                                    if(seatCount > fullSeatRow * seatPerRow) {
                                        seatHtml += `<li class="row "><ol class="seats">`
                                            for(let l=0; l<seatPerLastRow; l++) {
                                                seatHtml += `
                                                <li class="seat last-seat-row">
                                                    <input type="checkbox" id="seat-check seat-${generateSeatLabel(fullSeatRow,l, true)}" data-seat="${generateSeatLabel(fullSeatRow ,l, true)}" onclick="displaySeatNumber(this)"/>
                                                    <label for="seat-check seat-${generateSeatLabel(fullSeatRow,l, true)}">${generateSeatLabel(fullSeatRow,l, true)}</label>
                                                </li>
                                            `
                                            }
                                        seatHtml += `</ol></li>`
                                    }
                                    seatHtml += `</li>`
                                }
                                else {
                                    seatPerRow = 2;
                                    seatPerLastRow = 4;
                                    fullSeatRow = Math.floor((seatCount - 4) / seatPerRow) // set the amount of rows
                                    remainingSeat = seatCount % seatPerRow // get the amount of last seats

                                    for(let row=0; row<fullSeatRow; row++) {
                                        seatHtml += `<li class="row"><ol class="seats">`
                                            for(let i=0;i<seatPerRow;i++) {
                                                seatHtml += `
                                                 <li class="seat">
                                                    <input type="checkbox" id="seat-check seat-${generateSeatLabel(row, i, false)}" data-seat="${generateSeatLabel(row, i, false)}" onclick="displaySeatNumber(this)"/>
                                                    <label for="seat-check seat-${generateSeatLabel(row, i, false)}">${generateSeatLabel(row, i, false)}</label>
                                                </li>
                                                `
                                            }
                                        seatHtml += `</ol></li>`
                                    }
                                    if(seatCount > fullSeatRow * seatPerRow) {
                                        seatHtml += `<li class="row"><ol class="seats">`
                                            for (let l =0; l<seatPerLastRow; l++) {
                                                seatHtml += `
                                                 <li class="seat last-seat-row">
                                                    <input type="checkbox" id="seat-check seat-${generateSeatLabel(fullSeatRow, l, true)}" data-seat="${generateSeatLabel(fullSeatRow, l, true)}" onclick="displaySeatNumber(this)"/>
                                                    <label for="seat-check seat-${generateSeatLabel(fullSeatRow, l, true)}">${generateSeatLabel(fullSeatRow, l, true)}</label>
                                                </li>
                                                `
                                            }
                                        seatHtml += `</ol></li>`
                                    }
                                seatHtml+=`</li>`
                            }   
                        seatHtml += `</ol></div>`

                        busInfoContent = `
                            <!-- Hidden fields to pass the IDs -->
                            <input type="hidden" name="schedule" value="${response.data.schedule.id}">
                            <input type="hidden" name="storage" value="${response.data.storage.id}">
                            <input type="hidden" name="price" value="${response.data.price.id}">
                            <input type="hidden" id="selectedSeatCount" name="seat_count" value="">
                        <table class="table table-responsive bus-info">
                            <tr class="row">
                                <td><h1>Bus Information</h1></td>
                                </tr>
                            <tr class="row">
                                <td class="col">
                                    <p>{{__("Bus' Plate Number ")}}</p>
                                </td>
                                <td class="col">
                                    <p><b>${response.data.bus_plate}</b></p>
                                </td>
                            </tr>
                            <tr class="row">
                                <td class="col">
                                    <p>{{__("Departure at: ")}}</p>
                                </td>
                                <td class="col">
                                    <p><b>${response.data.schedule.departure_date} (${response.data.schedule.departure_time})</b></p>
                                </td>
                            </tr>
                            <tr class="row">
                                <td class="col">
                                    <p>{{__("Your transportation: ")}}</p>
                                </td>
                                <td class="col">
                                    <p><b>${response.data.schedule.origin}</b></p>
                                </td>
                            </tr>
                            <tr class="row">
                                <td class="col">
                                    <p>{{__("Your destination: ")}}</p>
                                </td>
                                <td class="col">
                                    <p><b>${response.data.schedule.destination}</b></p>
                                </td>
                            </tr>
                            <tr class="row">
                                <td class="col">
                                    <p>{{__("Storage Capacity: ")}}</p>
                                </td>
                                <td class="col">
                                    <p><b>${response.data.storage.luggage} ${response.data.storage.measurement}</b></p>
                                </td>
                            </tr>
                            <tr class="row">
                                <td class="col">
                                    <p>{{__("Bus fare: ")}}</p>
                                </td>
                                <td class="col">
                                    <p><b>${response.data.price.currency} ${response.data.price.price}</b></p>
                                </td>
                            </tr>
                            <tr class="row">
                                <td class="col">
                                    <input type="hidden" name="seat" id="seat" value="">
                                    <p>{{__("Your seat: ")}}</p>
                                </td>
                                <td class="col" id="seat-selection-output">
                                    <b>None</b>
                                </td>
                            </tr>
                            <div>
                                <td><button type="submit" class="btn btn-primary">{{__("Proceed")}}</button></td>
                            </div>
                        </table> 
                        `
                        $('#exampleModal .modal-body').html(
                            `
                             ${seatHeader} ${seatHtml}
                             ${busInfoContent}
                            `
                        )
                    });
                    $('#exampleModal').modal('show')
                } catch (error) {
                    console.error('MengHeng\'s Error: ', error)
                }
            })
        })
    </script>
@endsection
