<div>
    <div class="text-green-500 text-2xl ml-2 mt-1">
        Test Livewire
    </div>

    <button class="hover:text-gray-300" wire:click="add()">Add user</button>
    <button class="hover:text-gray-300" wire:click="less()">Delete user</button>


    <h3>Numbers</h3>
    @for ($i = 0; $i <= $count; $i++)
        <div class="rounded break-all bg-green-100 px-1 py-0.5 mb-0.5">
            The current value is {{ $i }}
        </div>
    @endfor
</div>
