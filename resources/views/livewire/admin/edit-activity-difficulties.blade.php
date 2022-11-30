<div>
    <h3 class="text-lg">Activity difficulties</h3>
    <div>
        <form class="pt-2" action="" wire:submit.prevent="submit">
            @csrf
            <label for="difficultyLabel"><span class="font-bold">{{ __('Add item') }}</span></label><br>
            <input id="difficultyLabel" type="text" wire:model="difficultyLabel"/>
            <button type="submit">{{ __("Add") }}</button>
            <br>
            @error('difficultyLabel')<span class="text-xs italic text-red-400">{{ $message }}</span><br>@enderror()
        </form>
    </div>

    <div class="mt-3">
        <span class="font-bold">{{ __('Available types') }}</span><br>
        @foreach(\App\Models\Difficulty::all()->sortBy('label') as $level)
            {{ __($level->label) }}<br>
        @endforeach
    </div>
</div>
