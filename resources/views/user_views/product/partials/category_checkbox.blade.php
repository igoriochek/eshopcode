<li class="category-item">
    <input class="input-checkbox" type="checkbox" id="category.{{ $category->id }}"
           value="{{ $category->id }}" onclick="calc();"
           @if (isset($selCategories) && in_array($category->id, $selCategories)) checked="checked" @endif>
    <label class="label-checkbox mb-0" for="category.{{ $category->id }}">
        {{ $category->name }}
    </label>
    @if(!empty($category->children))
        <ul class="widgets-checkbox nested-category">
            @foreach($category->children as $child)
                @include('user_views.product.partials.category_checkbox', [
                    'category' => $child,
                    'selCategories' => $selCategories,
                    'filter' => $filter
                ])
            @endforeach
        </ul>
    @endif
</li>
<style>
    .widgets-checkbox {
        list-style: none;
        padding-left: 0;
    }
    
    .nested-category {
        padding-left: 20px !important;
        margin-top: 20px;
    }
    
    .category-item {
        margin-bottom: 8px;
    }
    
    .btn-custom-size.lg-size {
        width: auto;
        padding: 0px 15px;
    }
</style>