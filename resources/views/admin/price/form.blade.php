<div>
    <label for="price" class="block font-medium text-sm text-gray-700">{{ 'Price' }}</label>
    <input class="border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm mt-1 block w-full" id="price" name="price" type="text" value="{{ isset($price->price) ? $price->price : ''}}" >
    {!! $errors->first('price', '<p>:message</p>') !!}
</div>
<div>
    <label for="currency" class="block font-medium text-sm text-gray-700">{{ 'Currency' }}</label>
    <select name="currency" class="border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm mt-1 block w-full" id="currency" >
    @foreach (json_decode('{"riel": "Riel", "usd": "USD"}', true) as $optionKey => $optionValue)
        <option value="{{ $optionKey }}" {{ (isset($price->currency) && $price->currency == $optionKey) ? 'selected' : ''}}>{{ $optionValue }}</option>
    @endforeach
</select>
    {!! $errors->first('currency', '<p>:message</p>') !!}
</div>
<div>
    <label for="start_date" class="block font-medium text-sm text-gray-700">{{ 'Start Date' }}</label>
    <input class="border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm mt-1 block w-full" id="start_date" name="start_date" type="datetime-local" value="{{ isset($price->start_date) ? $price->start_date : ''}}" >
    {!! $errors->first('start_date', '<p>:message</p>') !!}
</div>


<div class="flex items-center gap-4">
    <button type="submit" class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 focus:bg-gray-700 active:bg-gray-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out duration-150">
        {{ $formMode === 'edit' ? 'Update' : 'Create' }}
    </button>
</div>
