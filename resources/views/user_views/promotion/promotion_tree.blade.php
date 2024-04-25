<ul>
    @foreach($promotions as $promotion)
        <li>
            <a href="{{ route("promotion", ["id" => $promotion->id] ) }}">
                {{ $promotion->name }} 
                <span>({{ count($promotion->products) }})</span>
            </a>
        </li>
    @endforeach
 </ul>