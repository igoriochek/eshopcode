<ul>
    @foreach ($promotions as $promotion)
        <li>
            <a href="{{ route('promotion', ['id' => $promotion->id]) }}"
                class="promotion-link {{ substr(url()->current(), -1) == "$promotion->id" ? 'active' : '' }}">
                <span class="pe-2">▪</span>
                {{ $promotion->name }}
                ({{ count($promotion->products) }})
            </a>
        </li>
    @endforeach
</ul>

<style>
    .promotion-link {
        color: gray;
        font-weight: 500;
        transition: color 300ms ease;

        &:hover,
        &:focus {
            color: #3577f0;
        }
    }

    .active {
        font-weight: bold;
    }
</style>
