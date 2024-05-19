<!-- PDF Generator of OPCR -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Study Permit</title>
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
        top: 134;
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
        .title-info{
            padding: 8px;
            font-size: 0.8em;


        }
        .info{
            padding: 8px;
            font-size: 0.8em;
        }
        @page { margin-top: 40px; margin-bottom: 0px;}
    </style>
</head>
<body>
    <!-- Start of PDF -->
    @foreach($stud as $item)
    @php
        $studyPermitData = json_decode($item, true);
    @endphp
    @endforeach
  
    <div style="text-align:center; margin-bottom: 0px">
        <img src="data:image/gif;base64,{{ base64_encode($logo) }}" alt="Image Description" width="90" height="70"> 
        <p style="display: inline-block; vertical-align: middle; margin-right: 80px; text-align: center;">
            Republic of the Philippines <br>PAMANTASAN NG LUNGSOD NG MAYNILA <br> (University of the City of Manila) <br> General Luna Street cor. Muralla Street <br> Intramuros, Manila, Philippines 
        </p>
    </div>
    <p style="text-align: center;"><b> PERMISSION TO STUDY</b></p>    
    <table class="top-right">
        <tr>
            <td style="text-align: center; font-size:0.8em">Application Date: {{$studypermits['application_date']}}</td>
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
                    
                    <td style="font-size: 0.8em; padding-left: 8px; width:25.4%" >
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
                </table>    
                <table> 
                    <tr>
                        <td class="employee-info">COLLEGE/OFFICE</td>
                        <td class="employee-info">{{$employees->department_name}}</td>
                        <td class="employee-info" colspan="3">Status: {{$employees->employee_type}}</td>
                    </tr>
                    <tr>
                        <td class="employee-info">DESIGNATION/RANK</td>
                        <td class="employee-info" colspan="4">{{$employees->current_position}}</td>
                    </tr>
                    <tr>
                        <td class="employee-info">PERIOD COVERED</td>
                        <td class="employee-info" colspan="4"> {{$studypermits['start_period_cover']}} > {{$studypermits['end_period_cover']}}</td>
                    </tr>
                
                    <tr>
                        <td class="employee-info" colspan="5" ><b>Degree program and school where employee intends to enroll.</b><br> <br>
                            {{-- <label style="word-wrap: break-word; "> {{str_pad($studypermits['degree_prog_and_school'] ?? ' ', 428, '_', STR_PAD_RIGHT) }}</label> --}}
                            <label style="word-wrap: break-word;  "> {{$studypermits['degree_prog_and_school']}}</label>
                            
                        </td>
                    </tr>
    
                </table>
                <table>
                    <tr>
                        <td style="text-align:center; font-size: 0.8em;" colspan="5"><b>SCHEDULE/PROPOSED STUDY LOAD</b></td>
                    </tr>
                    <tr >
                        <td style="text-align:center; font-size: 0.8em; width:30%" colspan="2"  ><b>SUBJECT</b></td>
                        <td style="text-align:center; font-size: 0.8em; width:19.9%" ><b>DAYS</b></td>
                        <td style="text-align:center; font-size: 0.8em; width:19.9%;" ><b>TIME</b></td>
                        <td style="text-align:center; font-size: 0.8em; width:19.9%" ><b>NO. OF UNITS</b></td>
                    </tr>
                    @php
                        $studyPermitLoadData = json_decode($studyPermitData['load']);
                    @endphp
                    @foreach ($studyPermitLoadData as $loadItem)
                   
                    
                        <tr>
                            <td style="text-align:center; font-size: 0.8em;" colspan="2">
                                {{$loadItem->subject}}
                            </td>
                            <td style="text-align:center; font-size: 0.8em;"  >
                                @foreach ($loadItem->days as $day  )
                                    {{$day}}
                                @endforeach
                            </td>
                            <td style="text-align:center; font-size: 0.8em;" >
                                {{$loadItem->start_time}} - {{$loadItem->end_time}}
                            </td>
                            <td style="text-align:center; font-size: 0.8em;" >
                                {{$loadItem->number_of_units}}
                            </td>
                        </tr>
                    @endforeach 
                      
                <tr style="width: 30%; margin-bottom:0px">
                    <td style="padding: 8px; font-size: 0.8em; border-right:none;" ><b>TOTAL TEACHING LOAD (For faculty only)</b></td>
                    <td style="border-left:none"></td>
                    <td style="text-align:center;  font-size: 0.8em;">{{$studypermits->total_teaching_load}}</td>
                    <td style="text-align: center;  font-size: 0.8em; padding:6px;" ><b>TOTAL AGGREGATE LOAD (Including ETUs)</b></td>
                    <td style="text-align:center;  font-size: 0.8em; " >{{$studypermits->total_aggregate_load}}</td>
                </tr>
                <tr>
                    <td colspan="5" style="vertical-align: top; padding: 0px; font-size:0.8em; border:none; margin-top:0px">
                    <p style=" margin-left:75 "> I hereby abide by the applicable rules and regulations on study/educational priviliges</p>
                    <p style=" margin-left:75"> I also certify in my honor to the correctness and completeness of the information provided herein</p>
                    </td>
                </tr>
                <tr>
                    <td colspan="4" style="border: none"></td>
                    <td colspan="1" style="text-align: center; border:none">
                        <img src="data:image/gif;base64,{{ base64_encode($signature) }}" alt="Image Description" width="200" height="50"> 
                        <p style="vertical-align: bottom; margin-top:0px "> __________________ <br> Signature</p>
                    </td>
                </tr>
                </table>
                <table>
                <tr>
                    <td style="font-size: 0.8em; vertical-align: top; padding-left: 8px; margin-right: 0%">
                        <b>Discount Entitlement <br> (To be filled out by HRD personnel only)</b>
                    </td>
                    <td>
                        <label style="font-size: 0.8em; text-align:center; padding-left: 8px; margin-right: 0%">{{$studypermits->discount_entitlement}}</label>
                    </td>
                    <td >
                        <b style="font-size: 0.8em; vertical-align: top; padding-left: 8px; margin-right: 0%">Maximum no. of units to be enrolled</b>
                    </td>
                    <td colspan="2">
                        <p style="font-size: 0.8em; text-align:center; padding-left: 8px; margin-right: 0%">{{$studypermits->maximum_units}}</p>
                    </td>
                </tr>
                <tr>
                    <td colspan="2" style="font-size: 0.8em; vertical-align: top; padding-left: 8px; margin-right: 0%">
                        <p>1. Verified Correct by: <br> </p>
                        <p style="display:inline-block; text-align:center">
                        @if($studypermits->signature_head_office_unit != Null)
                        <img src="{{ public_path('storage/'. $studypermits->signature_head_office_unit) }}"  width="120" height="30" style="text-align:center; margin-top:0x; ">
                        @else
                            <br>
                        @endif
                        <br>______________________________<br> Head of Office/Unit</p>
                        &nbsp;&nbsp;&nbsp;
                        <p style="display:inline-block; text-align:center"> {{$studypermits->date_head_office_unit ?? ' '}} <br> ______________ <br> Date </p>
                    </td>
                  
                    <td colspan="3" style="font-size: 0.8em; vertical-align: top;  padding-left: 8px;">
                        <p>3. Recommended by:</p>
                        <p style="display:inline-block; text-align:center">
                        @if($studypermits->signature_recommended_by != Null)
                        <img src="{{ public_path('storage/'. $studypermits->signature_recommended_by) }}"  width="120" height="30" style="text-align:center; margin-top:0x; ">
                        @else
                            <br>
                        @endif
                        <br>______________________________<br> Vice President For Academic Affairs</p>
                        &nbsp;&nbsp;&nbsp;
                        <p style="display:inline-block; text-align:center">{{$studypermits->date_recommended_by ?? ' '}} <br> ______________ <br> Date </p>
                    </td>
                </tr>
                <tr>
                    <td colspan="2" style="font-size: 0.8em; vertical-align: top;  padding-left: 8px;">
                        <p>2. Endorsed by:</p>
                        <p style="display:inline-block; text-align:center">
                        @if($studypermits->signature_endorsed_by != Null)
                        <img src="{{ public_path('storage/'. $studypermits->signature_endorsed_by) }}"  width="120" height="30" style="text-align:center; margin-top:0x; ">
                        @else
                            <br>
                        @endif
                        <br>______________________________<br> Chief/Human Resource Development <br> Office</p>
                        <p style="display:inline-block; text-align:center;  margin-bottom:27px">{{$studypermits->date_endorsed_by ?? ' '}} <br> ______________ <br> Date </p>
                    </td>
                    <td colspan="3" style="font-size: 0.8em; vertical-align: top;  padding-left: 8px; margin-bottom:0px">
                        <p>4. Action</p>
                        <p style="display:inline-block; text-align:center"> 
                        @if($studypermits->signature_univ_pres != Null)
                        <img src="{{ public_path('storage/'. $studypermits->signature_univ_pres) }}"  width="120" height="30" style="text-align:center; margin-top:0x; ">
                        @else
                            <br>
                        @endif
                        <br>______________________________<br> University President</p>

                        &nbsp;&nbsp;&nbsp;
                        <p style="display:inline-block; text-align:center;"> {{$studypermits->date_univ_pres ?? ' '}} <br> ______________ <br> Date </p>
                    </td>
                </tr>
            </tbody>
        </table>
        <p style="font-size:0.6em">Copy of the requesting party. Teaching Assignment is a required attachment for this request (for faculty member)</p>
       
    </div>
    
    <br>

</body>
</html>
