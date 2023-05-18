<div class="table-responsive p-4">
    <table class="table pt-4 mb-4 fs-6" id="categories">
        <thead>
            <tr>
                <th>#</th>
                <th style="width: 30%">{{ __('names.name') }}</th>
                <th>{{ __('table.color') }}</th>
                <th>{{ __('table.created_at') }}</th>
                <th>{{ __('table.updated_at') }}</th>
                <th>{{ __('table.action') }}</th>
            </tr>
        </thead>
        <tbody>
            @forelse($productSauces as $productSauce)
                <tr>
                    <td class="text-center">{{ $loop->index + 1 }}</td>
                    <td>
                        @if ($productSauce->default)
                            {{ $productSauce->name.' ('.__('forms.default').')' }}
                        @else
                            {{ $productSauce->name }}
                        @endif
                    </td>
                    <td>
                        <div class="d-flex align-items-center gap-2">
                            <div style="height: 17px; width: 17px; border-radius: 9px; background: {{ $productSauce->color }}"></div>
                            {{ $productSauce->color }}
                        </div>
                    </td>
                    <td>{{ $productSauce->created_at }}</td>
                    <td>{{ $productSauce->updated_at }}</td>
                    <td width="100px">
                        {!! Form::open(['route' => ['productSauce.destroy', $productSauce->id], 'method' => 'delete']) !!}
                            <div class="d-flex justify-content-center align-items-center gap-2">
                                <a href="{{ route('productSauce.edit', $productSauce->id) }}" class='btn btn-danger px-2 py-1'>
                                    <i class="far fa-edit"></i>
                                </a>
                                <button type="submit" class="btn btn-danger border-0 px-2 py-1 rounded-3"
                                    onclick="return confirm('{{ __('names.areYouSureDeleteProductSauce') }}')">
                                    <i class="far fa-trash-alt"></i>
                                </button>
                            </div>
                        {!! Form::close() !!}
                    </td>
                </tr>
            @empty
                <tr>
                    <td class="text-muted" colspan="6">{{ __('names.noProductSauces') }}</td>
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


