<div class="category-tree-widget-content">
    @foreach($categoryTree as $category)
        <li>
            <a class="{{ substr(url()->current(), -1) == "$category->id" ? 'active' : '' }}"
               href="{{ route("innercategories", ["category_id" => $category->id ]) }}">
                {{ $category->name }}
                ({{ count($category->products) }})
                <i class="fa-solid fa-chevron-right"></i>
            </a>
            <hr>
            @if(count($category->innerCategories))
                @include('user_views.category.category_tree_children', ['childs' => $category->innerCategories])
            @endif
        </li>
    @endforeach
</div>