<ul class="dropdown dropdown-menu">
        @foreach($available_locales as $locale_name => $available_locale)
    <li>
            @if($available_locale === $current_locale)
                <span class="ml-2 mr-2 text-gray-700">{{ $locale_name }}</span>
            @else
                <a class="ml-1 underline ml-2 mr-2" href="language/{{ $available_locale }}">
                    {{ $locale_name }}
                </a>
            @endif
    </li>
        @endforeach
</ul>