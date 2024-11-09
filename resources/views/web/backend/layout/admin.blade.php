<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <title>Admin</title>
        <link href="{{asset('css/styles.css')}}" rel="stylesheet" />
        <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
    </head>
    <body>
        <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
            <!-- Navbar Brand-->
            <a class="navbar-brand ps-3" href="/backend-home">Admin</a>
            <!-- Sidebar Toggle-->
            {{-- <button class="btn btn-link btn-sm order-1 order-lg-0 me-4 me-lg-0" id="sidebarToggle" href="#!"><i class="fas fa-bars"></i></button> --}}
            <!-- Navbar Search-->
            
            <!-- Navbar-->
            <ul class="navbar-nav ms-auto ms-md-0 me-3 me-lg-4">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false"><i class="fas fa-user fa-fw"></i></a>
                    <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                        <li><a class="dropdown-item" href="/logout">Logout</a></li>
                    </ul>
                </li>
            </ul>
        </nav>
        <div id="layoutSidenav">
            <div id="layoutSidenav_nav">
                <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
                    <div class="sb-sidenav-menu">
                        <div class="nav">
                            <div class="sb-sidenav-menu-heading">Vehicle</div>
                            <a class="nav-link collapsed" data-bs-toggle="collapse" data-bs-target="#bus-btn" aria-expanded="false" aria-controls="collapseLayouts">
                                <div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>Bus
                                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                            </a>
                            <div class="collapse" id="bus-btn" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                                <nav class="sb-sidenav-menu-nested nav">
                                    <a class="nav-link" href="{{url('dashboard/bus')}}">Bus List</a>
                                    <a class="nav-link" href="{{url('dashboard/bus/create')}}">Add bus information</a>
                                </nav>
                            </div>
                            <a class="nav-link" href="{{url('dashboard/seat')}}">
                                <div class="sb-nav-link-icon"><i class="fas fa-chart-area"></i></div>
                                Seat
                            </a>
                            <a class="nav-link" href="{{url('dashboard/schedule')}}">
                                <div class="sb-nav-link-icon"><i class="fas fa-chart-area"></i></div>
                                Schedule
                            </a>
                            <div class="sb-sidenav-menu-heading">Price & Storage</div>
                            <a class="nav-link" href="{{url('dashboard/price')}}">
                                <div class="sb-nav-link-icon"><i class="fas fa-chart-area"></i></div>
                                Set a Price
                            </a>
                            <a class="nav-link" href="{{url('dashboard/storage')}}">
                                <div class="sb-nav-link-icon"><i class="fas fa-table"></i></div>
                                Set storage capacity
                            </a>
                            <div class="sb-sidenav-menu-heading">User Data</div>
                            <a class="nav-link" href="{{url('dashboard/staff')}}">
                                <div class="sb-nav-link-icon"><i class="fas fa-chart-area"></i></div>
                                Staff
                            </a>
                            <a class="nav-link" href="{{url('dashboard/user')}}">
                                <div class="sb-nav-link-icon"><i class="fas fa-table"></i></div>
                                User
                            </a>
                            <a class="nav-link" href="{{url('dashboard/review')}}">
                                <div class="sb-nav-link-icon"><i class="fas fa-chart-area"></i></div>
                                Review
                            </a>
                            <div class="sb-sidenav-menu-heading">Required careful insertion</div>
                            <a class="nav-link" href="{{url('dashboard/permission')}}">
                                <div class="sb-nav-link-icon"><i class="fas fa-chart-area"></i></div>
                                Permission
                            </a>
                            <a class="nav-link" href="{{url('dashboard/user-permission')}}">
                                <div class="sb-nav-link-icon"><i class="fas fa-table"></i></div>
                                User Permission
                            </a>
                            <div class="sb-sidenav-menu-heading">Prohibited data</div>
                            <a class="nav-link" href="{{url('dashboard/ticket')}}">
                                <div class="sb-nav-link-icon"><i class="fas fa-chart-area"></i></div>
                                Ticket
                            </a>
                            <a class="nav-link" href="{{url('dashboard/payment')}}">
                                <div class="sb-nav-link-icon"><i class="fas fa-table"></i></div>
                                Payment
                            </a>
                        </div>
                    </div>
                    <div class="sb-sidenav-footer">
                        <div class="small">Logged in as:</div>
                        {{Auth::user()->username}}
                    </div>
                </nav>
            </div>
            <div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid p-4">
                        <div class="card mb-4">
                            <div class="card-body">
                                <input type="text" id="searchInput" placeholder="Search Tickets" class="form-control mb-3">
                                <hr>
                                @yield('content')
                            </div>
                        </div>
                    </div>
                </main>
                <footer class="py-4 bg-light mt-auto">
                    <div class="container-fluid px-4">
                        <div class="d-flex align-items-center justify-content-between small">
                            <div class="text-muted">Copyright &copy; Bus Ticketing 2024</div>
                        </div>
                    </div>
                </footer>
            </div>
        </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="{{asset('js/scripts.js')}}"></script>
        <script>
            document.getElementById("searchInput").addEventListener("keyup", function() {
                let input = document.getElementById("searchInput").value.toLowerCase();
                let rows = document.querySelectorAll(".task-table tbody tr");
        
                rows.forEach(row => {
                    let rowText = row.textContent.toLowerCase();
                    row.style.display = rowText.includes(input) ? "" : "none";
                });
            });
        </script>
    </body>
</html>
