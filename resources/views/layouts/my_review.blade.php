<!-- Modal Review -->
<div class="modal fade" id="myReview" tabindex="-1" aria-labelledby="myReviewLabel" style="display: none;" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="myReviewLabel">{{ __('names.writeReview') }}</h4>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div id="message-review">
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <div class="rating" style="gap: 5px">
                                <input type="radio" name="rating" value="5" id="5">
                                <label for="5">
                                    <i class="icon-smile"></i>
                                    <i class="icon-smile voted"></i>
                                </label>
                                <input type="radio" name="rating" value="4" id="4">
                                <label for="4">
                                    <i class="icon-smile"></i>
                                    <i class="icon-smile voted"></i>
                                </label>
                                <input type="radio" name="rating" value="3" id="3">
                                <label for="3">
                                    <i class="icon-smile"></i>
                                    <i class="icon-smile voted"></i>
                                </label>
                                <input type="radio" name="rating" value="2" id="2">
                                <label for="2">
                                    <i class="icon-smile"></i>
                                    <i class="icon-smile voted"></i>
                                </label>
                                <input type="radio" name="rating" value="1" id="1">
                                <label for="1">
                                    <i class="icon-smile"></i>
                                    <i class="icon-smile voted"></i>
                                </label>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- End row -->
                <div class="form-group">
                        <textarea name="review_text" id="review_text" class="form-control" style="height:100px" placeholder="{{ __('names.writeReview') }}"></textarea>
                </div>
                <input type="submit" class="btn_1" id="submit-review">
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

    .rating > label {
        position: relative;
        width: 1em;
        font-size: 2vw;
        cursor: pointer
    }

    .rating > label .voted {
        position: absolute;
        top: 0;
        left: 0;
        display: none;
    }

    .rating > label:hover .voted,
    .rating > label:hover ~ label .voted {
        display: block !important;
    }

    .rating > input:checked ~ label .voted {
        display: block;
    }
</style>
