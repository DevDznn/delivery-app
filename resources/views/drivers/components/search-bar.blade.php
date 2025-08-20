<div class="flex flex-wrap items-center gap-2 mb-6 bg-white/80 backdrop-blur-md border border-gray-100 shadow-sm rounded-xl p-4">
    <input type="text" placeholder="Search..."
        class="flex-1 min-w-[120px] px-3 py-1 border rounded-lg text-xs focus:outline-none focus:ring-1 focus:ring-green-500">

    <select class="px-3 py-1 border rounded-lg text-xs text-gray-600 focus:outline-none focus:ring-1 focus:ring-green-500">
        <option value="driver_id">Driver ID</option>
        <option value="username">Username</option>
        <option value="driver_name">Driver Name</option>
        <option value="driver_number">Driver Number</option>
    </select>

    <select class="px-3 py-1 border rounded-lg text-xs text-gray-600 focus:outline-none focus:ring-1 focus:ring-green-500">
        <option value="">City</option>
        <option value="city1">City 1</option>
        <option value="city2">City 2</option>
    </select>

    <select class="px-3 py-1 border rounded-lg text-xs text-gray-600 focus:outline-none focus:ring-1 focus:ring-green-500">
        <option value="">Account Status</option>
        <option value="online">Active</option>
        <option value="offline">Inactive</option>
    </select>

    <select class="px-3 py-1 border rounded-lg text-xs text-gray-600 focus:outline-none focus:ring-1 focus:ring-green-500">
        <option value="">Ceased</option>
        <option value="yes">Yes</option>
        <option value="no">No</option>
    </select>

    <select class="px-3 py-1 border rounded-lg text-xs text-gray-600 focus:outline-none focus:ring-1 focus:ring-green-500">
        <option value="">Vehicle Type</option>
        <option value="car">Car</option>
        <option value="van">Van</option>
        <option value="bike">Bike</option>
    </select>

    <button class="bg-gray-200 text-gray-700 px-3 py-1 rounded-lg text-xs font-medium hover:bg-gray-300 transition">
        Reset
    </button>
</div>