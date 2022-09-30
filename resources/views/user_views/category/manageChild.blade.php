<ul style="list-style-type: none;">
    @foreach($childs as $child)
        @if (count($child->products) > 0)
        <li class="nav-item">
            <a href="{{ route("innercategories", ["category_id" => $child->id ])}}"
               class="nav-link {{ str_contains(url()->current(), "/innercategories/$child->id") ? 'active' : '' }}
               {{ request()->is('user/rootcategories') || request()->is('rootcategories') ? 'fs-6 my-1' : '' }}">
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
