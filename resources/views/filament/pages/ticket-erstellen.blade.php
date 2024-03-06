<div class="bg-white dark:bg-gray-900 px-8 py-12">
  <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
    <h1 class="text-2xl font-bold text-gray-900 dark:text-white mb-6">
      Ticket Erstellen
    </h1>
    <div class="bg-white dark:bg-gray-800 shadow sm:rounded-lg">
      <div class="px-4 py-5">
        <!-- Start of the grid with two columns -->
        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
          <!-- First set of buttons (will act as the first column on medium screens and up) -->
          <div>
            <div x-data="{ tooltip: false }" class="relative z-30 inline-flex">
              <a x-on:mouseover="tooltip = true" x-on:mouseleave="tooltip = false"
                href="{{ route('filament.app.resources.peripheri-requests.create') }}"
                class="block w-full sm:max-w-xs flex items-center justify-center px-4 py-2 border border-gray-300 dark:border-gray-700 text-sm font-medium rounded-md text-gray-700 dark:text-gray-200 bg-gray-50 dark:bg-gray-700 hover:bg-gray-100 dark:hover:bg-gray-600 mb-4">
                Peripheri Anfrage
              </a>
          
            </div>
            <a href="{{ route('filament.app.resources.hardware-requests.create') }}"
              class="block w-full sm:max-w-xs flex items-center justify-center px-4 py-2 border border-gray-300 dark:border-gray-700 text-sm font-medium rounded-md text-gray-700 dark:text-gray-200 bg-gray-50 dark:bg-gray-700 hover:bg-gray-100 dark:hover:bg-gray-600">
              Hardware Anfrage
            </a>
          </div>
          <!-- Second set of buttons (will act as the second column on medium screens and up) -->
          <div>
            <a href="{{ route('filament.app.resources.peripheri-requests.create') }}"
              class="block w-full sm:max-w-xs flex items-center justify-center px-4 py-2 border border-gray-300 dark:border-gray-700 text-sm font-medium rounded-md text-gray-700 dark:text-gray-200 bg-gray-50 dark:bg-gray-700 hover:bg-gray-100 dark:hover:bg-gray-600 mb-4">
              Peripheri Anfrage
            </a>
            <a href="{{ route('filament.app.resources.hardware-requests.create') }}"
              class="block w-full sm:max-w-xs flex items-center justify-center px-4 py-2 border border-gray-300 dark:border-gray-700 text-sm font-medium rounded-md text-gray-700 dark:text-gray-200 bg-gray-50 dark:bg-gray-700 hover:bg-gray-100 dark:hover:bg-gray-600">
              Hardware Anfrage
            </a>
          </div>
        </div>
        <!-- End of the grid -->
      </div>
    </div>
  </div>
</div>