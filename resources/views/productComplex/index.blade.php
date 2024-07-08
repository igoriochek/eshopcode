@extends('layouts.app')

@section('content')
    <section class="content-header mt-5">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h2>{{__('names.products')}}</h2>
                </div>
{{--                <div class="col-sm-6">--}}
{{--                    <a class="axil-btn btn-primary float-right"--}}
{{--                       href="{{ route('products.create') }}">--}}
{{--                        {{__('buttons.addNew')}}--}}
{{--                    </a>--}}
{{--                </div>--}}
            </div>
        </div>
    </section>

    <div class="content px-3">

        @include('flash::message')

        <div class="clearfix"></div>

        <div class="card">
            <div class="card-body p-0">
{{--                @include('products.table')--}}
                @foreach($categories as $category)
{{--                    <b>{{$category->id }} {{$category->name}}</b>--}}
                    <div class="form-group col-sm-6">
                        {!! Form::label($category->id, $category->name.':') !!}
                        {!! Form::select($category->id, $selectorsComples[$category->id], null, ['class' => 'form-control custom-select', 'placeholder' => '---']) !!}
                    </div>

                @endforeach
                <div class="card-footer clearfix">
                    <div class="float-right">

                    </div>
                </div>
            </div>

            <div class="card-body p-0 align-content-center" >
                <h1><div id="complex">TUT budet</div></h1>
                <h2><div id="complex1">1</div></h2>
                <h2><div id="complex2">2</div></h2>
                <h2><div id="complex3">3</div></h2>
            </div>

        </div>
    </div>

@endsection

@push('scripts')
    <script >

        //vremenno:
        const complexMap = {
            "complex1": {name: "complex1", id : "4"},
            "complex2": {name: "complex2", id : "7"},
            "complex3": {name: "complex3", id : "3"},
        }

        function findNameById(value) {
            for (const key in complexMap) {
                if (complexMap.hasOwnProperty(key)) {
                    if (complexMap[key].id === value) {
                        return complexMap[key].name;
                    }
                }
            }
            return null; // Return null if no matching id is found
        }

        function updateValue(e) {
            var name =  findNameById(event.target.id)
            const selectComplex = document.getElementById(name);
            console.log(name);

            selectComplex.textContent = event.target.value
            // console.log("tut");
            console.log(`Value of ${event.target.id} changed to: ${event.target.value}`);
        }





        var cats = [
        @foreach($categories as $category)
            {{$category->id}},
        @endforeach
        ]
        cats.forEach((obj) => {
            var name = obj;
            console.log(name);
            const selectComplex = document.getElementById(name);
            selectComplex.addEventListener("change", updateValue);
        });





    </script>

@endpush

