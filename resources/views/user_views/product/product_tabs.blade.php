{{-- <div class="container">
    <ul class="description-tab nav" role="tablist">
        <li class="nav-item" role="presentation">
            <button class="nav-link active" id="description-tab" data-bs-toggle="pill" data-bs-target="#description" type="button" role="tab" aria-controls="description" aria-selected="false" tabindex="-1">
                {{ __('names.description') }}
            </button>
        </li>
        <li class="nav-item" role="presentation">
            <button class="nav-link" id="reviews-tab" data-bs-toggle="pill" data-bs-target="#reviews" type="button" role="tab" aria-controls="reviews" aria-selected="true">
                {{ __('names.reviews').' ('.$product->ratings->count().') ' }}
            </button>
        </li>
    </ul>
    <div class="tab-content">
        <div class="tab-pane fade active show" id="description" role="tabpanel" aria-labelledby="description-tab" tabindex="0">
            <div class="description-content">
                {!! $product->description !!}
            </div>
        </div>
        <div class="tab-pane fade" id="reviews" role="tabpanel" aria-labelledby="reviews-tab" tabindex="0">
            <div class="review-content">
                <div class="all-review-content">
                    <h3>{{ __('names.reviews') }}</h3>
                    @forelse ($product->ratings as $rating)
                        <div class="single-review ps-1">
                            <div class="content">
                                <div class="rating flex-row justify-content-start">
                                    @for($i = 1; $i <= 5; $i++)
                                        <i class="product-rating-star @if ($rating->value >= $i) fa-solid fa-star
                                            @elseif ($rating->value >= $i - .5) fa-solid fa-star-half-stroke
                                            @else fa-regular fa-star 
                                            @endif"></i>
                                    @endfor
                                </div>
                                <h5>{{ $rating->user->name }}</h5>
                                <span class="date">{{ $rating->created_at->format('F j, Y') }}</span>
                                <p>{{ $rating->description }}</p>
                            </div>
                        </div>
                    @empty
                        <span class="text-muted">{{ __('names.noReviews') }}</span>
                    @endforelse
                </div>
                <div id="write" class="review-form">
                    <h3>{{ __('names.addReview') }}</h3>
                    @auth
                        <form class="review-product">
                            <div class="form-group">
                                <label>{{ __('names.rating').'*' }}</label>
                                <div class="rating" style="gap: 5px">
                                    <input type="radio" name="rating" value="5" id="5"><label for="5">
                                        <i class="fa-regular fa-star text-warning"></i>
                                    </label>
                                    <input type="radio" name="rating" value="4" id="4"><label for="4">
                                        <i class="fa-regular fa-star text-warning"></i>
                                    </label>
                                    <input type="radio" name="rating" value="3" id="3"><label for="3">
                                        <i class="fa-regular fa-star text-warning"></i>
                                    </label>
                                    <input type="radio" name="rating" value="2" id="2"><label for="2">
                                        <i class="fa-regular fa-star text-warning"></i>
                                    </label>
                                    <input type="radio" name="rating" value="1" id="1"><label for="1">
                                        <i class="fa-regular fa-star text-warning"></i>
                                    </label>
                                </div>
                            </div>
                            <div class="form-group">
                                <label>{{ __('names.review').'*' }}</label>
                                <textarea class="form-control" rows="8" id="comment" name="comment"></textarea>
                            </div>
                            <button class="default-btn style5 product-reviews-add-review-submit" type="submit">
                                {{ __('buttons.submit') }}
                            </button>
                        </form>
                    @else
                        <span class="text-muted">{{ __('names.loginToReview') }}</p>
                    @endauth
                </div>
            </div>
        </div>
    </div>
</div> --}}

<div class="tp-product-details-tab-nav tp-tab">
    <nav>
       <div class="nav nav-tabs justify-content-center p-relative tp-product-tab" id="navPresentationTab" role="tablist">
         <button class="nav-link active" id="nav-description-tab" data-bs-toggle="tab" data-bs-target="#nav-description" type="button" role="tab" aria-controls="nav-description" aria-selected="true">
            {{ __('names.description') }}
        </button>
         <button class="nav-link" id="nav-review-tab" data-bs-toggle="tab" data-bs-target="#nav-review" type="button" role="tab" aria-controls="nav-review" aria-selected="false">
            {{ '('.$product->ratings->count().' '.__('names.reviews').')' }}
         </button>

         <span id="productTabMarker" class="tp-product-details-tab-line" style="left: 393px; display: block; width: 112px;"></span>
       </div>
     </nav>  
     <div class="tab-content" id="navPresentationTabContent">
       <div class="tab-pane fade active show" id="nav-description" role="tabpanel" aria-labelledby="nav-description-tab" tabindex="0">
          <div class="tp-product-details-desc-wrapper pt-80">
             <div class="row justify-content-center">
                <div class="col-xl-10">
                    {!! $product->description !!}
                </div>
             </div>
          </div>
       </div>
       <div class="tab-pane fade" id="nav-review" role="tabpanel" aria-labelledby="nav-review-tab" tabindex="0">
          <div class="tp-product-details-review-wrapper pt-60">
             <div class="row">
                <div class="col-lg-6">
                   <div class="tp-product-details-review-statics">
                      <!-- number -->
                      <div class="tp-product-details-review-number d-inline-block mb-50">
                         <div class="tp-product-details-review-summery d-flex align-items-center">
                            <div class="tp-product-details-review-summery-value">
                               <span>{{ number_format($average, 1) }}</span>
                            </div>
                            <div class="tp-product-details-review-summery-rating d-flex align-items-center">
                                <div class="rating flex-row justify-content-start text-warning">
                                    @for($i = 1; $i <= 5; $i++)
                                        <i class="product-rating-star @if ($average >= $i) fa-solid fa-star
                                            @elseif ($average >= $i - .5) fa-solid fa-star-half-stroke
                                            @else fa-regular fa-star 
                                            @endif"></i>
                                    @endfor
                                </div>
                               <p>{{ '('.$product->ratings->count().' '.__('names.reviews').')' }}</p>
                            </div>
                         </div>
                         <div class="tp-product-details-review-rating-list">
                            <!-- single item -->
                            <div class="tp-product-details-review-rating-item d-flex align-items-center">
                               <span>5 {{ __('names.stars') }}</span>
                               <div class="tp-product-details-review-rating-bar">
                                  <span class="tp-product-details-review-rating-bar-inner" data-width="{{ $percentages[5] ?? 0 }}%" style="width: {{ $percentages[5] ?? 0 }}%;"></span>
                               </div>
                               <div class="tp-product-details-review-rating-percent">
                                  <span>{{ $percentages[5] ?? 0 }}%</span>
                               </div>
                            </div> <!-- end single item -->
                            
                            <!-- single item -->
                            <div class="tp-product-details-review-rating-item d-flex align-items-center">
                               <span>4 {{ __('names.stars') }}</span>
                               <div class="tp-product-details-review-rating-bar">
                                  <span class="tp-product-details-review-rating-bar-inner" data-width="{{ $percentages[4] ?? 0 }}%" style="width: {{ $percentages[4] ?? 0 }}%;"></span>
                               </div>
                               <div class="tp-product-details-review-rating-percent">
                                  <span>{{ $percentages[4] ?? 0 }}%</span>
                               </div>
                            </div> <!-- end single item -->

                            <!-- single item -->
                            <div class="tp-product-details-review-rating-item d-flex align-items-center">
                               <span>3 {{ __('names.stars') }}</span>
                               <div class="tp-product-details-review-rating-bar">
                                  <span class="tp-product-details-review-rating-bar-inner" data-width="{{ $percentages[3] ?? 0 }}%" style="width: {{ $percentages[3] ?? 0 }}%;"></span>
                               </div>
                               <div class="tp-product-details-review-rating-percent">
                                  <span>{{ $percentages[3] ?? 0 }}%</span>
                               </div>
                            </div> <!-- end single item -->

                            <!-- single item -->
                            <div class="tp-product-details-review-rating-item d-flex align-items-center">
                               <span>2 {{ __('names.stars') }}</span>
                               <div class="tp-product-details-review-rating-bar">
                                  <span class="tp-product-details-review-rating-bar-inner" data-width="{{ $percentages[2] ?? 0 }}%" style="width: {{ $percentages[2] ?? 0 }}%;"></span>
                               </div>
                               <div class="tp-product-details-review-rating-percent">
                                  <span>{{ $percentages[2] ?? 0 }}%</span>
                               </div>
                            </div> <!-- end single item -->

                            <!-- single item -->
                            <div class="tp-product-details-review-rating-item d-flex align-items-center">
                               <span>1 {{ __('names.stars') }}</span>
                               <div class="tp-product-details-review-rating-bar">
                                  <span class="tp-product-details-review-rating-bar-inner" data-width="{{ $percentages[1] ?? 0 }}%" style="width: {{ $percentages[1] ?? 0 }}%;"></span>
                               </div>
                               <div class="tp-product-details-review-rating-percent">
                                  <span>{{ $percentages[1] ?? 0 }}%</span>
                               </div>
                            </div> <!-- end single item -->
                         </div>
                      </div>

                      <!-- reviews -->
                      <div class="tp-product-details-review-list pr-110">
                         <h3 class="tp-product-details-review-title">{{ __('names.reviews') }}</h3>
                         @forelse ($product->ratings as $rating)
                            <div class="tp-product-details-review-avater d-flex align-items-start">
                                <div class="tp-product-details-review-avater-content">
                                    <div class="tp-product-details-review-avater-rating d-flex align-items-center">
                                            <div class="rating flex-row justify-content-start">
                                                @for($i = 1; $i <= 5; $i++)
                                                    <i class="product-rating-star text-warning pb-1 @if ($rating->value >= $i) fa-solid fa-star
                                                        @elseif ($rating->value >= $i - .5) fa-solid fa-star-half-stroke
                                                        @else fa-regular fa-star 
                                                        @endif"></i>
                                                @endfor
                                            </div>
                                    </div>
                                    <h3 class="tp-product-details-review-avater-title">{{ $rating->user->name }}</h3>
                                    <span class="tp-product-details-review-avater-meta">{{ $rating->created_at->format('F j, Y') }}</span>

                                    <div class="tp-product-details-review-avater-comment">
                                        <p>{{ $rating->description }}</p>
                                    </div>
                                </div>
                            </div>
                        @empty
                            <span class="text-muted">{{ __('names.noReviews') }}</span>
                        @endforelse
                      </div>
                   </div>
                </div> <!-- end col -->
                <div class="col-lg-6">
                   <div class="tp-product-details-review-form">
                      <h3 class="tp-product-details-review-form-title">{{ __('names.addReview') }}</h3>
                      <div id="review-product"></div>
                      @auth
                        <form class="review-product">
                            <div class="tp-product-details-review-form-rating d-flex align-items-center mt-2">
                                <p>{{ __('names.rating') }}:</p>
                                <div class="tp-product-details-review-form-rating-icon d-flex align-items-center">
                                    <div class="rating" style="gap: 5px">
                                        <input type="radio" name="rating" value="5" id="5"><label for="5">
                                            <i class="fa-regular fa-star text-warning"></i>
                                        </label>
                                        <input type="radio" name="rating" value="4" id="4"><label for="4">
                                            <i class="fa-regular fa-star text-warning"></i>
                                        </label>
                                        <input type="radio" name="rating" value="3" id="3"><label for="3">
                                            <i class="fa-regular fa-star text-warning"></i>
                                        </label>
                                        <input type="radio" name="rating" value="2" id="2"><label for="2">
                                            <i class="fa-regular fa-star text-warning"></i>
                                        </label>
                                        <input type="radio" name="rating" value="1" id="1"><label for="1">
                                            <i class="fa-regular fa-star text-warning"></i>
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <div class="tp-product-details-review-input-wrapper">
                                <div class="tp-product-details-review-input-box">
                                    <div class="tp-product-details-review-input">
                                        <textarea id="comment" name="comment" placeholder="" rows="8"></textarea>
                                    </div>
                                    <div class="tp-product-details-review-input-title">
                                        <label for="comment">{{ __('names.review').'*' }}</label>
                                    </div>
                                </div>
                            </div>
                            <div class="tp-product-details-review-btn-wrapper">
                                <button type="button" class="tp-product-details-review-btn" id="product-reviews-add-review-submit">
                                    {{ __('buttons.submit') }}
                                </button>
                            </div>
                        </form>
                      @else
                        <span class="text-muted">{{ __('names.loginToReview') }}</p>
                      @endauth
                   </div>
                </div>
             </div>
          </div>
       </div>
     </div>                                                
 </div>

<style>
    .rating {
        display: flex;
        flex-direction: row-reverse;
        justify-content: flex-end;
    }

    .rating > input {
        display: none
    }

    .rating > label i {
        position: relative;
        width: 1em;
        cursor: pointer;
        color: #FFD600;
        font-size: 1.35em;
        padding-top: 4px;
    }

    .rating > label::before {
        content: "\2605";
        position: absolute;
        opacity: 0;
        color: #FFD600;
        font-size: 1.35em;
    }

    .rating > label:hover:before,
    .rating > label:hover ~ label:before {
        opacity: 1 !important
    }

    .rating > input:checked ~ label:before {
        opacity: 1
    }

    .rating:hover > input:checked ~ label:before {
        opacity: 0.4
    }
</style>