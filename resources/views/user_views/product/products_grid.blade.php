<div class="col-md-6 wow zoomIn" data-wow-delay="0.1s" style="visibility: visible; animation-delay: 0.1s; animation-name: zoomIn;">
    <div class="tour_container">
        <div class="img_container">
            <a href="{{ route('viewproduct', $product->id) }}">
                @if ($product->image)
                    <img src="{{ $product->image }}" alt="{{ $product->name }}" width="800" height="533" class="img-fluid">
                @else
                    <img src="/images/noimage.jpeg" alt="noimage" width="800" height="533" class="img-fluid">
                @endif
            </a>
        </div>
        <div class="tour_title">
            <h3>
                <strong>{{ $product->name }}</strong>
            </h3>
            <div class="rating">
                @for($i = 1; $i <= 5; $i++)
                    <i class="icon-smile @if ($product->average >= $i) voted @endif"></i>
                @endfor
                <small>({{ $product->count }})</small>
            </div>
            <!-- end rating -->
        </div>
    </div>
    <!-- End box tour -->
</div>
