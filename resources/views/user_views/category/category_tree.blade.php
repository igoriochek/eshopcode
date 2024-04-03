<ul class="category-tree nav nav-list flex-column mb-5">
    @foreach($treeCategories as $category)
        <li>
            <a href="{{ route("innercategories", ["category_id" => $category->id ]) }}"
               class="{{ substr(url()->current(), -1) == "$category->id" ? 'active' : '' }}
               {{ request()->is('user/rootcategories') || request()->is('rootcategories') ? 'fs-6 my-1' : '' }}">
                @if (count($category->innerCategories))
                    <i class="fa-solid fa-angle-down pe-1"></i>
                @else
                    <i class="fa-solid fa-angle-right pe-1"></i>
                @endif
                {{ $category->name }}
                ({{ count($category->products) }})
            </a>
            @if (count($category->innerCategories))
                @include('user_views.category.category_tree_children', ['childs' => $category->innerCategories])
            @endif
        </li>
    @endforeach
</ul>