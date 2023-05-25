<table class="table table-striped table-bordered mb-3" id="categories">
    <thead style="background: #e7e7e7;">
        <tr>
            <th>{{ __("names.product") }}</th>
            <th>{{ __('table.unavailableDate') }}</th>
            <th>{{ __('table.created_at') }}</th>
            {{-- <th>{{ __('table.updated_at') }}</th> --}}
            <th></th>
        </tr>
    </thead>
    <tbody>
        @forelse($unavailableDates as $unavailableDate)
            <tr>
                <td class="ps-3 text-start" width="300px">{{ $unavailableDate->unavailable_date->format('Y-m-d') }}</td>
                <td class="ps-3 text-start">{{ $unavailableDate->product->name }}</td>
                <td class="ps-3 text-start">{{ $unavailableDate->created_at ? $unavailableDate->created_at->format('Y-m-d H:m') : '-' }}</td>
                {{-- <td class="ps-3 text-start">{{ $unavailableDate->updated_at ? $unavailableDate->updated_at->format('Y-m-d H:m') : '-' }}</td> --}}
                <td class="text-start" width="120">
                    <div class='btn-group w-100 d-flex justify-content-center align-items-center'>
                        @include('unavailable_product_dates.forms.destroy_form')
                    </div>
                </td>
            </tr>
        @empty
            <tr>
                <td colspan="4" class="ps-3">{{__('names.noUnavailableDates')}}</td>
            </tr>
        @endforelse
    </tbody>
</table>