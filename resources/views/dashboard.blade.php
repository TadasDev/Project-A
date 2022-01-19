<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                <div>
                  My Books for sale
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
                                    <form method="POST" action="{{ route('books.destroy',$book)}}"
                                          class="flex justify-center">
                                        @method('DELETE')
                                        @csrf
                                        <x-button>
                                            {{ __('Remove') }}
                                        </x-button>
                                    </form>
                                </div>
                    </div>
                    @endforeach
                    @endif
                </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
