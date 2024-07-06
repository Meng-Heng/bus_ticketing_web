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
                <input type="checkbox" id="Driver" disabled />
                <label for="Driver"><i class="fa-solid fa-user"></i></label>
            </li>
            <li class="seat">
            </li>
            <li class="seat">
            </li>
            <li class="seat">
            </li>
            <li class="seat">
                <labe><i class="fa-solid fa-door-open"></i></label>
            </li>
        </ol>
    </li>
    <li class="row row--1">
        <ol class="seats" type="A">
            <li class="seat">
                <input type="checkbox" id="A1" />
                <label for="A1">A1</label>
            </li>
            <li class="seat">
                <input type="checkbox" id="A2" />
                <label for="A2">A2</label>
            </li>
            <li class="seat">
            </li>
            <li class="seat">
                <input type="checkbox" id="A4" />
                <label for="A4">A4</label>
            </li>
            <li class="seat">
                <input type="checkbox" id="A5" />
                <label for="A5">A5</label>
            </li>
        </ol>
    </li>
</ol>