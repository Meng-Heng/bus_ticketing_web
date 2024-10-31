<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
    <link rel="icon" href="{{ url('images/logo/logo.png') }}">

    <link href="{{asset('css/template/header.css')}}" rel="stylesheet" />
    <link href="{{asset('css/template/template.css')}}" rel="stylesheet" />
    <link href="{{asset('css/main/homepage.css')}}" rel="stylesheet" />

    <!-- MDB templates and home page -->
    <link href="{{ asset('css/mdb.min.css') }}" rel="stylesheet"/>

    <!-- Ajax & Jquery -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.0/jquery.min.js"></script>
    {{-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script> --}}
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    
    <!-- Schedule Styles -->
    @yield('schedule-style')

    <!-- Confirmation Styles -->
    @yield('ticket-confirmation-style')

    {{-- Ticket Styles --}}
    <link href="{{asset('css/main/your-ticket.css')}}" rel="stylesheet" />

    {{-- Profile Styles --}}
    @yield('profile-style')

    <!-- Include Toastr CSS -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css" rel="stylesheet">
    <title>Bus4U</title>
</head>
<body>
    <!-- Navbar -->
      @include('web.frontend.component.navigation')
    <!-- Navbar -->

    @yield('content')

    <!-- Footer -->
      @include('web.frontend.component.footer')
    <!-- Footer -->

    @include('web.frontend.page.ticket.index')

    {{-- Navigation --}}
    <script src="{{ asset('js/all.js')}}" crossorigin="anonymous"></script>

    {{-- Ticket scripts --}}
    <script type="text/javascript" src="{{asset ('js/ticket-form.js')}}"></script>

    @yield('schedule-script')

    {{-- Axios --}}
    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>

    {{-- Head scripts --}}
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    
    <!-- Include jQuery (Required by Toastr) -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <!-- Include Toastr JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>

    {{-- Ticket Script --}}
    <script>
      $(document).ready(function() {
        $('#your-ticket').on('click', async (e) => {
            e.preventDefault()
            axios.get('your-ticket').then(function(response) {
              console.log(response.data)
              let ticketData = response.data
              let ticketContent = 
              `
              <div class="ticket-box">
              `
              for(let i=0; i<ticketData.length; i++) {
                ticketContent += `
                  <div class="ticket">
                      <div class="ticket-stub-gap"></div>
                      <div class="ticket-stub">
                          <h3>Ticket</h3>
                          <h1>Check</h1>
                          <div class="barcode">
                              <svg viewBox="0 0 130 30">
                                  <path d="M1.5 0H0v30h1.5V0zm118.587 0h-1v30h1V0zm-31 0h-1v30h1V0zm-56 0h-1v30h1V0zm3.5 0h-1.5v30h1.5V0zm87 0h-1.5v30h1.5V0zm-25 0h-1.5v30h1.5V0zm4 0h-1.5v30h1.5V0zM5 0H3v30h2V0zm70 0h-2v30h2V0zm20 0h-2v30h2V0zm20 0h-2v30h2V0zM62 0h-2v30h2V0zM41.568 0h-2v30h2V0zM9.667 0H7v30h2.667V0zm21.385 0h-3.26v30h3.26V0zM67.03 0h-3.26v30h3.26V0zm20 0h-3.26v30h3.26V0zm20 0h-3.26v30h3.26V0zM15.889 0h-3.556v30h3.556V0zm41 0h-3.556v30h3.556V0zM25.283 0h-6.321v30h6.32V0zm57.52 0h-6.32v30h6.32V0zM51.613 0h-8.428v30h8.428V0zm78.192 0h-4.436v30h4.436V0z" />
                              </svg>
                          </div>
                      </div>
                      <div class="ticket-body">
                          <div class="ticket-body__utensils">
                              <svg viewBox="0 0 164 100">
                                  <path d="M146.398 50.277h6.27V5.52c0-1.497.546-2.792 1.639-3.885C155.383.56 156.656.017 158.122 0c1.464.017 2.738.559 3.814 1.634 1.093 1.093 1.64 2.388 1.64 3.885v91.719c0 .746-.274 1.394-.82 1.942-.547.546-1.194.82-1.941.82h-1.985c-3.8 0-7.05-1.353-9.755-4.057-2.704-2.706-4.057-5.957-4.057-9.755v-34.53c0-.374.137-.698.41-.971.272-.273.596-.41.97-.41zM9.238 65.148V5.713c0-1.55.565-2.89 1.698-4.021C12.05.578 13.366.018 14.884 0c1.517.017 2.835.577 3.949 1.69 1.132 1.132 1.697 2.473 1.697 4.022v59.435c1.698.595 8.064 6.269 8.064 8.088v23.905c0 .773-.284 1.444-.849 2.01-.566.565-1.237.85-2.01.85-.775 0-1.445-.285-2.01-.85-.567-.567-.85-1.237-.85-2.01V78.554c0-.776-.283-1.445-.849-2.01-.566-.567-1.236-.849-2.01-.849-.775 0-1.445.282-2.01.848-.566.566-.85 1.237-.85 2.01v18.588c0 .773-.283 1.444-.849 2.01-.565.565-1.236.85-2.01.85-.775 0-1.445-.285-2.01-.85-.567-.567-.85-1.237-.85-2.01V78.554c0-.776-.283-1.445-.849-2.01-.566-.567-1.236-.849-2.01-.849-.775 0-1.445.282-2.01.848-.567.566-.85 1.237-.85 2.01v18.588c0 .773-.282 1.444-.848 2.01-.566.565-1.237.85-2.01.85-.776 0-1.446-.285-2.01-.85-.566-.567-.85-1.237-.85-2.01V73.237c0-1.819 7.54-7.493 9.238-8.089z" fill-rule="nonzero" />
                              </svg>
                          </div>
                          <div class="ticket-body__title">
                            <h1 class="alfa">${ticketData[i].id}</h1>
                              <h1 class="alfa">${ticketData[i].ticket_id}</h1>
                              <h2>${ticketData[i].is_issued}</h2>
                              <h3>Bus Plate Number: ${ticketData[i].bus_seat.bus.bus_plate}</h3>
                              <h3>Seat Number: ${ticketData[i].bus_seat.seat_number}</h3>
                          </div>
                          <div class="ticket-body__events">
                              <ul>
                                <li>Name: ${ticketData[i].payment.user.username}</li>  
                                 <li>Contact: ${ticketData[i].payment.user.contact}</li> 
                                <li>Fare: ${ticketData[i].price.currency} ${ticketData[i].price.price}</li>
                                  <li>Storage: ${ticketData[i].storage.luggage} ${ticketData[i].storage.measurement}</li>
                                  <li>Paid on: ${ticketData[i].payment.payment_datetime} via ${ticketData[i].payment.payment_method}</li>
                                  <li></li>
                              </ul>
                          </div>
                          <div class="ticket-body__date">
                              <div class="box-date">
                                  <p>Departure time</p>
                                  <h2 class="alfa">${ticketData[i].schedule.departure_date}</h2>
                                  <h3>${ticketData[i].schedule.departure_time}</h3>
                              </div>
                              <div class="box-venue">
                                  <h3>${ticketData[i].schedule.origin}</h3>
                                  <h2 class="alfa">To</h2>
                                  <h3>${ticketData[i].schedule.destination}</h3>
                              </div>
                              <div class="box-date">
                                <p>Arrival time</p>
                                <h2 class="alfa">${ticketData[i].schedule.arrival_date}</h2>
                                <h3>${ticketData[i].schedule.arrival_time}</h3>
                              </div>
                          </div>
                      </div>
                      <div class="ticket-body__footer">
                          <div class="barcode">
                              <svg viewBox="0 0 130 30">
                                  <path d="M1.5 0H0v30h1.5V0zm118.587 0h-1v30h1V0zm-31 0h-1v30h1V0zm-56 0h-1v30h1V0zm3.5 0h-1.5v30h1.5V0zm87 0h-1.5v30h1.5V0zm-25 0h-1.5v30h1.5V0zm4 0h-1.5v30h1.5V0zM5 0H3v30h2V0zm70 0h-2v30h2V0zm20 0h-2v30h2V0zm20 0h-2v30h2V0zM62 0h-2v30h2V0zM41.568 0h-2v30h2V0zM9.667 0H7v30h2.667V0zm21.385 0h-3.26v30h3.26V0zM67.03 0h-3.26v30h3.26V0zm20 0h-3.26v30h3.26V0zm20 0h-3.26v30h3.26V0zM15.889 0h-3.556v30h3.556V0zm41 0h-3.556v30h3.556V0zM25.283 0h-6.321v30h6.32V0zm57.52 0h-6.32v30h6.32V0zM51.613 0h-8.428v30h8.428V0zm78.192 0h-4.436v30h4.436V0z" />
                              </svg>
                          </div>
                      </div>
                  </div>
                `
              }
                
              
              ticketContent +=  `</div>`
              $('#ticketModal .modal-body').html(
              `
                ${ticketContent}
              `
              )
            })
            $('#ticketModal').modal('show')
        })
      })
    </script>

  </body>
</html>