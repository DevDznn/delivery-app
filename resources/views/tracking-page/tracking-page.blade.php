<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tracking Page</title>

    <!-- Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>

    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">

    <!-- Leaflet CSS & JS -->
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css" />
    <script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"></script>

    <style>
        body, html {
            margin: 0;
            padding: 0;
            height: 100%;
        }
        #map {
            height: calc(100vh - 160px); /* Map adjusts based on info panel height */
            width: 100%;
        }
    </style>
</head>
<body class="bg-gray-900 flex flex-col">

    <!-- MAP -->
    <div id="map"></div>

    <!-- INFO PANEL -->
    <div class="w-full text-white p-4 flex flex-col md:flex-row gap-4 bg-gray-800">
        
        <!-- Left Column: Cars Legend -->
        <div class="w-full md:w-1/4">
            <h2 class="text-sm font-semibold mb-2">Vehicle Status</h2>
            <ul class="grid grid-cols-2 gap-2 text-xs">
                <li class="flex items-center gap-2"><img src="/images/icons/orange.png" class="w-5 h-5"> Available</li>
                <li class="flex items-center gap-2"><img src="/images/icons/blue.png" class="w-5 h-5"> To Restaurant</li>
                <li class="flex items-center gap-2"><img src="/images/icons/green.png" class="w-5 h-5"> To Customer</li>
                <li class="flex items-center gap-2"><img src="/images/icons/pink.png" class="w-5 h-5"> Requesting</li>
                <li class="flex items-center gap-2"><img src="/images/icons/violet.png" class="w-5 h-5"> On Job</li>
                <li class="flex items-center gap-2"><img src="/images/icons/gray.png" class="w-5 h-5"> Offline</li>
            </ul>
        </div>

        <!-- Right Column: Driver Information -->
        <div class="w-full md:w-3/4">
            <h2 class="text-sm font-semibold mb-2 flex items-center gap-2">
                <i class="fas fa-user"></i> Driver Information
            </h2>
            <div id="carInfo" class="grid grid-cols-2 md:grid-cols-3 gap-2 text-xs text-gray-300">
                <p class="col-span-3 text-center text-gray-400">Click a vehicle marker to view details</p>
            </div>
        </div>
    </div>

    <script>
        // Initialize Map
        const map = L.map('map').setView([14.311, 121.079], 14);

        // OpenStreetMap Tiles
        L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
            attribution: '&copy; OpenStreetMap contributors'
        }).addTo(map);

        // Define icons
        const statusIcons = {
            Available: L.icon({ iconUrl: '/images/icons/orange.png', iconSize: [44, 44], iconAnchor: [22, 44] }),
            'To Restaurant': L.icon({ iconUrl: '/images/icons/blue.png', iconSize: [44, 44], iconAnchor: [22, 44] }),
            'To Customer': L.icon({ iconUrl: '/images/icons/green.png', iconSize: [44, 44], iconAnchor: [22, 44] }),
            Requesting: L.icon({ iconUrl: '/images/icons/pink.png', iconSize: [44, 44], iconAnchor: [22, 44] }),
            'On Job': L.icon({ iconUrl: '/images/icons/violet.png', iconSize: [44, 44], iconAnchor: [22, 44] }),
            Offline: L.icon({ iconUrl: '/images/icons/gray.png', iconSize: [44, 44], iconAnchor: [22, 44] })
        };

        // Multiple vehicles with different statuses
        const vehicles = [
            { id: 9824787, status: 'To Customer', coords: [14.313, 121.079], driver: 'Ian Dizon', username: '998298473', phone: '09302918287', organization: 'Full Time', jobs: 1, dispatches: 408140135, activeDispatch: 408140135, activeOrder: 45672839, lastUpdate: '13.509203928', lastUpdateTime: '2025-08-24 12:12:48', mobileVersion: 40040, mobileEmei: 'f7d9128372j29280', distance: 2605.908 },
            { id: 9824788, status: 'Available', coords: [14.310, 121.081], driver: 'Pedro Cruz', username: 'user1234', phone: '09302919999', organization: 'Part Time', jobs: 0, dispatches: 408140200, activeDispatch: '-', activeOrder: '-', lastUpdate: '12.109203928', lastUpdateTime: '2025-08-24 12:15:00', mobileVersion: 40041, mobileEmei: 'a8d8128372j29281', distance: 1600.509 },
            { id: 9824789, status: 'On Job', coords: [14.312, 121.083], driver: 'Juan Santos', username: 'driverJuan', phone: '09123456789', organization: 'Contractor', jobs: 3, dispatches: 408140210, activeDispatch: 408140210, activeOrder: 45672840, lastUpdate: '14.001203928', lastUpdateTime: '2025-08-24 12:20:10', mobileVersion: 40042, mobileEmei: 'b7d9128372j29282', distance: 800.256 },
            { id: 9824790, status: 'To Restaurant', coords: [14.315, 121.082], driver: 'Maria Lopez', username: 'mariaL', phone: '09234567890', organization: 'Full Time', jobs: 2, dispatches: 408140220, activeDispatch: 408140220, activeOrder: 45672841, lastUpdate: '14.555203928', lastUpdateTime: '2025-08-24 12:25:30', mobileVersion: 40043, mobileEmei: 'c7d9128372j29283', distance: 1200.350 },
            { id: 9824791, status: 'Requesting', coords: [14.314, 121.080], driver: 'Jose Ramirez', username: 'joseR', phone: '09087654321', organization: 'Part Time', jobs: 0, dispatches: 408140230, activeDispatch: '-', activeOrder: '-', lastUpdate: '15.000203928', lastUpdateTime: '2025-08-24 12:30:50', mobileVersion: 40044, mobileEmei: 'd7d9128372j29284', distance: 600.150 },
            { id: 9824792, status: 'Offline', coords: [14.316, 121.084], driver: 'Anna Reyes', username: 'annaR', phone: '09112233445', organization: 'Contractor', jobs: 5, dispatches: 408140240, activeDispatch: '-', activeOrder: '-', lastUpdate: '15.250203928', lastUpdateTime: '2025-08-24 12:35:20', mobileVersion: 40045, mobileEmei: 'e7d9128372j29285', distance: 0 }
        ];

        const carInfo = document.getElementById('carInfo');

        // Add markers and click events
        vehicles.forEach(vehicle => {
            const marker = L.marker(vehicle.coords, {
                icon: statusIcons[vehicle.status]
            }).addTo(map);

            marker.on('click', () => {
                carInfo.innerHTML = `
                    <div><i class="fas fa-id-card"></i> <b>ID:</b> ${vehicle.id}</div>
                    <div><i class="fas fa-user"></i> <b>Name:</b> ${vehicle.driver}</div>
                    <div><i class="fas fa-user-tag"></i> <b>Username:</b> ${vehicle.username}</div>
                    <div><i class="fas fa-phone"></i> <b>Phone:</b> ${vehicle.phone}</div>
                    <div><i class="fas fa-briefcase"></i> <b>Org:</b> ${vehicle.organization}</div>
                    <div><i class="fas fa-truck"></i> <b>Status:</b> ${vehicle.status}</div>
                    <div><i class="fas fa-list"></i> <b>Jobs:</b> ${vehicle.jobs}</div>
                    <div><i class="fas fa-shipping-fast"></i> <b>Dispatches:</b> ${vehicle.dispatches}</div>
                    <div><i class="fas fa-tasks"></i> <b>Active Dispatch:</b> ${vehicle.activeDispatch}</div>
                    <div><i class="fas fa-box-open"></i> <b>Active Order:</b> ${vehicle.activeOrder}</div>
                    <div><i class="fas fa-clock"></i> <b>Last Update:</b> ${vehicle.lastUpdate}</div>
                    <div><i class="fas fa-calendar"></i> <b>Date:</b> ${vehicle.lastUpdateTime}</div>
                    <div><i class="fas fa-mobile-alt"></i> <b>Version:</b> ${vehicle.mobileVersion}</div>
                    <div><i class="fas fa-fingerprint"></i> <b>EMei:</b> ${vehicle.mobileEmei}</div>
                    <div><i class="fas fa-road"></i> <b>Distance:</b> ${vehicle.distance}</div>
                `;
            });
        });
    </script>

</body>
</html>
