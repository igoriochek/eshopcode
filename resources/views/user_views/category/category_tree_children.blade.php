<ul class="my-2 ms-2">
    @foreach($childs as $child)
        <li class="my-2">
            <a href="{{ route("innercategories", ["category_id" => $child->id ]) }}" 
                class="ps-0 {{ substr(url()->current(), -1) == "$child->id" ? 'active' : '' }}">
                @if (count($child->innerCategories))
                    <i class="fa-solid fa-angle-down pe-1"></i>
                @else
                    <i class="fa-solid fa-angle-right pe-1"></i>
                @endif
                {{ $child->name }} 
                @if (request()->is('rootcategories'))
                    <span>({{ count($child->products) }})</span>
                @endif
            </a>
            @if (count($child->innerCategories))
                @include('user_views.category.category_tree_children', ['childs' => $child->innerCategories])
            @endif
        </li>
    @endforeach
 </ul>