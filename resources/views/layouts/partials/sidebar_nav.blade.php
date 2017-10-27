<?php
    $menu = [
        [
            'title' => 'Dashboard',
            'menu_id' => 'dashboard',
            'icon' => 'ti-panel',
            'link' => route('dashboard')
        ], [
            'title' => 'Requetes',
            'menu_id' => 'requests',
            'icon' => 'ti-server',
            'link' => route('requests.index')
        ], [
            'title' => 'Reservations',
            'menu_id' => 'reservations',
            'icon' => 'ti-book',
            'link' => route('reservations.index')
        ], [
            'title' => 'Occupations',
            'menu_id' => 'occupations',
            'icon' => 'ti-pin-alt',
            'link' => route('occupations.index')
        ], [
            'title' => 'Chambres',
            'menu_id' => 'rooms',
            'icon' => 'ti-home',
            'link' => route('rooms.index')
        ], [
            'title' => 'Utilisateurs',
            'menu_id' => 'users',
            'icon' => 'ti-user',
            'link' => route('users.index')
        ]
    ];
?>

<ul class="nav">
@foreach($menu as $item)
    <li class="{{ ($item['menu_id'] == $menu_id) ? 'active':'' }}">
        <a href="{{ $item['link'] }}">
            <i class="{{ $item['icon'] }}"></i>
            <p>{{ $item['title'] }}</p>
        </a>
    </li>
@endforeach
</ul>