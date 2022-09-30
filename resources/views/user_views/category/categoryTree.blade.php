<ul class="category-tree nav nav-list flex-column mb-5">
    @foreach($treeCategories as $category)
        @if (count($category->products) > 0)
            <li class="nav-item">
                <a href="{{ route("innercategories", ["category_id" => $category->id ])}}"
                   class="nav-link {{ substr(url()->current(), -1) == "$category->id" ? 'active' : '' }}
                   {{ request()->is('user/rootcategories') || request()->is('rootcategories') ? 'fs-6 my-1' : '' }}">

                    {{ $category->name }}
                    ({{ count($category->products) }})
                </a>
            </li>
        @endif
            @if(count($category->innerCategories))
                @include('user_views.category.manageChild',['childs' => $category->innerCategories])
            @endif
    @endforeach
</ul>

