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
                                Show Ticket
                            </h2>
                            <div class="flex justify-end mt-5">
                                <a class="px-2 py-1 rounded-md bg-sky-500 text-sky-100 hover:bg-sky-600" href="{{ route('ticket.index') }}" title="Back">< Back</a>
                            </div>
                        </header>
                        </br>

                        <table class="shadow-lg bg-white">
                            <tr>
                                <td class="border px-8 py-4 font-bold">ID</td>
                                <td class="border px-8 py-4">{{ $ticket->id }}</td>
                            </tr>
                            <tr><td class="border px-8 py-4 font-bold"> Ticket Id </td><td class="border px-8 py-4"> {{ $ticket->ticket_id }} </td></tr><tr><td class="border px-8 py-4 font-bold"> Issued Date </td><td class="border px-8 py-4"> {{ $ticket->issued_date }} </td></tr><tr><td class="border px-8 py-4 font-bold"> Schedule Id </td><td class="border px-8 py-4"> {{ $ticket->schedule_id }} </td></tr><tr><td class="border px-8 py-4 font-bold"> Bus Seat Id </td><td class="border px-8 py-4"> {{ $ticket->bus_seat_id }} </td></tr><tr><td class="border px-8 py-4 font-bold"> User Id </td><td class="border px-8 py-4"> {{ $ticket->user_id }} </td></tr><tr><td class="border px-8 py-4 font-bold"> Payment Id </td><td class="border px-8 py-4"> {{ $ticket->payment_id }} </td></tr><tr><td class="border px-8 py-4 font-bold"> Storage Id </td><td class="border px-8 py-4"> {{ $ticket->storage_id }} </td></tr><tr><td class="border px-8 py-4 font-bold"> Price Id </td><td class="border px-8 py-4"> {{ $ticket->price_id }} </td></tr>
                        </table>

                    </section>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>
