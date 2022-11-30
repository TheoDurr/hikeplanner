<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-4 flex justify-between w-full border-b border-gray-200">
                    <div class="bg-white my-auto">
                        <h1 class="text-xl font-semibold">{{ $user->getDisplayName() }}</h1>
                        <livewire:follow.user-profile-stats :user="$user"/>
                    </div>

                    <div class="flex my-auto">
                        @if(Auth::user()->uuid != $user->uuid)
                            <div class="bg-white pr-4">
                                @livewire('follow-user', ['user' => $user])
                            </div>
                        @endif
                        @can('update', $user)
                            <span
                                class="my-auto block bg-green-700 hover:bg-white text-white font-semibold hover:text-green-500 py-2 px-4 border border-green-700 hover:border-green-500 rounded">
                                <a href="{{ route("editProfile", $user->uuid) }}">Edit</a>
                            </span>
                        @endcan
                    </div>
                </div>
                <div class="p-6">
                    <h3 class="text-2xl text-gray-700 font-bold -ml-3">{{ __('Performances') }}</h3>
                    <div class="w-full flex justify-evenly">
                        <div class="p-4 text-center">
                            <h2 class="text-xl">Activities</h2>
                            <strong class="text-lg text-green-700">{{ $user->activities()->count() }}</strong>
                        </div>
                        <div class="p-4 text-center">
                            <h2 class="text-xl">Avg. duration</h2>
                            <strong class="text-lg text-green-700">35</strong>
                        </div>
                        <div class="p-4 text-center">
                            <h2 class="text-xl">Level</h2>
                            <strong class="text-lg text-green-700">
                                @if(!$user->level)
                                    N/A
                                @else
                                    {{ $user->level->label }}
                                @endif
                            </strong>
                        </div>
                    </div>

                    <h3 class="text-2xl text-gray-700 font-bold mb-6 -ml-3">{{ __('Latest Activities') }}</h3>
                    @if(empty($user->activities()->count()))
                        No activities yet !
                    @else
                        @foreach($user->activities() as $activity)
                        @endforeach
                    @endif
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
