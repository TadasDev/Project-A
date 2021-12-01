<x-app-layout>
    <x-slot name="header" style="display: flex">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Edit user profile details') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <!-- component -->
                    <x-validation-errors class="mb-4" :errors="$errors"/>
                    <x-success-message/>
                    <form method="POST" action="{{ route('users.update',['id'=> $user->id]) }}">
                    @csrf
                    <!-- Name -->
                        <div>
                            <x-label for="name" :value="__('Name')"/>

                            <x-input id="name" class="block mt-1 w-full" type="text" name="name"
                                     value="  {{$user->name }}    "/>
                        </div>

                        <!-- Email Address -->
                        <div class="mt-4">
                            <x-label for="email" :value="__('Email')"/>

                            <x-input id="email" class="block mt-1 w-full" type="email" name="email"
                                     value="{{$user->email }}"/>
                        </div>
                        <div style="margin-top: 25px ; ">
                            <x-button class="ml-4">
                                {{ __('Save') }}
                            </x-button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
</x-app-layout>
