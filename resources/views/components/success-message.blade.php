
@if (session('message'))
    <div {{ $attributes }} style="background:#aac986  " class="rounded px-3 py-3">
        <div class="font-medium text-green-600">
            {{ __('Success') }}
        </div>
        <ul class="mt-3 list-disc list-inside text-sm text-green-600">
         {{session('message')}}
        </ul>
    </div>
@endif
