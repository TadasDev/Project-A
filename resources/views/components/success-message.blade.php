
@if (session('message'))
    <div {{ $attributes }}
         style="background: #b8ee85"
         class="rounded m-2 p-1 ">
        <div class="font-medium text-green-600 ">
            {{ __('Success') }}
        </div>
        <ul class="mt-3 list-disc list-inside text-sm text-green-600">
         {{session('message')}}
        </ul>
    </div>
@endif
