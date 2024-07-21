<div class="seat-status">
    <div class="row d-flex align-items-center">
        <div class="col">{{__("Available")}}</div>
        <div class="col">{{__("Occupied")}}</div>
        <div class="col">{{__("Selected")}}</div>
    </div>
</div>
<ol class="bus fuselage">
    <p class="center">{{_("The Front of the bus")}}</p>
    <li class="row row--0">
        <ol class="seats" type="Z">
            <li class="seat">
                <label for="Driver"><i class="fa-solid fa-user"></i></label>
            </li>
            <li class="seat">
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
    @foreach($seat_count as $seats_count)
    <li class="row row--1">
        @for($i=0; $i<count($seats_count); $i++)
        <ol class="seats" type="A">
            <li class="seat">
                <input type="checkbox" id="A1" />
                <label for="A1">A1: {{$i}}</label>
            </li>
        </ol>
        @endfor
    </li>
    @endforeach
</ol>
