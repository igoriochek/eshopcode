<ul class="work-process-list list-unstyled">
    @foreach($treeCategories as $category)
        <li>
            <a href="{{ route("innercategories", ["category_id" => $category->id ]) }}" 
                class="ps-0 {{ substr(url()->current(), -1) == "$category->id" ? 'active' : '' }}">
                @if (count($category->innerCategories))
                    <i class="fa-solid fa-angle-down pe-1"></i>
                @else
                    <i class="fa-solid fa-angle-right pe-1"></i>
                @endif
                {{ $category->name }}
                @if (request()->is('rootcategories'))
                    <span>({{ count($category->products) }})</span>
                @endif
            </a>
            @if (count($category->innerCategories))
                @include('user_views.category.category_tree_children', ['childs' => $category->innerCategories])
            @endif
        </li>
    @endforeach
 </ul>