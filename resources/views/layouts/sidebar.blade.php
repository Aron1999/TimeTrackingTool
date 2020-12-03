
        <div class="h-screen w-56 relative border-r-2  border-gray-200 bg-white z-8">
            <div class="p-12  w-full relative inline-block">
                <div class="w-full my-4 cursor-pointer relative inline-block">
                <img src="https://cdn.internetbureaubeterbekend.nl/crm/speedometer.svg" class="mt-1 absolute float-left h-4"/>
                    <a class="text-gray-500 hover:text-blue-500 active:bg-red-500 relative float-left ml-8" 
                href="{{ action('DashboardController@index') }}">Dashboard</a>
                </div>
                <div class="w-full my-4 cursor-pointer relative inline-block">
                <img src="https://cdn.internetbureaubeterbekend.nl/crm/portfolio.svg" class="mt-1 absolute float-left h-4"/>
                    <p class="text-gray-500 hover:text-blue-500 relative float-left ml-8">Klanten</p>
                </div>
                <div class="w-full my-4 cursor-pointer relative inline-block">
                <img src="https://cdn.internetbureaubeterbekend.nl/crm/surface1.svg" class="mt-1 absolute float-left h-4"/>
                    <a class="text-gray-500 hover:text-blue-500 relative float-left ml-8"
                    href="{{ action('OrganisationController@index') }}">Organisatie</a>
                </div>
                <div class="w-full my-4 cursor-pointer active:bg-red-500 relative inline-block" >
                <img src="https://cdn.internetbureaubeterbekend.nl/crm/blank-sheet.svg" class="mt-1 absolute float-left h-4"/>
                <a class="text-gray-500 hover:text-blue-500 relative float-left ml-8"
                href="{{ action('ProjectController@index') }}">Projects</a>
                </div>
                <div class="w-full my-4 cursor-pointer active:bg-red-500 relative inline-block" >
                <img src="https://cdn.internetbureaubeterbekend.nl/crm/blank-sheet.svg" class="mt-1 absolute float-left h-4"/>
                <a class="text-gray-500 hover:text-blue-500 relative float-left ml-8"
                href="{{ action('TaskController@dashboard') }}">Taken</a>
                </div>
                <div class="w-full my-4 cursor-pointer relative inline-block">
                <img src="https://cdn.internetbureaubeterbekend.nl/crm/phone-call.svg" class="mt-1 absolute float-left h-4"/>
                <a class="text-gray-500 hover:text-blue-500 relative float-left ml-8"
                href="{{ action('ContactController@index') }}">Contacts</a>
                </div>
                <div class="w-full my-4 cursor-pointer relative inline-block">
                <img src="https://cdn.internetbureaubeterbekend.nl/crm/inclined-lead.svg" class="mt-1 absolute float-left h-4"/>
                    <p class="text-gray-500 hover:text-blue-500 relative float-left ml-8">Leads</p>
                </div>
                <div class="w-full my-4 cursor-pointer relative inline-block">
                <img src="https://cdn.internetbureaubeterbekend.nl/crm/user.svg" class="mt-1 absolute float-left h-4"/>
                    <p class="text-gray-500 hover:text-blue-500 relative float-left ml-8">Gebruikers</p>
                </div>
            </div>
        </div>
