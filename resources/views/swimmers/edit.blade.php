@extends('dashboard')

@section('content')
    <div class="max-w-4xl mx-auto bg-white dark:bg-gray-800 p-8 rounded shadow">
        <h2 class="text-2xl font-bold mb-6 text-gray-800 dark:text-gray-100">Edit Swimmer</h2>

        {{-- عرض أخطاء التحقق --}}
        @if ($errors->any())
            <div class="mb-4 text-red-600">
                <ul class="list-disc pl-5">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        {{-- صورة السباح الحالية --}}
        @if ($swimmer->image)
            <div class="mb-4">
                <img src="{{ asset($swimmer->image) }}" alt="Current Image" width="300px" height="300px" class="object-cover">
                <p class="text-gray-500 text-sm mt-1">Current Image</p>
            </div>
        @endif

        <form action="{{ route('swimmers.update', $swimmer->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method("PUT")

            <div class="mb-4">
                <label for="name" class="block text-gray-700 dark:text-gray-200">Name</label>
                <input type="text" name="name" id="name" value="{{ old('name', $swimmer->name) }}"
                    class="form-input w-full text-black bg-white border-gray-300" required>
            </div>

            <div class="mb-4">
                <label for="address" class="block text-gray-700 dark:text-gray-200">Address</label>
                <input type="text" name="address" id="address" value="{{ old('address', $swimmer->address) }}"
                    class="form-input w-full" required>
            </div>

            <div class="mb-4">
                <label class="block text-gray-700 dark:text-gray-200">Religion</label>
                <select name="religion" class="form-select w-full">
                    <option value="">Select</option>
                    <option value="muslim" {{ old('religion', $swimmer->religion) == 'muslim' ? 'selected' : '' }}>Muslim</option>
                    <option value="christian" {{ old('religion', $swimmer->religion) == 'christian' ? 'selected' : '' }}>Christian</option>
                </select>
            </div>

            <div class="mb-4">
                <label for="membership_type" class="block text-gray-700 dark:text-gray-200">Membership Type</label>
                <input type="text" name="membership_type" id="membership_type"
                    value="{{ old('membership_type', $swimmer->membership_type) }}" class="form-input w-full" required>
            </div>

            <div class="grid grid-cols-1 sm:grid-cols-3 gap-4 mb-4">
                <div>
                    <label for="phone" class="block text-gray-700 dark:text-gray-200">Phone</label>
                    <input type="text" name="phone" id="phone" value="{{ old('phone', $swimmer->phone) }}" class="form-input w-full">
                </div>
                <div>
                    <label for="whatsapp_phone" class="block text-gray-700 dark:text-gray-200">WhatsApp</label>
                    <input type="text" name="whatsapp_phone" id="whatsapp_phone" value="{{ old('whatsapp_phone', $swimmer->whatsapp_phone) }}" class="form-input w-full">
                </div>
                <div>
                    <label for="father_phone" class="block text-gray-700 dark:text-gray-200">Father's Phone</label>
                    <input type="text" name="father_phone" id="father_phone" value="{{ old('father_phone', $swimmer->father_phone) }}" class="form-input w-full">
                </div>
            </div>

            <div class="grid grid-cols-1 sm:grid-cols-2 gap-4 mb-4">
                <div>
                    <label for="educational_qualification" class="block text-gray-700 dark:text-gray-200">Educational Qualification</label>
                    <input type="text" name="educational_qualification" id="educational_qualification"
                        value="{{ old('educational_qualification', $swimmer->educational_qualification) }}" class="form-input w-full">
                </div>
                <div>
                    <label for="father_job" class="block text-gray-700 dark:text-gray-200">Father's Job</label>
                    <input type="text" name="father_job" id="father_job" value="{{ old('father_job', $swimmer->father_job) }}" class="form-input w-full">
                </div>
            </div>

            <div class="mb-4">
                <label for="birthdate" class="block text-gray-700 dark:text-gray-200">Birthdate</label>
                <input type="date" name="birthdate" id="birthdate" value="{{ old('birthdate', $swimmer->birthdate) }}" class="form-input w-full">
            </div>

            <div class="mb-4">
                <label for="national_ID" class="block text-gray-700 dark:text-gray-200">National ID</label>
                <input type="text" name="national_ID" id="national_ID" value="{{ old('national_ID', $swimmer->national_ID) }}" class="form-input w-full" required>
            </div>

            <div class="mb-4">
                <label for="membership_number" class="block text-gray-700 dark:text-gray-200">Membership Number</label>
                <input type="text" name="membership_number" id="membership_number"
                    value="{{ old('membership_number', $swimmer->membership_number) }}" class="form-input w-full" required>
            </div>

            <div class="mb-4">
                <label for="current_work" class="block text-gray-700 dark:text-gray-200">Current Work</label>
                <input type="text" name="current_work" id="current_work" value="{{ old('current_work', $swimmer->current_work) }}" class="form-input w-full">
            </div>

            <div class="mb-4">
                <label for="image" class="block text-gray-700 dark:text-gray-200">Upload New Image</label>
                <input type="file" name="image" id="image" class="form-input w-full">
            </div>

            <div class="mt-6">
                <button type="submit" class="bg-blue-600 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                    Update Swimmer
                </button>
            </div>
        </form>
    </div>
@endsection
