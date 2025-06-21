@extends('dashboard')

@section('content')
<div class="max-w-3xl mx-auto bg-white dark:bg-gray-800 p-8 rounded shadow">
    <h2 class="text-2xl font-bold mb-6 text-gray-800 dark:text-gray-100">Create Health Condition for {{ $swimmer->name }}</h2>

    {{-- Show Validation Errors --}}
    @if ($errors->has('message'))
        <div class="mb-4 text-red-600">
            {{ $errors->first('message') }}
        </div>
    @endif

    <form action="{{ route('swimmers.health.store', $swimmer->id) }}" method="POST">
        @csrf
        @method('POST')
        <div class="grid grid-cols-1 sm:grid-cols-2 gap-4 mb-4">
            <div>
                <label for="weight" class="block text-gray-700 dark:text-gray-200">Weight (kg)</label>
                <input type="number" name="weight" id="weight" step="0.01" class="form-input w-full" required>
            </div>
            <div>
                <label for="height" class="block text-gray-700 dark:text-gray-200">Height (cm)</label>
                <input type="number" name="height" id="height" step="0.01" class="form-input w-full" required>
            </div>
        </div>

        <div class="mb-4">
            <label class="block text-gray-700 dark:text-gray-200">Chronic Diseases</label>
            <select name="chronic_diseases" class="form-select w-full">
                <option value="">Select</option>
                <option value="1">Yes</option>
                <option value="0">No</option>
            </select>
        </div>

        <div class="mb-4">
            <label for="please_mention" class="block text-gray-700 dark:text-gray-200">Mention Chronic Disease (if any)</label>
            <input type="text" name="please_mention" id="please_mention" class="form-input w-full">
        </div>

        <div class="mb-4">
            <label class="block text-gray-700 dark:text-gray-200">Undergoes Surgery</label>
            <select name="undergoes_surgery" class="form-select w-full">
                <option value="">Select</option>
                <option value="1">Yes</option>
                <option value="0">No</option>
            </select>
        </div>

        <div class="mb-4">
            <label for="type_of_operation" class="block text-gray-700 dark:text-gray-200">Type of Operation</label>
            <input type="text" name="type_of_operation" id="type_of_operation" class="form-input w-full">
        </div>

        <div class="mb-4">
            <label class="block text-gray-700 dark:text-gray-200">Sports Injuries</label>
            <select name="sports_injuries" class="form-select w-full">
                <option value="">Select</option>
                <option value="1">Yes</option>
                <option value="0">No</option>
            </select>
        </div>

        <div class="mb-4">
            <label for="type_of_injury" class="block text-gray-700 dark:text-gray-200">Type of Injury</label>
            <input type="text" name="type_of_injury" id="type_of_injury" class="form-input w-full">
        </div>

        <div class="mt-6">
            <button type="submit" class="bg-blue-600 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                Save Health Condition
            </button>
        </div>
    </form>
</div>
@endsection
