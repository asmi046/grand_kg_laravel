@props([
    'title' => '',
    'open' => false,
])

<details class="details" @if($open) open @endif>
    <summary>{{ $title }}</summary>
    <div class="details-content">
        {{ $slot }}
    </div>
</details>
