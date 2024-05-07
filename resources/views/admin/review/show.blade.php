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
                                Show Review
                            </h2>
                            <div class="flex justify-end mt-5">
                                <a class="px-2 py-1 rounded-md bg-sky-500 text-sky-100 hover:bg-sky-600" href="{{ route('review.index') }}" title="Back">< Back</a>
                            </div>
                        </header>
                        </br>

                        <table class="shadow-lg bg-white">
                            <tr>
                                <td class="border px-8 py-4 font-bold">ID</td>
                                <td class="border px-8 py-4">{{ $review->id }}</td>
                            </tr>
                            <tr><td class="border px-8 py-4 font-bold"> Star </td><td class="border px-8 py-4"> {{ $review->star }} </td></tr><tr><td class="border px-8 py-4 font-bold"> Feedback </td><td class="border px-8 py-4"> {{ $review->feedback }} </td></tr><tr><td class="border px-8 py-4 font-bold"> Posted Time </td><td class="border px-8 py-4"> {{ $review->posted_time }} </td></tr><tr><td class="border px-8 py-4 font-bold"> Payment Id </td><td class="border px-8 py-4"> {{ $review->payment_id }} </td></tr><tr><td class="border px-8 py-4 font-bold"> Schedule Id </td><td class="border px-8 py-4"> {{ $review->schedule_id }} </td></tr><tr><td class="border px-8 py-4 font-bold"> User Id </td><td class="border px-8 py-4"> {{ $review->user_id }} </td></tr>
                        </table>

                    </section>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>
