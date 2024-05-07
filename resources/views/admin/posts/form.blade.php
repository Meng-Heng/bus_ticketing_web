<div>
    <label for="title" class="block font-medium text-sm text-gray-700">{{ 'Title' }}</label>
    <input class="border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm mt-1 block w-full" id="title" name="title" type="text" value="{{ isset($post->title) ? $post->title : ''}}" >
    {!! $errors->first('title', '<p>:message</p>') !!}
</div>
<div>
    <label for="content" class="block font-medium text-sm text-gray-700">{{ 'Content' }}</label>
    <textarea id="content" name="content" type="textarea" rows="5" class="border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm mt-1 block w-full" >{{ isset($post->content) ? $post->content : ''}}</textarea>

    {!! $errors->first('content', '<p>:message</p>') !!}
</div>
<div>
    <label for="category" class="block font-medium text-sm text-gray-700">{{ 'Category' }}</label>
    <select name="category" class="border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm mt-1 block w-full" id="category" >
    @foreach (json_decode('{"technology": "Technology", "tips": "Tips", "health": "Health"}', true) as $optionKey => $optionValue)
        <option value="{{ $optionKey }}" {{ (isset($post->category) && $post->category == $optionKey) ? 'selected' : ''}}>{{ $optionValue }}</option>
    @endforeach
</select>
    {!! $errors->first('category', '<p>:message</p>') !!}
</div>


<div class="flex items-center gap-4">
    <button type="submit" class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 focus:bg-gray-700 active:bg-gray-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out duration-150">
        {{ $formMode === 'edit' ? 'Update' : 'Create' }}
    </button>
</div>
