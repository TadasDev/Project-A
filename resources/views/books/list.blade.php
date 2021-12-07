<x-app-layout>
    <x-slot name="header">
        <div class="w-full flex flex-wrap w-full">
            <h2 class=" font-semibold text-xl text-gray-800 leading-tight w-1/12 flex items-center">
                {{ __('Books ') }}
            </h2>
            <div class="flex justify-end py-4 w-11/12">
                <x-input id="searchbox" class="block mt-1 w-1/4 border-2 px-4 " type="input" name="searchbox"
                         placeholder="Search"/>
                <x-button type="submit " class="block mt-1 w-1/12 border-2 px-4 p">Search</x-button>
            </div>
        </div>
    </x-slot>
    <div class="bg-white">

        <div class="max-w-2xl mx-auto sm:py-2 sm:px-6 lg:max-w-7xl lg:px-8">

            <a href="{{ route('books.create') }}">
                <button type="button"
                        class="mr-3 text-sm bg-blue-500 hover:bg-blue-700 text-white py-2 px-6 rounded focus:outline-none focus:shadow-outline">
                    Add book
                </button>
            </a>
            <x-success-message/>

            <div class="grid grid-cols-1 gap-y-10 sm:grid-cols-2 gap-x-6 lg:grid-cols-3 xl:grid-cols-4 xl:gap-x-4">

                @foreach($books as $book)

                    <a href="#" class="group">

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
    {{--    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 border-blue-900 border-2 flex flex-wrap">--}}
    {{--        <div style="height: auto; background: #667556; width: 200px">--}}
    {{--            Choose a category:--}}
    {{--            <ul class="my-2 px-14 text-right">--}}
    {{--                <li class=""> Author<input type="checkbox"></li>--}}
    {{--                <li class="">Title<input type="checkbox"></li>--}}
    {{--                <li class="">Price<input type="checkbox"></li>--}}
    {{--            </ul>--}}
    {{--        </div>--}}
    {{--        <x-success-message/>--}}
    {{--        <!-- component -->--}}

    {{--        <div--}}
    {{--            style="width: 1000px;height:100%"--}}
    {{--            class=" bg-gray-100 flex flex-wrap justify-center h-full">--}}
    {{--            @foreach($books as $book)--}}
    {{--                <div style="height:400px; width: 200px ; margin-top: 15px;padding:10px"--}}
    {{--                     class=" rounded-xl overflow-hidden shadow-xl hover:scale-105 hover:shadow-2xl transform duration-500 cursor-pointer">--}}
    {{--                    <div>--}}
    {{--                        --}}{{--                                <span class="bg-red-500 py-2 px-4 text-sm font-semibold text-white rounded-full cursor-pointer">-30% Sale</span>--}}
    {{--                        <h1 class="mt-4 text-3xl font-bold hover:underline cursor-pointer">{{$book->title}}</h1>--}}
    {{--                        <p class="mt-2 font-sans text-gray-700">by Rolling Thunder</p>--}}
    {{--                    </div>--}}
    {{--                    <div class="relative">--}}
    {{--                        <img class="w-80"--}}
    {{--                             src="https://images.unsplash.com/photo-1571167530149-c1105da4c2c7?ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&ixlib=rb-1.2.1&auto=format&fit=crop&w=376&q=80"/>--}}
    {{--                    </div>--}}
    {{--                    <div--}}
    {{--                        style="text-align: center"--}}
    {{--                        class="align-middle">--}}
    {{--                        Price: ${{$book->price}}--}}
    {{--                    </div>--}}
    {{--                    <div class="justify-center flex">--}}
    {{--                        <x-button class="ml-4">--}}
    {{--                            {{ __('Add to basket') }}--}}
    {{--                        </x-button>--}}
    {{--                    </div>--}}
    {{--                </div>--}}

    {{--            @endforeach--}}


    {{--        </div>--}}
    {{--        <div class="p-4 items-end flex-1 ">--}}
    {{--            {{$books->links()}}--}}
    {{--        </div>--}}
    {{--    </div>--}}
</x-app-layout>
