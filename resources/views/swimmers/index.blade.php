@extends('dashboard')

@section('content')
    <div class="bg-white dark:bg-gray-800 p-6 rounded-xl shadow-md overflow-x-auto">
        <h2 class="text-2xl font-bold text-gray-800 dark:text-gray-100 mb-4">Swimmers List</h2>

        <table class="min-w-full divide-y divide-gray-200 dark:divide-gray-700">
            <thead class="bg-gray-100 dark:bg-gray-700">
                <tr>
                    <th class="px-4 py-3 text-left text-xs font-semibold text-gray-600 dark:text-gray-300 uppercase tracking-wider">Image</th>
                    <th class="px-4 py-3 text-left text-xs font-semibold text-gray-600 dark:text-gray-300 uppercase tracking-wider">Name</th>
                    <th class="px-4 py-3 text-left text-xs font-semibold text-gray-600 dark:text-gray-300 uppercase tracking-wider">Phone</th>
                    <th class="px-4 py-3 text-left text-xs font-semibold text-gray-600 dark:text-gray-300 uppercase tracking-wider">WhatsApp</th>
                    <th class="px-4 py-3 text-left text-xs font-semibold text-gray-600 dark:text-gray-300 uppercase tracking-wider">Birthdate</th>
                    <th class="px-4 py-3 text-left text-xs font-semibold text-gray-600 dark:text-gray-300 uppercase tracking-wider">National ID</th>
                    <th class="px-4 py-3 text-left text-xs font-semibold text-gray-600 dark:text-gray-300 uppercase tracking-wider">Religion</th>
                    <th class="px-4 py-3 text-left text-xs font-semibold text-gray-600 dark:text-gray-300 uppercase tracking-wider">Address</th>
                    <th class="px-4 py-3 text-left text-xs font-semibold text-gray-600 dark:text-gray-300 uppercase tracking-wider">Membership #</th>
                </tr>
            </thead>
            <tbody class="bg-white dark:bg-gray-800 divide-y divide-gray-200 dark:divide-gray-700">
                @foreach ($swimmers as $swimmer)
                <tr 
                onclick="window.location='{{ route('swimmers.view', $swimmer->id) }}'"
                class="hover:bg-gray-50 dark:hover:bg-gray-700 transition cursor-pointer">
                <td class="px-4 py-3">
                    @if ($swimmer->image)
                        <img src="{{ asset($swimmer->image) }}" alt="{{ $swimmer->name }}" class="w-10 h-10 rounded-full object-cover">
                    @else
                        <div class="w-10 h-10 rounded-full bg-gray-400 flex items-center justify-center text-white font-bold">
                            {{ strtoupper(substr($swimmer->name, 0, 1)) }}
                        </div>
                    @endif
                </td>
                <td class="px-4 py-3 text-gray-900 dark:text-gray-100">{{ $swimmer->name }}</td>
                <td class="px-4 py-3 text-gray-900 dark:text-gray-100">{{ $swimmer->phone }}</td>
                <td class="px-4 py-3 text-gray-900 dark:text-gray-100">{{ $swimmer->whatsapp_phone }}</td>
                <td class="px-4 py-3 text-gray-900 dark:text-gray-100">{{ $swimmer->birthdate ?? 'N/A' }}</td>
                <td class="px-4 py-3 text-gray-900 dark:text-gray-100">{{ $swimmer->national_ID }}</td>
                <td class="px-4 py-3 text-gray-900 dark:text-gray-100">{{ ucfirst($swimmer->religion) ?? 'N/A' }}</td>
                <td class="px-4 py-3 text-gray-900 dark:text-gray-100">{{ $swimmer->address }}</td>
                <td class="px-4 py-3 text-gray-900 dark:text-gray-100">{{ $swimmer->membership_number }}</td>
            </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
