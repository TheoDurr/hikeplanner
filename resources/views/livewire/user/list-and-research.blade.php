<div>
    <h3 class="text-2xl text-gray-700 font-bold -ml-3">{{ __('Find a user') }}</h3>
    <p>You can search users by the following criteria :</p>
    <ul class="list-disc ml-8">
        <li>First name & last name</li>
        <li>Username</li>
        <li>Email</li>
    </ul>
    <div class="my-4">
        <label for="user">
            <input id="user" type="text" wire:model="search">
        </label>
    </div>

    <h3 class="text-2xl text-gray-700 font-bold -ml-3">{{ __('Users list') }}</h3>
    <div class="flex flex-wrap mt-4">
        @foreach($users as $user)
            <div
                class="
                        shadow-tile
                        hover:shadow-hovered-tile
                        w-full sm:w-1/2 md:w-1/3 lg:w-1/4 xl:w-1/6
                        mb-4 mx-2 px-2 py-1
                        border border-gray-300 rounded-md

                    ">
                <a href="{{route('userProfile', $user->uuid)}}">
                    <div class="text-lg text-center">{{ $user->getDisplayName() }}</div>
                    <div class="fill-green-500 text-green-500">
                        <div class="font-semibold"># {{ $user->activities()->count() }}</div>
                    </div>
                </a>
            </div>
        @endforeach
    </div>
</div>
