<div>
    <form action="" wire:submit.prevent="submit">
        @if(session()->has('message-success'))
            <div role="alert">
                <div class="bg-green-500 text-white font-bold rounded-t px-4 py-2">
                    Success
                </div>
                <div class="border border-t-0 border-green-400 rounded-b bg-green-100 px-4 py-2">
                    {{ session('message-success') }}
                </div>
            </div>
        @endif

        <label for="user.firstname">First Name</label>
        <input id="user.firstname" type="text" wire:model="user.firstname">
        @error('user.firstname') <span>{{ $message }}</span> @enderror <br>

        <label for="user.lastname">Last Name</label>
        <input id="user.lastname" type="text" wire:model="user.lastname">
        @error('user.lastname') <span>{{ $message }}</span> @enderror <br>

        <label for="user.birthdate">Birth Date</label>
        <input id="user.birthdate" type="date" wire:model="user.birthdate">
        @error('user.birthdate') <span>{{ $message }}</span> @enderror <br>

        <label for="user.username">Username</label>
        <input id="user.username" type="text" wire:model="user.username">
        @error('user.username') <span>{{ $message }}</span> @enderror <br>

        <label for="user.email">Email</label>
        <input id="user.email" type="text" wire:model="user.email">
        @error('user.email') <span class="error">{{ $message }}</span>@enderror <br>

        <br>
        <br>

        <button
            class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded"
            type="submit"
            wire:loading.attr="disabled"
        >
            Save
        </button>
    </form>
</div>

