{{-- <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js"></script> --}}
<script src="https://code.jquery.com/jquery-3.7.1.js"></script>
<script src="//cdn.datatables.net/1.13.7/js/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="../js/image-uploader.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"></script>
<script src="{{ asset('assets/admin/js/main.js') }}"></script>
<script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>

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


<script src="https://js.pusher.com/8.2.0/pusher.min.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css">
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
<script>
    $(document).ready(function() {
        let url = "{{ route('user.streaming.ajax') }}";

        let data = {
            '_token': '{{ csrf_token() }}',
            'status': 'checkStatus'
        };
        let res = AjaxRequest(url, data);

        if (res.status == true) {
            console.log(res);
            if (res.data.status == 1) {
                $('#twitch-embed').removeClass('d-none');
                $('#liveStreaming').removeClass('d-none');
            } else {
                $('#twitch-embed').addClass('d-none');
                $('#liveStreaming').addClass('d-none');
            }
        }
    });

    // Enable pusher logging - don't include this in production
    Pusher.logToConsole = true;

    var pusher = new Pusher('af02cf8cf4d64d6030fd', {
        cluster: 'us3'
    });

    var channel = pusher.subscribe('live-stream');
    channel.bind('stream-event-notification', function(data) {
        toastr.options.timeOut = 5000;
        toastr.success(JSON.stringify(data.msg));

        if (JSON.stringify(data.status) == 1) {
            $('#twitch-embed').removeClass('d-none');
            $('#liveStreaming').removeClass('d-none');
        } else {
            $('#twitch-embed').addClass('d-none');
            $('#liveStreaming').addClass('d-none');
        }
    });
</script>




@stack('js')
