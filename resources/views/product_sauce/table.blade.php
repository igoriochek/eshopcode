<div class="table table-responsive">
    <table class="table" id="categories">
        <thead>
        <tr>
            <th>{{__('table.name')}}</th>
            <th>{{__('table.color')}}</th>
            <th>{{__('table.default')}}</th>
        </tr>
        </thead>
        <tbody>
        @foreach($productSauce as $prodSauce)
            <tr>
                <td>{{ $prodSauce->name }}</td>
                <td>{{ $prodSauce->color }}</td>
                <td>{{ $prodSauce->default }}</td>
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
