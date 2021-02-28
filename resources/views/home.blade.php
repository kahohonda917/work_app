@extends('layouts.app')
@section('css')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.10.2/fullcalendar.css" integrity="sha512-U4eJImzWCUkxYrmi9Skaj6ksVj+JBsLR2CEam6IJEVyKtHUAxOIRSoqgB0xkqKrduL8LTuWEdX8B+zDFPbQHmw==" crossorigin="anonymous" />
@endsection

@section('content')
<div class="container">
    <div id='calendar'></div>
</div>
@endsection

@section('javascript')
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/fullcalendar@5.5.0/main.min.css">
    <script src="https://cdn.jsdelivr.net/npm/fullcalendar@5.5.0/main.min.js"></script>

    <script>

            // document.addEventListener('DOMContentLoaded', function() {
            // var calendarEl = document.getElementById('calendar');

            // var calendar = new FullCalendar.Calendar(calendarEl, {
            //     selectable: true,
            //     headerToolbar: {
            //     left: 'prev,next today',
            //     center: 'title',
            //     right: 'dayGridMonth,timeGridWeek,timeGridDay'
            //     },
            //     dateClick: function(info) {
            //     calendar.changeView('dayGridWeek');
                //alert('clicked ' + info.dateStr);
                //},
                //select: function(info) {
                //right: 'dayGridWeek'
                // alert('selected ' + info.startStr + ' to ' + info.endStr);
                // }
            // });

            // calendar.render();
            // });
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
                    {
                        id: '1',
                        title: 'event1',
                        start: '2021-01-01',
                        url: '#'
                    },
                    {
                        id: '2',
                        title: 'event2',
                        start: '2021-01-05',
                        url: '#'
                    },
                    {
                        id: '3',
                        title: 'event3',
                        start: '2021-01-07',
                        end: '2021-01-11', // 2021-01-10 23:59:59で終了
                        url: '#'
                    },
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
                    calendar.changeView('dayGridWeek');
                    alert('clicked ' + info.dateStr);
                }
                
            });



            
            calendar.render();
        });


    </script>
@endsection
