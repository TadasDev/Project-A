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


            <div class="flex justify-evenly py-4 w-full h-full">
                <a href="{{ route('books.create') }}">
                    <button
                        type="button"
                        class="mr-3 text-sm bg-blue-500 hover:bg-blue-700 text-white py-2 px-4 rounded focus:outline-none focus:shadow-outline w-full">
                        Add new book
                    </button>

                </a>
                <div class="flex justify-end w-11/12">
                    <x-input id="searchbox" class="block mt-1 w-1/4 border-2 px-4 " type="input" name="searchbox"
                             placeholder="Search"/>
                    <x-button type="submit " class="block mt-1 w-1/12 border-2 px-4 ">Search</x-button>

                </div>

            </div>

            <x-success-message/>

            <div class="grid grid-cols-1 gap-y-10 sm:grid-cols-2 gap-x-6 lg:grid-cols-3 xl:grid-cols-4 xl:gap-x-4">

                @foreach($books as $book)

                    <a href="{{ route('books.show',$book ) }}" class="group">

                        <div
                            class="w-full aspect-w-1 aspect-h-1 bg-gray-200 rounded-lg overflow-hidden xl:aspect-w-7 xl:aspect-h-8">
                            @if($book->images()->count()>0)
                                <img src="{{ asset('storage/' . $book->images()->first()->file_path) }}"
                                     style="height: 292px"
                                     alt=" Post image "
                                     class="w-full h-full object-center object-cover group-hover:opacity-75"/>

                            @else
                                <img
                                    src="https://tailwindui.com/img/ecommerce-images/category-page-04-image-card-01.jpg"
                                    alt="Tall slender porcelain bottle with natural clay textured body and cork stopper."
                                    class="w-full h-full object-center object-cover group-hover:opacity-75">

                            @endif
                        </div>
                        <h3 class="mt-4 text-sm text-gray-700">
                            {{$book->title}}
                        </h3>
                        <p class="mt-1 text-lg font-medium text-gray-900">
                            Price: ${{$book->price}}
                        </p>
                    </a>
            @endforeach
            <!-- More products... -->
            </div>
            <div class="p-4 items-end flex-1 ">
                {{$books->links()}}
            </div>
        </div>
    </div>
</x-app-layout>
