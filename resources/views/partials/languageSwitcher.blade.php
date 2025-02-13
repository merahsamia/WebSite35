<div class="language-switcher">
    @foreach($available_locales as $locale_name => $available_locale)
        @if($available_locale !== $current_locale)
            <a href="{{ route('localization', $available_locale) }}" class="language-btn">
                {{ strtoupper($available_locale) }}
            </a>
        @endif
    @endforeach
</div>

<style>
    .language-switcher {
        position: fixed;
        bottom: 70px;
        right: 15px;
        display: flex;
        flex-direction: column;
        gap: 10px;
    }

    .language-btn {
        width: 50px;
        height: 50px;
        background-color: #ffc451; /* Jaune */
        color: black;
        font-weight: bold;
        text-align: center;
        line-height: 50px;
        border-radius: 50%;
        text-decoration: none;
        box-shadow: 0px 4px 6px rgba(0, 0, 0, 0.2);
        transition: background 0.3s, transform 0.2s;
    }

    .language-btn:hover {
        background-color: #ffc451; /* Jaune plus foncé au survol */
        transform: scale(1.1);
    }
</style>
