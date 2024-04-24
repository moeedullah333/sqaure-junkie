@extends('website.layouts.main')
@section('content')
<body>
  <section class="banner-div">
    <div class="container">
      <div class="row">
        <div class="col-md-12 ">
          <h1>Generate Number</h1>
          <div class="text-center py-3">
            <span><a href="javascript:;">Home</a></span>
            <span><a href="javascript:;">Generate Number</a></span>

          </div>
        </div>
      </div>
    </div>
  </section>

  <section class="square_game_board">
    <div class="container">
      <div class="row">
        <div class="col-md-8">

          <div class="table-responsive">
            <table class="gamingBox">
              <thead>

              </thead>
              <tbody>
                <tr class="square_game_board_top">
                  <td class="greyColor" colspan="6"></td>
                  <td colspan="5" class="blackColor" style="padding-left: 20px !important;"><span>Game Date </span> <span>29/08/2023</span> </td>
                  <td colspan="4" class="blackColor"><span>Cowboys</span></td>
                </tr>
                <tr class="square_game_board_top">
                  <td class="greyColor" rowspan="5"></td>

                </tr>

                <tr>
                  <td class="lightYellow" colspan="4">1st</td>
                  <td class="lightYellow firstXnumber clear">0</td>
                  <td class="lightYellow firstXnumber clear">0</td>
                  <td class="lightYellow firstXnumber clear">0</td>
                  <td class="lightYellow firstXnumber clear">0</td>
                  <td class="lightYellow firstXnumber clear">0</td>
                  <td class="lightYellow firstXnumber clear">0</td>
                  <td class="lightYellow firstXnumber clear">0</td>
                  <td class="lightYellow firstXnumber clear">0</td>
                  <td class="lightYellow firstXnumber clear">0</td>
                  <td class="lightYellow firstXnumber clear">0</td>
                </tr>

                <tr>
                  <td class="lightYellow" rowspan="3">1st</td>
                  <td class="orangeColor" colspan="3">2nd</td>
                  <td class="orangeColor secondXnumber clear">0</td>
                  <td class="orangeColor secondXnumber clear">0</td>
                  <td class="orangeColor secondXnumber clear">0</td>
                  <td class="orangeColor secondXnumber clear">0</td>
                  <td class="orangeColor secondXnumber clear">0</td>
                  <td class="orangeColor secondXnumber clear">0</td>
                  <td class="orangeColor secondXnumber clear">0</td>
                  <td class="orangeColor secondXnumber clear">0</td>
                  <td class="orangeColor secondXnumber clear">0</td>
                  <td class="orangeColor secondXnumber clear">0</td>
                </tr>
                <tr>
                  <td rowspan="2" class="orangeColor">2nd</td>
                  <td colspan="2" class="lightBlue">3rd</td>
                  <td class="lightBlue thirdXnumber clear">0</td>
                  <td class="lightBlue thirdXnumber clear">0</td>
                  <td class="lightBlue thirdXnumber clear">0</td>
                  <td class="lightBlue thirdXnumber clear">0</td>
                  <td class="lightBlue thirdXnumber clear">0</td>
                  <td class="lightBlue thirdXnumber clear">0</td>
                  <td class="lightBlue thirdXnumber clear">0</td>
                  <td class="lightBlue thirdXnumber clear">0</td>
                  <td class="lightBlue thirdXnumber clear">0</td>
                  <td class="lightBlue thirdXnumber clear">0</td>
                </tr>

                <tr>
                  <td class="lightBlue">3rd</td>
                  <td class="blueColor">4th</td>
                  <td class="blueColor fourthXnumber clear">0</td>
                  <td class="blueColor fourthXnumber clear">0</td>
                  <td class="blueColor fourthXnumber clear">0</td>
                  <td class="blueColor fourthXnumber clear">0</td>
                  <td class="blueColor fourthXnumber clear">0</td>
                  <td class="blueColor fourthXnumber clear">0</td>
                  <td class="blueColor fourthXnumber clear">0</td>
                  <td class="blueColor fourthXnumber clear">0</td>
                  <td class="blueColor fourthXnumber clear">0</td>
                  <td class="blueColor fourthXnumber clear">0</td>
                </tr>
                <tr class="square_game_board_top">
                  <td class="blackColor" rowspan="11"><span style="width: 10%;">Opp</span></td>

                </tr>
                <tr>
                  <td class="lightYellow firstYnumber clear">0</td>
                  <td class="orangeColor secondYnumber clear">0</td>
                  <td class="lightBlue thirdYnumber clear">0</td>
                  <td class="blueColor fourthYnumber clear">0</td>
                  <td>
                    <label class="gameBox">
                      <input type="checkbox" value="" class="checkboxSquare">
                      <div class="checkMark"></div>
                    </label>
                  </td>
                  <td>
                    <label class="gameBox">
                      <input type="checkbox" value="" class="checkboxSquare">
                      <div class="checkMark"></div>
                    </label>
                  </td>
                  <td>
                    <label class="gameBox">
                      <input type="checkbox" value="" class="checkboxSquare">
                      <div class="checkMark"></div>
                    </label>
                  </td>
                  <td>
                    <label class="gameBox">
                      <input type="checkbox" value="" class="checkboxSquare">
                      <div class="checkMark"></div>
                    </label>
                  </td>
                  <td>
                    <label class="gameBox">
                      <input type="checkbox" value="" class="checkboxSquare">
                      <div class="checkMark"></div>
                    </label>
                  </td>
                  <td>
                    <label class="gameBox">
                      <input type="checkbox" value="" class="checkboxSquare">
                      <div class="checkMark"></div>
                    </label>
                  </td>
                  <td>
                    <label class="gameBox">
                      <input type="checkbox" value="" class="checkboxSquare">
                      <div class="checkMark"></div>
                    </label>
                  </td>
                  <td>
                    <label class="gameBox">
                      <input type="checkbox" value="" class="checkboxSquare">
                      <div class="checkMark"></div>
                    </label>
                  </td>
                  <td>
                    <label class="gameBox">
                      <input type="checkbox" value="" class="checkboxSquare">
                      <div class="checkMark"></div>
                    </label>
                  </td>
                  <td>
                    <label class="gameBox">
                      <input type="checkbox" value="" class="checkboxSquare">
                      <div class="checkMark"></div>
                    </label>
                  </td>
                </tr>

                <tr>
                  <td class="lightYellow firstYnumber clear">0</td>
                  <td class="orangeColor secondYnumber clear">0</td>
                  <td class="lightBlue thirdYnumber clear">0</td>
                  <td class="blueColor fourthYnumber clear">0</td>
                  <td>
                    <label class="gameBox">
                      <input type="checkbox" value="" class="checkboxSquare">
                      <div class="checkMark"></div>
                    </label>
                  </td>
                  <td>
                    <label class="gameBox">
                      <input type="checkbox" value="" class="checkboxSquare">
                      <div class="checkMark"></div>
                    </label>
                  </td>
                  <td>
                    <label class="gameBox">
                      <input type="checkbox" value="" class="checkboxSquare">
                      <div class="checkMark"></div>
                    </label>
                  </td>
                  <td>
                    <label class="gameBox">
                      <input type="checkbox" value="" class="checkboxSquare">
                      <div class="checkMark"></div>
                    </label>
                  </td>
                  <td>
                    <label class="gameBox">
                      <input type="checkbox" value="" class="checkboxSquare">
                      <div class="checkMark"></div>
                    </label>
                  </td>
                  <td>
                    <label class="gameBox">
                      <input type="checkbox" value="" class="checkboxSquare">
                      <div class="checkMark"></div>
                    </label>
                  </td>
                  <td>
                    <label class="gameBox">
                      <input type="checkbox" value="" class="checkboxSquare">
                      <div class="checkMark"></div>
                    </label>
                  </td>
                  <td>
                    <label class="gameBox">
                      <input type="checkbox" value="" class="checkboxSquare">
                      <div class="checkMark"></div>
                    </label>
                  </td>
                  <td>
                    <label class="gameBox">
                      <input type="checkbox" value="" class="checkboxSquare">
                      <div class="checkMark"></div>
                    </label>
                  </td>
                  <td>
                    <label class="gameBox">
                      <input type="checkbox" value="" class="checkboxSquare">
                      <div class="checkMark"></div>
                    </label>
                  </td>
                </tr>
                <tr>
                  <td class="lightYellow firstYnumber clear">0</td>
                  <td class="orangeColor secondYnumber clear">0</td>
                  <td class="lightBlue thirdYnumber clear">0</td>
                  <td class="blueColor fourthYnumber clear">0</td>
                  <td>
                    <label class="gameBox">
                      <input type="checkbox" value="" class="checkboxSquare">
                      <div class="checkMark"></div>
                    </label>
                  </td>
                  <td>
                    <label class="gameBox">
                      <input type="checkbox" value="" class="checkboxSquare">
                      <div class="checkMark"></div>
                    </label>
                  </td>
                  <td>
                    <label class="gameBox">
                      <input type="checkbox" value="" class="checkboxSquare">
                      <div class="checkMark"></div>
                    </label>
                  </td>
                  <td>
                    <label class="gameBox">
                      <input type="checkbox" value="" class="checkboxSquare">
                      <div class="checkMark"></div>
                    </label>
                  </td>
                  <td>
                    <label class="gameBox">
                      <input type="checkbox" value="" class="checkboxSquare">
                      <div class="checkMark"></div>
                    </label>
                  </td>
                  <td>
                    <label class="gameBox">
                      <input type="checkbox" value="" class="checkboxSquare">
                      <div class="checkMark"></div>
                    </label>
                  </td>
                  <td>
                    <label class="gameBox">
                      <input type="checkbox" value="" class="checkboxSquare">
                      <div class="checkMark"></div>
                    </label>
                  </td>
                  <td>
                    <label class="gameBox">
                      <input type="checkbox" value="" class="checkboxSquare">
                      <div class="checkMark"></div>
                    </label>
                  </td>
                  <td>
                    <label class="gameBox">
                      <input type="checkbox" value="" class="checkboxSquare">
                      <div class="checkMark"></div>
                    </label>
                  </td>
                  <td>
                    <label class="gameBox">
                      <input type="checkbox" value="" class="checkboxSquare">
                      <div class="checkMark"></div>
                    </label>
                  </td>
                </tr>
                <tr>
                  <td class="lightYellow firstYnumber clear">0</td>
                  <td class="orangeColor secondYnumber clear">0</td>
                  <td class="lightBlue thirdYnumber clear">0</td>
                  <td class="blueColor fourthYnumber clear">0</td>
                  <td>
                    <label class="gameBox">
                      <input type="checkbox" value="" class="checkboxSquare">
                      <div class="checkMark"></div>
                    </label>
                  </td>
                  <td>
                    <label class="gameBox">
                      <input type="checkbox" value="" class="checkboxSquare">
                      <div class="checkMark"></div>
                    </label>
                  </td>
                  <td>
                    <label class="gameBox">
                      <input type="checkbox" value="" class="checkboxSquare">
                      <div class="checkMark"></div>
                    </label>
                  </td>
                  <td>
                    <label class="gameBox">
                      <input type="checkbox" value="" class="checkboxSquare">
                      <div class="checkMark"></div>
                    </label>
                  </td>
                  <td>
                    <label class="gameBox">
                      <input type="checkbox" value="" class="checkboxSquare">
                      <div class="checkMark"></div>
                    </label>
                  </td>
                  <td>
                    <label class="gameBox">
                      <input type="checkbox" value="" class="checkboxSquare">
                      <div class="checkMark"></div>
                    </label>
                  </td>
                  <td>
                    <label class="gameBox">
                      <input type="checkbox" value="" class="checkboxSquare">
                      <div class="checkMark"></div>
                    </label>
                  </td>
                  <td>
                    <label class="gameBox">
                      <input type="checkbox" value="" class="checkboxSquare">
                      <div class="checkMark"></div>
                    </label>
                  </td>
                  <td>
                    <label class="gameBox">
                      <input type="checkbox" value="" class="checkboxSquare">
                      <div class="checkMark"></div>
                    </label>
                  </td>
                  <td>
                    <label class="gameBox">
                      <input type="checkbox" value="" class="checkboxSquare">
                      <div class="checkMark"></div>
                    </label>
                  </td>
                </tr>
                <tr>
                  <td class="lightYellow firstYnumber clear">0</td>
                  <td class="orangeColor secondYnumber clear">0</td>
                  <td class="lightBlue thirdYnumber clear">0</td>
                  <td class="blueColor fourthYnumber clear">0</td>
                  <td>
                    <label class="gameBox">
                      <input type="checkbox" value="" class="checkboxSquare">
                      <div class="checkMark"></div>
                    </label>
                  </td>
                  <td>
                    <label class="gameBox">
                      <input type="checkbox" value="" class="checkboxSquare">
                      <div class="checkMark"></div>
                    </label>
                  </td>
                  <td>
                    <label class="gameBox">
                      <input type="checkbox" value="" class="checkboxSquare">
                      <div class="checkMark"></div>
                    </label>
                  </td>
                  <td>
                    <label class="gameBox">
                      <input type="checkbox" value="" class="checkboxSquare">
                      <div class="checkMark"></div>
                    </label>
                  </td>
                  <td>
                    <label class="gameBox">
                      <input type="checkbox" value="" class="checkboxSquare">
                      <div class="checkMark"></div>
                    </label>
                  </td>
                  <td>
                    <label class="gameBox">
                      <input type="checkbox" value="" class="checkboxSquare">
                      <div class="checkMark"></div>
                    </label>
                  </td>
                  <td>
                    <label class="gameBox">
                      <input type="checkbox" value="" class="checkboxSquare">
                      <div class="checkMark"></div>
                    </label>
                  </td>
                  <td>
                    <label class="gameBox">
                      <input type="checkbox" value="" class="checkboxSquare">
                      <div class="checkMark"></div>
                    </label>
                  </td>
                  <td>
                    <label class="gameBox">
                      <input type="checkbox" value="" class="checkboxSquare">
                      <div class="checkMark"></div>
                    </label>
                  </td>
                  <td>
                    <label class="gameBox">
                      <input type="checkbox" value="" class="checkboxSquare">
                      <div class="checkMark"></div>
                    </label>
                  </td>
                </tr>
                <tr>
                  <td class="lightYellow firstYnumber clear">0</td>
                  <td class="orangeColor secondYnumber clear">0</td>
                  <td class="lightBlue thirdYnumber clear">0</td>
                  <td class="blueColor fourthYnumber clear">0</td>
                  <td>
                    <label class="gameBox">
                      <input type="checkbox" value="" class="checkboxSquare">
                      <div class="checkMark"></div>
                    </label>
                  </td>
                  <td>
                    <label class="gameBox">
                      <input type="checkbox" value="" class="checkboxSquare">
                      <div class="checkMark"></div>
                    </label>
                  </td>
                  <td>
                    <label class="gameBox">
                      <input type="checkbox" value="" class="checkboxSquare">
                      <div class="checkMark"></div>
                    </label>
                  </td>
                  <td>
                    <label class="gameBox">
                      <input type="checkbox" value="" class="checkboxSquare">
                      <div class="checkMark"></div>
                    </label>
                  </td>
                  <td>
                    <label class="gameBox">
                      <input type="checkbox" value="" class="checkboxSquare">
                      <div class="checkMark"></div>
                    </label>
                  </td>
                  <td>
                    <label class="gameBox">
                      <input type="checkbox" value="" class="checkboxSquare">
                      <div class="checkMark"></div>
                    </label>
                  </td>
                  <td>
                    <label class="gameBox">
                      <input type="checkbox" value="" class="checkboxSquare">
                      <div class="checkMark"></div>
                    </label>
                  </td>
                  <td>
                    <label class="gameBox">
                      <input type="checkbox" value="" class="checkboxSquare">
                      <div class="checkMark"></div>
                    </label>
                  </td>
                  <td>
                    <label class="gameBox">
                      <input type="checkbox" value="" class="checkboxSquare">
                      <div class="checkMark"></div>
                    </label>
                  </td>
                  <td>
                    <label class="gameBox">
                      <input type="checkbox" value="" class="checkboxSquare">
                      <div class="checkMark"></div>
                    </label>
                  </td>
                </tr>
                <tr>
                  <td class="lightYellow firstYnumber clear">0</td>
                  <td class="orangeColor secondYnumber clear">0</td>
                  <td class="lightBlue thirdYnumber clear">0</td>
                  <td class="blueColor fourthYnumber clear">0</td>
                  <td>
                    <label class="gameBox">
                      <input type="checkbox" value="" class="checkboxSquare">
                      <div class="checkMark"></div>
                    </label>
                  </td>
                  <td>
                    <label class="gameBox">
                      <input type="checkbox" value="" class="checkboxSquare">
                      <div class="checkMark"></div>
                    </label>
                  </td>
                  <td>
                    <label class="gameBox">
                      <input type="checkbox" value="" class="checkboxSquare">
                      <div class="checkMark"></div>
                    </label>
                  </td>
                  <td>
                    <label class="gameBox">
                      <input type="checkbox" value="" class="checkboxSquare">
                      <div class="checkMark"></div>
                    </label>
                  </td>
                  <td>
                    <label class="gameBox">
                      <input type="checkbox" value="" class="checkboxSquare">
                      <div class="checkMark"></div>
                    </label>
                  </td>
                  <td>
                    <label class="gameBox">
                      <input type="checkbox" value="" class="checkboxSquare">
                      <div class="checkMark"></div>
                    </label>
                  </td>
                  <td>
                    <label class="gameBox">
                      <input type="checkbox" value="" class="checkboxSquare">
                      <div class="checkMark"></div>
                    </label>
                  </td>
                  <td>
                    <label class="gameBox">
                      <input type="checkbox" value="" class="checkboxSquare">
                      <div class="checkMark"></div>
                    </label>
                  </td>
                  <td>
                    <label class="gameBox">
                      <input type="checkbox" value="" class="checkboxSquare">
                      <div class="checkMark"></div>
                    </label>
                  </td>
                  <td>
                    <label class="gameBox">
                      <input type="checkbox" value="" class="checkboxSquare">
                      <div class="checkMark"></div>
                    </label>
                  </td>
                </tr>
                <tr>
                  <td class="lightYellow firstYnumber clear">0</td>
                  <td class="orangeColor secondYnumber clear">0</td>
                  <td class="lightBlue thirdYnumber clear">0</td>
                  <td class="blueColor fourthYnumber clear">0</td>
                  <td>
                    <label class="gameBox">
                      <input type="checkbox" value="" class="checkboxSquare">
                      <div class="checkMark"></div>
                    </label>
                  </td>
                  <td>
                    <label class="gameBox">
                      <input type="checkbox" value="" class="checkboxSquare">
                      <div class="checkMark"></div>
                    </label>
                  </td>
                  <td>
                    <label class="gameBox">
                      <input type="checkbox" value="" class="checkboxSquare">
                      <div class="checkMark"></div>
                    </label>
                  </td>
                  <td>
                    <label class="gameBox">
                      <input type="checkbox" value="" class="checkboxSquare">
                      <div class="checkMark"></div>
                    </label>
                  </td>
                  <td>
                    <label class="gameBox">
                      <input type="checkbox" value="" class="checkboxSquare">
                      <div class="checkMark"></div>
                    </label>
                  </td>
                  <td>
                    <label class="gameBox">
                      <input type="checkbox" value="" class="checkboxSquare">
                      <div class="checkMark"></div>
                    </label>
                  </td>
                  <td>
                    <label class="gameBox">
                      <input type="checkbox" value="" class="checkboxSquare">
                      <div class="checkMark"></div>
                    </label>
                  </td>
                  <td>
                    <label class="gameBox">
                      <input type="checkbox" value="" class="checkboxSquare">
                      <div class="checkMark"></div>
                    </label>
                  </td>
                  <td>
                    <label class="gameBox">
                      <input type="checkbox" value="" class="checkboxSquare">
                      <div class="checkMark"></div>
                    </label>
                  </td>
                  <td>
                    <label class="gameBox">
                      <input type="checkbox" value="" class="checkboxSquare">
                      <div class="checkMark"></div>
                    </label>
                  </td>
                </tr>
                <tr>
                  <td class="lightYellow firstYnumber clear">0</td>
                  <td class="orangeColor secondYnumber clear">0</td>
                  <td class="lightBlue thirdYnumber clear">0</td>
                  <td class="blueColor fourthYnumber clear">0</td>
                  <td>
                    <label class="gameBox">
                      <input type="checkbox" value="" class="checkboxSquare">
                      <div class="checkMark"></div>
                    </label>
                  </td>
                  <td>
                    <label class="gameBox">
                      <input type="checkbox" value="" class="checkboxSquare">
                      <div class="checkMark"></div>
                    </label>
                  </td>
                  <td>
                    <label class="gameBox">
                      <input type="checkbox" value="" class="checkboxSquare">
                      <div class="checkMark"></div>
                    </label>
                  </td>
                  <td>
                    <label class="gameBox">
                      <input type="checkbox" value="" class="checkboxSquare">
                      <div class="checkMark"></div>
                    </label>
                  </td>
                  <td>
                    <label class="gameBox">
                      <input type="checkbox" value="" class="checkboxSquare">
                      <div class="checkMark"></div>
                    </label>
                  </td>
                  <td>
                    <label class="gameBox">
                      <input type="checkbox" value="" class="checkboxSquare">
                      <div class="checkMark"></div>
                    </label>
                  </td>
                  <td>
                    <label class="gameBox">
                      <input type="checkbox" value="" class="checkboxSquare">
                      <div class="checkMark"></div>
                    </label>
                  </td>
                  <td>
                    <label class="gameBox">
                      <input type="checkbox" value="" class="checkboxSquare">
                      <div class="checkMark"></div>
                    </label>
                  </td>
                  <td>
                    <label class="gameBox">
                      <input type="checkbox" value="" class="checkboxSquare">
                      <div class="checkMark"></div>
                    </label>
                  </td>
                  <td>
                    <label class="gameBox">
                      <input type="checkbox" value="" class="checkboxSquare">
                      <div class="checkMark"></div>
                    </label>
                  </td>
                </tr>
                <tr>
                  <td class="lightYellow firstYnumber clear">0</td>
                  <td class="orangeColor secondYnumber clear">0</td>
                  <td class="lightBlue thirdYnumber clear">0</td>
                  <td class="blueColor fourthYnumber clear">0</td>
                  <td>
                    <label class="gameBox">
                      <input type="checkbox" value="" class="checkboxSquare">
                      <div class="checkMark"></div>
                    </label>
                  </td>
                  <td>
                    <label class="gameBox">
                      <input type="checkbox" value="" class="checkboxSquare">
                      <div class="checkMark"></div>
                    </label>
                  </td>
                  <td>
                    <label class="gameBox">
                      <input type="checkbox" value="" class="checkboxSquare">
                      <div class="checkMark"></div>
                    </label>
                  </td>
                  <td>
                    <label class="gameBox">
                      <input type="checkbox" value="" class="checkboxSquare">
                      <div class="checkMark"></div>
                    </label>
                  </td>
                  <td>
                    <label class="gameBox">
                      <input type="checkbox" value="" class="checkboxSquare">
                      <div class="checkMark"></div>
                    </label>
                  </td>
                  <td>
                    <label class="gameBox">
                      <input type="checkbox" value="" class="checkboxSquare">
                      <div class="checkMark"></div>
                    </label>
                  </td>
                  <td>
                    <label class="gameBox">
                      <input type="checkbox" value="" class="checkboxSquare">
                      <div class="checkMark"></div>
                    </label>
                  </td>
                  <td>
                    <label class="gameBox">
                      <input type="checkbox" value="" class="checkboxSquare">
                      <div class="checkMark"></div>
                    </label>
                  </td>
                  <td>
                    <label class="gameBox">
                      <input type="checkbox" value="" class="checkboxSquare">
                      <div class="checkMark"></div>
                    </label>
                  </td>
                  <td>
                    <label class="gameBox">
                      <input type="checkbox" value="" class="checkboxSquare">
                      <div class="checkMark"></div>
                    </label>
                  </td>
                </tr>
              </tbody>
            </table>
          </div>
        </div>
        <div class="col-md-2 align-self-center">
          <div class="generate_numbers_side">

            <button class="clear_btn">Clear Numbers</button>

            <button><sup>2nd</sup> Quater </button>

            <button> <sup>4th</sup> Quater</button>
            <button>Number Of Spins</button>

          </div>
        </div>
        <div class="col-md-2 align-self-center">
          <div class="generate_numbers_side">


            <button> <sup>1st</sup> Quater</button>

            <button> <sup>3rd</sup> Quater</button>
            <span>00</span>

          </div>
        </div>
      </div>
    </div>
  </section>

  <section class="our_winners_section">
    <div class="container">
      <div class="row">
        <div class="col-md-10 mx-auto">
          <div class="our_winners_content">
            <h1>Our <span>Winners</span></h1>
            <p class="pb-4">Lorem Ipsum is simply dummy text of the printing and typesetting industry Lorem Ipsum has been the industry's standard dummy text ever since the when an unknown printer took a galley of type and scrambled it to make a type specimen book. </p>
          </div>
        </div>
        <div class="col-md-6">
          <div class="win_show_table">
            <table class="table table-bordered">
              <thead>

              </thead>
              <tbody>
                <tr>
                  <td colspan="2" rowspan="2" class="lightBlueColor">$10 <br> Square</td>
                  <td colspan="2" class="ligthYellColor">Right way</td>
                  <td rowspan="2" class="ligthYellColor">Pay <br> Out</td>
                  <td rowspan="2" class="greenColor">Winner</td>
                </tr>
                <tr>

                  <td class="ligthYellColor">Cowboys</td>
                  <td class="ligthYellColor">Opp</td>

                </tr>
                <tr>
                  <td colspan="2" class="lightGreen">1st. Qtr.</td>
                  <td class="ligthYellColor">0</td>
                  <td class="ligthYellColor">8</td>
                  <td class="lightPink">$72</td>
                  <td class="light_lightGreen">BB1</td>
                </tr>
                <tr>
                  <td colspan="2" class="lightGreen">2nd. Qtr.</td>
                  <td class="ligthYellColor">1</td>
                  <td class="ligthYellColor">2</td>
                  <td class="lightPink">$72</td>
                  <td class="light_lightGreen">KLG</td>
                </tr>
                <tr>
                  <td colspan="2" class="lightGreen">3rd. Qtr.</td>
                  <td class="ligthYellColor">1</td>
                  <td class="ligthYellColor">4</td>
                  <td class="lightPink">$72</td>
                  <td class="light_lightGreen">M$M</td>
                </tr>
                <tr>
                  <td colspan="2" class="lightGreen">4th. Qtr.</td>
                  <td class="ligthYellColor">2</td>
                  <td class="ligthYellColor">6</td>
                  <td class="lightPink">$136</td>
                  <td class="light_lightGreen">BB1</td>
                </tr>
              </tbody>
            </table>
          </div>
        </div>

        <div class="col-md-6">
          <div class="win_show_table">
            <table class="table table-bordered">
              <thead>

              </thead>
              <tbody>
                <tr>
                  <td colspan="2" rowspan="2" class="lightBlueColor">$10 <br> Square</td>
                  <td colspan="2" class="ligthYellColor">Plus 2</td>
                  <td rowspan="2" class="ligthYellColor">Pay <br> Out</td>
                  <td rowspan="2" class="greenColor">Winner</td>
                </tr>
                <tr>

                  <td class="ligthYellColor">Cowboys</td>
                  <td class="ligthYellColor">Opp</td>

                </tr>
                <tr>
                  <td colspan="2" class="lightGreen">1st. Qtr.</td>
                  <td class="ligthYellColor">0</td>
                  <td class="ligthYellColor">8</td>
                  <td class="lightPink">$72</td>
                  <td class="light_lightGreen">BB1</td>
                </tr>
                <tr>
                  <td colspan="2" class="lightGreen">2nd. Qtr.</td>
                  <td class="ligthYellColor">1</td>
                  <td class="ligthYellColor">2</td>
                  <td class="lightPink">$72</td>
                  <td class="light_lightGreen">KLG</td>
                </tr>
                <tr>
                  <td colspan="2" class="lightGreen">3rd. Qtr.</td>
                  <td class="ligthYellColor">1</td>
                  <td class="ligthYellColor">4</td>
                  <td class="lightPink">$72</td>
                  <td class="light_lightGreen">M$M</td>
                </tr>
                <tr>
                  <td colspan="2" class="lightGreen">4th. Qtr.</td>
                  <td class="ligthYellColor">2</td>
                  <td class="ligthYellColor">6</td>
                  <td class="lightPink">$136</td>
                  <td class="light_lightGreen">BB1</td>
                </tr>
              </tbody>
            </table>
          </div>
        </div>
        <div class="col-md-6">
          <div class="win_show_table">
            <table class="table table-bordered">
              <thead>

              </thead>
              <tbody>
                <tr>
                  <td colspan="2" rowspan="2" class="lightBlueColor">$10 <br> Square</td>
                  <td colspan="2" class="ligthYellColor">Wrong way</td>
                  <td rowspan="2" class="ligthYellColor">Pay <br> Out</td>
                  <td rowspan="2" class="greenColor">Winner</td>
                </tr>
                <tr>

                  <td class="ligthYellColor">Cowboys</td>
                  <td class="ligthYellColor">Opp</td>

                </tr>
                <tr>
                  <td colspan="2" class="lightGreen">1st. Qtr.</td>
                  <td class="ligthYellColor">0</td>
                  <td class="ligthYellColor">8</td>
                  <td class="lightPink">$72</td>
                  <td class="light_lightGreen">BB1</td>
                </tr>
                <tr>
                  <td colspan="2" class="lightGreen">2nd. Qtr.</td>
                  <td class="ligthYellColor">1</td>
                  <td class="ligthYellColor">2</td>
                  <td class="lightPink">$72</td>
                  <td class="light_lightGreen">KLG</td>
                </tr>
                <tr>
                  <td colspan="2" class="lightGreen">3rd. Qtr.</td>
                  <td class="ligthYellColor">1</td>
                  <td class="ligthYellColor">4</td>
                  <td class="lightPink">$72</td>
                  <td class="light_lightGreen">M$M</td>
                </tr>
                <tr>
                  <td colspan="2" class="lightGreen">4th. Qtr.</td>
                  <td class="ligthYellColor">2</td>
                  <td class="ligthYellColor">6</td>
                  <td class="lightPink">$136</td>
                  <td class="light_lightGreen">BB1</td>
                </tr>
              </tbody>
            </table>
          </div>
        </div>
        <div class="col-md-6">
          <div class="win_show_table">
            <table class="table table-bordered">
              <thead>

              </thead>
              <tbody>
                <tr>
                  <td colspan="2" rowspan="2" class="lightBlueColor">$10 <br> Square</td>
                  <td colspan="2" class="ligthYellColor">Minus 2</td>
                  <td rowspan="2" class="ligthYellColor">Pay <br> Out</td>
                  <td rowspan="2" class="greenColor">Winner</td>
                </tr>
                <tr>

                  <td class="ligthYellColor">Cowboys</td>
                  <td class="ligthYellColor">Opp</td>

                </tr>
                <tr>
                  <td colspan="2" class="lightGreen">1st. Qtr.</td>
                  <td class="ligthYellColor">0</td>
                  <td class="ligthYellColor">8</td>
                  <td class="lightPink">$72</td>
                  <td class="light_lightGreen">BB1</td>
                </tr>
                <tr>
                  <td colspan="2" class="lightGreen">2nd. Qtr.</td>
                  <td class="ligthYellColor">1</td>
                  <td class="ligthYellColor">2</td>
                  <td class="lightPink">$72</td>
                  <td class="light_lightGreen">KLG</td>
                </tr>
                <tr>
                  <td colspan="2" class="lightGreen">3rd. Qtr.</td>
                  <td class="ligthYellColor">1</td>
                  <td class="ligthYellColor">4</td>
                  <td class="lightPink">$72</td>
                  <td class="light_lightGreen">M$M</td>
                </tr>
                <tr>
                  <td colspan="2" class="lightGreen">4th. Qtr.</td>
                  <td class="ligthYellColor">2</td>
                  <td class="ligthYellColor">6</td>
                  <td class="lightPink">$136</td>
                  <td class="light_lightGreen">BB1</td>
                </tr>
              </tbody>
            </table>
          </div>
        </div>

        <div class="col-md-12 text-center py-3">
          <button type="button" class="btn btn-primary">Load More</button>
          
        </div>
    
      </div>
    </div>
  </section>
  
@endsection