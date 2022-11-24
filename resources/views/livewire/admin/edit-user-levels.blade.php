<div>
    <h3 class="text-lg">{{ __("User levels") }}</h3>
    <div>
        <form class="pt-2" action="" wire:submit.prevent="submit">
            @csrf
            <label for="levelLabel"><span class="font-bold">{{ __('Add item') }}</span></label><br>
            <input id="levelLabel" type="text" wire:model="levelLabel"/>
            <button type="submit">{{ __("Add") }}</button>
            <br>
            @error('levelLabel')<span class="text-xs italic text-red-400">{{ $message }}</span><br>@enderror()
        </form>
    </div>

    <div class="mt-3">
        <span class="font-bold">{{ __('Available types') }}</span><br>
        @foreach(\App\Models\UserLevel::all()->sortBy('label') as $level)
            {{ __($level->label) }}<br>
        @endforeach
    </div>
</div>
