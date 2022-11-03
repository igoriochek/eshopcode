<ul class="widget__categories--menu ms-4">
    @foreach($childs as $child)
        <li class="widget__categories--menu__list p-2 my-4">
            <a class="widget__categories--sub__menu--link d-flex align-items-center justify-content-between pe-2"
               href="{{ route("innercategories", ["category_id" => $child->id ])}}">
                <span class="widget__categories--sub__menu--text">
                    {{ $child->name }}
                </span>
                <span class="widget__categories--sub__menu--text product-count">
                    @if (request()->is('rootcategories'))
                        {{ '( '.count($child->products).' '.__('names.products').' )' }}
                    @else
                        {{ '('.count($child->products).')' }}
                    @endif
                </span>
            </a>
        </li>
        @if(count($child->innerCategories))
            @include('user_views.category.categoryTreeChildren', ['childs' => $child->innerCategories])
        @endif
    @endforeach
</ul>
