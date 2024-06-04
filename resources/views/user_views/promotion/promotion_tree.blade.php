<ul class="my-2">
    @foreach($promotions as $promotion)
        <li class="my-2">
            <a href="{{ route("promotion", ["id" => $promotion->id] ) }}">
                {{ $promotion->name }} 
                <span>({{ count($promotion->products) }})</span>
            </a>
        </li>
    @endforeach
 </ul>