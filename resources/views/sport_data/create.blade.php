@extends('dashboard')

@section('content')
<div class="max-w-3xl mx-auto bg-white dark:bg-gray-800 p-8 rounded shadow">
    <h2 class="text-2xl font-bold mb-6 text-gray-800 dark:text-gray-100">Create Sport Data for {{ $swimmer->name }}</h2>

    {{-- Show Validation Errors --}}
    @if ($errors->has('message'))
        <div class="mb-4 text-red-600">
            {{ $errors->first('message') }}
        </div>
    @endif

    <form action="{{ route('swimmers.sport.data.store', $swimmer->id) }}" method="POST">
        @csrf
        @method('POST')
        <input type="text" name="mostafa">
        <div class="mb-4">
            <label class="block text-gray-700 dark:text-gray-200">Member of Other Clubs</label>
            <select name="member_of_other_clubs" class="form-select w-full">
                <option value="">Select</option>
                <option value="1" {{ old('member_of_other_clubs') == '1' ? 'selected' : '' }}>Yes</option>
                <option value="0" {{ old('member_of_other_clubs') == '0' ? 'selected' : '' }}>No</option>
            </select>
        </div>

        <div class="mb-4">
            <label for="other_clubs" class="block text-gray-700 dark:text-gray-200">Other Clubs</label>
            <input type="text" name="other_clubs" id="other_clubs" class="form-input w-full" value="{{ old('other_clubs') }}">
        </div>

        <div class="mb-4">
            <label class="block text-gray-700 dark:text-gray-200">Did you play for other club?</label>
            <select name="did_you_play_for_other_club" class="form-select w-full">
                <option value="">Select</option>
                <option value="1" {{ old('did_you_play_for_other_club') == '1' ? 'selected' : '' }}>Yes</option>
                <option value="0" {{ old('did_you_play_for_other_club') == '0' ? 'selected' : '' }}>No</option>
            </select>
        </div>

        <div class="mb-4">
            <label for="have_you_obtained_the_star_tests_and_their_number" class="block text-gray-700 dark:text-gray-200">Star Tests and Their Number</label>
            <input type="text" name="have_you_obtained_the_star_tests_and_their_number" id="have_you_obtained_the_star_tests_and_their_number" class="form-input w-full" value="{{ old('have_you_obtained_the_star_tests_and_their_number') }}">
        </div>

        <div class="mb-4">
            <label for="where_to_get_star_tests" class="block text-gray-700 dark:text-gray-200">Where to Get Star Tests</label>
            <input type="text" name="where_to_get_star_tests" id="where_to_get_star_tests" class="form-input w-full" value="{{ old('where_to_get_star_tests') }}">
        </div>

        <div class="mb-4">
            <label for="union_registration_number" class="block text-gray-700 dark:text-gray-200">Union Registration Number</label>
            <input type="number" step="0.01" name="union_registration_number" id="union_registration_number" class="form-input w-full" value="{{ old('union_registration_number') }}">
        </div>

        <div class="mt-6">
            <button type="submit" class="bg-blue-600 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                Save Sport Data
            </button>
        </div>
    </form>
</div>
@endsection
