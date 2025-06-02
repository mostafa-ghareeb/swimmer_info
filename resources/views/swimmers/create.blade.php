@extends('dashboard')

@section('content')
    <div class="max-w-4xl mx-auto bg-white dark:bg-gray-800 p-8 rounded shadow">
        <h2 class="text-2xl font-bold mb-6 text-gray-800 dark:text-gray-100">Add New Swimmer</h2>

        <form action="{{ route('swimmers.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method("POST")

            <div class="mb-4">
                <label for="name" class="block text-black-700 dark:text-gray-200">Name</label>
                <input type="text" name="name" id="name" class="form-input w-full text-black bg-white border-gray-300" required>
            </div>

            <div class="mb-4">
                <label for="address" class="block text-gray-700 dark:text-gray-200">Address</label>
                <input type="text" name="address" id="address" class="form-input w-full" required>
            </div>

            <div class="mb-4">
                <label class="block text-gray-700 dark:text-gray-200">Religion</label>
                <select name="religion" class="form-select w-full">
                    <option value="">Select</option>
                    <option value="muslim">Muslim</option>
                    <option value="christian">Christian</option>
                </select>
            </div>

            <div class="mb-4">
                <label for="membership_type" class="block text-gray-700 dark:text-gray-200">Membership Type</label>
                <input type="text" name="membership_type" id="membership_type" class="form-input w-full" required>
            </div>

            <div class="grid grid-cols-1 sm:grid-cols-3 gap-4 mb-4">
                <div>
                    <label for="phone" class="block text-gray-700 dark:text-gray-200">Phone</label>
                    <input type="text" name="phone" id="phone" class="form-input w-full">
                </div>
                <div>
                    <label for="whatsapp_phone" class="block text-gray-700 dark:text-gray-200">WhatsApp</label>
                    <input type="text" name="whatsapp_phone" id="whatsapp_phone" class="form-input w-full">
                </div>
                <div>
                    <label for="father_phone" class="block text-gray-700 dark:text-gray-200">Father's Phone</label>
                    <input type="text" name="father_phone" id="father_phone" class="form-input w-full">
                </div>
            </div>

            <div class="grid grid-cols-1 sm:grid-cols-2 gap-4 mb-4">
                <div>
                    <label for="educational_qualification" class="block text-gray-700 dark:text-gray-200">Educational Qualification</label>
                    <input type="text" name="educational_qualification" id="educational_qualification" class="form-input w-full">
                </div>
                <div>
                    <label for="father_job" class="block text-gray-700 dark:text-gray-200">Father's Job</label>
                    <input type="text" name="father_job" id="father_job" class="form-input w-full">
                </div>
            </div>

            <div class="mb-4">
                <label for="birthdate" class="block text-gray-700 dark:text-gray-200">Birthdate</label>
                <input type="date" name="birthdate" id="birthdate" class="form-input w-full">
            </div>

            <div class="mb-4">
                <label for="national_ID" class="block text-gray-700 dark:text-gray-200">National ID</label>
                <input type="text" name="national_ID" id="national_ID" class="form-input w-full" required>
            </div>

            <div class="mb-4">
                <label for="membership_number" class="block text-gray-700 dark:text-gray-200">Membership Number</label>
                <input type="text" name="membership_number" id="membership_number" class="form-input w-full" required>
            </div>

            <div class="mb-4">
                <label for="current_work" class="block text-gray-700 dark:text-gray-200">Current Work</label>
                <input type="text" name="current_work" id="current_work" class="form-input w-full">
            </div>

            <div class="mb-4">
                <label for="image" class="block text-gray-700 dark:text-gray-200">Upload Image</label>
                <input type="file" name="image" id="image" class="form-input w-full">
            </div>

            <div class="mt-6">
                <button type="submit" class="bg-blue-600 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                    Save Swimmer
                </button>
            </div>
        </form>
    </div>
@endsection
