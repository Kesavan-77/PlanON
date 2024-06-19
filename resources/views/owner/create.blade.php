<x-owner-layout>
    <div class="min-h-screen flex items-center justify-center py-6 px-6">
        <div class="bg-white rounded-lg shadow-lg p-6 w-full max-w-lg border-2 border-black-500">
            <h2 class="text-2xl font-semibold text-gray-800 mb-6">Add a New Vehicle</h2>
            <form action="{{ route('vehicle.store') }}" method="POST" enctype="multipart/form-data" class="space-y-4">
                @csrf

                <div>
                    <input type="hidden" id="user_id" name="user_id" class="form-input w-full mt-1" value="{{Auth::id()}}">
                </div>

                <!-- Vehicle Number -->
                <div>
                    <label for="vehicle_no" class="block text-gray-700">Vehicle Number</label>
                    <input type="text" id="vehicle_no" name="vehicle_no" class="form-input w-full mt-1 @error('vehicle_no') border-red-500 @enderror" value="{{old('vehicle_no')}}">
                    @error('vehicle_no')
                        <p class="text-red-600 mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Vehicle Type -->
                <div>
                    <label for="vehicle_type" class="block text-gray-700">Vehicle Type</label>
                    <select id="vehicle_type" name="vehicle_type" class="form-select w-full mt-1 @error('vehicle_type') border-red-500 @enderror">
                        <option value="" disabled {{ old('vehicle_type') == '' ? 'selected' : '' }}>Select Vehicle Type</option>
                        <option value="Two Wheeler" {{ old('vehicle_type') == 'Two Wheeler' ? 'selected' : '' }}>Two Wheeler</option>
                        <option value="Three Wheeler" {{ old('vehicle_type') == 'Three Wheeler' ? 'selected' : '' }}>Three Wheeler</option>
                        <option value="Four Wheeler" {{ old('vehicle_type') == 'Four Wheeler' ? 'selected' : '' }}>Four Wheeler</option>
                        <option value="Goods Vehicle" {{ old('vehicle_type') == 'Goods Vehicle' ? 'selected' : '' }}>Goods Vehicle</option>
                    </select>
                    @error('vehicle_type')
                        <p class="text-red-600 mt-1">{{ $message }}</p>
                    @enderror
                </div>
                

                <!-- Vehicle Image -->
                <div>
                    <label for="vehicle_img" class="block text-gray-700">Vehicle Image</label>
                    <input type="file" id="vehicle_img" name="vehicle_img" class="form-input w-full mt-1 @error('vehicle_img') border-red-500 @enderror" value="{{old('vehicle_img')}}">
                    @error('vehicle_img')
                        <p class="text-red-600 mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Vehicle Status -->
                <div>
                    <label for="vehicle_status" class="block text-gray-700">Vehicle Status</label>
                    <select id="vehicle_status" name="vehicle_status" class="form-select w-full mt-1 @error('vehicle_status') border-red-500 @enderror">
                        <option value="" disabled {{ old('vehicle_status') == '' ? 'selected' : '' }}>Select Vehicle Status</option>
                        <option value="Active" {{ old('vehicle_status') == 'Active' ? 'selected' : '' }}>Active</option>
                        <option value="Inactive" {{ old('vehicle_status') == 'Inactive' ? 'selected' : '' }}>Inactive</option>
                    </select>
                    @error('vehicle_status')
                        <p class="text-red-600 mt-1">{{ $message }}</p>
                    @enderror
                </div>
                

                <!-- Person Count -->
                <div>
                    <label for="person_count" class="block text-gray-700">Person Count</label>
                    <input type="text" id="person_count" name="person_count" class="form-input w-full mt-1 @error('person_count') border-red-500 @enderror" value="{{old('person_count')}}">
                    @error('person_count')
                        <p class="text-red-600 mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Vehicle Charge -->
                <div>
                    <label for="vehicle_charge" class="block text-gray-700">Vehicle Charge</label>
                    <input type="text" id="vehicle_charge" name="vehicle_charge" class="form-input w-full mt-1 @error('vehicle_charge') border-red-500 @enderror" value="{{old('vehicle_charge')}}">
                    @error('vehicle_charge')
                        <p class="text-red-600 mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Submit Button -->
                <div class="mt-6">
                    <button type="submit" class="bg-indigo-500 text-white px-4 py-2 rounded hover:bg-indigo-600">Save Vehicle</button>
                </div>
            </form>
        </div>
    </div>
</x-owner-layout>
