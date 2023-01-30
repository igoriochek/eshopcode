<ul class="category-menu ps-4">
    @foreach($childs as $child)
        @if (count($child->products) > 0)
            <li class="category-nav-item">
                <a href="{{ route("innercategories", ["category_id" => $child->id ])}}"
                   class="nav-link {{ str_contains(url()->current(), "/innercategories/$child->id") ? 'active' : '' }}">
                    <span style="white-space: normal;">
                        {{ $child->name }}
                        ({{ count($child->products) }})
                    </span>
                </a>
            </li>
        @endif
        @if(count($child->innerCategories))
            @include('user_views.category.categoryTreeChildren', ['childs' => $child->innerCategories])
        @endif
    @endforeach
</ul>

