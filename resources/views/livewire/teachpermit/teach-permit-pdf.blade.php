<!-- PDF Generator of OPCR -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Teach Permit</title>
    <style>
        .container {
            width: 100%;
            margin: 0 auto;
        }
        table {
            width: 100%;
            border-collapse: collapse;
        }
        .th, td {
            border: 1px solid #000;
            text-align: left;
        }
        th {
            background-color: #f2f2f2;
        }
        .top-right {
        position: absolute;
        top: 131;
        right: 0;
        margin-right: 0%;
        width: 34%;
        }
        .space {
        padding-right: 120px;
        }
        .small-text{
            padding-left: 8px;
            font-size: 0.8em;
            text-align: center;
          
        }
        .content-small-text{
            /* text-align: left; */
            font-size: 1.0em;

        }
        .employee-info{
            padding: 8px;
            font-size: 0.8em;
        }
        .checklist{
            vertical-align: middle; 
            font-size: 0.7em;
            white-space: nowrap;
        }
        @page { margin-top: 40px; margin-bottom: 0px;}
    </style>
</head>
<body>
    <!-- Start of PDF -->
    @foreach($stud as $item)
    @php
        $teachPermitData = json_decode($item, true);
    @endphp
    @endforeach
  
    <div style="text-align:center; margin-bottom: 0px">
        <img src="data:image/gif;base64,{{ base64_encode($logo) }}" alt="Image Description" width="90" height="70"> 
        <p style="display: inline-block; vertical-align: middle; margin-right: 80px; text-align: center;">
            Republic of the Philippines <br>PAMANTASAN NG LUNGSOD NG MAYNILA <br> (University of the City of Manila) <br> General Luna Street cor. Muralla Street <br> Intramuros, Manila, Philippines 
        </p>
    </div>
    <p style="text-align: center;"><b> PERMISSION TO TEACH</b></p>    
    <table class="top-right">
        <tr>
            <td style="text-align: center;">Application Date: {{$teachpermit['application_date']}}</td>
        </tr>
    </table>
    <div class="container">
        <br>

        <table >
            {{-- <thead>
                <tr>
                     <!-- Headears -->
                    <th style="width: 23%; text-align: center;"></th>
                    <th style="width: 23%; text-align: center;">Success Indicators</th>
                    <th style="width: 23%; text-align: center;">Actual Accomplishments</th>
                    <th colspan="4" style="width: 10%; text-align: center; border-bottom: 1px solid black; position: relative;">SMPS Rating System</th>
                    <th style="width: 7%; text-align: center;">Weight</th>
                    <th style="width: 14%; text-align: center;">Remarks</th>
                </tr>
            </thead> --}}
            
            <tbody>
                
                <tr style="margin: 0; width: 100%; height: 0%;">
                    {{-- <td colspan="5">
                     <span ><span class="large-text"> 1. Office/Department</span> <span class="small-text">&nbsp; 2. Name</span> <span class="small-text">(Last)</span> <span class="small-text"> (First)</span><span style="font-size: 0.7em; margin-right: 0;"  class="small-text"> (Middle) </span> </span> 
                     <span class="large-without-spacing"> {{$employees->department_name}}</span>
                     <span class="content-small-text"> {{$employees->last_name}}</span>
                     <span class="content-small-text"> {{$employees->first_name}}</span>
                     <span style=" font-size: 0.8em;" >{{$employees->middle_name}}</span>
                    </td> --}}
                    
                    <td style="font-size: 0.8em; padding-left: 8px;">
                         Name  
                    </td>
        
                    <td style=" border-right: none; border-left: none;" class="small-text">
                        Family Name <br> <span class="content-small-text"> {{$employees->last_name}}</span>
                    </td>
        
                    <td style=" border-right: none; border-left: none;" class="small-text">
                        First Name <br>  <span class="content-small-text"> {{$employees->first_name}}</span>
                    </td>
        
                    <td style=" border-left: none;" class="small-text" colspan="2">
                        Middle Name <br>  <span style="font-size: 1.0em; " >{{$employees->middle_name}}</span>
                    </td>
                 </tr>  
                    <tr>
                        <td class="employee-info">COLLEGE/OFFICE</td>
                        <td class="employee-info">{{$employees->department_name}}</td>
                        <td class="employee-info" colspan="3">Status: {{$employees->employee_type}}</td>
                    </tr>
                    <tr>
                        <td class="employee-info">DESIGNATION/RANK</td>
                        <td class="employee-info">{{$teachpermit['designation_rank']}}</td>

                        <td colspan="3"> 
                            <div style="margin-bottom: 0px; display: flex; align-items: center; margin-left: 3%; padding: 0;">
                                <input type="checkbox" name="requests[]" value="Vacation Leave"  {{ $teachpermit['inside_outside_university'] == 'Inside the University' ? 'checked' : '' }}>
                                <span class="checklist">Inside the University</span>
                                <input type="checkbox" name="requests[]" value="Vacation Leave"  {{ $teachpermit['inside_outside_university'] == 'Outside the University' ? 'checked' : '' }}>
                                <span class="checklist">Outside the University</span>
                            </div>
                        
                        </td>
                    </tr>
                    <tr>
                        <td class="employee-info">PERIOD COVERED</td>
                        <td class="employee-info" colspan="4"> {{$teachpermit['start_period_cover']}} > {{$teachpermit['end_period_cover']}}</td>
                    </tr>
                
                    <tr>
                        <td class="employee-info" colspan="5" ><b>Name of School/s including address and contact number/s where faculty intends to teach.</b><br> <br>
                            {{$teachpermit['name_of_school_description']}}
                            <br><br><br><br>
                        </td>
                    </tr>
    
                
                <tr style="padding-top:0px; margin-top: 0px">
                    <td style="padding: 8px; font-size:0.8em; border-bottom:none; margin-bottom: 0px; " colspan="5" ><b>Indicate Time Schedule</b> </td>
                </tr>

            @php
                $teachPermitLoadData = json_decode($teachPermitData['load']);
            @endphp
           
            @foreach ($teachPermitLoadData as $loadItem)
                <tr style="width: 100%">
                    <td style=" text-align:center; padding: 8px; font-size: 0.8em;  border-right: none; border-bottom:none; border-top:none; width:25%">
                        <b>SUBJECT</b>
                        <br> 
                        {{$loadItem->subject}}
                    </td>
                    <td style=" text-align:center; padding: 8px; font-size: 0.8em;  border-right: none; border-bottom:none; border-top:none; border-left: none; border-right: none; width:25%">
                        <b>DAYS</b>
                        <br>
                        @foreach ($loadItem->days as $day  )
                            {{$day}}
                        @endforeach
                    </td>
                    <td style=" text-align:center; padding: 8px; font-size: 0.8em; border-right: none; border-bottom:none; border-top:none; border-left: none; border-right: none; width:25%">
                        <b>TIME</b>
                        <br>
                        {{$loadItem->start_time .'-'. $loadItem->end_time}}
                    </td>
                    <td style=" text-align:center; padding: 8px; font-size: 0.8em; border-bottom:none; border-top:none; border-left: none; width:25%" colspan="2" >
                        <b>NO. OF UNITS</b>
                        <br>
                        {{$loadItem->number_of_units}}
                    </td>
                </tr>
            @endforeach 
                <tr style="width: 30%">
                    <td style="padding: 8px; font-size: 0.8em; " ><b>TOTAL LOAD, PLM</b></td>
                    <td style="text-align:center;  font-size: 0.8em; ">{{$teachpermit->total_load_plm}}</td>
                    <td style="text-align: center;  font-size: 0.8em; padding:6px;  " rowspan="2"><b>TOTAL AGGREGATE LOAD</b></td>
                    <td style="text-align:center;  font-size: 0.8em; " rowspan="2" colspan="2">{{$teachpermit->total_aggregate_load}}</td>
                </tr>
                <tr>
                    <td style="padding: 8px; font-size: 0.8em;" >
                        <b>TOTAL LOAD IN OTHER <br> UNIVERSITIES/SCHOOL</b>
                    </td>
                    <td style="text-align:center;">{{$teachpermit->total_load_otherunivs}}</td>
                    
                </tr>
                <tr>
                    <td colspan="4" style="vertical-align: top; padding: 0px; border-left: none; border-right: none;">
                        
                    <p style="text-align: left;  font-size: 0.8em; margin-bottom: 0px; padding-left: 130px;"> I hereby abide by the applicable rules and regulations on governing limited practice of profession or involvement in outside activities.</p>
                    {{-- <p style="margin-top:0px; font-size: 0.8em; padding-left: 8px;"> </p> --}}
                    <p style="text-align: left; font-size: 0.8em; padding-left: 130px;"> I also certify in my honor to the correctness of the information provided herein</p>
                    </td>
                    <td colspan="1" style="text-align:center; border-left: none; border-right: none; ">
                        <img src="data:image/gif;base64,{{ base64_encode($signature) }}" alt="Image Description" width="200" height="50"> 
                        <p style="vertical-align: bottom; margin-top:0px  "> __________________ <br> Signature</p>
                    </td>
                </tr>

                <tr>
                    <td colspan="2" style="font-size: 0.8em; vertical-align: top; padding-left: 8px; margin-right: 0%; ">
                        <p>1. Verified Correct by: <br> </p>
                        <p style="display:inline-block; text-align:center; margin-bottom:0%">
                        @if($teachpermit->signature_of_head_office != Null)
                        <img src="{{ public_path('storage/'. $teachpermit->signature_of_head_office) }}"  width="120" height="30" style="text-align:center; margin-top:0x; ">
                        @else
                            <br>
                        @endif
                        <br>______________________________<br> Head of Office/Unit</p>
                        &nbsp;&nbsp;&nbsp;
                        <p style="display:inline-block; text-align:center; margin-bottom:0%"> {{$teachpermit->date_of_signature_of_head_office ?? ' '}} <br> ______________ <br> Date </p>
                    </td>
                  
                    <td colspan="3" style="font-size: 0.8em; vertical-align: top;  padding-left: 8px; height:0px">
                        <p>3. Recommended by:</p>
                        <p style="display:inline-block; text-align:center; margin-bottom:0%">
                        @if($teachpermit->signature_of_vp_for_academic_affair != Null)
                        <img src="{{ public_path('storage/'. $teachpermit->signature_of_vp_for_academic_affair) }}"  width="120" height="30" style="text-align:center; margin-top:0x; ">
                        @else
                            <br>
                        @endif
                        <br>______________________________<br> Vice President For Academic Affairs</p>
                        &nbsp;&nbsp;&nbsp;
                        <p style="display:inline-block; text-align:center; margin-bottom:0%"> {{$teachpermit->date_of_signature_of_vp_for_academic_affair ?? ' '}} <br> ______________ <br> Date </p>
                    </td>
                </tr>
                <tr>
                    <td colspan="2" style="font-size: 0.8em; vertical-align: top;  padding-left: 8px;">
                        <p >2. Endorsed by:</p>
                        <p style="display:inline-block; text-align:center; margin-bottom:0%"> 
                        @if($teachpermit->signature_of_human_resource != Null)
                        <img src="{{ public_path('storage/'. $teachpermit->signature_of_human_resource) }}"  width="120" height="30" style="text-align:center; margin-top:0x; ">
                        @else
                            <br>
                        @endif
                        <br>______________________________<br> Chief, Human Resource Development <br> Office</p>
                        <p style="display:inline-block; text-align:center; margin-bottom:15px"> {{$teachpermit->date_of_signature_of_human_resource ?? ' '}} <br> ______________ <br> Date </p>
                    </td>
                    <td colspan="3" style="font-size: 0.8em; vertical-align: top;  padding-left: 8px;">
                        <p >4. Action</p>
                        <p style="display:inline-block; text-align:center; margin-bottom:0%"> 
                        @if($teachpermit->signature_of_university_president != Null)
                        <img src="{{ public_path('storage/'. $teachpermit->signature_of_university_president) }}"  width="120" height="30" style="text-align:center; margin-top:0x; ">
                        @else
                            <br>
                        @endif    
                        <br>______________________________<br> University President</p>
                        &nbsp;&nbsp;&nbsp;
                        <p style="display:inline-block; text-align:center; margin-bottom:0%"> {{$teachpermit->date_of_signature_of_university_president ?? ' '}} <br> ______________ <br> Date </p>
                    </td>
                </tr>
            </tbody>
        </table>
        <p style="font-size:0.6em">
            * A copy of the requesting party Teaching Assignment is a required attachment for this request (for faculty member). <br> 
            ** Processing time is seven(7) working days.
        </p>
       
    </div>
    
    <br>

</body>
</html>
