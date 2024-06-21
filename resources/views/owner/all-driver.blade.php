<x-owner-layout>
    <div class="px-6 py-6 mt-5">
        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
            @foreach ($drivers as $driver)
                <div
                    class="bg-white rounded-xl shadow-lg overflow-hidden hover:shadow-xl transition-shadow duration-300 ease-in-out border border-gray-300">
                    <div class="p-6">
                        <div class="flex items-center mb-4">
                            <div class="flex-1">
                                <h2 class="text-xl font-bold text-gray-800">{{ $driver->driver_name }}</h2>
                                <p class="text-sm text-gray-500">Phone: {{ $driver->driver_ph_number }}</p>
                            </div>
                            <div class="ml-3">
                                @if ($driver->driver_gender === 'Male')
                                    <span class="inline-block text-blue-500">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="currentColor"
                                            viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M13 16h-1v-4h-1m1-4h.01M12 12v-4M12 20h.01M21 16h-2a3 3 0 00-3 3v2M7 16H5a3 3 0 00-3 3v2M21 8h-3V5a3 3 0 00-3-3H9a3 3 0 00-3 3v3H3M5 21v-2M19 21v-2M3 16h3m12 0h3m-6 0v-4m0 0h-1m1-4h-1m1 4h.01M12 12v-4m0 0H5M5 12h14m-7-8h3M7 4h10M7 16h3m0 0h1m4 4h.01" />
                                        </svg>
                                    </span>
                                @else
                                    <span class="inline-block text-pink-500">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="currentColor"
                                            viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M12 12v-4m0 0H5M5 12h14m-7-8h3M7 4h10M7 16h3m0 0h1m4 4h.01M5 21v-2m14-4h3M7 21h10m0 0h.01M12 16v-4h1m-1 4v-4h-1m0 0h1m0 0v-4m0 4h-1" />
                                        </svg>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="mb-4">
                            <p class="text-sm text-gray-600 mt-2">Experience:
                                <span
                                    class="inline-block px-2 py-1 bg-green-100 text-green-700 rounded-full">{{ $driver->driver_experience }}
                                    years</span>
                            </p>
                            <p class="text-sm text-gray-600 mt-2">Charge:
                                <span
                                    class="inline-block px-2 py-1 bg-blue-100 text-blue-700 rounded-full">${{ number_format($driver->driver_charge) }}/km</span>
                            </p>
                            <p class="text-sm text-gray-600 mt-2">Age:
                                <span
                                    class="inline-block px-2 py-1 bg-yellow-100 text-yellow-700 rounded-full">{{ $driver->driver_age }}
                                    years</span>
                            </p>
                        </div>
                        <div class="mb-4">
                            <p class="text-sm text-gray-600">Vehicle Types:</p>
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
                        <div class="text-right">
                            <a href="/" class="text-indigo-600 hover:text-indigo-800 underline">View Details</a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</x-owner-layout>
