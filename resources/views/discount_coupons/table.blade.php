<div class="table-responsive">
    <table class="table" id="categories">
        <thead>
        <tr>
            <th>{{__('table.code')}}</th>
            <th>{{__('table.used')}}</th>
            <th>{{__('table.user')}}</th>
            <th>{{__('table.value')}}</th>
            <th>{{__('table.action')}}</th>
        </tr>
        </thead>
        <tbody>
        @foreach($discountCoupons as $discountCoupon)
            <tr>
                <td>{{ $discountCoupon->code }}</td>

            <td>{{ $discountCoupon->used }}</td>
            <td>{{ $discountCoupon->user->name ?? '-' }}</td></td>
            <td>{{ $discountCoupon->value }}</td>
                <td width="120">
                    {!! Form::open(['route' => ['discountCoupons.destroy', $discountCoupon->id], 'method' => 'delete']) !!}
                    <div class='btn-group button-container'>
                        <a href="{{ route('discountCoupons.show', [$discountCoupon->id]) }}"
                           class='btn btn-default btn-xs'>
                            <i class="far fa-eye" style="font-size: 20px;"></i>
                        </a>
                        <a href="{{ route('discountCoupons.edit', [$discountCoupon->id]) }}"
                           class='btn btn-default btn-xs'>
                            <i class="far fa-edit" style="font-size: 20px;"></i>
                        </a>
                        {!! Form::button('<i class="far fa-trash-alt"></i>', ['type' => 'submit', 'class' => 'btn btn-danger', 'onclick' => "return confirm('Are you sure?')"]) !!}
                    </div>
                    {!! Form::close() !!}
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>

@push('css')
    <style>
        .button-container {
            display: flex;
            justify-content: space-around;
            align-items: center;
        }
        .button-container a,
        .button-container button {
            display: flex;
            align-items: center;
            justify-content: center;
            width: 30px;
            height: 30px;
        }
        .table.dataTable thead th {
            padding: 10px 10px;
        }
        .button-container .btn {
            flex-grow: 1;
            width: 100%;
        }
    </style>
@endpush