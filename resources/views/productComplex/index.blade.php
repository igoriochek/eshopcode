@extends('layouts.app')

@section('title', __('menu.productComplex'))

@section('content')
    <div class="container">
        <section class="content-header mt-5">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h2>{{ __('names.products') }}</h2>
                </div>
            </div>
        </section>

        <div class="content px-3">
            @include('adminlte-templates::common.errors')
            @include('flash_messages')
            <div class="clearfix"></div>

            <div class="row">

                {!! Form::open([
                    'route' => ['addtocartcomplexproduct'],
                    'method' => 'post',
                    'class' => 'product-add-to-cart-container d-flex-center',
                ]) !!}

                <div class="col-lg-6 col-sm-12">
                    @foreach($categories as $category)
                        <div class="form-group">
                            {!! Form::label('parts[' . $category->id . ']', $category->name . ':') !!}
                            {!! Form::select(
                                'parts[' . $category->id . ']',
                                $selectorsComples[$category->id],
                                null,
                                ['class' => 'form-control custom-select', 'placeholder' => '---', 'id' => 'part_' . $category->id, 'data-category-id' => $category->id,]
                            ) !!}
                        </div>
                    @endforeach
                </div>
                
                <div class="col-lg-6 col-sm-12" style="display: flex; justify-content: center; align-items: center; flex-wrap: wrap;">
                        <div class="responsive-container" style="margin-bottom: 50px;">
                            <div id="complex1" class="complex" style="z-index: 2;"></div>
                            <div id="complex2" class="complex" style="z-index: 1;"></div>
                            <div id="complex3" class="complex" style="z-index: 3;"></div>
                            <div id="complex4" class="complex" style="z-index: 4;"></div>
                        </div>
                        <h4>
                            {{ __('names.totalPrice') }}: €
                            <span id="total-price">0</span>
                        </h4>
                </div>
                <div class="col-lg-6 col-sm-12" style="display: flex; justify-content: center;">
                    
                </div>
            </div>
            
            <!-- <div style="display: flex; justify-content: center;"> -->
                <div class="product-add-to-cart-container d-flex-center">
                    <div class="product-action d-flex-center mb--0">
                        <button type="submit" id="cart-button" class="axil-btn btn-bg-primary">{{ __('buttons.addToCart') }}</button>
                    </div>
                </div>

                
            <!-- </div> -->

            {!! Form::close() !!}
        </div>
    </div>
@endsection

@push('styles')
<style>
    .content {
        margin-bottom: 75px;
    }

    .product-add-to-cart-container {
        width: 50%;
        justify-content: center;
    }



    .wheel-container {
        position: absolute;
        right: 3px;
        height: 280px;
        bottom: 35px;
        transform: rotate(-7deg);
    }

    .complex {
        position: absolute;
        width: 100%;
        height: 100%;
        display: flex;
    }

    .image-style {
        position: absolute;
    }

    .responsive-container {
        display: flex;
        justify-content: center;
        width: 500px; 
        height: 400px; 
        position: relative;
    }

    .complex-1 {
        bottom: 20px;
        left: 20px;
        height: 190px;
    }

    .complex-2 {
        right: 3px;
        height: 286px;
        bottom: 35px;
        transform: rotate(-7deg);
    }

    .complex-3-1 {
        height:65px; 
        position: absolute; 
        left: 0px; 
        bottom: 0px;
    }

    .complex-3-2 {
        height: 65px;
        position: absolute;
        right: 84px;
        bottom: 0px;
    }

    .complex-4 {
        height: 17px; 
        position: absolute; 
        right: 0px; 
        top: 80px; 
        transform: rotate(-7deg);
    }


    @media (max-width: 1200px) {

        .complex-1 {
            left: 60px;
        }

        .complex-2 {
            right: -73px;
        }

        .complex-3-1 {
            left: 40px;
        }

        .complex-3-2 {
            right: 6px;
        }

        .complex-4 {
            right: -71px; 
        }
    }

    @media (max-width: 992px) {

        .product-add-to-cart-container {
            width: 100%;
        }

        .complex-1 {
            height: 43%;
        }

        .complex-2 {
            right: 3px;
        }

        .complex-3-2 {
            right: 80px;
        }

        .complex-4 {
            right: 0px; 
        }

    }

    @media (max-width: 600px) {
        .responsive-container {
            width: 350px;
            justify-content: center;
        }

        .complex {
            width: 80%;
        }

        .complex-1 {
            left: 21px;
            height: 160px;
        }
        
        .complex-2 {
            right: -100px;
            height: 240px;
        }

        .complex-3-1 {
            height: 60px;
            left: 1px;
            bottom: 2px;
        }

        .complex-3-2 {
            height: 60px;
            right: -35px;
            bottom: 2px;
        }

        .complex-4 {
            right: -90px;
            height: 13px;
            top: 125px;
        }
    }


    

    @media (max-width: 575px) {
        .col-sm-12 {
            flex: 0 0 auto;
            width: 100%;
        }
    }


    @media (max-width: 450px) {
        .responsive-container {
            width: 350px;
            justify-content: center;
            height: 250px;
        }

        .complex {
            width: 80%;
        }

        .complex-1 {
            right: -40px;
            height: 110px;
        }
        
        .complex-2 {
            right: -15px;
            height: 170px;
        }

        .complex-3-1 {
            height: 40px;
            left: 8px;
            bottom: 9px;
        }

        .complex-3-2 {
            height: 40px;
            right: 30px;
            bottom: 9px;
        }

        .complex-4 {
            right: -14px;
            height: 10px;
            top: 45px;
        }
    }


    @media (max-width: 400px) {
        .responsive-container {
            width: 350px;
            justify-content: center;
            height: 250px;
        }

        .complex {
            width: 80%;
        }

        .complex-1 {
            right: -40px;
            height: 90px;
        }
        
        .complex-2 {
            left: 130px;
            height: 140px;
        }

        .complex-3-1 {
            height: 34px;
            left: 10px;
            bottom: 9px;
        }

        .complex-3-2 {
            height: 34px;
            left: 175px;
            bottom: 9px;
        }

        .complex-4 {
            left: 116px;
            height: 8px;
            top: 75px;
        }
    }

    
</style>


@push('scripts')
    <script >


        document.getElementById('cart-button').addEventListener('click', function() {
            const selectedElements = document.querySelectorAll('select[name^="parts["]');
            let selected = true;

            selectedElements.forEach(element => {
                if(!element.value) {
                    selected = false;
                }
            });

        });


        //vremenno:
        const complexMap = {
            "complex1": {name: "complex1", id : "part_1"},
            "complex2": {name: "complex2", id : "part_2"},
            "complex3": {name: "complex3", id : "part_3"},
            "complex4": {name: "complex4", id : "part_4"},
        }

        {{--const productApi = "{{ env("APP_URL")  }}/api/products/";--}}
        const productApi = "http://127.0.0.1:8000/api/products/";

        function findNameById(value) {
            console.log("findNameById " + value);
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
            console.log("findNumById " + value);
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
            id = id.replace("part_", "");
            console.log("src " + src);
            if(src === undefined) {
                return ``;
            }
            if (id == 3) {
                return `<img src="${src}" class="image-style complex-${id}-1" />` + `<img src="${src}" class="image-style complex-${id}-2" />`;
            }
            return `<img src="${src}" class="image-style complex-${id}" />`;
        }

        async function updateValue(e) {
            var name = findNameById(event.target.id);
            var id = findNumById(event.target.id);
            // console.log("id " + id);
            // console.log("div name " + name);

            // var img = imageWithStyle(id);
            // console.log("width" + width);

            // width = " style=\"height:" + width + "\" ";
            const selectComplex = document.getElementById(name);

            // console.log("div name " + selectComplex);

            var sVal = event.target.value;

            var fullUrl = productApi + sVal;

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

        var selects = document.querySelectorAll('select[data-category-id]');
        var totalPriceElement = document.getElementById('total-price');
        var prices = @json($selectorsComplesPrices);

        function calculateTotalPrice() {
            let totalPrice = 0;
            selects.forEach(function (select) {
                let selectedOption = select.value;
                let categoryId = select.getAttribute('data-category-id');

                if (selectedOption && prices[categoryId] && prices[categoryId][selectedOption]) {
                    let price = parseFloat(prices[categoryId][selectedOption]);
                    totalPrice += isNaN(price) ? 0 : price;
                }
            });

            totalPriceElement.textContent = totalPrice.toFixed(2);
        }

        selects.forEach(function (select) {
            select.addEventListener('change', calculateTotalPrice);
        });


        var cats = [
        @foreach($categories as $category)
            {{$category->id}},
        @endforeach
        ]
        cats.forEach((obj) => {
            var name = obj;
            const selectComplex = document.getElementById("part_" + name);
            console.log("id " + selectComplex);
            selectComplex.addEventListener("change", updateValue);
            // selectComplex.addEventListener('change', sumPrice);
            selectComplex.value ="";
        });





    </script>

@endpush

