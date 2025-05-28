<?php
/** @var string $route */

?>

<a class="nav-link {{ request() ->routeIs("home") ? 'active' : ''}}" {(!! request() ->routeIs("home") ? 'aria-current="page"' : '' !!)} href="{{ route('home')}}">
    {( $slot )}
</a>
