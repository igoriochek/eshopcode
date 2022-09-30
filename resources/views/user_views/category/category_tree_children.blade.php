<ul class="m-0 ps-4">
    @foreach($childs as $child)
        <li>
            <a class="{{ str_contains(url()->current(), "/innercategories/$child->id") ? 'active' : '' }}"
                href="{{ route("innercategories", ["category_id" => $child->id ])}}">
                {{ $child->name }}
                ({{ count($child->products) }})
                <i class="fa-solid fa-chevron-right"></i>
            </a>
            <hr>
            @if(count($child->innerCategories))
                @include('user_views.category.category_tree_children',['childs' => $child->innerCategories])
            @endif
        </li>
    @endforeach
</ul>
