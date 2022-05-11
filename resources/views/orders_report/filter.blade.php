<div class="card-body">
    <div class="row">
        <div class="form-group col-sm-2">
            <label for="id">Order ID:</label>
            <input type="number" name="id" class="form-control"/>
        </div>
        <div class="form-group col-sm-2">
            <label for="user.name">User:</label>
            <input type="text" name="user.name" class="form-control"/>
        </div>            
        <div class="form-group col-sm-2">
            <label for="status.name">Status:</label>
            <select name="status.name" class="form-control">
                <option></option>
                <option value="Draft">Draft</option>
                <option value="New">New</option>
                <option value="Waiting">Waiting</option>
                <option value="Shipped">Shipped</option>
                <option value="Canceled">Canceled</option>
            </select>
        </div>  
        <div class="form-group col-sm-3">
            <label for="date_from">Date from:</label>
            <input type="datetime-local" name="date_from" class="form-control"/>
        </div>
        <div class="form-group col-sm-3">
            <label for="date_to">Date to:</label>
            <input type="datetime-local" name="date_to" class="form-control"/>
        </div>
    </div>
</div>
<div class="card-footer">
    <button type="button" class="btn btn-primary" onclick="filter()">Filter</button>
    <button type="reset" class="btn btn-secondary" onclick="document.location='{{ route('orders_report.index') }}'">
        Clear
    </button>
    <div class="float-end">
        <button type="button" class="btn btn-secondary" onclick="getReport('/download_pdf')">
            Download PDF
        </button>
        <button type="button" class="btn btn-secondary" onclick="getReport('/download_csv')">
            Download CSV
        </button>
        <button type="button" class="btn btn-secondary" onclick="getReport('/email')">
            Send Email
        </button>
    </div>
</div>

@push('scripts')
    <script> 
        const elements = document.querySelectorAll(".form-control");
        const index = '{{ route('orders_report.index') }}';

        for (let i = 0; i < elements.length; i++) {
            elements[i].addEventListener("keyup", function(e) {
                if (e.keyCode === 13) {
                    filter();
                }
            });
        }

        function filter() {
            let filters = [];

            for (let i = 0; i < elements.length; i++) {
                elements[i].value != '' ? filters.push(`filter[${elements[i].name}]=${elements[i].value}`) : '';
            }

            filters = `?${filters.join('&')}`;
            document.location.href = `${index}${filters}`;
        }

        function getReport(route) {
            const filters = document.location.search;

            document.location.href = `${index}${route}${filters}`;
        }
    </script>
@endpush