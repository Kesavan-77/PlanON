<x-owner-layout>
    <div class="container mx-auto px-4 py-6">
        <div class="bg-white rounded-lg shadow-md p-6">
            <div class="flex flex-col md:flex-row gap-6">
                <!-- Left Column -->
                <div class="w-full md:w-1/3">
                    <div class="flex flex-col items-center">
                        <!-- Profile Image -->
                        <div class="w-32 h-32 rounded-full overflow-hidden border-4 border-gray-200 mb-4">
                            <img src="{{ asset('/storage/' . $driver->profile_image) }}" alt="Driver Image"
                                class="object-cover w-full h-full">
                        </div>
                        <!-- Name and Phone -->
                        <h1 class="text-2xl font-bold text-gray-800">{{ $driver->driver_name }}</h1>
                        <p class="text-sm text-gray-600">Phone: {{ $driver->driver_ph_number }}</p>
                        <!-- Gender Badge -->
                        <div class="mt-2">
                            @if ($driver->driver_gender === 'Male')
                                <span class="inline-block bg-blue-200 text-blue-800 px-3 py-1 rounded-full">Male</span>
                            @else
                                <span
                                    class="inline-block bg-pink-200 text-pink-800 px-3 py-1 rounded-full">Female</span>
                            @endif
                        </div>
                        <!-- Age Badge -->
                        <div class="mt-2">
                            <span class="inline-block bg-yellow-200 text-yellow-800 px-3 py-1 rounded-full">Age:
                                {{ $driver->driver_age }} years</span>
                        </div>
                    </div>
                </div>
                <!-- Right Column -->
                <div class="w-full md:w-2/3">
                    <!-- Experience and Charge -->
                    <div class="mb-4">
                        <h2 class="text-xl font-semibold text-gray-700 mb-2">Driver Information</h2>
                        <p class="text-sm text-gray-600">Experience: <span
                                class="inline-block bg-green-100 text-green-700 px-2 py-1 rounded-full">{{ $driver->driver_experience }}
                                years</span></p>
                        <p class="text-sm text-gray-600">Charge: <span
                                class="inline-block bg-blue-100 text-blue-700 px-2 py-1 rounded-full">${{ number_format($driver->driver_charge, 2) }}</span>
                        </p>
                        <p class="text-sm text-gray-600">License: <span
                                class="inline-block bg-gray-100 text-gray-700 px-2 py-1 rounded-full">{{ $driver->driver_license }}</span>
                        </p>
                    </div>
                    <!-- Vehicle Types -->
                    <div class="mb-4">
                        <h2 class="text-xl font-semibold text-gray-700 mb-2">Vehicle Types</h2>
                        <ul class="list-disc list-inside text-sm text-gray-600">
                            @php
                                $vehicleTypes = is_array($driver->vehicle_type)
                                    ? $driver->vehicle_type
                                    : json_decode($driver->vehicle_type, true);
                            @endphp
                            @foreach ($vehicleTypes as $type)
                                <li>{{ $type }}</li>
                            @endforeach
                        </ul>
                    </div>
                    <!-- Contact and Actions -->
                    <div class="mt-6">
                        <h2 class="text-xl font-semibold text-gray-700 mb-2">Contact & Actions</h2>
                        <div class="flex gap-4">
                            <a href="tel:{{ $driver->driver_ph_number }}"
                                class="bg-indigo-600 text-white px-4 py-2 rounded-lg hover:bg-indigo-700 transition-colors">Call
                                Driver</a>
                            <a href="{{ route('driver.edit', $driver->id) }}"
                                class="bg-green-600 text-white px-4 py-2 rounded-lg hover:bg-green-700 transition-colors">Edit
                                Details</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-owner-layout>
