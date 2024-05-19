<div class="table-responsive">
    <table class="table" id="categories">
        <thead>
        <tr>
            <th>{{__('table.name')}}</th>
        <th>{{__('table.price')}}</th>
        <th>{{__('table.count')}}</th>
        <th>{{__('table.description')}}</th>
        <th>{{__('table.image')}}</th>
        <th>{{__('table.video')}}</th>
            <th>{{__('table.visible')}}</th>
            <th>{{__('table.promotionId')}}</th>
            <th>{{__('table.discountId')}}</th>
            <th>{{__('table.categories')}}</th>
            <th>{{__('table.action')}}</th>
        </tr>
        </thead>
        <tbody>
        @foreach($products as $product)
            <tr>
                <td>{{ $product->name }}</td>
            <td>{{ $product->price }}</td>
            <td>{{ $product->count }}</td>
            <td>{{ $product->description }}</td>
            <td>{{ $product->image }}</td>
            <td>{{ $product->video }}</td>
            <td>{{ $product->visible }}</td>
            <td>{{ $product->promotion_id }}</td>
            <td>{{ $product->discount_id }}</td>
            <td>
                @if( $product->categories != null )
                    @foreach($product->categories as $c)
                        {{$c->id}}&nbsp;
                    @endforeach
                @else
                    ---
                @endif

            </td>
                <td width="120">
                    {!! Form::open(['route' => ['products.destroy', $product->id], 'method' => 'delete']) !!}
                    <div class='btn-group button-container'>
                        <a href="{{ route('products.show', [$product->id]) }}"
                            class='btn btn-default btn-xs'>
                            <i class="far fa-eye" style="font-size: 20px;"></i>
                        </a>
                        <a href="{{ route('products.edit', [$product->id]) }}"
                            class='btn btn-default btn-xs'>
                            <i class="far fa-edit" style="font-size: 20px;"></i>
                        </a>
                        {!! Form::button('<i class="far fa-trash-alt"></i>', ['type' => 'submit', 'class' => 'btn btn-danger', 'style' => 'font-size: 20px;', 'onclick' => "return confirm('Are you sure?')"]) !!}
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