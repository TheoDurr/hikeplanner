<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-4">
                    <h1 class="text-xl font-bold">Admin dashboard</h1>

                    <div class="flex justify-between">
                        @livewire('admin.edit-activity-types')
                        @livewire('admin.edit-activity-difficulties')
                        @livewire('admin.edit-user-levels')
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
