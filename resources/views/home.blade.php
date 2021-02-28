@extends('layouts.app')
@section('css')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.10.2/fullcalendar.css" integrity="sha512-U4eJImzWCUkxYrmi9Skaj6ksVj+JBsLR2CEam6IJEVyKtHUAxOIRSoqgB0xkqKrduL8LTuWEdX8B+zDFPbQHmw==" crossorigin="anonymous" />
@endsection

@section('content')
<div class="container">
    <div id='calendar'></div>
</div>
<!-- Modal -->
<div class="modal fade" id="registerModal" tabindex="-1" role="dialog" aria-labelledby="registerModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel"></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form method="POST">
                @csrf
            <div class="modal-body">
                <div class="row">
                    <input type="hidden" name="date" id="date">
                    <label>開始時間</label>
                    <select name="start_hour">
                        <option value="6">6</option>
                        <option value="7">7</option>
                        <option value="8">8</option>
                        <option value="9">9</option>
                        <option value="10">10</option>
                        <option value="11">11</option>
                        <option value="12">12</option>
                        <option value="13">13</option>
                        <option value="14">14</option>
                        <option value="15">15</option>
                        <option value="16">16</option>
                        <option value="17">17</option>
                        <option value="18">18</option>
                        <option value="19">19</option>
                        <option value="20">20</option>
                        <option value="21">21</option>
                        <option value="22">22</option>
                        <option value="23">23</option>
                    </select>
                    時
                    <select name="start_minute">
                        <option value="0">00</option>
                        <option value="30">30</option>
                    </select>
                    分
                </div>

                <div class="row">
                    <label>終了</label>
                    <select name="end_hour">
                        <option value="6">6</option>
                        <option value="7">7</option>
                        <option value="8">8</option>
                        <option value="9">9</option>
                        <option value="10">10</option>
                        <option value="11">11</option>
                        <option value="12">12</option>
                        <option value="13">13</option>
                        <option value="14">14</option>
                        <option value="15">15</option>
                        <option value="16">16</option>
                        <option value="17">17</option>
                        <option value="18">18</option>
                        <option value="19">19</option>
                        <option value="20">20</option>
                        <option value="21">21</option>
                        <option value="22">22</option>
                        <option value="23">23</option>
                    </select>
                    時
                    <select name="end_minute">
                        <option value="0">00</option>
                        <option value="30">30</option>
                    </select>
                    分
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">閉じる</button>
                <button type="submit" class="btn btn-primary">登録</button>
            </div>
            </form>
        </div>
    </div>
</div>

@endsection

@section('javascript')
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/fullcalendar@5.5.0/main.min.css">
    <script src="https://cdn.jsdelivr.net/npm/fullcalendar@5.5.0/main.min.js"></script>

    <script>

        document.addEventListener('DOMContentLoaded', function() {
            var calendarEl = document.getElementById('calendar');
            var calendar = new FullCalendar.Calendar(calendarEl, {
                selectable: true,
                headerToolbar: {
                left: 'prev,next today',
                center: 'title',
                right: 'dayGridMonth,timeGridWeek,timeGridDay'
                },
                //initialView: 'dayGridMonth',
                //'dayGridMonth' 'dayGridWeek', 'timeGridDay', 'listWeek'

                events:[
                        @foreach($calender as $element)
                        {
                            id: '{{$element->id}}',
                            title: '{{$element->user_id}}',
                            start: '{{$element->start_time_plan}}',
                            end: '{{$element->end_time_plan}}',
                            url: '#'
                        },
                        @endforeach
                ],
                eventClick: function(info) {
                    alert('Event: ' + info.event.title);
                    alert('Coordinates: ' + info.jsEvent.pageX + ',' + info.jsEvent.pageY);
                    alert('View: ' + info.view.type);

                    // change the border color just for fun
                    info.el.style.borderColor = 'red';
                },
                dateClick: function(info) {
                    //クリックした日付が取れるよ
                    $("#date").val(info.dateStr);
                    $("#exampleModalLabel").text(info.dateStr);
                    $('#registerModal').modal('show');
                }

            });
            calendar.render();
        });


    </script>
@endsection
