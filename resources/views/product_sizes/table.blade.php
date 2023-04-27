<div class="table-responsive p-4">
    <table class="table pt-4 mb-4 fs-6" id="categories">
        <thead>
            <tr>
                <th>#</th>
                <th style="width: 50%">{{ __('names.name') }}</th>
                <th>{{ __('table.created_at') }}</th>
                <th>{{ __('table.updated_at') }}</th>
                <th>{{ __('table.action') }}</th>
            </tr>
        </thead>
        <tbody>
            @forelse($productSizes as $productSize)
                <tr>
                    <td class="text-center">{{ $loop->index + 1 }}</td>
                    <td>
                        @if ($productSize->default)
                            {{ $productSize->name.' ('.__('forms.default').')' }}
                        @else
                            {{ $productSize->name }}
                        @endif
                    </td>
                    <td>{{ $productSize->created_at }}</td>
                    <td>{{ $productSize->updated_at }}</td>
                    <td width="100px">
                        @include('product_sizes.forms.destroy_form')
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
