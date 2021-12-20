<x-app-layout>
    <x-slot name="header">
        <div class="w-full flex flex-wrap w-full">
            <h2 class=" font-semibold text-xl text-gray-800 leading-tight w-1/12 flex items-center">
                {{ __('Books ') }}
            </h2>
        </div>
    </x-slot>
    <div>
        <div class="max-w-2xl mx-auto sm:py-2 sm:px-6 lg:max-w-7xl lg:px-8">
            <div class="flex justify-between py-4 w-full h-full ">
                <a href="{{ route('books.create') }}">
                    <button
                        type="button"
                        class="mr-3 text-sm bg-green-800 hover:bg-blue-700 text-white py-2 px-4 rounded focus:outline-none focus:shadow-outline w-full">
                        Add new book
                    </button>
                </a>
            </div>
            <x-success-message/>
            <x-validation-errors class="mb-4" :errors="$errors"/>
            <div class="grid grid-cols-5 grid-flow-col  overflow-hidden">
                <div class="grid grid-cols-1 gap-y-1 place-items-stretch h-5 w-45">
                    Price range:
                    <ul class="flex ">
                        <form method="GET" action="{{ route('books.sortBy') }}">
                            @csrf
                            <div>
                                <x-label for="price_from" :value="__('From')"></x-label>
                                <x-input id="price_from" class="block mt-1 w-full" type="number" name="price_from"
                                         min="1"/>
                            </div>
                            <div class="mt-4">
                                <x-label for="price_to" :value="__('To')"></x-label>
                                <x-input id="price_to" class="block mt-1 w-full" type="number" name="price_to"
                                         min="1"/>
                            </div>
                            <div class=" mt-4">
                                <x-label for="sortBy" :value="__('Sort by:')" class=""/>
                                <select class="mt-1 rounded w-full" name="sortBy" id="sortBy">
                                    <option value="asc">Lowest (price)</option>
                                    <option value="desc">Highest (price)</option>
                                </select>
                            </div>
                            <div style="margin-top: 25px ; ">
                                <x-button>
                                    {{ __('Sort') }}
                                </x-button>
                            </div>
                        </form>
                    </ul>
                </div>
                <div
                    class="grid col-span-4 gap-y-4 sm:grid-cols-2 gap-x-6 lg:grid-cols-3 xl:grid-cols-4 xl:gap-x-4">
                    @if($books->count() > 0)
                        @foreach($books as $book)
                            <div class="w-full h-full group border-2 p-2 bg-white rounded-lg ">
                                <a href="{{ route('books.show',$book ) }}">
                                    <div
                                        class=" aspect-w-1 aspect-h-1  rounded-lg  overflow-hidden xl:aspect-w-7 xl:aspect-h-8">
                                        @if($book->images()->count() > 0 )
                                            <img src="{{ asset('storage/' . $book->images()->first()->file_path)}}"
                                                 alt=" Post image "
                                                 style="height: 200px;width: 100%"
                                                 class="object-center object-cover group-hover:opacity-75"/>
                                        @else
                                            <img
                                                src="https://tailwindui.com/img/ecommerce-images/category-page-04-image-card-01.jpg"
                                                alt="Tall slender porcelain bottle with natural clay textured body and cork stopper."
                                                style="height: 200px;width: 100%"
                                                class="w-full h-60 object-center object-cover group-hover:opacity-75">
                                    @endif
                                </a>
                            </div>

                            <div>
                                <h3 class="mt-4 text-sm text-gray-700">
                                    {{$book->title}}
                                </h3>
                                <p class="mt-1 text-lg font-medium text-gray-900">
                                    Price: ${{$book->price}}
                                </p>
                                <form method="POST" action="{{ route('cart.store',['id'=>$book->id])}}">
                                    @csrf
                                    <x-button>
                                        {{ __('Add to basket') }}
                                    </x-button>
                                    </form>
{{--                                <a  href="{{route('cart.store',['id'=>$book->id])}}">--}}

{{--                                </a>--}}
                            </div>
                </div>
                @endforeach
                @endif
            </div>


        </div>
        <div class="p-4 items-end flex-1 ">
            {{$books->withQueryString()->links()}}
        </div>
    </div>
    </div>

</x-app-layout>
