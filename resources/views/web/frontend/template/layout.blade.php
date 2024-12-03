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

    {{-- Profile Styles --}}
    @yield('review-style')

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
              // console.log(response.data + " and " + response.data.id)
              let ticketData = response.data;
              // console.log("Ticket Data: ", ticketData)

              // Foreach ticketData to get ticket-departure-date as a set
              let uniquePaymentIds = [...new Set(ticketData.map(ticket => ticket.payment.id))]; 
              let selectedPaymentId = 'Show All'; // Set default selected date
              console.log(response.data)
              
              // Generate the dropdown dynamically
                const groupedTickets = ticketData.reduce((acc, ticket) => {
                    if (!acc[ticket.payment_id]) {
                        acc[ticket.payment_id] = [];
                    }
                    acc[ticket.payment_id].push(ticket);
                    return acc;
                }, {});
                // console.log(groupedTickets);

              function generateDropdown() {

                const ticketCounts = Object.entries(groupedTickets).map(([paymentId, tickets]) => {
                    const totalPrice = tickets.reduce((sum, ticket) => {
                        return sum + parseFloat(ticket.price.price || 0); // Convert price to number and sum it
                    }, 0).toFixed(2);

                    const paymentDateTime = tickets

                    return {
                        paymentId: paymentId,
                        ticketCount: tickets.length,
                        ticketPrice: tickets.length > 0 ? tickets[0].price.price : null,
                        total: totalPrice,
                        paid_at: tickets.length > 0 ? tickets[0].payment.payment_datetime : null,
                    };
                });

                let ticketSelect = `
                <table class="table">`
                  ticketSelect += `<thead>
                          <tr>
                            <th>No.</th>
                            <th>Payment At</th>
                            <th>Amount</th>
                            <th>Price</th>
                            <th>Total</th>
                            <th id="getTicket">Get ticket</th>
                          </tr>
                        </thead>
                        <tbody>`
                  ticketCounts.forEach((ticket, index) => {
                    ticketSelect += `
                          <tr>
                              <td>${index+1}</td>
                              <td>${ticket.paid_at}</td>
                              <td>${ticket.ticketCount}</td>
                              <td>USD ${ticket.ticketPrice}</td>
                              <td>USD ${ticket.total}</td>
                              <td><button class="" id="getTicketBtn" data-payment-id="${ticket.paymentId}">Show</button></td>
                          </tr>`
                })
                ticketSelect += `</tbody>
                </table><div id="myTickets">`;
                
                return ticketSelect;
              }
              
              $('#ticketModal .modal-body').html(generateDropdown());

              // Generate Tickets by getting the Filtered Date (Selected Date)
              function renderTickets(filteredData) {
                let totalPrice = 0
                let ticketPriceCurrency = ""
                let ticketContent = `<div>
                                      <button id="download-receipt-image" class="btn btn-primary">Download All Tickets</button>
                                    </div>
                                    <div class="ticket-box">`;
                
                filteredData.forEach((ticket, index) => {
                  
                  ticketPriceCurrency += ticket.price.currency
                  // console.log(ticketPriceCurrency)
                  // ticketPriceCurrency += ticketPriceCurrency.filter(c => c.currency)
                  ticketContent += `
                    <h2>${index + 1}</h2> 
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
                          <div class="ticket-body__title">
                            <h1 class="alfa">${ticket.id}</h1>
                              <h1 class="alfa">${ticket.ticket_id}</h1>
                              <h2>${ticket.is_issued}</h2>
                              <h3>Bus Plate Number: ${ticket.bus_seat.bus.bus_plate}</h3>
                              <h3>Seat Number: ${ticket.bus_seat.seat_number}</h3>
                          </div>
                          <div class="ticket-body__events">
                              <ul>
                                <li>Name: ${ticket.payment.user.username}</li>  
                                 <li>Contact: ${ticket.payment.user.contact}</li> 
                                <li>Fare: ${ticket.price.currency} ${ticket.price.price}</li>
                                  <li>Storage: ${ticket.storage.luggage} ${ticket.storage.measurement}</li>
                                  <li>Paid on: ${ticket.payment.payment_datetime} via ${ticket.payment.payment_method}</li>
                                  <li></li>
                              </ul>
                          </div>
                          <div class="ticket-body__date">
                              <div class="box-date">
                                  <p>Departure time</p>
                                  <h2 class="alfa">${ticket.schedule.departure_date}</h2>
                                  <h3>${ticket.schedule.departure_time}</h3>
                              </div>
                              <div class="box-venue">
                                  <h3>${ticket.schedule.origin}</h3>
                                  <h2 class="alfa">To</h2>
                                  <h3>${ticket.schedule.destination}</h3>
                              </div>
                              <div class="box-date">
                                <p>Arrival time</p>
                                <h2 class="alfa">${ticket.schedule.arrival_date}</h2>
                                <h3>${ticket.schedule.arrival_time}</h3>
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
                  <hr style="width:100%; border:1px solid black">
                  `;
                });
                ticketContent += `</div>`;

                $('#myTickets').html(ticketContent);
              }

              // Click handler and rendering tickets
              document.addEventListener('click', function(event) {
                  if (event.target && event.target.matches('#getTicketBtn')) {
                      const paymentId = event.target.getAttribute('data-payment-id');
                      const tickets = groupedTickets[paymentId];
                      renderTickets(tickets);
                      console.log("Ticket is here!")
                  }
              });

              // showPayment(ticketData);

              $(document).on('click', '#download-receipt-image', function() {
                const tickets = document.querySelectorAll('.ticket-box .ticket');
    
                // Loop through each ticket
                tickets.forEach((ticket, index) => {
                  
                  html2canvas(ticket, {
                      scale: 2 
                  }).then(canvas => {
                      const link = document.createElement('a');
                      link.href = canvas.toDataURL('image/png');
                      link.download = `TicketReceipt-${index + 1}.png`; // Naming each file separately
                      link.click();
                  });
              });
              });
            });
            $('#ticketModal').modal('show');
        });
      });
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/1.4.1/html2canvas.min.js"></script>

  </body>
</html>

