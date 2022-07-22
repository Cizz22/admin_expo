<x-app-layout>
    <main class="flex-1 overflow-x-auto overflow-y-auto bg-gray-300">
        <div class="container mx-auto px-6 py-8">
            <livewire:mysql.ticket-table/>

            <!-- support me by buying a coffee -->
        </div>
    </main>
    @push('js')
        @livewire('livewire-ui-modal')
    @endpush
</x-app-layout>
