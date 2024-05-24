<div>
    <label for="fname" class="block font-medium text-sm text-gray-700">{{ 'Fname' }}</label>
    <input class="border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm mt-1 block w-full" id="fname" name="fname" type="text" value="{{ isset($staff->fname) ? $staff->fname : ''}}" >
    {!! $errors->first('fname', '<p>:message</p>') !!}
</div>
<div>
    <label for="lname" class="block font-medium text-sm text-gray-700">{{ 'Lname' }}</label>
    <input class="border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm mt-1 block w-full" id="lname" name="lname" type="text" value="{{ isset($staff->lname) ? $staff->lname : ''}}" >
    {!! $errors->first('lname', '<p>:message</p>') !!}
</div>
<div>
    <label for="user_id" class="block font-medium text-sm text-gray-700">{{ 'User Id' }}</label>
    <input class="border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm mt-1 block w-full" id="user_id" name="user_id" type="number" value="{{ isset($staff->user_id) ? $staff->user_id : ''}}" >
    {!! $errors->first('user_id', '<p>:message</p>') !!}
</div>
<div>
    <label for="picture" class="block font-medium text-sm text-gray-700">{{ 'Picture' }}</label>
    <input class="border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm mt-1 block w-full" id="picture" name="picture" type="text" value="{{ isset($staff->picture) ? $staff->picture : ''}}" >
    {!! $errors->first('picture', '<p>:message</p>') !!}
</div>
<div>
    <label for="hometown" class="block font-medium text-sm text-gray-700">{{ 'Hometown' }}</label>
    <input class="border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm mt-1 block w-full" id="hometown" name="hometown" type="text" value="{{ isset($staff->hometown) ? $staff->hometown : ''}}" >
    {!! $errors->first('hometown', '<p>:message</p>') !!}
</div>
<div>
    <label for="identification" class="block font-medium text-sm text-gray-700">{{ 'Identification' }}</label>
    <input class="border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm mt-1 block w-full" id="identification" name="identification" type="text" value="{{ isset($staff->identification) ? $staff->identification : ''}}" >
    {!! $errors->first('identification', '<p>:message</p>') !!}
</div>
<div>
    <label for="residency" class="block font-medium text-sm text-gray-700">{{ 'Residency' }}</label>
    <input class="border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm mt-1 block w-full" id="residency" name="residency" type="text" value="{{ isset($staff->residency) ? $staff->residency : ''}}" >
    {!! $errors->first('residency', '<p>:message</p>') !!}
</div>
<div>
    <label for="contact" class="block font-medium text-sm text-gray-700">{{ 'Contact' }}</label>
    <input class="border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm mt-1 block w-full" id="contact" name="contact" type="number" value="{{ isset($staff->contact) ? $staff->contact : ''}}" >
    {!! $errors->first('contact', '<p>:message</p>') !!}
</div>
<div>
    <label for="is_active" class="block font-medium text-sm text-gray-700">{{ 'Is Active' }}</label>
    <div>
    <label for="is_active" class="inline-flex items-center">
        <input id="is_active" type="radio" class="border-gray-300 text-indigo-600 shadow-sm focus:ring-indigo-500" name="is_active" value="1" {{ (isset($staff) && 1 == $staff->is_active) ? 'checked' : '' }}>
        <span class="ms-2 text-sm text-gray-600">Yes</span>
    </label>
</div>
<div>
    <label for="is_active" class="inline-flex items-center">
        <input id="is_active" type="radio" class="border-gray-300 text-indigo-600 shadow-sm focus:ring-indigo-500" name="is_active" @if (isset($staff)) {{ (0 == $staff->is_active) ? 'checked' : '' }} @else {{ 'checked' }} @endif>
        <span class="ms-2 text-sm text-gray-600">No</span>
    </label>
</div>

    {!! $errors->first('is_active', '<p>:message</p>') !!}
</div>
<div>
    <label for="position" class="block font-medium text-sm text-gray-700">{{ 'Position' }}</label>
    <input class="border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm mt-1 block w-full" id="position" name="position" type="text" value="{{ isset($staff->position) ? $staff->position : ''}}" >
    {!! $errors->first('position', '<p>:message</p>') !!}
</div>


<div class="flex items-center gap-4">
    <button type="submit" class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 focus:bg-gray-700 active:bg-gray-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out duration-150">
        {{ $formMode === 'edit' ? 'Update' : 'Create' }}
    </button>
</div>
