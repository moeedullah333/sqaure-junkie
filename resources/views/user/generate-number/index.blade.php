@extends('user.user-layout.main')
@section('content')
    <div class="notification-section shadow rounded-15 p-3 pt-5 my-4">
        <div class="row justify-content-between">
            <div class="col-md-12 mb-3">
                <h3 class="achivpFont">Number Generation </h3>
            </div>
        </div>

        <div class="row">

            <div id="twitch-embed" ></div>
            
        </div>
    </div>
    </div>
@endsection


@push('js')
<script src="https://player.twitch.tv/js/embed/v1.js"></script>
    {{-- <script type="text/javascript">
        new Twitch.Embed("twitch-embed", {
            width: 854,
            height: 480,
            channel: "saaddilawer",
            layout: "video",
        });
    </script> --}}
    <script type="text/javascript">
        new Twitch.Embed("twitch-embed", {
            width: 854,
            height: 480,
            channel: "jacobmikel_dev",
            layout: "video",
        });
    </script>
@endpush
