{!! Form::open(['route' => 'unavailable_product_dates.store']) !!}
    <div class="row mb-5">
        <div class="form-group col-md-6 col-12">
            {!! Form::label('product_id',  __('table.product').':') !!}
            {!! Form::select('product_id', $products, null, 
            ['class' => 'form-control custom-select', 'id' => 'productSelector', 'onChange' => 'getUnavailableProductDates()']) !!}
        </div>
        <div class="form-group col-md-6 col-12">
            {!! Form::label('unavailable_date',  __('table.unavailableDate').':') !!}
            <input type="text"
                name="unavailable_date"
                class="form-control datepicker"
                autocomplete="off"
                data-provide="datepicker" 
                data-date-autoclose="true"
                data-date-format="yy-mm-dd" 
                data-date-today-highlight="true"
                id="datePicker" 
                placeholder="{{ __('yyyy-mm-dd') }}"
                onchange="this.dispatchEvent(new InputEvent('input'))"
                onkeydown="return false"
                readonly
            >
        </div>
    </div>
    <div class="d-flex justify-content-center">
        {!! Form::submit(__('buttons.save'), 
        ['class' => 'btn btn-primary orders-returns-primary-button col-xl-3 col-lg-4 col-md-5 col-12']) !!}
    </div>
{!! Form::close() !!}

@push('scripts')
    <script>
        const getUnavailableProductDates = () => {
            $(() => {
                let data = {
                    '_token': "{{ csrf_token() }}",
                    'productId': $('#productSelector').val()
                }

                $.ajax({
                    url: '{{ route('getUnavailableProductDates') }}',
                    type: 'GET',
                    data: data,
                    dataType: 'html',
                    success: response => setDatePicker(JSON.parse(response).unavailableDates),
                    error: XMLHttpRequest => console.error(XMLHttpRequest)
                })
            })
        }

        const setDatePicker = unavailableDates => {
            $(() => {
                $("#datePicker").datepicker("destroy");
                $('#datePicker').datepicker({
                    minDate: '{{ now()->addWeeks(2)->toDateString() }}',
                    dateFormat: 'yy-mm-dd',
                    showButtonPanel: true,
                    beforeShowDay: date => {
                        $(".ui-datepicker").css('font-size', 20);
                        const dateToString = jQuery.datepicker.formatDate('yy-mm-dd', date);
                        return [unavailableDates.indexOf(dateToString) === -1]
                    }
                })
            })
        }

        getUnavailableProductDates()
    </script>
@endpush
