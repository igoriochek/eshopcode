<div class="table table-responsive">
    <table class="table" id="categories">
        <thead>
        <tr>
            <th>Code</th>
            <th>Used</th>
            <th>Value</th>
            <th>Action</th>
        </tr>
        </thead>
        <tbody>
        @foreach($discountCoupons as $discountCoupon)
            <tr>
                <td>{{ $discountCoupon->code }}</td>
            <td>{{ $discountCoupon->used }}</td>
            <td>{{ $discountCoupon->value }}</td>
                <td width="120">
                    {!! Form::open(['route' => ['discountCoupons.destroy', $discountCoupon->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{{ route('discountCoupons.show', [$discountCoupon->id]) }}"
                           class='btn btn-default btn-xs'>
                            <i class="far fa-eye"></i>
                        </a>
                        <a href="{{ route('discountCoupons.edit', [$discountCoupon->id]) }}"
                           class='btn btn-default btn-xs'>
                            <i class="far fa-edit"></i>
                        </a>
                        {!! Form::button('<i class="far fa-trash-alt"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                    </div>
                    {!! Form::close() !!}
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
