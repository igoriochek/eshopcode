{!! Form::open(['route' => ['unavailable_product_dates.destroy', $unavailableDate->id], 'method' => 'delete']) !!}
    <div class='btn-group'>
        <button type="submit" class="btn btn-danger btn-xs fs-6" onclick="return confirm('{{ __('names.areYouSureDeleteUnavailableProductDate') }}')">
            <i class="far fa-trash-alt"></i>
        </button>
    </div>
{!! Form::close() !!}