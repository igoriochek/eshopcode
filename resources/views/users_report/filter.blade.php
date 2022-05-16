<div class="card-body">
    <div class="row">
        <div class="form-group col-sm-2">
            <label for="id">User ID:</label>
            <input type="number" name="id" class="form-control"/>
        </div>
        <div class="form-group col-sm-3">
            <label for="name">Name:</label>
            <input type="text" name="name" class="form-control"/>
        </div>
        <div class="form-group col-sm-4">
            <label for="email">Email:</label>
            <input type="text" name="email" class="form-control"/>
        </div>
        <div class="form-group col-sm-3">
            <label for="phone_number">Phone Number:</label>
            <input type="text" name="phone_number" class="form-control"/>
        </div>
        <div class="form-group col-sm-3">
            <label for="street">Street:</label>
            <input type="text" name="street" class="form-control"/>
        </div>
        <div class="form-group col-sm-1">
            <label for="house_flat">House/Flat:</label>
            <input type="text" name="house_flat" class="form-control"/>
        </div>
        <div class="form-group col-sm-1">
            <label for="post_index">Post Index:</label>
            <input type="text" name="post_index" class="form-control"/>
        </div>
        <div class="form-group col-sm-2">
            <label for="city">City:</label>
            <input type="text" name="city" class="form-control"/>
        </div>
        <div class="form-group col-sm-1">
            <label for="type">Type:</label>
            <select name="type" class="form-control">
                <option></option>
                <option value="1">Admin</option>
                <option value="2">User</option>
            </select>
        </div>  
        <div class="form-group col-sm-2">
            <label for="date_from">Date from:</label>
            <input type="datetime-local" name="date_from" class="form-control"/>
        </div>
        <div class="form-group col-sm-2">
            <label for="date_to">Date to:</label>
            <input type="datetime-local" name="date_to" class="form-control"/>
        </div>
    </div>
</div>
<div class="card-footer">
    <button type="button" class="btn btn-primary" onclick="filter()">Filter</button>
    <button type="reset" class="btn btn-secondary" onclick="document.location='{{ route('users_report.index') }}'">
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
        const index = '{{ route('users_report.index') }}';

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