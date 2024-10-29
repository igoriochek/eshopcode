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

<style>
    ul li {
        margin-bottom: 5px;
        padding-bottom: 0px;
    }

    a {
        color: #253237 !important;
    }

    a {

        &:hover,
        &:focus {
            color: #0090f0 !important;
        }
    }
</style>