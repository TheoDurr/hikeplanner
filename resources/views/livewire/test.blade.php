<div>
    <div class="text-green-500 text-2xl ml-2 mt-1">
        Test Livewire
    </div>

    <button class="hover:text-gray-300" wire:click="addUser">Add user</button>
    <button class="hover:text-gray-300" wire:click="deleteUser">Delete user</button>


    <h3>Users list:</h3>
    @foreach($users as $user)
        <div class="rounded break-all bg-green-100 px-1 py-0.5">
            uuid: {{$user->uuid}}<br>
            username : {{$user->username}}<br>
            email: {{$user->email}}<br>
            password: {{$user->password}}
        </div>
    @endforeach
</div>
