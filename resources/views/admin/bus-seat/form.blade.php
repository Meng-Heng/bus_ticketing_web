<div>
    <label for="bus_id" class="block font-medium text-sm text-gray-700">{{ 'Bus Id' }}</label>
    <input class="border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm mt-1 block w-full" id="bus_id" name="bus_id" type="number" value="{{ isset($busseat->bus_id) ? $busseat->bus_id : ''}}" >
    {!! $errors->first('bus_id', '<p>:message</p>') !!}
</div>
<div>
    <label for="seat_number" class="block font-medium text-sm text-gray-700">{{ 'Seat Number' }}</label>
    <input class="border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm mt-1 block w-full" id="seat_number" name="seat_number" type="text" value="{{ isset($busseat->seat_number) ? $busseat->seat_number : ''}}" >
    {!! $errors->first('seat_number', '<p>:message</p>') !!}
</div>
<div>
    <label for="seat_type" class="block font-medium text-sm text-gray-700">{{ 'Seat Type' }}</label>
    <input class="border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm mt-1 block w-full" id="seat_type" name="seat_type" type="text" value="{{ isset($busseat->seat_type) ? $busseat->seat_type : ''}}" >
    {!! $errors->first('seat_type', '<p>:message</p>') !!}
</div>
<div>
    <label for="storage_id" class="block font-medium text-sm text-gray-700">{{ 'Storage Id' }}</label>
    <input class="border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm mt-1 block w-full" id="storage_id" name="storage_id" type="number" value="{{ isset($busseat->storage_id) ? $busseat->storage_id : ''}}" >
    {!! $errors->first('storage_id', '<p>:message</p>') !!}
</div>
<div>
    <label for="price_id" class="block font-medium text-sm text-gray-700">{{ 'Price Id' }}</label>
    <input class="border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm mt-1 block w-full" id="price_id" name="price_id" type="number" value="{{ isset($busseat->price_id) ? $busseat->price_id : ''}}" >
    {!! $errors->first('price_id', '<p>:message</p>') !!}
</div>
<div>
    <label for="status" class="block font-medium text-sm text-gray-700">{{ 'Status' }}</label>
    <input class="border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm mt-1 block w-full" id="status" name="status" type="text" value="{{ isset($busseat->status) ? $busseat->status : ''}}" >
    {!! $errors->first('status', '<p>:message</p>') !!}
</div>


<div class="flex items-center gap-4">
    <button type="submit" class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 focus:bg-gray-700 active:bg-gray-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out duration-150">
        {{ $formMode === 'edit' ? 'Update' : 'Create' }}
    </button>
</div>
