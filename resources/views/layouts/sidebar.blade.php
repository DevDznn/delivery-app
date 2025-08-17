<!-- layouts/sidebar.blade.php -->
<div class="w-64 bg-[#192208] text-gray-100 shadow-md min-h-screen flex flex-col fixed top-0 left-0 z-50">

    <!-- Sidebar Header -->
    <div class="flex flex-col items-center">
        <img class="h-20 w-auto" src="/images/Logo.png" alt="Logo">
        <div class="font-bold text-lg mt-2 text-center">
            Swiftlink Delivery
        </div>
    </div>



    <!-- Navigation -->
    <nav class="mt-4 flex-1">

        <!-- Driver Management -->
        <a href="/drivers" class="sidebar-link flex items-center p-3 text-sm rounded-lg transition-colors duration-200">
            <i class="fas fa-user w-4 h-4 mr-3"></i> Driver Management
        </a>

        <!-- Payment Section -->
        <div class="mt-1">
            <button class="flex items-center justify-between w-full p-3 text-sm rounded-lg transition-colors duration-200 sidebar-link" onclick="toggleMenu('payment-menu')">
                <span class="flex items-center">
                    <i class="fas fa-credit-card w-4 h-4 mr-3"></i> Payment
                </span>
                <i class="fas fa-chevron-down w-3 h-3 transition-transform duration-300" id="payment-chevron"></i>
            </button>
            <div id="payment-menu" class="ml-6 mt-1 max-h-0 overflow-hidden transition-all duration-300">
                <a href="#drive-payment" class="sidebar-sub-link flex items-center p-2 text-sm rounded-lg transition-colors duration-200">
                    <i class="fas fa-circle w-1 h-1 mr-8"></i> Drive Payment
                </a>
                <a href="#sdp-payment" class="sidebar-sub-link flex items-center p-2 text-sm rounded-lg transition-colors duration-200">
                    <i class="fas fa-circle w-1 h-1 mr-8"></i> SDP Payment
                </a>
                <a href="#sdp-report" class="sidebar-sub-link flex items-center p-2 text-sm rounded-lg transition-colors duration-200">
                    <i class="fas fa-circle w-1 h-1 mr-8"></i> SDP Payment Report
                </a>
                <a href="#accessories-report" class="sidebar-sub-link flex items-center p-2 text-sm rounded-lg transition-colors duration-200">
                    <i class="fas fa-circle w-1 h-1 mr-8"></i> Accessories Report
                </a>
            </div>
        </div>

        <!-- Registration Management -->
        <a href="#registration_management" class="sidebar-link flex items-center p-3 mt-1 text-sm rounded-lg transition-colors duration-200">
            <i class="fas fa-file-alt w-4 h-4 mr-3"></i> Registration Management
        </a>

        <!-- Delivery Provider Profile -->
        <a href="#provider-profile" class="sidebar-link flex items-center p-3 mt-1 text-sm rounded-lg transition-colors duration-200">
            <i class="fas fa-user-check w-4 h-4 mr-3"></i> Delivery Provider Profile
        </a>

        <!-- Tracking Page -->
        <a href="#tracking" class="sidebar-link flex items-center p-3 mt-1 text-sm rounded-lg transition-colors duration-200">
            <i class="fas fa-map-marker-alt w-4 h-4 mr-3"></i> Tracking Page
        </a>

        <!-- Analytics -->
        <a href="#analytics" class="sidebar-link flex items-center p-3 mt-1 text-sm rounded-lg transition-colors duration-200">
            <i class="fas fa-chart-bar w-4 h-4 mr-3"></i> Analytics (Delivery Insights)
        </a>

    </nav>
</div>

<!-- Toggle Script for Payment submenu -->
<script>
    function toggleMenu(id) {
        const menu = document.getElementById(id);
        const chevron = document.getElementById('payment-chevron');

        if (menu.style.maxHeight && menu.style.maxHeight !== '0px') {
            menu.style.maxHeight = '0';
            chevron.classList.remove('rotate-180');
        } else {
            menu.style.maxHeight = menu.scrollHeight + 'px';
            chevron.classList.add('rotate-180');
        }
    }

    // Sidebar hover/focus/click effect using Tailwind classes
    document.querySelectorAll('.sidebar-link, .sidebar-sub-link').forEach(link => {
        link.classList.add('hover:bg-green-500', 'hover:text-white', 'focus:bg-green-500', 'focus:text-white', 'active:bg-green-600', 'active:text-white');
    });
</script>