<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                <div class="w-full">
                    <section>
                        <header>
                            <h2 class="text-lg font-medium text-gray-900">
                                Bus
                            </h2>
                            <div class="flex justify-end mt-5">
                                <a href="{{ route('bus.create') }}" class="px-2 py-1 rounded-md bg-sky-500 text-white hover:bg-sky-600" title="Add New Bu">Add New</a>
                            </div>
                        </header>
                        </br>

                        @if (session()->has('flash_message'))
                        <div class="text-white px-6 py-4 border-0 rounded relative mb-4 bg-emerald-500">
                            <span class="inline-block align-middle mr-8">
                                {{ session('flash_message') }}
                            </span>
                            <button class="absolute bg-transparent text-2xl font-semibold leading-none right-0 top-0 mt-4 mr-6 outline-none focus:outline-none" onclick="this.parentNode.parentNode.removeChild(this.parentNode);">
                                <span>×</span>
                            </button>
                        </div>
                        @endif

                        <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                                <tr>
                                    <th scope="col" class="px-6 py-3">#</th>
                                    <th scope="col" class="px-6 py-3">Bus Plate</th><th scope="col" class="px-6 py-3">Total Seat</th><th scope="col" class="px-6 py-3">Description</th><th scope="col" class="px-6 py-3">Is Active</th>
                                    <th scope="col" class="px-6 py-3">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                            @foreach($bus as $item)
                                <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                                    <td class="px-6 py-4">{{ $loop->iteration }}</td>
                                    <td class="px-6 py-4">{{ $item->bus_plate }}</td><td class="px-6 py-4">{{ $item->total_seat }}</td><td class="px-6 py-4">{{ $item->description }}</td><td class="px-6 py-4">{{ $item->is_active }}</td>
                                    <td class="px-6 py-4">
                                        <a href="{{ route('bus.show', $item->id) }}" title="View Bu"><button type="button" class="bg-indigo-600 hover:bg-indigo-800 text-white font-bold py-1 px-2 rounded">View</button></a>
                                        <a href="{{ route('bus.edit', $item->id) }}" title="Edit Bu"><button type="button" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-1 px-2 rounded">Edit</button></a>

                                        <form method="POST" action="{{ route('bus.destroy', $item->id) }}" accept-charset="UTF-8" style="display:inline">
                                            {{ method_field('DELETE') }}
                                            @csrf()
                                            <button type="submit" class="bg-red-500 hover:bg-red-700 text-white font-bold py-1 px-2 rounded" title="Delete Bu" onclick="return confirm(&quot;Confirm delete?&quot;)">Delete</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
    
                        <div class="mt-6">
                            {!! $bus->appends(['search' => Request::get('search')])->render() !!}
                        </div>
                    </section>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
