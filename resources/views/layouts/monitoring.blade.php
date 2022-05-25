@extends('layouts.app')

@section('content')
<div class="custom-layout-div container-fluid"
    style="
        background: url(image/background.svg);
        background-repeat: no-repeat;
        background-position: center;
        background-size: cover;
    ">
    <div class="content-handler">
        <!-- header -->
        <div class="content-header">
            <img src="image/tech.png" style="width:120px; height:120px;">
            <font class="custom-text">TECHNICAL BREAKTIME MONITORING</font>
        </div>
        <!-- Digital clock -->
        <div class="content-time">
            <span id="date" class="date"></span>
            <span id="time" class="time"></span>
        </div>
        <!-- Search for employee breaktime ID -->
        <div class="content-search">
            <i class="fas fa-search ha2"></i>
            <button type="submit" name="btnSearch" data-toggle="modal" data-target="#searcModal" class="search-btn submitBtn">Search Employee ID</button>
        </div>
        <!-- Table for 15mins and 30mins break -->
        <div class="tbl-handler">

            <div id="smoke" class="tableFixHead">
                <table>
                    <thead class="border">
                        <tr>
                            <td colspan="5"><B>15 MINUTES BREAK</B></td>
                        </tr>
                        <tr>
                            <td>NAME</td>
                            <td>TIME IN</td>
                            <td>TIME OUT</td>
                            <td>DURATION</td>
                            <td>STATUS</td>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($data1 as $datas1)
                            <tr>
                                <td>{{ $datas1->techFname }}</td>
                                <td>{{ $datas1->timeIn }}</td>
                                <td>{{ $datas1->timeOut }}</td>
                                @if($datas1->duration != '')
                                    <td>{{ $datas1->duration }} Mins</td>
                                @else
                                    <td>.......</td>
                                @endif
                                @if($datas1->status == 'OVERBREAK')
                                    <td><b class="overBreak">{{ $datas1->status }}</b></td>
                                @elseif($datas1->status == '')
                                    <td><b class="onGoing">ON BREAK</b></td>
                                @else
                                    <td><b class="onTime">{{ $datas1->status }}</b></td>
                                @endif
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <div id="meal" class="tableFixHead">
                <table>
                    <thead class="border">
                        <tr>
                            <td colspan="5"><B>30 MINUTES BREAK</B></td>
                        </tr>
                        <tr>
                            <td>NAME</td>
                            <td>TIME IN</td>
                            <td>TIME OUT</td>
                            <td>DURATION</td>
                            <td>STATUS</td>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($data2 as $datas1)
                            <tr>
                                <td>{{ $datas1->techFname }}</td>
                                <td>{{ $datas1->timeIn }}</td>
                                <td>{{ $datas1->timeOut }}</td>
                                @if($datas1->duration != '')
                                    <td>{{ $datas1->duration }} Mins</td>
                                @else
                                    <td>.......</td>
                                @endif
                                @if($datas1->status == 'OVERBREAK')
                                    <td><b class="overBreak">{{ $datas1->status }}</b></td>
                                @elseif($datas1->status == '')
                                    <td><b class="onGoing">ON BREAK</b></td>
                                @else
                                    <td><b class="onTime">{{ $datas1->status }}</b></td>
                                @endif
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <!-- Modal -->
            <div class="modal fade" id="searcModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content modalRadius" >
                    <div class="modal-header center" >
                        <i class="fas fa-user-clock modalFa"></i>
                        <h5 class="modal-headers titleModal" id="exampleModalLabel">Search Employee ID</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form autocomplete="off" action="{{ route('timeStamp') }}" method="post">
                        @csrf
                        <div class="center p-2">
                            <input type="text" name="search" id="search" class="searchField" placeholder="Search your Employee ID" />
                        </div>
                        <div class="modal-body center">
                        <div id="techList"></div>
                        </div>
                        <div class="modal-footer center">
                            <input type="hidden" name="timeNow" id="timeNow" />
                            <input type="hidden" name="dateNow" id="dateNow" />
                            <button type="submit" name="action" value="short" class="modalBtn">15 Minutes Break</button>
                            <button type="submit" name="action" value="long" class="modalBtn">30 Minutes Break</button>
                        </div>
                    </form>
                </div>
            </div>
            </div>
            <!-- <div class="footer">
                asd
            </div> -->
        </div>
    </div>
</div>
<script src="https://cdn.jsdelivr.net/npm/moment@2.22.2/moment.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment-timezone/0.5.34/moment-timezone.min.js"></script>

<script>
    const date = document.getElementById('date');
    const time = document.getElementById('time');
    // const techTime = document.getElementById('timeNow');
    setInterval(() =>{
        moment.tz.add('Asia/Manila|PST PDT JST|-80 -90 -90|010201010|-1kJI0 AL0 cK10 65X0 mXB0 vX0 VK10 1db0|24e6');
        const currDate = moment().tz('Asia/Manila').format('dddd, MMM DD');
        const getDate = moment().tz('Asia/Manila').format('YYYY-MM-DD');
        const runningTime = moment().tz('Asia/Manila').format('hh:mm A');
        this.date.textContent = currDate;
        this.time.textContent = runningTime;
        $('#dateNow').val(getDate);
        $('#timeNow').val(runningTime);
    }, 1000);
</script>
<script>
    $(document).ready(function(){
       $('#search').on('keyup',function(){
            var query= $(this).val();
            $.ajax({
                url:"search",
                type:"GET",
                data:{'search':query},
                success:function(data){
                    $('#techList').html(data);
                }
            });
        });
    });
</script>



@endsection
