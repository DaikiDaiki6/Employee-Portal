<!-- PDF Generator of OPCR -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Daily Time Record</title>
    <style>
        .container {
            width: 100%;
            margin: 0 auto;
        }
        table {
            width: 100%;
            border-collapse: collapse;
        }
        th, td {
            border: 1px solid #000;
            text-align: left;
            height: 7px;
            font-size: 0.8em;
        }
        th {
            background-color: #ffffff;
        }
        .smtp{
            text-align: center;
            width: 5%;
        }
        .container {
        font-size: 0; /* Remove inline-block space */
        }

        .dailytimerecord-container {
        width: 46%; /* Each container takes up 48% width */
        margin-left: 20px; /* Space between containers */
        box-sizing: border-box;
        display: inline-block; /* Display divs inline */
        vertical-align: top; /* Align divs to the top */
        font-size: 16px; /* Reset font size */
        text-align: center;
        }

        .clear {
            clear: both; 
        }

        .days-cell{
            text-align: center;
        }
        .days-header{
            width: 30%;
            text-align:center;
            font-weight:bold;
        }
        .justified-text {
        text-align: justify;
                padding: 12px;
                font-size: 0.8em;
        }

        .justified-text p {
        text-indent: 30px; /* Adjust the indent as needed */
        padding-top: 0px;
        }
        .heading-info{
            font-size: 0.8em;
        }
        .new-page-content {
        page-break-before: always;
        }


    </style>
    
</head>
<body>
    <div class="container">
        @php
            $divCtr = 0;
        @endphp

        @foreach ($dates as $date)
            <div class="dailytimerecord-container">
                @if ($divCtr % 2 == 0 && $divCtr >= 2)
                <div class="new-page-content">
                    <!-- Content for multiples of 3 -->
                </div>
            @endif
            @php
            $divCtr++;
            @endphp

                <div style="padding-bottom: 0px; font-size: 0.8em; float:left;">
                    Civil Service Form 48 
                </div>
                <div>
                    <br>College Of Engineering <br> <br> <i> Daily Time Records</i>
                    <br> <br> 
                </div>
                {{-- @endif --}}
             
                <div style="padding-bottom: 10px" class="heading-info">
                    <u>{{$employee->last_name}} {{$employee->first_name}} {{$employee->middle_name}}</u>
                    <br> <span style="padding-top:0%">(name)</span>
                    <br> for the month of {{ date('F Y', strtotime($date)) }}
                    <br> <span> Official hours for Arrival and Departure</span>
                    <br> Regular Days <u >{{$date}}</u> Saturdays <u>{{$date}}</u>
                </div>
                <div style="padding-bottom:0px">
                    <table>
                        <tr>
                            <td style="width: 20%"></td>
                            <td colspan="2" class="days-header">AM</td>
                            <td colspan="2" class="days-header">PM</td>
                            <td colspan="2" class="days-header">UnderTime</td>
                        </tr>
                        <tr>
                            <td class="days-cell">Days</td>
                            <td class="days-cell">AR</td>
                            <td class="days-cell">DTR</td>
                            <td class="days-cell">AR</td>
                            <td class="days-cell">DTR</td>
                            <td class="days-cell">HR</td>
                            <td class="days-cell">MIN</td>
                        </tr>
                       
                        @php
                        
                        $timestamp = strtotime($date);
                        $month = date("y-m", $timestamp);
                        $monthNumber = \Illuminate\Support\Carbon::createFromFormat('Y-m', $date)->startOfMonth();
                        $numberOfDaysPerMonth = $monthNumber->daysInMonth;
                        $daysInMonth = [];
                        $daysCounter = 0;
                        @endphp
                       
                     @for ($day = 1; $day <= 31; $day++)
                     @php
                        $dates = [];
                        $timeins = [];
                        $timeouts = [];
                         // Check if DTR data is available for the current day
                         $hasDTRData = isset($dtrs[$day - 1]); // Adjust index for array
                         foreach ($dtrs as $date) {
                            $accessedDate = date('d', strtotime($date->attendance_date));
                            $yearAndMonth = date('y-m', strtotime($date->attendance_date));
                            // if($day == 4){
                            //     dd((int) $accessedDate === $day, (int) $accessedDate, $day );
                            // }
                            if ((int) $accessedDate === $day && $month === $yearAndMonth){
                                $time = date('H:i:s', strtotime($date));
                                $timeins[] = date('H:i:s', strtotime($date->time_in));
                                $timeouts[] = date('H:i:s', strtotime($date->time_out));
                                $dates[] = $date->attendance_date;
                                if($daysCounter < $numberOfDaysPerMonth){
                                    $daysCounter++;
                                }
                            }
                         }
                         
                         
                         // Extract DTR information if available
                         $formattedDay = $hasDTRData ? date('d', strtotime($dtrs[$daysCounter])) : '';
                         $time = $hasDTRData ? date('H:i:s', strtotime($dtrs[$daysCounter ])) : '';
                        //  if($day == 4){
                        //         dd($formattedDay, $time, $dtrs[$daysCounter]);
                        //     }
                        //  dd($hasDTRData, $formattedDay, $time);
                     @endphp

                    
                     <tr>
                        @php
                            if(isset($dates[0])){
                                $time = date('d', strtotime($dates[0]));
                                $minDateOne = date('H', strtotime($timeins[0]));
                                $minDateTwo = date('H', strtotime($timeouts[0]));
                                $dateOne = date('H:i', strtotime($timeins[0]));
                                $dateTwo = date('H:i', strtotime($timeouts[0]));
                                $date1 = new Datetime($timeins[0]);
                                $date2 = new Datetime($timeouts[0]);
                                $interval = $date1->diff($date2);
                            }
                            else{
                                $minDateOne = $minDateTwo =  $dateOne =  $dateTwo = $interval = Null;
                            }
                        @endphp
                        <td class="days-cell">{{ $day }}</td>
                        <td class="days-cell">
                            @if (isset($dates) && $day === (int)$time && $minDateOne != Null )
                                @if ((int)$minDateOne < 12)
                                    {{ $dateOne}}
                                @endif
                            @else
                                -
                            @endif
                        </td>
                         <td class="days-cell">
                            @if (isset($dates) && $day === (int)$time && $minDateOne != Null )
                                @if ((int)$minDateTwo < 12)
                                {{ $dateTwo}}
                                @endif
                            @else
                                -
                            @endif
                         </td>
                         <td class="days-cell">
                            @if (isset($dates) && $day === (int)$time && $minDateOne != Null)
                                @if ( (int)$minDateOne >= 12)
                                    {{ $dateOne}}
                                @endif
                            @else
                                -
                            @endif
                         </td>
                         <td class="days-cell">
                            @if (isset($dates) && $day === (int)$time && $minDateOne != Null  )
                                @if ( (int)$minDateOne >= 12)
                                    {{ $dateTwo}}                                
                                @endif
                            @else
                                -
                            @endif
                         </td>
                         <td class="days-cell">
                            @if (isset($dates[0]) && $day === (int)$time)
                            {{$interval->format('%h')}}
                            @else
                                -
                            @endif
                         </td>
                         <td class="days-cell">
                            @if (isset($dates[0]) && $day === (int)$time )
                            @php
                                $minutes = $interval->format('%i');
                                if ($minutes == 0) {
                                    $minutes = 1;
                                }
                            @endphp
                                {{ $minutes }}
                            @else
                                -
                            @endif
                         </td>
                     </tr>
                 @endfor
                 
                      
                    </table>
                    <span style="float: right; font-size: 0.8em; padding-bottom: 0px; padding-top:10px;">Total: ____<u>{{$daysCounter}}</u>_____</span>
                </div>

                <div class="justified-text">
                    
                    <p>I Certify on my honor that the above is true 
                    and correct report of the work performed, record
                    of which are made daily at the time of arrival and
                    departure from office</p>
                </div>
                <div style="font-size: 0.8em;">
                    <span style="padding-bottom:0px;">____________________________________</span> <br> Signature
                    <br> <br> 
                    <span style="float:left">Verified as to the prescribed hours.</span>
                    <br> <br> 
                    <span style="padding-bottom:0px;">____________________________________</span> <br> In-Charge
                </div>
            </div>
        @endforeach
        <div class="clear"></div>
    </div>
</body>
</html>
