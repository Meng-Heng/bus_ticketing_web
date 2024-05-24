<div>
    <label for="ticket_id" class="block font-medium text-sm text-gray-700">{{ 'Ticket Id' }}</label>
    <input class="border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm mt-1 block w-full" id="ticket_id" name="ticket_id" type="number" value="{{ isset($ticket->ticket_id) ? $ticket->ticket_id : ''}}" >
    {!! $errors->first('ticket_id', '<p>:message</p>') !!}
</div>
<div>
    <label for="issued_date" class="block font-medium text-sm text-gray-700">{{ 'Issued Date' }}</label>
    <input class="border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm mt-1 block w-full" id="issued_date" name="issued_date" type="datetime-local" value="{{ isset($ticket->issued_date) ? $ticket->issued_date : ''}}" >
    {!! $errors->first('issued_date', '<p>:message</p>') !!}
</div>
<div>
    <label for="schedule_id" class="block font-medium text-sm text-gray-700">{{ 'Schedule Id' }}</label>
    <input class="border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm mt-1 block w-full" id="schedule_id" name="schedule_id" type="number" value="{{ isset($ticket->schedule_id) ? $ticket->schedule_id : ''}}" >
    {!! $errors->first('schedule_id', '<p>:message</p>') !!}
</div>
<div>
    <label for="bus_seat_id" class="block font-medium text-sm text-gray-700">{{ 'Bus Seat Id' }}</label>
    <input class="border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm mt-1 block w-full" id="bus_seat_id" name="bus_seat_id" type="number" value="{{ isset($ticket->bus_seat_id) ? $ticket->bus_seat_id : ''}}" >
    {!! $errors->first('bus_seat_id', '<p>:message</p>') !!}
</div>
<div>
    <label for="user_id" class="block font-medium text-sm text-gray-700">{{ 'User Id' }}</label>
    <input class="border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm mt-1 block w-full" id="user_id" name="user_id" type="number" value="{{ isset($ticket->user_id) ? $ticket->user_id : ''}}" >
    {!! $errors->first('user_id', '<p>:message</p>') !!}
</div>
<div>
    <label for="payment_id" class="block font-medium text-sm text-gray-700">{{ 'Payment Id' }}</label>
    <input class="border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm mt-1 block w-full" id="payment_id" name="payment_id" type="number" value="{{ isset($ticket->payment_id) ? $ticket->payment_id : ''}}" >
    {!! $errors->first('payment_id', '<p>:message</p>') !!}
</div>
<div>
    <label for="storage_id" class="block font-medium text-sm text-gray-700">{{ 'Storage Id' }}</label>
    <input class="border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm mt-1 block w-full" id="storage_id" name="storage_id" type="number" value="{{ isset($ticket->storage_id) ? $ticket->storage_id : ''}}" >
    {!! $errors->first('storage_id', '<p>:message</p>') !!}
</div>
<div>
    <label for="price_id" class="block font-medium text-sm text-gray-700">{{ 'Price Id' }}</label>
    <input class="border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm mt-1 block w-full" id="price_id" name="price_id" type="number" value="{{ isset($ticket->price_id) ? $ticket->price_id : ''}}" >
    {!! $errors->first('price_id', '<p>:message</p>') !!}
</div>


<div class="flex items-center gap-4">
    <button type="submit" class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 focus:bg-gray-700 active:bg-gray-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out duration-150">
        {{ $formMode === 'edit' ? 'Update' : 'Create' }}
    </button>
</div>
