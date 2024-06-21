<x-driver-layout>
    @if ($driver)
        <div class="min-h-screen flex items-center justify-center py-6 px-6">
            <div class="bg-white rounded-lg shadow-lg p-6 w-full max-w-3xl border border-gray-300">
                <x-alert-success>
                    {{ session('success') }}
                </x-alert-success>
                <h2 class="text-3xl font-semibold text-gray-800 mb-6">Your Profile</h2>
                <div class="space-y-4">
                    <div>
                        <p class="text-lg text-gray-700"><span class="font-semibold">Driver Name:</span>
                            {{ $driver->driver_name }}</p>
                    </div>
                    <div>
                        <p class="text-lg text-gray-700"><span class="font-semibold">Phone Number:</span>
                            {{ $driver->driver_ph_number }}</p>
                    </div>
                    <div>
                        <p class="text-lg text-gray-700"><span class="font-semibold">Experience:</span>
                            {{ $driver->driver_experience }} years</p>
                    </div>
                    <div>
                        <p class="text-lg text-gray-700"><span class="font-semibold">Charge per km:</span>
                            ${{ $driver->driver_charge }}</p>
                    </div>
                    <div>
                        <p class="text-lg text-gray-700"><span class="font-semibold">Gender:</span>
                            {{ ucfirst($driver->driver_gender) }}</p>
                    </div>
                    <div>
                        <p class="text-lg text-gray-700"><span class="font-semibold">Age:</span>
                            {{ $driver->driver_age }}</p>
                    </div>
                    <div>
                        <p class="text-lg text-gray-700"><span class="font-semibold">Vehicle Types:</span>
                            @if (is_array($driver->vehicle_type) && count($driver->vehicle_type) > 0)
                                @foreach ($driver->vehicle_type as $type)
                                    {{ ucfirst($type) }},
                                @endforeach
                            @else
                                None specified
                            @endif
                        </p>
                    </div>
                    <div>
                        <p class="text-lg text-gray-700"><span class="font-semibold">Driver License:</span></p>
                        @if ($driver->driver_license)
                            <img src="{{ asset('/storage/driver/' . $driver->driver_license) }}"
                                class="max-w-full h-auto">
                        @else
                            <p class="text-lg text-gray-700">License not uploaded</p>
                        @endif
                    </div>
                    <div class="mt-6 flex space-x-4">
                        <a href="{{ route('registration.edit', $driver->id) }}" class="px-5 py-2 bg-blue-600 text-white rounded hover:bg-blue-700">Edit</a>
                        <form action="{{ route('registration.destroy',  $driver->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this driver?');">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="px-5 py-2 bg-red-600 text-white rounded hover:bg-red-700">Delete</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    @else
    <div class="min-h-screenpy-6 px-6 py-6 mt-5">
        <a href="{{ route('registration.create') }}" <button type="button"
            class="px-5 py-3 text-white bg-gradient-to-r from-yellow-500 via-yellow-600 to-yellow-700 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-yellow-300 dark:focus:ring-yellow-800 font-bold rounded-lg text-md px-5 py-2.5 text-center me-2 mt-5 h-fit w-fit">+
            Complete your profile</button></a>
    </div>
    @endif

</x-driver-layout>
