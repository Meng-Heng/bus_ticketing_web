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
                                Show Staff
                            </h2>
                            <div class="flex justify-end mt-5">
                                <a class="px-2 py-1 rounded-md bg-sky-500 text-sky-100 hover:bg-sky-600" href="{{ route('staff.index') }}" title="Back">< Back</a>
                            </div>
                        </header>
                        </br>

                        <table class="shadow-lg bg-white">
                            <tr>
                                <td class="border px-8 py-4 font-bold">ID</td>
                                <td class="border px-8 py-4">{{ $staff->id }}</td>
                            </tr>
                            <tr><td class="border px-8 py-4 font-bold"> Fname </td><td class="border px-8 py-4"> {{ $staff->fname }} </td></tr><tr><td class="border px-8 py-4 font-bold"> Lname </td><td class="border px-8 py-4"> {{ $staff->lname }} </td></tr><tr><td class="border px-8 py-4 font-bold"> User Id </td><td class="border px-8 py-4"> {{ $staff->user_id }} </td></tr><tr><td class="border px-8 py-4 font-bold"> Picture </td><td class="border px-8 py-4"> {{ $staff->picture }} </td></tr><tr><td class="border px-8 py-4 font-bold"> Hometown </td><td class="border px-8 py-4"> {{ $staff->hometown }} </td></tr><tr><td class="border px-8 py-4 font-bold"> Identification </td><td class="border px-8 py-4"> {{ $staff->identification }} </td></tr><tr><td class="border px-8 py-4 font-bold"> Residency </td><td class="border px-8 py-4"> {{ $staff->residency }} </td></tr><tr><td class="border px-8 py-4 font-bold"> Contact </td><td class="border px-8 py-4"> {{ $staff->contact }} </td></tr><tr><td class="border px-8 py-4 font-bold"> Is Active </td><td class="border px-8 py-4"> {{ $staff->is_active }} </td></tr><tr><td class="border px-8 py-4 font-bold"> Position </td><td class="border px-8 py-4"> {{ $staff->position }} </td></tr>
                        </table>

                    </section>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>
