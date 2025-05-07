<li class="{{ request()->routeIs($route) ? 'current-list-item' : '' }}">
    <a href="{{ route($route) }}">{{ $label }}</a>
</li>
