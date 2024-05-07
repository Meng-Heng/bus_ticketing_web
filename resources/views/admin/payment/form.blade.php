<div>
    <label for="payment_method" class="block font-medium text-sm text-gray-700">{{ 'Payment Method' }}</label>
    <input class="border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm mt-1 block w-full" id="payment_method" name="payment_method" type="text" value="{{ isset($payment->payment_method) ? $payment->payment_method : ''}}" >
    {!! $errors->first('payment_method', '<p>:message</p>') !!}
</div>
<div>
    <label for="payment_datetime" class="block font-medium text-sm text-gray-700">{{ 'Payment Datetime' }}</label>
    <input class="border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm mt-1 block w-full" id="payment_datetime" name="payment_datetime" type="datetime-local" value="{{ isset($payment->payment_datetime) ? $payment->payment_datetime : ''}}" >
    {!! $errors->first('payment_datetime', '<p>:message</p>') !!}
</div>
<div>
    <label for="user_id" class="block font-medium text-sm text-gray-700">{{ 'User Id' }}</label>
    <input class="border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm mt-1 block w-full" id="user_id" name="user_id" type="number" value="{{ isset($payment->user_id) ? $payment->user_id : ''}}" >
    {!! $errors->first('user_id', '<p>:message</p>') !!}
</div>
<div>
    <label for="review_id" class="block font-medium text-sm text-gray-700">{{ 'Review Id' }}</label>
    <input class="border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm mt-1 block w-full" id="review_id" name="review_id" type="number" value="{{ isset($payment->review_id) ? $payment->review_id : ''}}" >
    {!! $errors->first('review_id', '<p>:message</p>') !!}
</div>


<div class="flex items-center gap-4">
    <button type="submit" class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 focus:bg-gray-700 active:bg-gray-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out duration-150">
        {{ $formMode === 'edit' ? 'Update' : 'Create' }}
    </button>
</div>
