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
                                Show Storage
                            </h2>
                            <div class="flex justify-end mt-5">
                                <a class="px-2 py-1 rounded-md bg-sky-500 text-sky-100 hover:bg-sky-600" href="{{ route('storage.index') }}" title="Back">< Back</a>
                            </div>
                        </header>
                        </br>

                        <table class="shadow-lg bg-white">
                            <tr>
                                <td class="border px-8 py-4 font-bold">ID</td>
                                <td class="border px-8 py-4">{{ $storage->id }}</td>
                            </tr>
                            <tr><td class="border px-8 py-4 font-bold"> Luggage </td><td class="border px-8 py-4"> {{ $storage->luggage }} </td></tr><tr><td class="border px-8 py-4 font-bold"> Measurement </td><td class="border px-8 py-4"> {{ $storage->measurement }} </td></tr><tr><td class="border px-8 py-4 font-bold"> Start Date </td><td class="border px-8 py-4"> {{ $storage->start_date }} </td></tr>
                        </table>

                    </section>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>
