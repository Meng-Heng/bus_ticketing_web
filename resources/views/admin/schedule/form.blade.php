<div>
    <label for="bus_id" class="block font-medium text-sm text-gray-700">{{ 'Bus Id' }}</label>
    <input class="border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm mt-1 block w-full" id="bus_id" name="bus_id" type="number" value="{{ isset($schedule->bus_id) ? $schedule->bus_id : ''}}" >
    {!! $errors->first('bus_id', '<p>:message</p>') !!}
</div>
<div>
    <label for="leave" class="block font-medium text-sm text-gray-700">{{ 'Leave' }}</label>
    <input class="border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm mt-1 block w-full" id="leave" name="leave" type="text" value="{{ isset($schedule->leave) ? $schedule->leave : ''}}" >
    {!! $errors->first('leave', '<p>:message</p>') !!}
</div>
<div>
    <label for="departure_date" class="block font-medium text-sm text-gray-700">{{ 'Departure Date' }}</label>
    <input class="border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm mt-1 block w-full" id="departure_date" name="departure_date" type="datetime-local" value="{{ isset($schedule->departure_date) ? $schedule->departure_date : ''}}" >
    {!! $errors->first('departure_date', '<p>:message</p>') !!}
</div>
<div>
    <label for="departure_time" class="block font-medium text-sm text-gray-700">{{ 'Departure Time' }}</label>
    <input class="border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm mt-1 block w-full" id="departure_time" name="departure_time" type="datetime-local" value="{{ isset($schedule->departure_time) ? $schedule->departure_time : ''}}" >
    {!! $errors->first('departure_time', '<p>:message</p>') !!}
</div>
<div>
    <label for="destination" class="block font-medium text-sm text-gray-700">{{ 'Destination' }}</label>
    <input class="border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm mt-1 block w-full" id="destination" name="destination" type="text" value="{{ isset($schedule->destination) ? $schedule->destination : ''}}" >
    {!! $errors->first('destination', '<p>:message</p>') !!}
</div>
<div>
    <label for="arrival_date" class="block font-medium text-sm text-gray-700">{{ 'Arrival Date' }}</label>
    <input class="border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm mt-1 block w-full" id="arrival_date" name="arrival_date" type="datetime-local" value="{{ isset($schedule->arrival_date) ? $schedule->arrival_date : ''}}" >
    {!! $errors->first('arrival_date', '<p>:message</p>') !!}
</div>
<div>
    <label for="arrival_time" class="block font-medium text-sm text-gray-700">{{ 'Arrival Time' }}</label>
    <input class="border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm mt-1 block w-full" id="arrival_time" name="arrival_time" type="datetime-local" value="{{ isset($schedule->arrival_time) ? $schedule->arrival_time : ''}}" >
    {!! $errors->first('arrival_time', '<p>:message</p>') !!}
</div>
<div>
    <label for="sole_out" class="block font-medium text-sm text-gray-700">{{ 'Sole Out' }}</label>
    <div>
    <label for="sole_out" class="inline-flex items-center">
        <input id="sole_out" type="radio" class="border-gray-300 text-indigo-600 shadow-sm focus:ring-indigo-500" name="sole_out" value="1" {{ (isset($schedule) && 1 == $schedule->sole_out) ? 'checked' : '' }}>
        <span class="ms-2 text-sm text-gray-600">Yes</span>
    </label>
</div>
<div>
    <label for="sole_out" class="inline-flex items-center">
        <input id="sole_out" type="radio" class="border-gray-300 text-indigo-600 shadow-sm focus:ring-indigo-500" name="sole_out" @if (isset($schedule)) {{ (0 == $schedule->sole_out) ? 'checked' : '' }} @else {{ 'checked' }} @endif>
        <span class="ms-2 text-sm text-gray-600">No</span>
    </label>
</div>

    {!! $errors->first('sole_out', '<p>:message</p>') !!}
</div>


<div class="flex items-center gap-4">
    <button type="submit" class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 focus:bg-gray-700 active:bg-gray-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out duration-150">
        {{ $formMode === 'edit' ? 'Update' : 'Create' }}
    </button>
</div>
