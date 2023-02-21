<ul class="category-menu ps-0">
    @foreach($treeCategories as $category)
        <li class="category-nav-item">
            <a href="{{ route("innercategories", ["category_id" => $category->id ]) }}"
               class="nav-link {{ substr(url()->current(), -1) == "$category->id" ? 'active' : '' }}">
                    <span style="white-space: normal;">
                        {{ $category->name }}
                        ({{ count($category->products) }})
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

        .category-menu > li > a {
            padding: 20px 10px;
            font-size: 14px;
            font-weight: 500;
            line-height: 1.6;
            color: inherit;
            position: relative;
        }
        .category-menu > li > a span::before {
            content: "";
            position: absolute;
            left: auto;
            right: 0;
            bottom: 0;
            height: 2px;
            width: 0;
            background: currentColor;
            transition: all 0.25s cubic-bezier(0.645, 0.045, 0.355, 1);
        }
        .category-menu > li:hover > a span::before {
            width: 100%;
            background-color: #4486bd;
        }

        .category-nav-item
        {
            transition: background 0.1s;
            border-bottom: 1px solid rgba(0, 0, 0, 0.06);
            display: block;
            text-decoration: none;
            line-height: 20px;
        }

    </style>
@endpush
