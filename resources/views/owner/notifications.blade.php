<x-owner-layout>
    <div class="py-12 min-h-screen">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            @forelse($notifications as $notification)
                <div class="my-6 p-6 bg-white border border-gray-300 shadow-lg rounded-lg">
                    <div class="flex items-center justify-between gap-4">
                        <a href="/" class="flex items-center gap-4 w-full">
                            <div class="flex items-center gap-3">
                                <div class="w-12 h-12 bg-blue-500 rounded-full flex items-center justify-center text-white">
                                    <i class="fas fa-bell text-2xl"></i>
                                </div>
                                <div class="flex flex-col">
                                    <p class="font-bold text-lg text-blue-900">
                                        {{ $notification->data['name'] }}
                                    </p>
                                    <p class="text-md text-gray-700 mb-4">
                                        @php
                                            $message = $notification->data['message'];
                                            $data = json_decode($message, true);
                                        @endphp
                                    </p>
                                    <!-- Display JSON data -->
                                    <div class="border-t border-gray-300 pt-4">
                                        <p class="text-sm text-gray-500">Trip Details:</p>
                                        <ul class="list-disc pl-5">
                                            <li><strong>From Location:</strong> {{ $data['from_location'] }}</li>
                                            <li><strong>To Locations:</strong> {!! htmlspecialchars_decode($data['to_locations']) !!}</li>
                                            <li><strong>From Date:</strong> {{ $data['from_date'] }}</li>
                                            <li><strong>To Date:</strong> {{ $data['to_date'] }}</li>
                                            <li><strong>Vehicle No:</strong> {{ $data['vehicle_no'] }}</li>
                                            <li><strong>Driver:</strong> {{ $data['driver'] }}</li>
                                            <li><strong>Trip Description:</strong> {{ $data['trip_description'] }}</li>
                                        </ul>
                                    </div>
                                    <!-- End of JSON data display -->
                                    @if(!$notification->read_at)
                                        <span class="bg-blue-500 text-white text-xs font-semibold px-2 py-1 rounded-full mt-2">
                                            New
                                        </span>
                                    @endif
                                </div>
                            </div>
                        </a>
                        <div class="text-right">
                            <p class="text-xs text-gray-400">
                                {{ $notification->updated_at->diffForHumans() }}
                            </p>
                        </div>
                    </div>
                </div>
            @empty
                <div class="text-center py-10">
                    <p class="mt-2 text-xl text-gray-500">
                        No notifications found
                    </p>
                </div>
            @endforelse
            <!-- Add some spacing and margin for better readability -->
            <div class="mt-10">
                {{ auth()->user()->notifications->where('notifiable_id', Auth::id())->markAsRead() }}
            </div>
        </div>
    </div>
</x-owner-layout>
