<div class="table-responsive p-4">
    <table class="table pt-4 mb-4 fs-6" id="categories">
        <thead>
            <tr>
                <th>#</th>
                <th style="width: 50%">{{ __('names.name') }}</th>
                <th>{{ __('names.price') }}</th>
                <th>{{ __('table.created_at') }}</th>
                <th>{{ __('table.updated_at') }}</th>
                <th>{{ __('table.action') }}</th>
            </tr>
        </thead>
        <tbody>
            @forelse($paidAccessories as $paidAccessory)
                <tr>
                    <td class="text-center">{{ $loop->index + 1 }}</td>
                    <td>{{ $paidAccessory->name }}</td>
                    <td>€{{ number_format($paidAccessory->price, 2) }}
                    <td>{{ $paidAccessory->created_at }}</td>
                    <td>{{ $paidAccessory->updated_at }}</td>
                    <td width="100px">
                        @include('paid_accessory.forms.destroy_form')
                    </td>
                </tr>
            @empty
                <tr>
                    <td class="text-muted" colspan="6">{{ __('names.noPaidAccessories') }}</td>
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

