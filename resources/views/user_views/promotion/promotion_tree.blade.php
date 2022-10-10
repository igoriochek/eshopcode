<ul>
    @foreach($promotions as $promotion)
        <li>
            <a href="{{ route("promotion", ["id" => $promotion->id] ) }}" class="w-100">
                {{ $promotion->name ?? __('names.promotion') }}
            </a>
            <span class="count">
                {{ count($promotion->products) }}
            </span>
        </li>
    @endforeach
</ul>
