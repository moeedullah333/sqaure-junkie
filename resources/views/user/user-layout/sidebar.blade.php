<div class="border-end bg-white h-100" id="sidebar-wrapper">
    <div class="sidebar-heading">
        <a href="{{ route('admin_dashboard') }}">
            <h2>Square <span>Jungle</span></h2>
        </a>
    </div>
    <div class="list-group-flush">
        <a class="list-group-item list-group-item-action achivpFont" href="{{ route('user.dashboard') }}">
            Dashboard</a>
            
        <a class="list-group-item list-group-item-action achivpFont" href="{{route('voting_new')}}">
            Vote</a>

        <a class="list-group-item list-group-item-action achivpFont" href="{{ route('current_game.list') }}">
            Select Board</a>

        <a class="list-group-item list-group-item-action achivpFont d-none" href="{{route('user.select-square')}}">
            Select Squares</a>

        <a class="list-group-item list-group-item-action achivpFont " href="{{ route('user_about_us_page') }}">About Us</a>   

        <a class="list-group-item list-group-item-action achivpFont" href="{{ route('current_game_buy_boxes.list') }}">
            Payment</a>

        <a class="list-group-item list-group-item-action achivpFont" href="{{route('user.number-generate-view')}}">
            Number Generation</a>

        <a class="list-group-item list-group-item-action achivpFont" href="{{ route('user.payout_info') }}">
            Payout Info</a>

        <a class="list-group-item list-group-item-action achivpFont" href="{{ route('user.game_schedule') }}">
           Schedule / Deadline</a>

        <a class="list-group-item list-group-item-action achivpFont" href="{{ route('user.weekly-winner') }}">
           Weekly Winner</a>

        <a class="list-group-item list-group-item-action achivpFont" href="{{ route('user.personal.details') }}">
            Personal Details
        </a>
    </div>
</div>
