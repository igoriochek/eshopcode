<ul>
    @foreach($categoryTree as $category)
        <li>
            <a href="{{ route("innercategories", ["category_id" => $category->id ]) }}" class="w-100">
                {{ $category->name }}
            </a>
            <span class="count">
                {{ count($category->products) }}
            </span>
        </li>
        @if(count($category->innerCategories))
            @include('user_views.category.manageChild', ['childs' => $category->innerCategories])
        @endif
    @endforeach
</ul>
