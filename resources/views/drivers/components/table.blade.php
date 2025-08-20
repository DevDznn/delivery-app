<div x-data="{ showModal: false, confirmationText: '', selectedDriver: null }">
    <div class="bg-white/90 backdrop-blur-md shadow-lg rounded-2xl overflow-hidden border border-gray-100">
        <table class="min-w-full divide-y divide-gray-200 text-xs">
            <thead class="bg-gradient-to-r from-green-50 to-teal-50">
                <tr>
                    <th class="px-3 py-3 text-center font-semibold text-gray-600">Driver ID</th>
                    <th class="px-3 py-3 text-center font-semibold text-gray-600">Username</th>
                    <th class="px-3 py-3 text-center font-semibold text-gray-600">SFD</th>
                    <th class="px-3 py-3 text-center font-semibold text-gray-600">Driver Name</th>
                    <th class="px-3 py-3 text-center font-semibold text-gray-600">Phone</th>
                    <th class="px-3 py-3 text-center font-semibold text-gray-600">Driver Status</th>
                    <th class="px-3 py-3 text-center font-semibold text-gray-600">Account</th>
                    <th class="px-3 py-3 text-center font-semibold text-gray-600">Suspended</th>
                    <th class="px-3 py-3 text-center font-semibold text-gray-600">Ceased</th>
                    <th class="px-3 py-3 text-center font-semibold text-gray-600">Actions</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-200 bg-white">
                @foreach ($drivers as $driver)
                <tr class="hover:bg-green-50/50 transition">
                    <td class="px-3 py-3 text-center">
                        <a href="{{ route('drivers.show', $driver->id) }}" class="text-green-600 font-semibold hover:underline">
                            {{ $driver->driver_number }}
                        </a>
                    </td>
                    <td class="px-3 py-3 text-center">{{ $driver->user->username ?? '-' }}</td>
                    <td class="px-3 py-3 text-center">{{ $driver->employment_type ?? '-' }}</td>
                    <td class="px-3 py-3 text-center">{{ $driver->user->name ?? '-' }}</td>
                    <td class="px-3 py-3 text-center">{{ $driver->user->phone ?? '-' }}</td>

                    <!-- Driver Status -->
                    <td class="px-3 py-3 text-center">
                        <span class="inline-flex items-center px-2 py-0.5 rounded-full bg-green-500/20 text-green-700 text-[10px] font-semibold">
                            <span class="w-2 h-2 rounded-full mr-1 bg-green-500"></span>
                            Online
                        </span>
                    </td>

                    <!-- Account -->
                    <td class="px-3 py-3 text-center">
                        <span class="px-2 py-1 rounded-full {{ $driver->status == 'Active' ? 'bg-green-500/20 text-green-700' : 'bg-red-500/20 text-red-700' }} text-[10px] font-semibold">
                            {{ ucfirst($driver->status ?? 'N/A') }}
                        </span>
                    </td>

                    <!-- Suspended -->
                    <td class="px-3 py-3 text-center">
                        <span class="px-2 py-1 rounded-full {{ $driver->is_suspended ? 'bg-red-500/20 text-red-700' : 'bg-green-500/20 text-green-700' }} text-[10px] font-semibold">
                            {{ $driver->is_suspended ? 'Yes' : 'No' }}
                        </span>
                    </td>

                    <!-- Ceased -->
                    <td class="px-3 py-3 text-center">
                        <span class="px-2 py-1 rounded-full {{ $driver->is_ceased ? 'bg-red-500/20 text-red-700' : 'bg-green-500/20 text-green-700' }} text-[10px] font-semibold">
                            {{ $driver->is_ceased ? 'Yes' : 'No' }}
                        </span>
                    </td>

                    <!-- Actions -->
                    <td class="px-3 py-3 text-center flex justify-center gap-2">
                        <a href="{{ route('drivers.show', $driver->id) }}" class="p-2 bg-gray-100 rounded hover:bg-green-100" title="View">
                            <i class="fas fa-eye text-green-600"></i>
                        </a>
                        <a href="{{ route('drivers.edit', $driver->id) }}" class="p-2 bg-gray-100 rounded hover:bg-blue-100" title="Edit">
                            <i class="fas fa-edit text-blue-600"></i>
                        </a>
                        <button type="button"
                            @click="selectedDriver = {{ $driver->id }}; showModal = true; confirmationText = ''"
                            class="p-2 bg-gray-100 rounded hover:bg-red-100"
                            title="Delete">
                            <i class="fas fa-trash text-red-600"></i>
                        </button>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <!-- Delete Modal -->
    <div x-show="showModal" x-cloak class="fixed inset-0 z-50 flex items-center justify-center bg-black/50">
        <div class="bg-white rounded-2xl shadow-xl p-6 w-full max-w-md">
            <h2 class="text-sm font-bold text-gray-800">Confirm Deletion</h2>
            <p class="mt-2 text-xs text-gray-600">
                Are you sure you want to delete this driver? <br>
                Please type <span class="font-bold text-red-600">delete</span> to confirm.
            </p>
            <input type="text" x-model="confirmationText"
                placeholder="Type delete to confirm"
                class="mt-4 w-full px-3 py-2 border rounded-lg text-xs focus:outline-none focus:ring focus:ring-red-300">
            <div class="mt-6 flex justify-end gap-3">
                <button type="button"
                    @click="showModal = false; confirmationText = ''"
                    class="px-4 py-2 bg-gray-200 rounded hover:bg-gray-300 text-xs">
                    Cancel
                </button>

                <form :action="`/drivers/${selectedDriver}`" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit"
                        :disabled="confirmationText !== 'delete'"
                        class="px-4 py-2 rounded bg-red-600 text-white hover:bg-red-700 disabled:opacity-50 text-xs">
                        Delete
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>