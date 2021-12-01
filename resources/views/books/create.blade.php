<x-app-layout>
    <x-slot name="header"  >
        <div class="w-full flex flex-wrap w-full">
            <h2 class=" font-semibold text-xl text-gray-800 leading-tight w-1/12 flex items-center">
                {{ __('New book ') }}
            </h2>
        </div>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <!-- component -->
                    <x-validation-errors class="mb-4" :errors="$errors"/>
                    <x-success-message/>
                    <form method="POST" action="{{ route('books.store') }}" enctype="multipart/form-data" class="w-3/4 container align-middle " >
                    @csrf
                    <!-- Name -->
                        <div  class="mt-4" >
                            <x-label for="title" :value="__('Title')"/>

                            <x-input id="title" class="block mt-1 w-full" type="text" name="title"/>
                        </div>

                        <!-- Email Address -->
                        <div class="mt-4">
                            <x-label for="description" :value="__('Description')"/>

                            <x-input id="description" class="block mt-1 w-full" type="text" name="description"
                                    />
                        </div>
                        <div class="mt-4">
                            <x-label for="price" :value="__('Price')"/>

                            <x-input id="price" class="block mt-1 w-full" type="number" name="price"
                            />
                        </div>
                        <div class="mt-4">
                            <x-label for="images" :value="__('Images')"/>

                            <x-input id="images" class="block mt-1 w-full" type="file" name="images[]" multiple
                            />
                        </div>
                        <div style="margin-top: 25px;">
                            <x-button class="ml-4">
                                {{ __('Save') }}
                            </x-button>
                        </div>
                    </form>
                </div>
            </div>
    </div>
    </div>
</x-app-layout>
