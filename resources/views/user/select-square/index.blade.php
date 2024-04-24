@extends('user.user-layout.main')
@section('content')
    <div class="notification-section shadow rounded-15 p-3 pt-5 my-4">
        <div class="row justify-content-between">
            <div class="col-md-12 mb-3">
                <h3 class="achivpFont">Select Square</h3>
            </div>
        </div>

        <div class="row pt-5">
            @foreach ($boards as $item)
                <div class="col-md-3">
                    <div class="card mt-3">
                        <div class="card-body">
                            <span>Board Name :</span>
                            <h5 class="card-title">{{ $item->board_name }}</h5>

                            <button type="button" data-boardid="{{ $item->id }}"
                                class="btn btn-primary board-class">Board
                                Part</button>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>

        <div class="showBoardsParts">

        </div>

    </div>
    </div>
@endsection

@push('js')
    <script>
        $(document).ready(function() {
            $('.board-class').on('click', function() {
                $('.showBoardsParts').html('');

                let url = "{{ route('user.select-square-data') }}";

                let data = {
                    '_token': '{{ csrf_token() }}',
                    'board_id': $(this).data('boardid'),
                }

                let res = AjaxRequest(url, data);

                let html;

                if (res.status == true) {
                    html = `<div class="row mt-5 justify-content-between">
                                <div class="col-md-12 mb-3">
                                    <h3 class="achivpFont">BoardName</h3>
                                </div>
                            </div>
                            <div class="row">`;

                    res.data.forEach(element => {

                        let url =
                            "{{ route('user.board', ['part' => ':part', 'id' => ':partId', 'board_id' => ':board_id', 'price' => ':price']) }}";
                        url = url.replace(':part', element.part)
                            .replace(':partId', element.id)
                            .replace(':board_id', element.board_id)
                            .replace(':price', element.price);

                        html += `
                            <br>
                            <div class="col-md-3">
                                <div class="card" style="width: 18rem;">
                                    <div class="card-body">
                                        <h5 class="card-title">${element.part}</h5>
                                        <h5 class="card-title">${element.price}</h5>
                                        <a href="${url}" class="btn btn-primary">Go to Board</a>
                                    </div>
                                </div>
                            </div>
                       `;
                    });
                    html += `</div>`;


                    $('.showBoardsParts').append(html);
                }
            });
        });
    </script>
@endpush
