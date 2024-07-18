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
{{--            // to do: nevidimaja kartinka i dizain. zvonit Ivanu, utochnit skolko budet detalej --}}
            <div class="card-body p-0 align-content-center" >
                <h1><div id="complex">TUT budet</div></h1>
                <h2><div id="complex1">1 </div></h2>
                <h2><div id="complex2">2</div></h2>
                <h2><div id="complex3">3</div></h2>
                <h2><div id="complex4">4</div></h2>
            </div>

        </div>
    </div>

@endsection

@push('scripts')
    <script >

        //vremenno:
        const complexMap = {
            "complex1": {name: "complex1", id : "1"},
            "complex2": {name: "complex2", id : "2"},
            "complex3": {name: "complex3", id : "3"},
            "complex4": {name: "complex4", id : "4"},
        }

        {{--const productApi = "{{ env("APP_URL")  }}/api/products/";--}}
        const productApi = "http://127.0.0.1:8000/api/products/";

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


        async function fetchData(url) {
            try {
                // Make a request to the API
                const response = await fetch(url);

                // Check if the response is OK (status code 200-299)
                if (!response.ok) {
                    throw new Error('Network response was not ok ' + response.statusText);
                }

                // Parse the response as JSON
                const data = await response.json();
                return data.data;
                // Log the data to the console (or handle it as needed)
                // console.log(data.data);

                // console.log("ttu" + data.data.id);
                //
                // return data.data;

                // Process the data
                // You can add code here to update your UI or perform other actions with the data

            } catch (error) {
                // Handle any errors that occurred during the fetch
                console.error('There was a problem with the fetch operation:', error);
            }
        }

        async function updateValue(e) {
            var name = findNameById(event.target.id)
            const selectComplex = document.getElementById(name);
            console.log("div name " + name);
            var sVal = event.target.value;


            var fullUrl = productApi + sVal;


            // console.log(fullUrl);

            let data = await fetchData(fullUrl);

            selectComplex.innerHTML =  "<img src=\"" + data.complexProductImage + "\" />";// + sVal;
            // console.log(option);


            // console.log('ID:', data.id);
            // console.log('Name:', data.name);
            // console.log('Price:', data.price);


            // event.target.value = data.complexProductImage;

            // .then(
            //     f =>{
            //
            //         console.log(option);
            //
            //         // console.log('ID:', option.data.id);
            //         // console.log('Name:', option.data.name);
            //         // console.log('Price:', option.data.price);
            //
            //
            //         // data = JSON.parse(option.toString());
            //
            //         // console.log("ttu" + option);
            //         // selectComplex.textContent = event.target.value;
            //         // console.log("tut");
            //         // console.log(`Value of ${event.target.id} changed to: ${event.target.value}`);
            // }
            // );
            // const jsonObject = JSON.parse(option);


            return;
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
            selectComplex.value ="";
        });





    </script>

@endpush

