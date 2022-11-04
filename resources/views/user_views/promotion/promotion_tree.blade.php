<ul class="widget__categories--menu">
    @foreach($promotions as $promotion)
        <li class="widget__categories--menu__list p-2 my-4">
            <a class="widget__categories--sub__menu--link d-flex align-items-center justify-content-between pe-2
                {{ substr(url()->current(), -1) == "$promotion->id" ? 'active' : '' }}"
                href="{{ route("promotion", ["id" => $promotion->id] ) }}">
                <span class="widget__categories--sub__menu--text">
                    {{ $promotion->name }}
                </span>
                <span class="widget__categories--sub__menu--text">
                    ({{ count($promotion->products) }})
                </span>
            </a>
        </li>
    @endforeach
</ul>

@push('css')
    <style>
        .widget__categories--sub__menu--link .active {
            color: var(--secondary-color);
        }
    </style>
@endpush
