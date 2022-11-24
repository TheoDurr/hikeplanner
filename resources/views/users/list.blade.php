<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <h1 class="text-xl font-semibold">Users list</h1>
                    <table class="table-auto border-collapse border border-slate-400">
                        <thead>
                        <tr class="text-center">
                            <th class="border border-slate-300 px-8">UUID</th>
                            <th class="border border-slate-300 px-8">username</th>
                            <th class="border border-slate-300 px-8">email</th>
                        </tr>
                        </thead>
                        <tbody class="text-center">
                        @foreach($users as $user)
                            <tr>
                                <td class="border border-slate-300 px-8">
                                    <a class="underline hover:no-underline"
                                       href="{{ route('userProfile', ['user' => $user->uuid]) }}">{{ $user->uuid }}</a>
                                </td>
                                <td class="border border-slate-300 px-8">{{ $user->username }}</td>
                                <td class="border border-slate-300 px-8">{{ $user->email }}</td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>
