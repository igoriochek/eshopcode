<ul class="mb-0">
    @foreach($childs as $child)
        <li>
            <a href="{{ route("innercategories", ["category_id" => $child->id ])}}">
                {{ $child->name }}
            </a>
            <span>({{ count($child->products) }})</span>
            @if(count($child->innerCategories))
                <i class="fa-solid fa-caret-down text-muted"></i>
                @include('user_views.category.manageChild',['childs' => $child->innerCategories])
            @endif
        </li>
    @endforeach
</ul>
