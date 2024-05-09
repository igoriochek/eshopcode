<ul>
    @foreach($childs as $child)
        <li class="ms-2 my-3">
            <a href="{{ route("innercategories", ["category_id" => $child->id ])}}"
               class="{{ str_contains(url()->current(), "/innercategories/$child->id") ? 'active' : '' }}
               {{ request()->is('user/rootcategories') || request()->is('rootcategories') ? 'fs-6 my-1' : '' }}">
                @if (count($child->innerCategories))
                    <i class="fa-solid fa-angle-down pe-1"></i>
                @else
                    <i class="fa-solid fa-angle-right pe-1"></i>
                @endif
                {{ $child->name }}
                ({{ count($child->products) }})
            </a>
            @if (count($child->innerCategories))
                @include('user_views.category.category_tree_children', ['childs' => $child->innerCategories])
            @endif
        </li>
    @endforeach
</ul>