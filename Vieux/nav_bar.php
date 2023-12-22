
    <span class="absolute text-white text-4xl top-5 left-4 cursor-pointer" onclick="openSidebar()">
        <i class="bi bi-filter-left px-2 bg-gray-900 rounded-md"></i>
    </span>
    <div class="sidebar fixed top-0 bottom-0 lg:left-0 p-2 w-[300px] overflow-y-auto text-center bg-gray-900">
        <div class="text-gray-100 text-xl">
            <!-- Sidebar Header -->
            <div class="p-2.5 mt-1 flex items-center">
                <i class="bi bi-app-indicator px-2 py-1 rounded-md bg-blue-900"></i>
                <h1 class="font-bold text-gray-200 text-[15px] ml-3">Gestion des tickets</h1>
                <i class="bi bi-x cursor-pointer ml-28 lg:hidden" onclick="openSidebar()"></i>
            </div>
            <div class="my-2 bg-gray-600 h-[1px]"></div>
        </div>

        <!-- Search Bar -->
        <div class="p-2.5 flex items-center rounded-md px-4 duration-300 cursor-pointer bg-gray-700 text-white">
            <i class="bi bi-search text-sm"></i>
            <input type="text" placeholder="Search" class="text-[15px] ml-4 w-full bg-transparent focus:outline-none" />
        </div>

        <!-- Home Link -->
        <a href="page_princepalle.php" class="p-2.5 mt-3 flex items-center rounded-md px-4 duration-300 cursor-pointer hover:bg-blue-600 text-white">
            <i class="bi bi-house-door-fill"></i>
            <span class="text-[15px] ml-4 text-gray-200 font-bold">Home</span>
        </a>

        <!-- Ajouter Ticket Link -->
        <a href="ajouter_tichets.php" class="p-2.5 mt-3 flex items-center rounded-md px-4 duration-300 cursor-pointer hover:bg-blue-600 text-white">
            <i class="bi bi-bookmark-fill"></i>
            <span class="text-[15px] ml-4 text-gray-200 font-bold">Ajouter Ticket</span>
        </a>

        <!-- Divider -->
        <div class="my-4 bg-gray-600 h-[1px]"></div>

        <!-- Ticht assiner a vous Link -->
        <div class="p-2.5 mt-3 flex items-center rounded-md px-4 duration-300 cursor-pointer hover:bg-blue-600 text-white" onclick="dropdown()">
            <i class="bi bi-chat-left-text-fill"></i>
            <a href="Ticht_assiner_vous.php" class="flex justify-between w-full items-center">
                <span class="text-[15px] ml-4 text-gray-200 font-bold">Ticht assiner a vous</span>
                <span class="text-sm rotate-180" id="arrow">
                    <i class="bi bi-chevron-down"></i>
                </span>
            </a>
        </div>

        <!-- Logout Link -->
        <a href="dec.php" class="p-2.5 mt-3 flex items-center rounded-md px-4 duration-300 cursor-pointer hover:bg-blue-600 text-white">
            <i class="bi bi-box-arrow-in-right"></i>
            <span class="text-[15px] ml-4 text-gray-200 font-bold">Logout</span>
        </a>
    </div>