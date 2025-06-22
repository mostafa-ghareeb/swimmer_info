@extends('dashboard')

@section('content')
<div class="flex justify-end gap-3 mb-6">
        <a href="{{ route('swimmers.health.edit', $health->id) }}"
            class="bg-yellow-500 hover:bg-yellow-600 text-white text-sm font-medium px-4 py-2 rounded shadow transition">
            ✏️ Edit
        </a>
        <form action="{{ route('swimmers.health.delete', $health->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this swimmer?')">
            @csrf
            @method('DELETE')
            <button type="submit"
                class="bg-red-600 hover:bg-red-700 text-white text-sm font-medium px-4 py-2 rounded shadow transition">
                🗑️ Delete
            </button>
        </form> 
    </div>
    <div class="max-w-3xl mx-auto bg-white dark:bg-gray-800 p-6 rounded shadow">
        <h2 class="text-2xl font-bold mb-6 text-gray-800 dark:text-gray-100">Health Condition - {{ $health->swimmer->name }}</h2>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-4 text-gray-700 dark:text-gray-200">
            <div><strong>Weight:</strong> {{ $health->weight }} kg</div>
            <div><strong>Height:</strong> {{ $health->height }} cm</div>
            <div><strong>Chronic Diseases:</strong> {{ $health->chronic_diseases ? 'Yes' : 'No' }}</div>
            @if ($health->chronic_diseases)
                <div><strong>Please Mention:</strong> {{ $health->please_mention }}</div>
            @endif
            <div><strong>Undergoes Surgery:</strong> {{ $health->undergoes_surgery ? 'Yes' : 'No' }}</div>
            @if ($health->undergoes_surgery)
                <div><strong>Type of Operation:</strong> {{ $health->type_of_operation }}</div>
            @endif
            <div><strong>Sports Injuries:</strong> {{ $health->sports_injuries ? 'Yes' : 'No' }}</div>
            @if ($health->sports_injuries)
                <div><strong>Type of Injury:</strong> {{ $health->type_of_injury }}</div>
            @endif
        </div>

        <div class="mt-6 text-right">
            <a href="{{ route('dashboard') }}" class="bg-blue-600 hover:bg-blue-700 text-white font-semibold px-4 py-2 rounded">
                ← Back
            </a>
        </div>
    </div>
@endsection
