<ul class="widget__categories--menu">
    @foreach($treeCategories as $category)
        <li class="widget__categories--menu__list p-2 my-4">
            <a class="widget__categories--sub__menu--link d-flex align-items-center justify-content-between pe-2"
               href="{{ route("innercategories", ["category_id" => $category->id ]) }}">
                <span class="widget__categories--sub__menu--text">
                    {{ $category->name }}
                </span>
                <span class="widget__categories--sub__menu--text product-count">
                    @if (request()->is('rootcategories'))
                        {{ '( '.count($category->products).' '.__('names.products').' )' }}
                    @else
                        {{ '('.count($category->products).')' }}
                    @endif
                </span>
            </a>
        </li>
        @if(count($category->innerCategories))
            @include('user_views.category.categoryTreeChildren', ['childs' => $category->innerCategories])
        @endif
    @endforeach
</ul>

@push('css')
    <style>
        .product-count {
            text-transform: lowercase;
        }
    </style>
@endpush


{{--@push('scripts')--}}
{{--    <script src="/js/treeview.js"></script>--}}
{{--@endpush--}}
