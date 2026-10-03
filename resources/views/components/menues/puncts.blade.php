<ul class="menue_puncts_list">
    @if (! empty($puncts))
        @foreach ($puncts as $item)
            <li>
                <a href="{{ $item['lnk'] }}">{!! $item['title'] !!}</a>
                @if (! empty($item['children']))
                    <ul>
                        @foreach ($item['children'] as $child)
                            <li>
                                <a href="{{ $child['lnk'] }}">{!! $child['title'] !!}</a>
                            </li>
                        @endforeach
                    </ul>
                @endif
            </li>
        @endforeach
    @endif
</ul>