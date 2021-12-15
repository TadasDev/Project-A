<x-app-layout>
    <x-slot name="header">
        <div class="w-full flex flex-wrap w-full">
            <h2 class=" font-semibold text-xl text-gray-800 leading-tight w-1/12 flex items-center">
                {{ __('Books ') }}
            </h2>
        </div>
    </x-slot>
    <div class="bg-white">
        <div class="max-w-2xl mx-auto sm:py-2 sm:px-6 lg:max-w-7xl lg:px-8">
            <div class="flex justify-between py-4 w-full h-full ">
                <a href="{{ route('books.create') }}">
                    <button
                        type="button"
                        class="mr-3 text-sm bg-green-800 hover:bg-blue-700 text-white py-2 px-4 rounded focus:outline-none focus:shadow-outline w-full">
                        Add new book
                    </button>
                </a>
                <div class="w-1/4 flex flex-wrap justify-between">
                    <select class="p-1 rounded w-3/4">
                        <option>Lowest (price)</option>
                        <option>Highest (price)</option>
                        <option>Newest</option>
                        <option>Oldest</option>
                    </select>
                    <button
                        type="button"
                        class=" text-sm bg-green-800 hover:bg-blue-700 text-white py-2 px-4 rounded focus:outline-none focus:shadow-outline">
                        Select
                    </button>
                </div>

            </div>
            <x-success-message/>
            <div class="grid grid-cols-5 grid-flow-col  overflow-hidden">
                <div class="grid grid-cols-1 gap-y-1 place-items-stretch h-5 ">

                    Price range:
                    <ul class="flex ">
                        <form method="GET" action="{{ route('books.sortByPriceRange') }}">
                        @csrf
                            <div>
                                <x-label for="price_from" :value="__('From')"/>

                                <x-input id="price_from" class="block mt-1 w-full" type="number" name="price_from"/>
                            </div>

                            <!-- Email Address -->
                            <div class="mt-4">
                                <x-label for="price_to" :value="__('To')"/>

                                <x-input id="price_to" class="block mt-1 w-full" type="number" name="price_to"/>
                            </div>
                            <div style="margin-top: 25px ; ">
                                <x-button class="ml-4">
                                    {{ __('Sort') }}
                                </x-button>
                            </div>
                        </form>

{{--                        <li> From--}}
{{--                            <x-input type="number" id="price_from" name="price_from" class="w-11/12 p-1  "/>--}}
{{--                        </li>--}}
{{--                        <li> To--}}
{{--                            <x-input type="number" id="price_to" name="price_to" class="w-11/12 p-1 "/>--}}
{{--                        </li>--}}
{{--                    </ul>--}}
{{--                    <a href="{{ route('books.sortByPriceRange') }}">--}}
{{--                    <button--}}
{{--                            type="button"--}}
{{--                            class="w-5/12 text-sm bg-blue-500 hover:bg-blue-700 text-white py-2 px-4 rounded focus:outline-none focus:shadow-outline">--}}
{{--                            Select--}}
{{--                        </button>--}}
{{--                    </a>--}}
                </div>
                <div
                    class="grid grid-cols-1 col-span-4 gap-y-4 sm:grid-cols-2 gap-x-6 lg:grid-cols-3 xl:grid-cols-4 xl:gap-x-4">
                    @foreach($books as $book)
                        <a href="{{ route('books.show',$book ) }}" class="group border-2 p-2  rounded-lg ">
                            <div
                                class="aspect-w-1 aspect-h-1 bg-gray-200 rounded-lg  overflow-hidden xl:aspect-w-7 xl:aspect-h-8">
                                @if($book->images()->count())
                                    <img src="{{ asset('storage/' . $book->images()->first()->file_path)}}"
                                         alt=" Post image "
                                         class="w-full h-60 object-center object-cover group-hover:opacity-75"/>
                                @else
                                    <img
                                        src="https://tailwindui.com/img/ecommerce-images/category-page-04-image-card-01.jpg"
                                        alt="Tall slender porcelain bottle with natural clay textured body and cork stopper."
                                        class="w-full h-60 object-center object-cover group-hover:opacity-75">

                                @endif
                            </div>
                            <h3 class="mt-4 text-sm text-gray-700">
                                {{$book->title}}
                            </h3>
                            <p class="mt-1 text-lg font-medium text-gray-900">
                                Price: ${{$book->price}}
                            </p>
                            <div class="block text-center">
                                <x-button>
                                    {{ __('Add to basket') }}
                                </x-button>
                            </div>

                        </a>

                    @endforeach</div>
            </div>
            <div class="p-4 items-end flex-1 ">
                {{$books->links()}}
            </div>
        </div>
    </div>
</x-app-layout>
