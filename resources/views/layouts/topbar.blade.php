<!-- Topbar -->
<div class="flex items-center justify-end bg-[#ffffffce] shadow px-6 py-4 space-x-4 fixed top-0 left-64 right-0 z-40">

    <!-- Language Selector -->
    <div class="relative text-sm">
        <button id="langBtn" class="flex items-center space-x-2 border border-gray-300 rounded-lg py-1 px-3 focus:outline-none focus:ring-1 focus:ring-green-500 text-gray-700">
            <img id="selectedFlag" src="https://flagcdn.com/16x12/us.png" alt="Flag" class="w-4 h-3 rounded-sm">
            <span id="selectedLang">English</span>
            <i class="fas fa-chevron-down ml-1 text-gray-500"></i>
        </button>
        <!-- Dropdown -->
        <div id="langDropdown" class="absolute right-0 mt-1 w-40 bg-white border border-gray-300 rounded-lg shadow-md hidden z-50">
            <button class="flex items-center space-x-2 px-4 py-2 w-full text-left hover:bg-green-500 hover:text-white" onclick="selectLang('English','https://flagcdn.com/16x12/us.png')">
                <img src="https://flagcdn.com/16x12/us.png" class="w-4 h-3 rounded-sm">
                <span>English</span>
            </button>
            <button class="flex items-center space-x-2 px-4 py-2 w-full text-left hover:bg-green-500 hover:text-white" onclick="selectLang('Arabic','https://flagcdn.com/16x12/sa.png')">
                <img src="https://flagcdn.com/16x12/sa.png" class="w-4 h-3 rounded-sm">
                <span>Arabic</span>
            </button>
            <button class="flex items-center space-x-2 px-4 py-2 w-full text-left hover:bg-green-500 hover:text-white" onclick="selectLang('Tagalog','https://flagcdn.com/16x12/ph.png')">
                <img src="https://flagcdn.com/16x12/ph.png" class="w-4 h-3 rounded-sm">
                <span>Tagalog</span>
            </button>
        </div>
    </div>

    <!-- Profile Icon -->
    <button class="text-gray-700 hover:text-green-500 transition-colors duration-200">
        <i class="fas fa-user-circle w-6 h-6 text-2xl"></i>
    </button>
</div>

<!-- Dropdown Script -->
<script>
const langBtn = document.getElementById('langBtn');
const langDropdown = document.getElementById('langDropdown');
const selectedFlag = document.getElementById('selectedFlag');
const selectedLang = document.getElementById('selectedLang');

langBtn.addEventListener('click', () => {
    langDropdown.classList.toggle('hidden');
});

function selectLang(lang, flagUrl) {
    selectedLang.textContent = lang;
    selectedFlag.src = flagUrl;
    langDropdown.classList.add('hidden');
}

// Close dropdown if clicked outside
document.addEventListener('click', (e) => {
    if (!langBtn.contains(e.target) && !langDropdown.contains(e.target)) {
        langDropdown.classList.add('hidden');
    }
});
</script>
