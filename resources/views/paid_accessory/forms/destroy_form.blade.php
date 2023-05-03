{!! Form::open(['route' => ['paidAccessory.destroy', $paidAccessory->id], 'method' => 'delete']) !!}
    <div class="d-flex justify-content-center align-items-center gap-2">
        <a href="{{ route('paidAccessory.edit', $paidAccessory->id) }}" class='btn btn-danger px-2 py-1'>
            <i class="far fa-edit"></i>
        </a>
        <button type="submit" class="btn btn-danger border-0 px-2 py-1 rounded-3"
                onclick="return confirm('{{ __('names.areYouSureDeletePaidAccessory') }}')">
            <i class="far fa-trash-alt"></i>
        </button>
    </div>
{!! Form::close() !!}
