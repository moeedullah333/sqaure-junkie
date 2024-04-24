<div class="border-end bg-white h-100" id="sidebar-wrapper">
    <div class="sidebar-heading">
        <a href="{{ route('admin_dashboard') }}">
            <h2>Square <span>Jungle</span></h2>
        </a>
    </div>
    <div class="list-group-flush">
        <a class="list-group-item list-group-item-action achivpFont" href="{{ route('admin_dashboard') }}">
            Dashboard</a>
        <a class="list-group-item list-group-item-action achivpFont" href="{{ route('admin_users') }}">
            User Management</a>
        <a class="list-group-item list-group-item-action achivpFont" href="{{ route('user_contact_list') }}">
            Contact Management</a>
        <a class="list-group-item list-group-item-action achivpFont" href="{{ route('admin.board_list') }}">
            Game Management </a>

        {{-- <a class="list-group-item list-group-item-action achivpFont" href="{{ route('other.board.list') }}">
            Other Board List  <span class="badge badge-danger {{ countOtherBoardValue() > 0 ? "" : 'd-none' }}" >  New ( {{countOtherBoardValue()}} )</span> </a> --}}

        {{-- <a class="list-group-item list-group-item-action achivpFont" href="{{ route('admin.teams.winning') }}">
            Teams Winning </a> --}}

        <a class="list-group-item list-group-item-action achivpFont" href="{{ route('board.delete.list') }}">
            Deleted Boards </a>

        <a class="list-group-item list-group-item-action achivpFont" href="{{ route('board.part.delete.list') }}">
            Deleted Board Parts </a>

        <a class="list-group-item list-group-item-action achivpFont" href="{{ route('admin.percentage.show') }}">
            Percentage </a>

        <a class="list-group-item list-group-item-action achivpFont"
            href="{{ route('admin.number.generation.list') }}">
            Number Generation </a>

        <a class="list-group-item list-group-item-action achivpFont" href="{{ route('admin.users.payment') }}">
            Payment </a>

        <a class="list-group-item list-group-item-action achivpFont" href="{{ route('admin.archive-baord') }}">
            Archive </a>

        {{-- <a class="list-group-item list-group-item-action achivpFont" href="#">
            Content Mangement</a> --}}
        <!-- <a class="list-group-item list-group-item-action achivpFont" href="../subscription/subscription.php">
            Subscription Management</a> -->
        {{-- <a class="list-group-item list-group-item-action achivpFont" href="../dashboard/feedback.php">
            Feedbacks Management</a>
        <a class="list-group-item list-group-item-action achivpFont" href="#">
            Report Logs</a>
      
            <a class="list-group-item list-group-item-action achivpFont" href="../serviceLogs/">
            Payment Logs</a> --}}
    </div>
</div>
