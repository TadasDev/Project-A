<x-app-layout>
    <x-slot name="header" style="display: flex">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight" style="width: 10%">
            {{ __('Users list') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <x-success-message/>
                    <!-- component -->
                    <div class="px-3 py-4 flex justify-center">
                        <table class="w-full text-md bg-white shadow-md rounded mb-4 ">
                            <tbody>
                            <tr class="border-b">
                                <th class="text-left p-3 px-5">Name</th>
                                <th class="text-left p-3 px-5">Email</th>
                                <th class="text-left p-3 px-5">Created at</th>
                                <th class="text-left p-3 px-5">Updated at</th>
                                <th class="text-left p-3 px-5">Role</th>

                            </tr>
                            @foreach($users as $user)
                                <tr class="border-b hover:bg-orange-100 bg-gray-100">

                                    <td class="p-3 px-5">{{$user->name}}</td>
                                    <td class="p-3 px-5">{{$user->email}}</td>
                                    <td class="p-3 px-5"> {{$user->created_at}}</td>
                                    <td class="p-3 px-5"> {{$user->updated_at}}</td>
                                    <td class="p-3 px-5"> {{$user->is_admin ? 'Admin':'User'}}</td>
                                    <td class="p-3 px-5 flex justify-end">
                                        @can('update',$user)
                                        <a href="{{ route('users.edit',['id'=> $user->id]) }}">
                                            <button type="button"
                                                    class="mr-3 text-sm bg-blue-500 hover:bg-blue-700 text-white py-2 px-6 rounded focus:outline-none focus:shadow-outline">
                                                Edit
                                            </button>
                                        </a>
                                        @endcan
                                        @can('delete',$user)
                                        <form method="POST" action="{{route('users.destroy',['id'=> $user->id])}}">
                                            @csrf

                                            @method('DELETE')
                                            <button type="submit"
                                                    class="text-sm bg-red-500 hover:bg-red-700 text-white py-2 px-4 rounded focus:outline-none focus:shadow-outline">
                                                Delete
                                            </button>
                                        </form>
                                            @endcan
                                    </td>
                                    @endforeach
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    {{$users->links()}}
                </div>
            </div>
        </div>
</x-app-layout>
