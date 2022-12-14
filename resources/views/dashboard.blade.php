<x-app-layout>
    <div class="py-12 overflow-hidden">
        <div class="w-full h-[75vh] mx-auto sm:px-6 lg:px-8 grid grid-cols-3 grid-rows-2 gap-5">

            <div class="overflow-hidden shadow-tile sm:rounded-lg hover:shadow-hovered-tile cursor-pointer border border-b border-gray-100 bg-white">
                <a href="{{route('activities.create')}}">
                    <div class="flex flex-col h-full w-full justify-center">
                        <span class="text-center text-2xl font-bold">Add an activity</span>
                        <span class="flex justify-center mt-5">
                            <svg class="fill-green-500" xmlns="http://www.w3.org/2000/svg" height="48" width="48"><path d="M22.6 34.05h3.1v-8.3h8.35v-3.1H25.7v-8.7h-3.1v8.7h-8.65v3.1h8.65ZM24 44.3q-4.2 0-7.9-1.6t-6.45-4.35Q6.9 35.6 5.3 31.9 3.7 28.2 3.7 24q0-4.25 1.6-7.95t4.35-6.425Q12.4 6.9 16.1 5.3T24 3.7q4.25 0 7.95 1.6t6.425 4.325Q41.1 12.35 42.7 16.05q1.6 3.7 1.6 7.95 0 4.2-1.6 7.9t-4.325 6.45Q35.65 41.1 31.95 42.7q-3.7 1.6-7.95 1.6Zm.05-3.4q7 0 11.925-4.95Q40.9 31 40.9 23.95q0-7-4.925-11.925Q31.05 7.1 24 7.1q-7 0-11.95 4.925Q7.1 16.95 7.1 24q0 7 4.95 11.95 4.95 4.95 12 4.95ZM24 24Z"/>
                            </svg>
                        </span>
                    </div>
                </a>
            </div>

            <div class="overflow-hidden shadow-tile sm:rounded-lg hover:shadow-hovered-tile cursor-pointer border border-b border-gray-100 bg-white">
                <a href="{{route('paths.create')}}">
                    <div class="flex flex-col h-full w-full justify-center">
                        <span class="text-center text-2xl font-bold">Create a path</span>
                        <span class="flex justify-center mt-5">
                            <svg class="fill-green-500" xmlns="http://www.w3.org/2000/svg" height="48" width="48"><path d="M24 44q-7.75-6.7-11.875-12.5T8 20.4q0-7.45 4.85-11.925Q17.7 4 24 4q6.7 0 11.4 4.7t4.7 12.9l4.7-4.7 2.1 2.1-8.3 8.3-8.3-8.3 2.1-2.1 4.7 4.7q0-6.6-3.65-10.6T24 7q-5.45 0-9.225 3.775Q11 14.55 11 20.4q0 4.1 3.3 8.95t9.7 10.7q1-.9 2.15-2.05l2-2q-.3-.6-.475-1.2t-.175-1.15q0-1.9 1.325-3.2 1.325-1.3 3.175-1.3 1.9 0 3.2 1.3 1.3 1.3 1.3 3.2 0 1.9-1.3 3.2-1.3 1.3-3.2 1.3-.35 0-.725-.05t-.825-.2q-1.55 1.6-3.05 3.05Q25.9 42.4 24 44Z"/>
                            </svg>
                        </span>
                    </div>
                </a>
            </div>

            <div class="row-span-2 overflow-hidden shadow-tile sm:rounded-lg border border-b border-gray-100 bg-white">

                    3

            </div>
            <div class="col-span-2 overflow-hidden shadow-tile sm:rounded-lg border border-b border-gray-200 bg-white">
                4
            </div>
        </div>
    </div>
</x-app-layout>
