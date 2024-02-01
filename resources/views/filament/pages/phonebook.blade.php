<x-filament-panels::page>
  {{ $this->form }}

  @if ($this->userDetails)
  <div class="w-full max-w-xl bg-white dark:bg-gray-800 rounded overflow-hidden shadow-lg mx-auto my-8">
      <div class="flex items-center px-6 py-4 bg-blue-500 dark:bg-blue-700 rounded-t">
        <img class="w-32 h-32 rounded-full border-4 border-white dark:border-gray-600" src="https://i.pravatar.cc/300"
          alt="User avatar">
        <div class="ml-4 flex-grow">
          <div class="text-xl text-gray-700 dark:text-gray-200 font-semibold text-center">{{
            $this->userDetails->firstname
            }} {{ $this->userDetails->name }}</div>
          <div class="text-sm text-gray-700 dark:text-gray-400 text-center">{{ $this->userDetails->position }}</div>
          <div class="text-sm text-gray-700 dark:text-gray-400 text-center">{{ $this->userDetails->department }}</div>
          <div class="text-sm text-gray-700 dark:text-gray-400 text-center">{{ $this->userDetails->description }}</div>
        </div>
      </div>
      <div class="px-6 py-6">
        <div class="flex items-center gap-x-2 mb-4">
          <x-heroicon-o-phone class="w-6 h-6 text-gray-500 dark:text-gray-400" />
          <span class="text-gray-800 dark:text-gray-100">{{ $this->userDetails->tel }}</span>
        </div>
        <div class="flex items-center gap-x-2 mb-4">
          <x-heroicon-o-device-phone-mobile class="w-6 h-6 text-gray-500 dark:text-gray-400" />
          <span class="text-gray-800 dark:text-gray-100">{{ $this->userDetails->telephone_private ??
            '-'}}</span>
          <span class="text-gray-500 dark:text-gray-400 text-xs">Privat</span>
        </div>
        <div class="flex items-center gap-x-2 mb-4">
          <x-heroicon-o-envelope class="w-6 h-6 text-gray-500 dark:text-gray-400" />
          <span class="text-gray-800 dark:text-gray-100">{{ $this->userDetails->email }}</span>
          <span class="text-gray-500 dark:text-gray-400 text-xs">Email</span>
        </div>
        <div class="flex items-center gap-x-2">
          <x-heroicon-s-envelope class="w-6 h-6 text-gray-500 dark:text-gray-400" />
          <span class="text-gray-800 dark:text-gray-100">{{ $this->userDetails->email_private ?? '-' }}</span>
          <span class="text-gray-700 dark:text-gray-200 text-xs">Privat</span>
        </div>
      </div>
      <hr class="border-t border-gray-200 dark:border-gray-600"> <!-- Horizontal line -->
      <!-- ... -->
      <div class="px-6 py-6">

        <div class="flex items-center gap-x-2">
          <x-heroicon-o-map-pin class="w-6 h-6 text-gray-500 dark:text-gray-400" />
          <span class="text-gray-800 dark:text-gray-100">{{ $this->userDetails->location }}&#x2c;&nbsp;{{
            $this->userDetails->street }}</span>
        </div>
      </div>
  </div>
  @endif
</x-filament-panels::page>