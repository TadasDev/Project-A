<x-app-layout>
    <x-slot name="header">

    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <!-- component -->
                    <x-validation-errors class="mb-4" :errors="$errors"/>
                    <x-success-message/>

                    <div class="flex w-full h-full justify-between">
                        <div class="w-3/4 h-full"    >
                        @if($book->images()->count()>0)
                            <img src="{{ asset('storage/' . $book->images()->first()->file_path) }}"
                                 alt=" Post image "
                                 class=" w-1/2 h-full object-center object-cover group-hover:opacity-75"/>
                        @else
                            <img

                                src="https://tailwindui.com/img/ecommerce-images/category-page-04-image-card-01.jpg"
                                alt="Tall slender porcelain bottle with natural clay textured body and cork stopper."
                                class=" text-center w-1/2 object-center object-cover group-hover:opacity-75">

                        @endif
                            </div>
                        <div class="flex-col w-full h-full text-center">
                            <div class="p-6 text-xl">
                                Book title: {{$book->title}}
                            </div>
                            <div class="p-6 text-xl">
                                Price: ${{$book->price}}
                            </div>
                            <div class="p-6 text-xl">
                                Description: {{$book->description}}
                            </div>
                        </div>

                    </div>
                    <div class="p-4">
                        <x-button class=" p-4">
                            {{ __('Add to basket') }}
                        </x-button>
                    </div>

                </div>


            {{--                    <form method="POST" action="{{  }}" enctype="multipart/form-data" class="w-3/4 container align-middle " >--}}
            @csrf

            <!-- Commnent -->
                <div class="mt-4 p-4">
                    <x-label for="Comment" :value="__('Comment')"/>

                    <x-input id="comment" class="block mt-1 w-full h-40" type="textarea" name="title" />
                </div>
                <div class="p-4">
                    <x-button class=" p-4">
                        {{ __('Add commnet') }}
                    </x-button>
                </div>
                {{--                    </form>--}}
            </div>
        </div>
    </div>
    </div>
</x-app-layout>
