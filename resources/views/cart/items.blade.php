<x-app-layout>
    <x-slot name="header">
        <div class="w-full flex flex-wrap w-full">
            <h2 class=" font-semibold text-xl text-gray-800 leading-tight w-1/12 flex items-center">
                {{ __('Your Items ') }}
            </h2>
        </div>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <x-success-message/>
                    <!-- component -->
                    <div class="px-3 py-4 flex justify-center">
                        @if($items)
                            <table class="w-full text-md bg-white shadow-md rounded mb-4 ">
                                <tbody>
                                <tr class="border-b">
                                    <th class="text-left p-3 px-5">Book</th>
                                    <th class="text-left p-3 px-5">Title</th>
                                    <th class="text-left p-3 px-5">Price</th>
                                    <th class="text-left p-3 px-5">Quantity</th>
                                </tr>
                                @foreach($items as $item)
                                    <tr class="border-b hover:bg-orange-100 bg-gray-100">
                                        <td class="p-5">
                                            <div
                                                class=" rounded-lg  overflow-hidden xl:aspect-w-7 xl:aspect-h-8">
                                                <a href="{{ route('cart.show',$item['book']->id ) }}">
                                                    @if($item['book']->images()->count() > 0 )
                                                        <img
                                                            src="{{ asset('storage/' . $item['book']->images()->first()->file_path)}}"
                                                            alt=" Post image "
                                                            style="height: 100px;width: 100px"
                                                            class="h-24 w-32 rounded-lg object-contain  group-hover:opacity-75"/>
                                                    @else
                                                        <img
                                                            src="https://tailwindui.com/img/ecommerce-images/category-page-04-image-card-01.jpg"
                                                            alt="Tall slender porcelain bottle with natural clay textured body and cork stopper."
                                                            style="height: 100px;width: 100px"
                                                            class=" h-24 w-32 rounded-lg object-contain  group-hover:opacity-75">
                                                @endif
                                            </div>
                                        </td>
                                        <td class="p-5">{{$item['book']->title}}</td>
                                        <td class="p-5">${{$item['book']->price}}</td>
                                        <td class="p-5">
                                            <a href="{{route('cart.addQuantity',['id'=>$item['book']->id])}}">
                                                <button class="border p-1 m-2 rounded-lg">
                                                    +
                                                </button>
                                            </a>
                                            {{$item['quantity']}}
                                            <a href="{{route('cart.removeQuantity',['id'=>$item['book']->id])}}">
                                                <button class="border p-1 m-2 rounded-lg">
                                                    -
                                                </button>
                                            </a>

                                        </td>
                                        <td class="p-5">
                                            <form method="POST"
                                                  action="{{route('cart.destroy',['id'=>$item['book']->id])}}">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit"
                                                        class="text-sm bg-red-500 hover:bg-red-700 text-white py-2 px-4 rounded focus:outline-none focus:shadow-outline">
                                                    Remove
                                                </button>
                                            </form>
                                        </td>
                                        @endforeach
                                    </tr>
                                    @else
                                        <tr>
                                            No items in a Basket
                                        </tr>
                                    @endif
                                </tbody>
                            </table>

                    </div>
                    @if(session()->get('total')>0)
                        <div class="flex justify-end text-xl flex-wrap p-3">
                            <div class="px-5">
                                <x-button>Purchase</x-button>
                            </div>
                            ${{session()->get('total')}}
                        </div>

                    @endif
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
