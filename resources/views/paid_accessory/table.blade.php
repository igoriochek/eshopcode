<div class="table table-responsive">
    <table class="table" id="categories">
        <thead>
        <tr>
            <th>{{__('table.name')}}</th>
            <th>{{__('table.price')}}</th>
        </tr>
        </thead>
        <tbody>
        @foreach($paidAccessory as $paidAccess)
            <tr>
                <td>{{ $paidAccess->name }}</td>
                <td>{{ $paidAccess->price }}</td>
                <td width="120">
                    <div class='btn-group'>
                        <a href="#"
                           class='btn btn-default btn-xs'>
                            <i class="far fa-eye"></i>
                        </a>
                        <a href="#"
                           class='btn btn-default btn-xs'>
                            <i class="far fa-edit"></i>
                        </a>
                    </div>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
