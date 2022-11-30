<div>
    <div class="w-2/3 mb-3">
        <div class="flex w-full mb-6">
            <div class="w-1/2 mr-10 flex justify-between rounded-xl border border-gray-200 overflow-hidden">
                <div class="flex justify-center align-middle bg-green-500">
                    <span class=" px-3 my-auto text-green-50 font-bold" >Search an activity :</span>
                </div>
                <input wire:model="search" class="border-none flex-grow" type="text" placeholder="..."/>
            </div>
            <a class="flex justify-center items-center bg-green-500 hover:bg-green-700 text-white font-bold px-3 border border-gray-200 rounded-xl" href="{{ route('paths.create') }}">
                <div class="h-fit">Add an activity</div>
            </a>
        </div>
        <div class="bg-white rounded-xl overflow-hidden border border-gray-100 shadow-tile w-fit border-r-0">
            <table>
                <tr class="bg-green-500 text-white font-bold " >
                    <th class="h-[3rem] px-4 w-[7rem] hover:bg-green-700 cursor-pointer" wire:click="clickSortId">
                        <div class="flex">
                            <span class="my-auto">#ID</span>
                            <div class="fill-white">{!! $sortingChars[$sortedParamValues['id']] !!}</div>
                        </div>
                    </th>
                    <th class="px-4 hover:bg-green-700 cursor-pointer" wire:click="clickSortName">
                        <div class="flex">
                            <span class="my-auto">Sport</span>
                            <div class="fill-white">{!! $sortingChars[$sortedParamValues['type']] !!}</div>
                        </div>
                    </th>
                    <th class="px-4 hover:bg-green-700 cursor-pointer" wire:click="clickSortName">
                        <div class="flex">
                            <span class="my-auto">Path</span>
                            <div class="fill-white">{!! $sortingChars[$sortedParamValues['path']] !!}</div>
                        </div>
                    </th>
                    <th class="px-4 hover:bg-green-700 cursor-pointer" wire:click="clickSortName">
                        <div class="flex">
                            <span class="my-auto">Difficulty</span>
                            <div class="fill-white">{!! $sortingChars[$sortedParamValues['difficulty']] !!}</div>
                        </div>
                    </th>
                    <th class="px-4 hover:bg-green-700 cursor-pointer" wire:click="clickSortName">
                        <div class="flex">
                            <span class="my-auto">Weather</span>
                            <div class="fill-white">{!! $sortingChars[$sortedParamValues['weather']] !!}</div>
                        </div>
                    </th>
                    <th class="px-4 hover:bg-green-700 cursor-pointer" wire:click="clickSortName">
                        <div class="flex">
                            <span class="my-auto">Description</span>
                            <div class="fill-white">{!!  $sortingChars[$sortedParamValues['description']] !!}</div>
                        </div>
                    </th>
                    <th class="px-4 hover:bg-green-700 cursor-pointer" wire:click="clickSortDate">
                        <div class="flex">
                            <span class="my-auto">Last Update</span>
                            <div class="fill-white">{!! $sortingChars[$sortedParamValues['date']] !!}</div>
                        </div>
                    </th>
                    <th class="px-4">
                        <div class="flex">
                            <span class="my-auto">Action</span>
                        </div>
                    </th>
                </tr>
                @foreach($activities as $activity)
                    <tr class="hover:bg-gray-200">
                        <th class="px-3 py-1">{{$activity->id}}</th>
                        <td class="px-3">{{$activity->type->label}}</td>
                        <td class="px-3">{{$activity->path->label}}</td>
                        <td class="px-3">{{$activity->difficulty->label}}</td>
                        <td class="px-3">{{$activity->weather->label}}</td>
                        <td class="px-3">{{$activity->description}}</td>
                        <td class="px-3">{{date_format($activity->updated_at, 'd M Y H:i')}}</td>
                        <td>
                            <div class="flex mx-auto w-fit">
                                <button wire:click="edit({{ $activity->id }})" class="hover:fill-gray-400">
                                    <svg xmlns="http://www.w3.org/2000/svg" height="20" width="20"><path d="M4.25 15.75h1.229l7-7-1.229-1.229-7 7Zm11.938-8.208-3.73-3.73 1.021-1.02q.521-.521 1.24-.521t1.239.521l1.25 1.25q.5.5.5 1.239 0 .74-.5 1.24Zm-1.23 1.229L6.229 17.5H2.5v-3.729l8.729-8.729Zm-3.083-.625-.625-.625 1.229 1.229Z"/></svg>
                                </button>
                                <button class="hover:fill-gray-400">
                                    <svg xmlns="http://www.w3.org/2000/svg" height="20" width="20"><path d="M6.5 17q-.625 0-1.062-.438Q5 16.125 5 15.5v-10H4V4h4V3h4v1h4v1.5h-1v10q0 .625-.438 1.062Q14.125 17 13.5 17Zm7-11.5h-7v10h7ZM8 14h1.5V7H8Zm2.5 0H12V7h-1.5Zm-4-8.5v10Z"/></svg>
                                </button>
                            </div>
                        </td>
                    </tr>
                @endforeach
            </table>

        </div>
    </div>
</div>
