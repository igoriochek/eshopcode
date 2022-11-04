<div class="account__table--area">
    <table class="account__table">
        <thead class="account__table--header">
        <tr class="account__table--header__child">
            <th class="account__table--header__child--items text-center">{{__('table.date')}}</th>
            <th class="account__table--header__child--items text-center">{{__('table.action')}}</th>
        </tr>
        </thead>
        <tbody class="account__table--body mobile__none">
            @foreach($logs as $log)
                <tr class="account__table--body__child">
                    <td class="account__table--body__child--items text-center">{{$log->created_at}}</td>
                    <td class="account__table--body__child--items text-center">{{$log->activity}}</td>
                </tr>
            @endforeach
        </tbody>
        <tbody class="account__table--body mobile__block">
            @foreach($logs as $log)
                <tr class="account__table--body__child">
                    <td class="account__table--body__child--items">
                        <strong>{{__('table.date')}}</strong>
                        <span>{{$log->created_at}}</span>
                    </td>
                    <td class="account__table--body__child--items">
                        <strong>{{__('table.action')}}</strong>
                        <span>{{$log->activity}}</span>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
