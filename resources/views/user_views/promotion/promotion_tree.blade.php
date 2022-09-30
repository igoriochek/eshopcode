<div class="promotion-tree-widget-content">
    @foreach($promotions as $promotion)
        <li>
            <a class="promotion-link {{ substr(url()->current(), -1) == "$promotion->id" ? 'active' : '' }}"
               href="{{ route("promotion", ["id" => $promotion->id]) }}">
                {{ $promotion->name }}
                ({{ count($promotion->products) }})
                <i class="fa-solid fa-chevron-right"></i>
            </a>
            <hr>
        </li>
    @endforeach
</div>
