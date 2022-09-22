<div class="box_style_cat" id="promotions_box">
    <ul id="cat_nav">
        @foreach($promotions as $promotion)
            @if (count($promotion->products)>0)
                <li>
                    <a href="{{$promotion->id}}" class="active">
                        <i class="icon-th-thumb-empty"></i>
                        {{$promotion->name}}
                        ({{count($promotion->products)}})
                    </a>
                </li>
            @endif
        @endforeach
    </ul>
</div>
