<script src="{{asset('assets/website/js/jquery-3.3.1.min.js')}}"></script>
<script src="{{asset('assets/website/js/jquery.fancybox.min.js')}}"></script>
<script src="{{asset('assets/website/js/popper-min.js')}}"></script>
<script src="{{asset('assets/website/js/bootstrap.min.js')}}"></script> 
<script src="{{asset('assets/website/js/owl.carousel.min.js')}}"></script>
<script src="{{asset('assets/website/js/custom.js')}}"></script> 
<script>
    function AjaxRequest(url, data) {
        var res;
        $.ajax({
            url: url,
            data: data,
            async: false,
            error: function() {
                console.log('error');
            },
            dataType: 'json',
            success: function(data) {
                res = data;
            },
            type: 'POST'
        });
        return res;
    }
</script>


<script>
    var swiper = new Swiper(".mySwiper", {
        effect: "cube",
        grabCursor: true,
        cubeEffect: {
            shadow: true,
            slideShadows: true,
            shadowOffset: 20,
            shadowScale: 0.94,
        },
        navigation: {
            nextEl: ".swiper-button-next",
            prevEl: ".swiper-button-prev",
        },
    });
</script>

@stack('js')
