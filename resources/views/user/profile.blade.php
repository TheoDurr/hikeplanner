<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-4 flex justify-between w-full border-b border-gray-200">
                    <div class="bg-white my-auto">
                        <h1 class="text-xl font-semibold">{{ $user->getDisplayName() }}</h1>
                        <span class="text-xs">{{ __("Followers") . " : " . $user->getFollowerCount() }}</span>
                        <span class="text-xs">{{ __("Following") . " : " . $user->getFollowingCount() }}</span>
                    </div>

                    @if(Auth::user() != $user)
                        <div class="bg-white">
                            @livewire('follow-user', ['user' => $user])
                        </div>
                    @endif
                </div>
                <div class="p-6">
                    Lorem ipsum dolor sit amet, consectetur adipisicing elit. Architecto, assumenda dolore doloribus
                    explicabo harum iste iure molestiae necessitatibus quibusdam unde vitae voluptatum! Exercitationem
                    provident, quisquam! Accusantium asperiores consequuntur nobis officiis?
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
