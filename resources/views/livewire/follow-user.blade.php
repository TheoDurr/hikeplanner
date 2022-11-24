<div>
    @if(Auth::user()->isFollowing($this->user))
        <button wire:click="unfollow({{ Auth::user() }}, {{ $this->user }})"
                class="bg-green-700 hover:bg-white text-white font-semibold hover:text-green-500 py-2 px-4 border border-green-700 hover:border-green-500 rounded"
        >
            Following
        </button>
    @else
        <button wire:click="follow({{ Auth::user() }}, {{ $this->user }})"
                class="bg-transparent hover:bg-green-700 text-green-500 font-semibold hover:text-white py-2 px-4 border border-green-500 hover:border-transparent rounded"
        >
            Follow
        </button>
    @endif
</div>
