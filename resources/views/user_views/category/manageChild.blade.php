<ul>
    @foreach($childs as $child)

        <li>

            <a href="{{ route("innercategories", ["category_id" => $child->id ])}}">  {{ $child->name }} </a> ( {{ count($child->products) }} )

            @if(count($child->innerCategories))

                @include('user_views.category.manageChild',['childs' => $child->innerCategories])

            @endif

        </li>

    @endforeach

</ul>
