<div class="bg-white shadow rounded-lg overflow-x-auto">
    <table class="min-w-full divide-y divide-gray-200 text-xs">
        <thead class="bg-gray-50">
            <tr>
                <th class="px-3 py-3 text-left font-medium text-gray-600">Driver ID</th>
                <th class="px-3 py-3 text-left font-medium text-gray-600">Username</th>
                <th class="px-3 py-3 text-left font-medium text-gray-600">SFD</th>
                <th class="px-3 py-3 text-left font-medium text-gray-600">Driver Name</th>
                <th class="px-3 py-3 text-left font-medium text-gray-600">Driver Number</th>
                <th class="px-3 py-3 text-left font-medium text-gray-600">Driver Status</th>
                <th class="px-3 py-3 text-left font-medium text-gray-600">Account Status</th>
                <th class="px-3 py-3 text-left font-medium text-gray-600">Suspended</th>
                <th class="px-3 py-3 text-left font-medium text-gray-600">Ceased</th>
                <th class="px-3 py-3 text-center font-medium text-gray-600">Actions</th>
            </tr>
        </thead>
        <tbody id="driverTable" class="bg-white divide-y divide-gray-200">
            @foreach ($drivers as $driver)
            <tr>
                <td class="px-3 py-4"><a href="#" class="text-green-600 underline">{{ $driver->driver_number }}</a></td>
                <td class="px-3 py-4">{{ $driver->user->username }}</td>
                <td class="px-3 py-4">{{ $driver->employment_type ?? '-' }}</td>
                <td class="px-3 py-4">{{ $driver->user->name }}</td>
                <td class="px-3 py-4">{{ $driver->user->phone }}</td>

                {{-- Driver Status --}}
                <td class="px-3 py-4">
                    <span class="inline-flex items-center px-2 py-0.5 rounded-full bg-green-500/20 text-green-700 text-[10px] font-semibold">
                        <span class="w-2 h-2 rounded-full mr-1 bg-green-500"></span>
                        Online
                    </span>
                </td>

                {{-- Account Status --}}
                <td class="px-3 py-4">
                    <span class="px-2 py-1 rounded-full {{ $driver->status == 'Active' ? 'bg-green-500/20 text-green-700' : 'bg-red-500/20 text-red-700' }} text-[10px] font-semibold">
                        {{ ucfirst($driver->status) }}
                    </span>
                </td>

                {{-- Suspended --}}
                <td class="px-3 py-4">
                    <span class="px-2 py-1 rounded-full {{ $driver->is_suspended ? 'bg-red-500/20 text-red-700' : 'bg-green-500/20 text-green-700' }} text-[10px] font-semibold">
                        {{ $driver->is_suspended ? 'Yes' : 'No' }}
                    </span>
                </td>

                {{-- Ceased --}}
                <td class="px-3 py-4">
                    <span class="px-2 py-1 rounded-full {{ $driver->is_ceased ? 'bg-red-500/20 text-red-700' : 'bg-green-500/20 text-green-700' }} text-[10px] font-semibold">
                        {{ $driver->is_ceased ? 'Yes' : 'No' }}
                    </span>
                </td>

                {{-- Actions --}}
                <td class="px-3 py-4 text-center flex justify-center gap-2">
                    <a href="{{ route('drivers.show', $driver->id) }}" class="p-2 bg-gray-100 rounded hover:bg-green-100" title="View">
                        <i class="fas fa-eye text-green-600"></i>
                    </a>
                    <a href="{{ route('drivers.edit', $driver->id) }}" class="p-2 bg-gray-100 rounded hover:bg-blue-100" title="Edit">
                        <i class="fas fa-edit text-blue-600"></i>
                    </a>
                    <form action="{{ route('drivers.destroy', $driver->id) }}"
                        method="POST"
                        x-data="{ showModal: false, confirmationText: '' }"
                        @submit="showModal = false; confirmationText = ''">
                        @csrf
                        @method('DELETE')

                        <!-- Delete button -->
                        <button type="button" @click="showModal = true"
                            class="p-2 bg-gray-100 rounded hover:bg-red-100"
                            title="Delete">
                            <i class="fas fa-trash text-red-600"></i>
                        </button>

                        <!-- Modal -->
                        <div x-show="showModal"
                            class="fixed inset-0 z-50 flex items-center justify-center bg-black/50"
                            x-cloak>
                            <div class="bg-white rounded-lg shadow-lg p-6 w-full max-w-md">
                                <h2 class="text-lg font-semibold text-gray-800">Confirm Deletion</h2>
                                <p class="mt-2 text-sm text-gray-600">
                                    Are you sure you want to delete this driver? <br>
                                    Please type <span class="font-bold text-red-600">delete</span> to confirm.
                                </p>

                                <!-- Input -->
                                <input type="text"
                                    x-model="confirmationText"
                                    placeholder="Type delete to confirm"
                                    class="mt-4 w-full px-3 py-2 border rounded-lg focus:outline-none focus:ring focus:ring-red-300">

                                <!-- Buttons -->
                                <div class="mt-6 flex justify-end gap-3">
                                    <!-- Cancel -->
                                    <button type="button"
                                        @click="showModal = false; confirmationText = ''"
                                        class="px-4 py-2 bg-gray-200 rounded hover:bg-gray-300">
                                        Cancel
                                    </button>

                                    <!-- Confirm Delete -->
                                    <button type="submit"
                                        :disabled="confirmationText !== 'delete'"
                                        class="px-4 py-2 rounded bg-red-600 text-white hover:bg-red-700 disabled:opacity-50">
                                        Delete
                                    </button>
                                </div>
                            </div>
                        </div>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>