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
                            <strong class="text-lg text-green-700">{{ formatDuration($user->getAvgActivityTime()) }}</strong>
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
                        <div class="flex flex-wrap mt-4">
                            @foreach($user->activities as $activity)
                                <div
                                    class="
                                        shadow-tile
                                        hover:shadow-hovered-tile
                                        w-full sm:w-1/2 md:w-1/3 lg:w-1/4 xl:w-1/6
                                        mb-4 mx-2 px-2 py-1
                                        border border-gray-300 rounded-md
                                    ">

                                    <div class="text-lg text-center">{{ $activity->path->label }}</div>
                                    <div class="fill-green-500 text-green-500 flex items-center w-3/5 justify-between">
                                        <svg xmlns="http://www.w3.org/2000/svg" height="20" width="20"><path d="M10 15q2.083 0 3.542-1.458Q15 12.083 15 10q0-2.083-1.458-3.542Q12.083 5 10 5v5l-3.542 3.542q.688.666 1.594 1.062Q8.958 15 10 15Zm0 3q-1.646 0-3.104-.625-1.458-.625-2.552-1.719t-1.719-2.552Q2 11.646 2 10q0-1.667.625-3.115.625-1.447 1.719-2.541Q5.438 3.25 6.896 2.625T10 2q1.667 0 3.115.625 1.447.625 2.541 1.719 1.094 1.094 1.719 2.541Q18 8.333 18 10q0 1.646-.625 3.104-.625 1.458-1.719 2.552t-2.541 1.719Q11.667 18 10 18Zm0-1.5q2.708 0 4.604-1.896T16.5 10q0-2.708-1.896-4.604T10 3.5q-2.708 0-4.604 1.896T3.5 10q0 2.708 1.896 4.604T10 16.5Zm0-6.5Z"/></svg>
                                        <div class="font-semibold">{{ formatDuration($activity->duration()) }}</div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
