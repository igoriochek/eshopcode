<a id="scrollUp" href="#top" style="position: fixed; z-index: 214; display: none;">
    <i class="fas fa-arrow-up"></i>
</a>

@push('css')
<style>
    #scrollUp {
        bottom: 40px;
        right: 40px;
        background-color: #007bff;
        color: white;
        padding: 10px;
        border-radius: 50%;
        font-size: 20px;
        display: none;
        opacity: 0;
        transition: opacity 0.3s ease-in-out;
    }

    #scrollUp.show {
        display: block;
        opacity: 1;
    }
</style>
@endpush

@push('scripts')
<script>
    $(window).scroll(function() {
        if ($(this).scrollTop() > 200) {
            $('#scrollUp').addClass('show').fadeIn();
        } else {
            $('#scrollUp').removeClass('show').fadeOut();
        }
    });

    $('#scrollUp').click(function(e) {
        e.preventDefault();
        $('html, body').animate({
            scrollTop: 0
        }, '300');
    });
</script>
@endpush