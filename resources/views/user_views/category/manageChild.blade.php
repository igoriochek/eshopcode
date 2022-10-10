@foreach($childs as $child)
    <li>
        <a href="{{ route("innercategories", ["category_id" => $child->id ]) }}" class="w-100">
            {{ $child->name }}
        </a>
        <span class="count">
            {{ count($child->products) }}
        </span>
        @if (count($child->innerCategories))
            @include('user_views.category.manageChild',['childs' => $child->innerCategories])
        @endif
    </li>
@endforeach
