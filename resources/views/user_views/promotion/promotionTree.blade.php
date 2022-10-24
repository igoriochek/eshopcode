<ul class="promotion-menu">
    @foreach($promotions as $promotion)
        <li class="promotion-nav-item">
            <a href="{{ route("promotion", ["id" => $promotion->id] ) }}"
               class="nav-link {{ substr(url()->current(), -1) == "$promotion->id" ? 'active' : '' }}">
                <span>
                {{ $promotion->name }}
                ({{ count($promotion->products) }})
                     </span>
            </a>
        </li>
    @endforeach
</ul>

@push('css')
    <style>

        .promotion-menu
        {
            padding: 0;
        }

        .promotion-menu > li > a {
            padding: 20px;
            font-size: 14px;
            font-weight: 500;
            line-height: 1.6;
            color: inherit;
            display: block;
            position: relative;
        }
        .promotion-menu > li > a span::before {
            content: "";
            position: absolute;
            left: auto;
            right: 0;
            bottom: 0;
            height: 2px;
            width: 0;
            background: currentColor;
            transition: all 0.25s cubic-bezier(0.645, 0.045, 0.355, 1);
        }
        .promotion-menu > li:hover > a span::before {
            width: 100%;
            background-color: #0071dc;
            left: 0;
            right: auto;
        }

        .promotion-nav-item
        {
            transition: background 0.1s;
            border-bottom: 1px solid rgba(0, 0, 0, 0.06);
            display: block;
            text-decoration: none;
            line-height: 20px;
        }

    </style>
@endpush
