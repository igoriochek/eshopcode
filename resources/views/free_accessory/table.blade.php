<div class="table table-responsive">
    <table class="table" id="categories">
        <thead>
        <tr>
            <th>{{__('table.name')}}</th>
            <th>{{__('table.product_id')}}</th>
        </tr>
        </thead>
        <tbody>
        @foreach($freeAccessory as $freeAccess)
            <tr>
                <td>{{ $freeAccess->name }}</td>
                <td>{{ $freeAccess->product_id }}</td>
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
