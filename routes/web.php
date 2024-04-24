<?php

use App\Http\Controllers\Admin\ArchiveController;
use App\Http\Controllers\Admin\BoardController;
use App\Http\Controllers\Admin\DeleteBoardsController;
use App\Http\Controllers\Admin\GameBoardController;
use App\Http\Controllers\Admin\ManualBoardCreateContoller;
use App\Http\Controllers\Admin\NumberGenerateController;
use App\Http\Controllers\Admin\PercentageController;
use App\Http\Controllers\Admin\SetJobsController;
use App\Http\Controllers\AdminInnerPages;
use App\Http\Controllers\AdminLogin;
use App\Http\Controllers\Payment\PaypalController;
use App\Http\Controllers\SquareBuyController;
use App\Http\Controllers\Website;
use App\Http\Controllers\User\LoginController as UserLoginController;
use App\Http\Controllers\User\DashboardController as UserDashboardController;
use App\Http\Controllers\User\TeamController;
use App\Http\Controllers\User\VoteController;
use App\Http\Controllers\User\WinningUserController;
use Illuminate\Support\Facades\Route;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Route::get('/', function () {
//     return view('new_website.pages.home');
// })->name('home');

// Route::get('/about', function () {
//     return view('new_website.pages.about');
// })->name('about');

// Route::get('/contact', function () {
//     return view('new_website.pages.contact');
// })->name('contact');

// Route::get('/board-part', function () {
//     return view('new_website.pages.board_part_list');
// })->name('board_part_list');

/**--------------------------------------------User Start Here-------------------------------------------------- */


Route::controller(Website::class)->group(function () {
    Route::get('/', 'index')->name('home');
    Route::get('/register', 'register')->name('user.register');
    Route::post('/user-regstr', 'user_register')->name('user.reg.submit');
    Route::get('/user-contact-page', 'user_contact_page')->name('user_contact_page');
    Route::get('/user-about-us-page', 'user_about_us_page')->name('user_about_us_page');
    Route::get('/user-login', 'login')->name('user_login')->middleware('preventLoginPageAccess');
    Route::get('/voting/{id}', 'voting_poll')->name('voting')->middleware('voting_check')->middleware(['UserCheck']);
    Route::get('/user-board-list', 'board_list')->name('user.board.list')->middleware(['UserCheck']);
    // Route::POST('/user-contact-add', 'user_contact_add')->name('user_contact_add');

    // Route::get('/user-payment-method/{board_id?}/{price?}/{user_id?}', 'payment_method')->name('user_payment_method');
    // Route::get('/square_selection', 'square_selection')->name('square_selection');
    // Route::get('/generate_numbers', 'generate_numbers')->name('generate_numbers');
    Route::get('/terms-condition', 'terms')->name('terms.condition');
    Route::get('/privacy-policy', 'privacy')->name('privacy.policy');


    // new feature add new route for voting
    Route::get('/voting-new', 'voting_poll_new')->name('voting_new')->middleware(['UserCheck']);
    Route::post('/voting-new-get-selecting-price', 'voting_poll_new_getSelectingPrice')->name('voting_poll_new_getSelectingPrice')->middleware(['UserCheck']);


    Route::get('/user-board-part-list/{id}/{price}', 'boardPartList')->name('user.boardPart.list')->middleware(['UserCheck']);
    Route::get('/user-board/{part}/{id}/{board_id}/{price}', 'board')->name('user.board')->middleware(['UserCheck']);

    Route::post('/user-contact', 'contact')->name('user.contact');

    // voting check -------------------------------------------------------------------------------------------------------------------------------------------------
    // Route::get('/boardTestRemove', 'remove');
    // Route::get('/checkBoard', 'checkBoard');
    // voting check -------------------------------------------------------------------------------------------------------------------------------------------------

});


////////////////////////// User Login //////////////////////////

Route::controller(TeamController::class)->group(function () {

    // user team Select when starting playing game. 
    Route::post('/user-team', 'teamSelect')->name('user.team.Select');

    // winning teams
    Route::get('/user-team-winning', 'teamWinning')->name('user.team.Winning');

    Route::get('/number', 'numberGenerate');
});

Route::controller(UserLoginController::class)->group(function () {
    Route::post('/user-login', 'login')->name('user.login');
    Route::get('/user-logout', 'logout')->name('user.logout');
    Route::get('/personal-details', 'personalDetail')->name('user.personal.details');
    Route::post('/update-profile-detail', 'updateDetail')->name('update.user.details');
});


Route::middleware(['web', 'UserCheck'])->group(function () {

    Route::controller(UserDashboardController::class)->group(function () {
        Route::get('/user-dashboard', 'dashboard')->name('user.dashboard');

        // extra pages 
        Route::get('user-game-schedule', 'user_game_schedule')->name('user.game_schedule');
        Route::get('user-payout-info', 'user_payout_info')->name('user.payout_info');
        Route::get('user-weekly-winner', 'user_weekly_winner')->name('user.weekly-winner');
        Route::get('user-select-square', 'user_select_square')->name('user.select-square');
        Route::get('user-number-generate-view', 'user_number_generate_view')->name('user.number-generate-view');
        Route::post('user-streaming-ajax', 'user_streaming_ajax')->name('user.streaming.ajax');


        // Route::get('user-number-generate-view2', 'user_number_generate_view2')->name('user.number-generate-view');

        // ajax function 
        Route::post('user-select-square-date', 'user_select_square_date')->name('user.select-square-data');
    });

    Route::controller(VoteController::class)->group(function () {
        Route::post('user-vote', 'store')->name('vote.store');
        // Route::get('/check', 'check');
    });

    Route::controller(SquareBuyController::class)->group(function () {
        Route::post('user-square-buy', 'store')->name('square_buy.store');
        Route::post('user-square-buy-get', 'square_get')->name('square_buy.get');

        Route::get('user-current-game-list', 'current_game_list')->name('current_game.list');
        Route::get('user-current-game-boxes-buy-list', 'current_game_boxes_list')->name('current_game_buy_boxes.list');

        // pick and pay
        Route::post('pickAndPay', 'pickAndPay')->name('pickAndPay');
        Route::post('cancleBox', 'cancleBox')->name('cancleBox');
    });

    Route::controller(WinningUserController::class)->group(function () {
        Route::get('user-winning-game-list', 'winning_game_list')->name('winning_game.list');
    });
});


/**--------------------------------------------Admin Start Here--------------------------------------------------*/


// Route::get('/', [AdminLogin::class, 'index'])->name('admin_login');

Route::controller(AdminLogin::class)->group(function () {
    Route::get('/admin-login', 'login')->name('admin_login');
    Route::post('/admin/login-data', 'login_data')->name('login_data_page');
    Route::get('/admin/logout', 'logout')->name('admin_logout');
});



Route::middleware(['admin'])->group(
    function () {
        Route::controller(AdminInnerPages::class)->group(function () {
            Route::get('/admin-dashboard', 'dashboard')->name('admin_dashboard');
            Route::get('/admin/users-list', 'user_list')->name('admin_users');

            // teams winning show.
            Route::get('/admin/teams-winning', 'teamsWinning')->name('admin.teams.winning');

            Route::get('/admin/payment', 'payment')->name('admin.users.payment');
            Route::post('/admin/payment-ajax', 'payment_ajax')->name('admin.users.payment.ajax');
            Route::post('/admin/user-ban-ajax', 'user_ban_ajax')->name('admin.users.ban.ajax');

            Route::post('/admin/streaming-ajax', 'streaming_ajax')->name('admin.streaming.ajax');

            Route::get('/user-contact-list', 'user_contact_list')->name('user_contact_list');

            Route::get('/admin/other-board-list', 'other_board_list')->name('other.board.list');
            Route::post('/admin/set-other-board-price', 'set_other_board_price')->name('other.board.price.set');
            Route::get('/admin/other-board-user-vote-list/{board_id}', 'other_board_user_vote_list')->name('other.board.user.vote.list');
        });


        Route::controller(SetJobsController::class)->group(function () {
            Route::post('/admin-setJobs', 'setJobs')->name('admin.set.jobs');
        });

        Route::controller(ManualBoardCreateContoller::class)->group(function () {
            Route::post('/admin-boardPartData', 'boardPartData')->name('admin.boardPartData');
            Route::post('/admin-add-board-part-manual', 'add_board_part_manual')->name('admin.add.board.part.manual');
        });

        Route::controller(ArchiveController::class)->group(function () {
            Route::get('/admin-archive-baord', 'index')->name('admin.archive-baord');
            Route::get('/admin-archive-baord-ongoing/{id}', 'ongoingArchive')->name('admin.archive-baord-ongoing');
        });

        Route::controller(BoardController::class)->group(function () {
            Route::get('/admin-board-list', 'index')->name('admin.board_list');
            Route::get('/admin-board-create', 'create')->name('admin.board_create');
            Route::post('/admin-board-store', 'store')->name('admin.board_store');
            Route::get('/admin-board-edit/{id}', 'edit')->name('admin.board_edit');
            Route::post('/admin-board-update', 'update')->name('admin.board_update');

            Route::get('/admin-board-archive/{id}', 'archive')->name('admin.board_archive');
            Route::get('/admin-board-remove/{id}/{part}', 'removeBoard')->name('admin.board_remove_empty');
            Route::get('/admin-board-archive-all', 'archive_all')->name('admin.board_archive_all');

            route::get('insert-user-vote' , 'user_vote_insert');
        });

        Route::controller(GameBoardController::class)->group(function () {
            Route::get('/admin-game-board-list/{id}/{price}/{part?}', 'list')->name('admin.game.board.list');

            Route::get('/admin-game-board/{part}/{board_id}/{id}/{price}', 'index')->name('admin.game.board');

            
            Route::post('/admin-game-board-spinerUpdate', 'spinerUpdate')->name('admin.game.board.spinerUpdate');
            
            Route::post('/admin-game-board-add', 'store')->name('admin.game.board.add');
            Route::get('/admin-game-board-square-destory/{user_id}/{board_id}/{price}', 'destory')->name('admin.game.board.destory');
            
            // admin square show 
            Route::post('/admin-square_buy_show', 'square_show')->name('admin.square_buy.show');

            // admin set winner
            Route::post('/admin-set_winner_first', 'set_winner_first')->name('admin.set_winner_first.show');
            Route::post('/admin-set_winner_second', 'set_winner_second')->name('admin.set_winner_second.show');
            Route::post('/admin-set_winner_third', 'set_winner_third')->name('admin.set_winner_third.show');
            Route::post('/admin-set_winner_fourth', 'set_winner_fourth')->name('admin.set_winner_fourth.show');
            
            //announce winner
            Route::post('/admin-winner-announce', 'winner_announce')->name('admin.winner_announce.show');
            
            //teams
            Route::get('/admin-team-winning/{board_id}/{price}/{part}', 'teamWinning')->name('admin.team.Winning');
            // team ajax 
            Route::post('/admin-team-winning-ajax', 'teamWinningData')->name('admin.team.Winning.data.ajax');

            
            Route::get('/admin-game-board-block-unblock/{part}/{board_id}/{id}/{price}/{status}', 'block_unblockGameBoard')->name('admin.game.board.block.unblock');
        });

        Route::controller(DeleteBoardsController::class)->group(function () {
            Route::get('/admin-board-delete-list', 'board_delete_list')->name('board.delete.list');
            Route::get('/admin-board-part-delete-list', 'board_part_delete_list')->name('board.part.delete.list');
        });

        Route::controller(PercentageController::class)->group(function () {
            Route::get('/admin-percentage', 'index')->name('admin.percentage.show');
            Route::post('/admin-percentage-store', 'store')->name('admin.percentage.store');
        });
        // Route::get('/admin/user-status',[AdminInnerPages::class, 'user_status'])->name('admin_user_status');

        Route::controller(NumberGenerateController::class)->group(function () {
            Route::get('/admin-number-genetarion', 'index')->name('admin.number.generation.list');
        });
    }
);

// Route::get('login',[AdminLogin::class,'showLoginForm'])->middleware('prevent.login');

Route::controller(PaypalController::class)
    ->prefix('paypal')
    ->group(function () {
        Route::view('payment', 'paypal.index')->name('create.payment');
        Route::get('handle-payment/{totalprice}/{board_id}/{price}/{part}', 'handlePayment')->name('make.payment');
        // Route::get('handle-all-payment/{boxes}','handle_all_payment')->name('make.all.payment');
        Route::get('cancel-payment', 'paymentCancel')->name('cancel.payment');
        Route::get('payment-success/{board_id}/{price}/{part}', 'paymentSuccess')->name('success.payment');

        //////////////////////////////////////
        // Route::get('refund' , 'refund');
    });


Route::fallback(function () {
    abort(404);
});
