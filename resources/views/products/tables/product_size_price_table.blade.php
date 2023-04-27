<div class="table-responsive p-4">
    <table class="table pt-4 mb-4 fs-6" id="categories">
        <thead>
        <tr>
            <th>#</th>
            <th style="width: 50%">{{ __('names.name') }}</th>
            <th>{{ __('table.price') }}</th>
            <th>{{ __('table.created_at') }}</th>
            <th>{{ __('table.updated_at') }}</th>
            <th>{{ __('table.action') }}</th>
        </tr>
        </thead>
        <tbody>
        @forelse($product->sizesPrices as $productSizePrice)
            <tr>
                <td class="text-center">{{ $loop->index + 1 }}</td>
                <td>
                    @if ($productSizePrice->default)
                        {{ $productSizePrice->size->name.' ('.__('forms.default').')' }}
                    @else
                        {{ $productSizePrice->size->name }}
                    @endif
                </td>
                <td>€{{ number_format($productSizePrice->price, 2) }}</td>
                <td>{{ $productSizePrice->created_at }}</td>
                <td>{{ $productSizePrice->updated_at }}</td>
                <td width="100px" class="text-center">
                    <a href="{{ route('editProductSizePriceView', [$product->id, $productSizePrice->id]) }}" class='btn btn-danger px-2 py-1'>
                        <i class="far fa-edit"></i>
                    </a>
                </td>
            </tr>
        @empty
            <tr>
                <td class="text-muted" colspan="5">{{ __('names.noProductSizes') }}</td>
            </tr>
        @endforelse
        </tbody>
    </table>
</div>

@push('css')
    <style>
        .dataTables_length label {
            display: flex;
            align-items: center;
            gap: 5px
        }
    </style>
@endpush
