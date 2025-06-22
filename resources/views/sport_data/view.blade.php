@extends('dashboard')

@section('content')
<div class="max-w-3xl mx-auto bg-white dark:bg-gray-800 p-8 rounded shadow">
    <h2 class="text-2xl font-bold mb-6 text-gray-800 dark:text-gray-100">
        Sports Data for {{ $swimmer->name }}
    </h2>

    @if ($errors->has('message'))
        <div class="mb-4 text-red-600">
            {{ $errors->first('message') }}
        </div>
    @endif
    
    <div class="space-y-4 text-gray-700 dark:text-gray-200">
        <div>
            <strong>Member of Other Clubs:</strong>
            <span>{{ $swimmer->sport_data->member_of_other_clubs ? 'Yes' : 'No' }}</span>
        </div>

        <div>
            <strong>Other Clubs:</strong>
            <span>{{ $swimmer->sport_data->other_clubs ?? 'N/A' }}</span>
        </div>

        <div>
            <strong>Played for Other Club:</strong>
            <span>{{ $swimmer->sport_data->did_you_play_for_other_club ? 'Yes' : 'No' }}</span>
        </div>

        <div>
            <strong>Star Tests and Number:</strong>
            <span>{{ $swimmer->sport_data->have_you_obtained_the_star_tests_and_their_number ?? 'N/A' }}</span>
        </div>

        <div>
            <strong>Where Obtained Star Tests:</strong>
            <span>{{ $swimmer->sport_data->where_to_get_star_tests ?? 'N/A' }}</span>
        </div>

        <div>
            <strong>Union Registration Number:</strong>
            <span>{{ $swimmer->sport_data->union_registration_number ?? 'N/A' }}</span>
        </div>

        <div class="pt-4">
            <a href="{{ route('swimmers.view' , $swimmer->id) }}" class="text-blue-600 hover:underline">← Back to Swimmers</a>
        </div>
    </div>
</div>
@endsection
