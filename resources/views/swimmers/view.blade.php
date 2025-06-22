@extends('dashboard')

@section('content')
<script>
    // Redirect to a specific route when the page is refreshed
    window.onload = function() {
        if (performance.getEntriesByType("navigation")[0]?.type === "reload") {
            window.location.href = "{{ route('swimmers.view', $swimmer->id) }}";
        }
    };
</script>

<div class="bg-white dark:bg-gray-800 p-6 rounded-xl shadow-md max-w-4xl w-full mx-auto">

    {{-- Show Validation Errors --}}
    @if ($errors->has('message'))
        <div class="mb-4 text-red-600">
            {{ $errors->first('message') }}
        </div>
    @endif


    {{-- Top Action Buttons --}}
    <div class="flex justify-end gap-3 mb-6">
        <a href="{{ route('swimmers.edit', $swimmer->id) }}"
            class="bg-yellow-500 hover:bg-yellow-600 text-white text-sm font-medium px-4 py-2 rounded shadow transition">
            ✏️ Edit
        </a>
        <a href="{{ route('swimmers.health.create', $swimmer->id) }}"
            class="bg-green-600 hover:bg-green-700 text-white text-sm font-medium px-4 py-2 rounded shadow transition">
            ➕ Create Health Status
        </a>
        <a href="{{ route('swimmers.sport.data.create', $swimmer->id) }}"
            class="bg-blue-600 hover:bg-blue-700 text-white text-sm font-medium px-4 py-2 rounded shadow transition">
            🏊 Sport Data
        </a>
    </div>

    {{-- Swimmer Info --}}
    <h2 class="text-2xl font-bold text-gray-800 dark:text-gray-100 mb-4">Swimmer Details</h2>

    <div class="flex items-center gap-4 mb-6">
        @if ($swimmer->image)
            <img src="{{ asset($swimmer->image) }}" alt="{{ $swimmer->name }}" height="200px" width="200px" class="rounded-full object-cover">
        @else
            <div class="w-24 h-24 rounded-full bg-gray-400 flex items-center justify-center text-white text-2xl font-bold">
                {{ strtoupper(substr($swimmer->name, 0, 1)) }}
            </div>
        @endif

        <div>
            <h3 class="text-xl font-semibold text-gray-900 dark:text-gray-100">{{ $swimmer->name }}</h3>
            <p class="text-gray-500 dark:text-gray-300">Membership #: {{ $swimmer->membership_number }}</p>
            <p class="text-gray-500 dark:text-gray-300">Membership Type: {{ $swimmer->membership_type }}</p>
        </div>
    </div>

    {{-- Personal Info --}}
    <div class="grid grid-cols-1 md:grid-cols-2 gap-4 text-gray-800 dark:text-gray-200">
        <div><strong>Phone:</strong> {{ $swimmer->phone }}</div>
        <div><strong>WhatsApp:</strong> {{ $swimmer->whatsapp_phone }}</div>
        <div><strong>Father Phone:</strong> {{ $swimmer->father_phone }}</div>
        <div><strong>Birthdate:</strong> {{ $swimmer->birthdate ?? 'N/A' }}</div>
        <div><strong>National ID:</strong> {{ $swimmer->national_ID }}</div>
        <div><strong>Religion:</strong> {{ ucfirst($swimmer->religion) ?? 'N/A' }}</div>
        <div><strong>Address:</strong> {{ $swimmer->address }}</div>
        <div><strong>Educational Qualification:</strong> {{ $swimmer->educational_qualification ?? 'N/A' }}</div>
        <div><strong>Father Job:</strong> {{ $swimmer->father_job ?? 'N/A' }}</div>
        <div><strong>Current Work:</strong> {{ $swimmer->current_work ?? 'N/A' }}</div>
        <div><strong>Created By:</strong> {{ $swimmer->user->name }}</div>
    </div>

    {{-- Bottom Action Buttons --}}
    <div class="mt-8 flex flex-wrap justify-end gap-3">
        <a href="{{ route('dashboard') }}" class="bg-blue-600 hover:bg-blue-700 text-white font-semibold px-4 py-2 rounded-lg transition">
            ← Back
        </a>

        <a href="#" onclick="window.print();" class="bg-green-600 hover:bg-green-700 text-white font-semibold px-4 py-2 rounded-lg transition">
            🖨️ Print
        </a>

        <a href="{{ route('swimmers.health.view', $swimmer->id) }}" class="bg-indigo-600 hover:bg-indigo-700 text-white font-semibold px-4 py-2 rounded-lg transition">
            View Health Status
        </a>

        <a href="{{route('swimmers.sport.data.view' , $swimmer->id)}}" class="bg-indigo-600 hover:bg-indigo-700 text-white font-semibold px-4 py-2 rounded-lg transition">
            View Sport Data
        </a>

        <form action="{{ route('swimmers.delete', $swimmer->id) }}" method="POST" onsubmit="return confirm('Are you sure?')">
            @csrf
            @method('DELETE')
            <button type="submit" class="bg-red-600 hover:bg-red-700 text-white font-semibold px-4 py-2 rounded-lg transition">
                🗑️ Delete
            </button>
        </form>
    </div>

</div>
@endsection
