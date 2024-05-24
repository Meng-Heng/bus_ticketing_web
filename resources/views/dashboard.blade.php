<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    {{ __("You're logged in!") }}
                </div>
            </div>
            <div class="py-12">
                <tr>
                <a href="{{ url('admin/staff') }}" button type="button" class="bg-indigo-600 hover:bg-indigo-800 text-white font-bold py-1 px-2 rounded">Staff</button></a>
                <a href="{{ url('admin/ticket') }}" button type="button" class="bg-indigo-600 hover:bg-indigo-800 text-white font-bold py-1 px-2 rounded">Ticket</button></a>
                <a href="{{ url('admin/review') }}" button type="button" class="bg-indigo-600 hover:bg-indigo-800 text-white font-bold py-1 px-2 rounded">Review</button></a>
                <a href="{{ url('admin/storage') }}" button type="button" class="bg-indigo-600 hover:bg-indigo-800 text-white font-bold py-1 px-2 rounded">Storage</button></a>
                <a href="{{ url('admin/price') }}" button type="button" class="bg-indigo-600 hover:bg-indigo-800 text-white font-bold py-1 px-2 rounded">Price</button></a>
                <a href="{{ url('admin/payment') }}" button type="button" class="bg-indigo-600 hover:bg-indigo-800 text-white font-bold py-1 px-2 rounded">Payment</button></a>
                <a href="{{ url('admin/busseat') }}" button type="button" class="bg-indigo-600 hover:bg-indigo-800 text-white font-bold py-1 px-2 rounded">Bus Seat</button></a>
                <a href="{{ url('admin/schedule') }}" button type="button" class="bg-indigo-600 hover:bg-indigo-800 text-white font-bold py-1 px-2 rounded">Schedule</button></a>
                <a href="{{ url('admin/bus') }}" button type="button" class="bg-indigo-600 hover:bg-indigo-800 text-white font-bold py-1 px-2 rounded">Bus</button></a>
                
                <a href="{{ url('roles') }}" class="bg-indigo-600 hover:bg-indigo-800 text-white font-bold py-1 px-2 rounded">Roles</a>
                <a href="{{ url('permissions') }}" class="bg-indigo-600 hover:bg-indigo-800 text-white font-bold py-1 px-2 rounded">Permissions</a>
                <a href="{{ url('users') }}" class="bg-indigo-600 hover:bg-indigo-800 text-white font-bold py-1 px-2 rounded">Users</a>
                </tr>                        
            </div>
        </div>
    </div>
</x-app-layout>
