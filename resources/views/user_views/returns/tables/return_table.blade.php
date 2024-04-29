<table class="table">
    <thead>
       <tr>
          <th scope="col">{{ __('names.return').' ID' }}</th>
          <th scope="col">{{ __('table.status') }}</th>
          <th scope="col">{{ __('table.sum') }}</th>
          <th scope="col">{{ __('table.date') }}</th>
          <th scope="col"></th>
       </tr>
    </thead>
    <tbody>
      @forelse($returns as $return)
       <tr>
          <th scope="row">{{ $return->id }}</th>
          <td data-info="status">{{ __("status.".$return->status->name) }}</td>
          <td data-info="sum">€{{ number_format($return->sum, 2) }}</td>
          <td data-info="date">{{ $return->created_at->format('M d, Y') }}</td>
          <td>
              <a href="{{ route('viewreturn', [$return->id]) }}" class="tp-logout-btn">
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