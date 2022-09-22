<ul id="cat_nav">
    @foreach($childs as $child)
        @if (count($child->products) > 0)
            <li>
                <a href="{{ route("innercategories", ["category_id" => $child->id ])}}" id="active">
                    <i class="icon-th-thumb-empty"></i>
                    {{ $child->name }}
                    ({{ count($child->products) }})
                </a>
                @if(count($child->innerCategories))
                    @include('user_views.category.manageChild',['childs' => $child->innerCategories])
                @endif
            </li>
        @endif
    @endforeach
</ul>
