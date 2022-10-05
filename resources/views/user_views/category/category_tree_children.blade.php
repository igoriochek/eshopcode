<ul class="m-0 ps-4">
    @foreach($childs as $child)
        @if (count($child->products)>0)
        <li>
            <a class="{{ str_contains(url()->current(), "/innercategories/$child->id") ? 'active' : '' }}"
                href="{{ route("innercategories", ["category_id" => $child->id ])}}">
                {{ $child->name }}
                ({{ count($child->products) }})
                <i class="fa-solid fa-chevron-right"></i>
            </a>
            <hr>
        </li>
        @endif
            @if(count($child->innerCategories))
                @include('user_views.category.category_tree_children',['childs' => $child->innerCategories])
            @endif
    @endforeach
</ul>
