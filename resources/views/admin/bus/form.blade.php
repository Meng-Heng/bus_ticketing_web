<div>
    <label for="bus_plate" class="block font-medium text-sm text-gray-700">{{ 'Bus Plate' }}</label>
    <input class="border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm mt-1 block w-full" id="bus_plate" name="bus_plate" type="text" value="{{ isset($bu->bus_plate) ? $bu->bus_plate : ''}}" >
    {!! $errors->first('bus_plate', '<p>:message</p>') !!}
</div>
<div>
    <label for="total_seat" class="block font-medium text-sm text-gray-700">{{ 'Total Seat' }}</label>
    <input class="border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm mt-1 block w-full" id="total_seat" name="total_seat" type="number" value="{{ isset($bu->total_seat) ? $bu->total_seat : ''}}" >
    {!! $errors->first('total_seat', '<p>:message</p>') !!}
</div>
<div>
    <label for="description" class="block font-medium text-sm text-gray-700">{{ 'Description' }}</label>
    <input class="border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm mt-1 block w-full" id="description" name="description" type="text" value="{{ isset($bu->description) ? $bu->description : ''}}" >
    {!! $errors->first('description', '<p>:message</p>') !!}
</div>
<div>
    <label for="is_active" class="block font-medium text-sm text-gray-700">{{ 'Is Active' }}</label>
    <div>
    <label for="is_active" class="inline-flex items-center">
        <input id="is_active" type="radio" class="border-gray-300 text-indigo-600 shadow-sm focus:ring-indigo-500" name="is_active" value="1" {{ (isset($bu) && 1 == $bu->is_active) ? 'checked' : '' }}>
        <span class="ms-2 text-sm text-gray-600">Yes</span>
    </label>
</div>
<div>
    <label for="is_active" class="inline-flex items-center">
        <input id="is_active" type="radio" class="border-gray-300 text-indigo-600 shadow-sm focus:ring-indigo-500" name="is_active" @if (isset($bu)) {{ (0 == $bu->is_active) ? 'checked' : '' }} @else {{ 'checked' }} @endif>
        <span class="ms-2 text-sm text-gray-600">No</span>
    </label>
</div>

    {!! $errors->first('is_active', '<p>:message</p>') !!}
</div>


<div class="flex items-center gap-4">
    <button type="submit" class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 focus:bg-gray-700 active:bg-gray-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out duration-150">
        {{ $formMode === 'edit' ? 'Update' : 'Create' }}
    </button>
</div>
