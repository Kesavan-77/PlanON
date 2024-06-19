<x-owner-layout>
    <div class="bg-gray-100 min-h-screen flex items-center justify-center py-6 px-6">
        <div class="bg-white rounded-lg shadow-lg p-6 w-full max-w-lg">
            <h2 class="text-2xl font-semibold text-gray-800 mb-6">Add a New Vehicle</h2>
            <form action="/" method="POST" enctype="multipart/form-data" class="space-y-4">
                @csrf

                <div>
                    <label for="user_id" class="block text-gray-700">User ID</label>
                    <input type="text" id="user_id" name="user_id" class="form-input w-full mt-1">
                </div>

                <div>
                    <label for="uuid" class="block text-gray-700">UUID</label>
                    <input type="text" id="uuid" name="uuid" class="form-input w-full mt-1">
                </div>

                <div>
                    <label for="vehicle_no" class="block text-gray-700">Vehicle Number</label>
                    <input type="text" id="vehicle_no" name="vehicle_no" class="form-input w-full mt-1">
                </div>

                <div>
                    <label for="vehicle_type" class="block text-gray-700">Vehicle Type</label>
                    <input type="text" id="vehicle_type" name="vehicle_type" class="form-input w-full mt-1">
                </div>

                <div>
                    <label for="vehicle_img" class="block text-gray-700">Vehicle Image</label>
                    <input type="file" id="vehicle_img" name="vehicle_img" class="form-input w-full mt-1">
                </div>

                <div>
                    <label for="vehicle_status" class="block text-gray-700">Vehicle Status</label>
                    <input type="text" id="vehicle_status" name="vehicle_status" class="form-input w-full mt-1">
                </div>

                <div>
                    <label for="person_count" class="block text-gray-700">Person Count</label>
                    <input type="text" id="person_count" name="person_count" class="form-input w-full mt-1">
                </div>

                <div>
                    <label for="vehicle_charge" class="block text-gray-700">Vehicle Charge</label>
                    <input type="text" id="vehicle_charge" name="vehicle_charge" class="form-input w-full mt-1">
                </div>

                <div class="mt-6">
                    <button type="submit" class="bg-indigo-500 text-white px-4 py-2 rounded hover:bg-indigo-600">Save
                        Vehicle</button>
                </div>
            </form>
        </div>
    </div>
</x-owner-layout>
