<ul>
    @foreach ($promotions as $promotion)
    <li>
        <a href="{{ route('promotion', ['id' => $promotion->id]) }}"
            class="promotion-link {{ substr(url()->current(), -1) == "$promotion->id" ? 'active' : '' }}">
            <i class="fa-solid fa-angle-right pe-1"></i>
            {{ $promotion->name }}
            ({{ count($promotion->products) }})
        </a>
    </li>
    @endforeach
</ul>