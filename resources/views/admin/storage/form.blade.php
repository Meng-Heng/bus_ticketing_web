<div>
    <label for="luggage" class="block font-medium text-sm text-gray-700">{{ 'Luggage' }}</label>
    <input class="border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm mt-1 block w-full" id="luggage" name="luggage" type="number" value="{{ isset($storage->luggage) ? $storage->luggage : ''}}" >
    {!! $errors->first('luggage', '<p>:message</p>') !!}
</div>
<div>
    <label for="measurement" class="block font-medium text-sm text-gray-700">{{ 'Measurement' }}</label>
    <input class="border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm mt-1 block w-full" id="measurement" name="measurement" type="text" value="{{ isset($storage->measurement) ? $storage->measurement : ''}}" >
    {!! $errors->first('measurement', '<p>:message</p>') !!}
</div>
<div>
    <label for="start_date" class="block font-medium text-sm text-gray-700">{{ 'Start Date' }}</label>
    <input class="border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm mt-1 block w-full" id="start_date" name="start_date" type="datetime-local" value="{{ isset($storage->start_date) ? $storage->start_date : ''}}" >
    {!! $errors->first('start_date', '<p>:message</p>') !!}
</div>


<div class="flex items-center gap-4">
    <button type="submit" class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 focus:bg-gray-700 active:bg-gray-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out duration-150">
        {{ $formMode === 'edit' ? 'Update' : 'Create' }}
    </button>
</div>
