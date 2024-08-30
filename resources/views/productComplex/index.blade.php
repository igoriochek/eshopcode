@extends('layouts.app')

@section('content')
    <div class="container">
        <section class="content-header mt-5">

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
        </section>

        <div class="content px-3">

            @include('flash::message')

            <div class="clearfix"></div>

            <div class="row">
                <div class="col-lg-6 col-sm-12">
    {{--                @include('products.table')--}}
                    @foreach($categories as $category)
    {{--                    <b>{{$category->id }} {{$category->name}}</b>--}}
                        <div class="form-group">
                            {!! Form::label($category->id, $category->name.':') !!}
                            {!! Form::select($category->id, $selectorsComples[$category->id], null, ['class' => 'form-control custom-select', 'placeholder' => '---']) !!}
                        </div>

                    @endforeach
                </div>
    {{--            // to do: nevidimaja kartinka i dizain. zvonit Ivanu, utochnit skolko budet detalej --}}
                <div class="col-lg-6 col-sm-12">
                    <div style="width: 500px; height: 400px; position: relative;" >
                        <div id="complex1" style="z-index: 2;position: absolute; width: 100%;height: 100%;display: flex;">1 </div>
                        <div id="complex2" style="z-index: 1;position: absolute;width: 100%;height: 100%;display: flex;">2</div>
                        <div id="complex3" style="z-index: 3;position: absolute;width: 100%;height: 100%;display: flex;">3</div>
                        <div id="complex4" style="z-index: 4;position: absolute;width: 100%;height: 100%;display: flex;">4</div>
                    </div>
                </div>

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

        function findNumById(value) {
            for (const key in complexMap) {
                if (complexMap.hasOwnProperty(key)) {
                    if (complexMap[key].id === value) {
                        return complexMap[key].id;
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

        function imageWithStyle(id, src) {
            switch (id) {
                //baza: "<img src=\"" + data.complexProductImage + "\"" + style + "/>";
                case "1":
                    return  "<img src=\"" + src + "\" style=\"position:absolute; bottom: 20px; left: 20px; height:190px\" />";
                    break;
                case "2":
                    return "<img src=\"" + src + "\" style=\"position: absolute; right: 3px; height:280px; bottom: 35px; transform: rotate(-7deg)\" />";
                    break;
                case "3":
                    return "<img src=\"" + src + "\" style=\"height:65px; position: absolute; left: 0px; bottom: 0px; \"  />" +
                           "<img src=\"" + src + "\" style=\"height:65px; position: absolute; right: 80px; bottom: 0px;\"  />";
                    break;
                case "4":
                    return "<img src=\"" + src + "\" style=\"height:17px; position: absolute; right: 0px; top:80px; transform: rotate(-7deg)\"\" />";
                    break;

            }
        }

        async function updateValue(e) {
            var name = findNameById(event.target.id);
            var id = findNumById(event.target.id);
            // console.log("id" + id);
            // var img = imageWithStyle(id);
            // console.log("width" + width);

            // width = " style=\"height:" + width + "\" ";
            const selectComplex = document.getElementById(name);
            // console.log("div name " + name);
            var sVal = event.target.value;


            var fullUrl = productApi + sVal;


            // console.log(fullUrl);

            let data = await fetchData(fullUrl);

            selectComplex.innerHTML = imageWithStyle(id, data.complexProductImage );
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

