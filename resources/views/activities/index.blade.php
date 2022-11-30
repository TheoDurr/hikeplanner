<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="p-6">
                <h1 class="text-xl mb-5">Your Activities : </h1>
            </div>
        </div>
    </div>

    {{--
    @foreach (Auth::user()->activities() as $activity)
        <div>
        {{ $loop->index }}
        </div>
    @endforeach
    --}}

</x-app-layout>
