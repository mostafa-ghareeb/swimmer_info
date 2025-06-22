@extends('dashboard')

@section('content')
<div class="max-w-3xl mx-auto bg-white dark:bg-gray-800 p-8 rounded shadow">
    <h2 class="text-2xl font-bold mb-6 text-gray-800 dark:text-gray-100">
        Edit Health Condition for {{ $health->swimmer->name }}
    </h2>

    @if ($errors->has('message'))
        <div class="mb-4 text-red-600">
            {{ $errors->first('message') }}
        </div>
    @endif

    <form action="{{ route('swimmers.health.update', $health->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="grid grid-cols-1 sm:grid-cols-2 gap-4 mb-4">
            <div>
                <label for="weight" class="block text-gray-700 dark:text-gray-200">Weight (kg)</label>
                <input type="number" name="weight" id="weight" step="0.01" value="{{ old('weight', $health->weight) }}" class="form-input w-full" required>
            </div>
            <div>
                <label for="height" class="block text-gray-700 dark:text-gray-200">Height (cm)</label>
                <input type="number" name="height" id="height" step="0.01" value="{{ old('height', $health->height) }}" class="form-input w-full" required>
            </div>
        </div>

        <div class="mb-4">
            <label class="block text-gray-700 dark:text-gray-200">Chronic Diseases</label>
            <select name="chronic_diseases" class="form-select w-full">
                <option value="">Select</option>
                <option value="1" {{ $health->chronic_diseases ? 'selected' : '' }}>Yes</option>
                <option value="0" {{ $health->chronic_diseases === 0 ? 'selected' : '' }}>No</option>
            </select>
        </div>

        <div class="mb-4">
            <label for="please_mention" class="block text-gray-700 dark:text-gray-200">Mention Chronic Disease (if any)</label>
            <input type="text" name="please_mention" id="please_mention" value="{{ old('please_mention', $health->please_mention) }}" class="form-input w-full">
        </div>

        <div class="mb-4">
            <label class="block text-gray-700 dark:text-gray-200">Undergoes Surgery</label>
            <select name="undergoes_surgery" class="form-select w-full">
                <option value="">Select</option>
                <option value="1" {{ $health->undergoes_surgery ? 'selected' : '' }}>Yes</option>
                <option value="0" {{ $health->undergoes_surgery === 0 ? 'selected' : '' }}>No</option>
            </select>
        </div>

        <div class="mb-4">
            <label for="type_of_operation" class="block text-gray-700 dark:text-gray-200">Type of Operation</label>
            <input type="text" name="type_of_operation" id="type_of_operation" value="{{ old('type_of_operation', $health->type_of_operation) }}" class="form-input w-full">
        </div>

        <div class="mb-4">
            <label class="block text-gray-700 dark:text-gray-200">Sports Injuries</label>
            <select name="sports_injuries" class="form-select w-full">
                <option value="">Select</option>
                <option value="1" {{ $health->sports_injuries ? 'selected' : '' }}>Yes</option>
                <option value="0" {{ $health->sports_injuries === 0 ? 'selected' : '' }}>No</option>
            </select>
        </div>

        <div class="mb-4">
            <label for="type_of_injury" class="block text-gray-700 dark:text-gray-200">Type of Injury</label>
            <input type="text" name="type_of_injury" id="type_of_injury" value="{{ old('type_of_injury', $health->type_of_injury) }}" class="form-input w-full">
        </div>

        <div class="mt-6">
            <button type="submit" class="bg-blue-600 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                Update Health Condition
            </button>
        </div>
    </form>
</div>
@endsection
