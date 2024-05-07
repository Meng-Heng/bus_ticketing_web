<div>
    <label for="star" class="block font-medium text-sm text-gray-700">{{ 'Star' }}</label>
    <input class="border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm mt-1 block w-full" id="star" name="star" type="number" value="{{ isset($review->star) ? $review->star : ''}}" >
    {!! $errors->first('star', '<p>:message</p>') !!}
</div>
<div>
    <label for="feedback" class="block font-medium text-sm text-gray-700">{{ 'Feedback' }}</label>
    <input class="border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm mt-1 block w-full" id="feedback" name="feedback" type="text" value="{{ isset($review->feedback) ? $review->feedback : ''}}" >
    {!! $errors->first('feedback', '<p>:message</p>') !!}
</div>
<div>
    <label for="posted_time" class="block font-medium text-sm text-gray-700">{{ 'Posted Time' }}</label>
    <input class="border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm mt-1 block w-full" id="posted_time" name="posted_time" type="datetime-local" value="{{ isset($review->posted_time) ? $review->posted_time : ''}}" >
    {!! $errors->first('posted_time', '<p>:message</p>') !!}
</div>
<div>
    <label for="payment_id" class="block font-medium text-sm text-gray-700">{{ 'Payment Id' }}</label>
    <input class="border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm mt-1 block w-full" id="payment_id" name="payment_id" type="number" value="{{ isset($review->payment_id) ? $review->payment_id : ''}}" >
    {!! $errors->first('payment_id', '<p>:message</p>') !!}
</div>
<div>
    <label for="schedule_id" class="block font-medium text-sm text-gray-700">{{ 'Schedule Id' }}</label>
    <input class="border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm mt-1 block w-full" id="schedule_id" name="schedule_id" type="number" value="{{ isset($review->schedule_id) ? $review->schedule_id : ''}}" >
    {!! $errors->first('schedule_id', '<p>:message</p>') !!}
</div>
<div>
    <label for="user_id" class="block font-medium text-sm text-gray-700">{{ 'User Id' }}</label>
    <input class="border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm mt-1 block w-full" id="user_id" name="user_id" type="number" value="{{ isset($review->user_id) ? $review->user_id : ''}}" >
    {!! $errors->first('user_id', '<p>:message</p>') !!}
</div>


<div class="flex items-center gap-4">
    <button type="submit" class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 focus:bg-gray-700 active:bg-gray-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out duration-150">
        {{ $formMode === 'edit' ? 'Update' : 'Create' }}
    </button>
</div>
