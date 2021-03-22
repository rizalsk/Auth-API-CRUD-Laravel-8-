<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('User List') }}
        </h2>
        <small>Password = <span class="bg-gray-200">password</span></small>
    </x-slot>

    <div class="w-full">
        <div class="w-full">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-0.5">
                <!-- <x-jet-welcome /> -->
                <table class="rounded-t-lg w-11/12 mx-auto bg-gray-200 text-gray-800">
                    <tr class="text-left border border-gray-300">
                        <th width="50" class="px-4 py-3 border-r">ID</th>
                        <th class="px-4 py-3 border-r">Name</th>
                        <th class="px-4 py-3 border-r">Email</th>
                        <th class="px-4 py-3 border-r">Token</th>
                    </tr>

                    @foreach($users as $i => $v)
                        <tr class="bg-gray-100 border border-gray-200">
                            <td class="px-4 py-3 border-r">{{ $v->id }}</td>
                            <td class="px-4 py-3 border-r">{{ $v->name }}</td>
                            <td class="px-4 py-3 border-r">{{ $v->email }}</td>
                            <td class="px-4 py-3 border-r">
                                @foreach( $v->tokens as $ii => $vv )
                                    {{  $vv['token'] }}
                                @endforeach
                            </td>
                        </tr> 
                    @endforeach

                </table>

                <div class="mb-20"></div>
                <!-- fill for tailwind preview bottom overflow -->
            </div>
        </div>
    </div>
</x-app-layout>