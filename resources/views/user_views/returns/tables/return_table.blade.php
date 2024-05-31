<table class="table table-bordered table-hover">
    <tbody>
        <tr>
            <th>{{ __('names.return') . ' ID' }}</th>
            <th>{{ __('table.status') }}</th>
            <th>{{ __('table.sum') }}</th>
            <th>{{ __('table.date') }}</th>
            <th></th>
        </tr>
        @forelse($returns as $return)
            <tr>
                <td>{{ $return->id }}</td>
                <td>{{ __('status.' . $return->status->name) }}</td>
                <td>€{{ number_format($return->sum, 2) }}</td>
                <td>{{ $return->created_at->format('M d, Y') }}</td>
                <td>
                    <a href="{{ route('viewreturn', [$return->id]) }}" class="btn btn-dark btn-primary-hover">
                        {{ __('buttons.view') }}
                    </a>
                </td>
            </tr>
        @empty
            <tr>
                <td class="text-muted" colspan="5">
                    {{ __('names.noReturns') }}
                </td>
            </tr>
        @endforelse
    </tbody>
</table>
