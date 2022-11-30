<div>
    <div class="w-fit mb-3">
        <div class="flex w-full mb-6">
            <div class="w-fit mr-10 flex-col justify-between rounded-xl border border-gray-200 overflow-hidden">
                <div class="flex justify-center align-middle bg-green-500">
                    <span class=" px-3 my-auto text-green-50 font-bold" >Filter :</span>
                </div>
                <div class="flex items-center bg-white px-3">
                    <div class="w-full bg-white px-6 flex-grow">
                        <label>
                            Sport :
                            <select class="my-0.5 rounded-xl" wire:model="filteredSport">
                                <option value="-1">--</option>
                                @foreach($types as $activity_type)
                                    <option value="{{$activity_type->id}}">{{$activity_type->label}}</option>
                                @endforeach
                            </select>
                        </label>
                    </div>
                    <div class="w-full bg-white px-6 flex-grow">
                        <label>
                            Path :
                            <select class="my-0.5 rounded-xl" wire:model="filteredPath">
                                <option value="-1">--</option>
                                @foreach($paths as $path)
                                    <option value="{{$path->id}}">{{$path->label}}</option>
                                @endforeach
                            </select>
                        </label>
                    </div>
                    <div class="w-full bg-white px-6 flex-grow">
                        <label>
                            Difficulty :
                            <select class="my-0.5 rounded-xl" wire:model="filteredDifficulty">
                                <option value="-1">--</option>
                                @foreach($difficulties as $difficulty)
                                    <option value="{{$difficulty->id}}">{{$difficulty->label}}</option>
                                @endforeach
                            </select>
                        </label>
                    </div>
                    <div class="w-full bg-white px-6 flex-grow">
                        <label>
                            Weather :
                            <select class="my-0.5 rounded-xl" wire:model="filteredWeather">
                                <option value="-1">--</option>
                                @foreach($weathers as $weather)
                                    <option value="{{$weather->id}}">{{$weather->label}}</option>
                                @endforeach
                            </select>
                        </label>
                    </div>
                    <button class="bg-green-500 hover:bg-green-700 text-white font-bold px-3 border border-gray-200 rounded-xl" wire:click="resetFilter" >Reset Filter</button>
                </div>
            </div>
            <a class="flex justify-center items-center bg-green-500 hover:bg-green-700 text-white font-bold px-3 border border-gray-200 rounded-xl" href="{{ route('activities.create') }}">
                <div class="">Add an activity</div>
            </a>
        </div>
        <div class="bg-white rounded-xl overflow-hidden border border-gray-100 shadow-tile w-fit border-r-0">
            <table>
                <tr class="bg-green-500 text-white font-bold " >
                    <th class="h-[3rem] px-4 w-[7rem] hover:bg-green-700 cursor-pointer" wire:click="setNextSortingValue('id')">
                        <div class="flex">
                            <span class="my-auto">#ID</span>
                            <div class="fill-white">{!! $sortingChars[$sortedParamValues['id']] !!}</div>
                        </div>
                    </th>
                    <th class="px-4 hover:bg-green-700 cursor-pointer" wire:click="setNextSortingValue('type')">
                        <div class="flex">
                            <span class="my-auto">Sport</span>
                            <div class="fill-white">{!! $sortingChars[$sortedParamValues['type']] !!}</div>
                        </div>
                    </th>
                    <th class="px-4 hover:bg-green-700 cursor-pointer" wire:click="setNextSortingValue('path')">
                        <div class="flex">
                            <span class="my-auto">Path</span>
                            <div class="fill-white">{!! $sortingChars[$sortedParamValues['path']] !!}</div>
                        </div>
                    </th>
                    <th class="px-4 hover:bg-green-700 cursor-pointer" wire:click="setNextSortingValue('difficulty')">
                        <div class="flex">
                            <span class="my-auto">Difficulty</span>
                            <div class="fill-white">{!! $sortingChars[$sortedParamValues['difficulty']] !!}</div>
                        </div>
                    </th>
                    <th class="px-4 hover:bg-green-700 cursor-pointer" wire:click="setNextSortingValue('weather')">
                        <div class="flex">
                            <span class="my-auto">Weather</span>
                            <div class="fill-white">{!! $sortingChars[$sortedParamValues['weather']] !!}</div>
                        </div>
                    </th>
                    <th class="px-4 hover:bg-green-700 cursor-pointer" wire:click="setNextSortingValue('temperature')">
                        <div class="flex">
                            <span class="my-auto">Temperature (°C)</span>
                            <div class="fill-white">{!! $sortingChars[$sortedParamValues['temperature']] !!}</div>
                        </div>
                    </th>
                    <th class="px-4 hover:bg-green-700 cursor-pointer" wire:click="setNextSortingValue('description')">
                        <div class="flex">
                            <span class="my-auto">Description</span>
                            <div class="fill-white">{!!  $sortingChars[$sortedParamValues['description']] !!}</div>
                        </div>
                    </th>
                    <th class="px-4 hover:bg-green-700 cursor-pointer" wire:click="setNextSortingValue('date')">
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
                        <td class="px-3">{{$activity->temperature}}</td>
                        <td class="px-3">{{$activity->description}}</td>
                        <td class="px-3">{{date_format($activity->updated_at, 'd M Y H:i')}}</td>
                        <td>
                            <div class="flex mx-auto w-fit">
                                <script>
                                    function askRemoval(id) {
                                        if (confirm("Are you sure you want to delete the #" + id + " activity ?")) {
                                            Livewire.emit('askedRemoval', id);
                                        }
                                    }
                                </script>
                                <button class="hover:fill-gray-400" onclick="askRemoval({{$activity->id}})">
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
