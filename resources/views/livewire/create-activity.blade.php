<div>
    <div class="py-3 px-5 overflow-hidden sm:rounded-lg shadow-tile bg-white border-b-0 border-r-0 border border-gray-100">
        <div>
            <label>
                Sport :
                <select wire:model="activity.type_id">
                    <option selected>
                        - Select a sport -
                    </option>
                    @foreach($types as $sport)
                        <option value="{{$sport->id}}">
                            {{$sport->label}}
                        </option>
                    @endforeach
                </select>
                @error('activity.type_id')
                <span class="text-red-500 font-light">{{ $message }}</span>
                @enderror
            </label>
        </div>

        <div>
            <label>
                Path :
                <select wire:model="activity.path_id">
                    <option selected>
                        - Select a path -
                    </option>

                    @foreach($paths as $path)
                        <option value="{{$path->id}}">
                            {{$path->label}} {{"(".date_format($path->created_at, 'd/m').")"}}
                        </option>
                    @endforeach
                </select>
                @error('activity.type_id')
                <span class="text-red-500 font-light">{{ $message }}</span>
                @enderror
            </label>
        </div>

        <div>
            <label>
                Difficulty :
                <select wire:model="activity.difficulty_id">
                    <option selected>
                        - Select a difficulty -
                    </option>

                    @foreach($difficulties as $diff)
                        <option value="{{$diff->id}}">
                            {{$diff->label}}
                        </option>
                    @endforeach
                </select>
                @error('activity.difficulty_id')
                <span class="text-red-500 font-light">{{ $message }}</span>
                @enderror
            </label>
        </div>

        <div>
            <label>
                Weather :
                <select wire:model="activity.weather_id">
                    <option selected>
                        - Select a weather -
                    </option>

                    @foreach($weathers as $w)
                        <option value="{{$w->id}}">
                            {{$w->label}}
                        </option>
                    @endforeach
                </select>
                @error('activity.weather_id')
                <span class="text-red-500 font-light">{{ $message }}</span>
                @enderror
            </label>
        </div>

        <div>
            <label>
                Temperature :
                <input type="number" wire:model="activity.temperature"/>
                @error('activity.temperature')
                <span class="text-red-500 font-light">{{ $message }}</span>
                @enderror
            </label>

        </div>

        <div>
            <label>
                Description :
                <textarea wire:model="activity.description"></textarea>
                @error('activity.description')
                <span class="text-red-500 font-light">{{ $message }}</span>
                @enderror
            </label>
        </div>

        <div>
            <label>
                Started on:
                <input type="datetime-local" wire:model="start"/>
                @error('date')
                <span class="text-red-500 font-light">{{ $message }}</span>
                @enderror
            </label>
        </div>

        <div>
            <label>
                Finished on:
                <input type="datetime-local" wire:model="finish"/>
                @error('date')
                <span class="text-red-500 font-light">{{ $message }}</span>
                @enderror
            </label>
        </div>

        <div>
            <button wire:click="save" class="px-2 py-1 rounded-xl font-bold text-white border border-gray-200 bg-green-500 hover:bg-green-700">Save</button>
        </div>
    </div>

</div>
