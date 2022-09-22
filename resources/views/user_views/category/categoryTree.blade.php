<div class="box_style_cat">
    <ul id="cat_nav">
        @foreach($treeCategories as $category)
            @if (count($category->products) > 0)
                <li>
                    <a href="{{ route("innercategories", ["category_id" => $category->id ])}}" id="active">
                        <i class="icon-th-thumb-empty"></i>
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
</div>
