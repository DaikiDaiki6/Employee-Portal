<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Leave Request</title>
    <style>
        .container {
            width: 100%;
            margin: 0 auto;
        }
        table {
            width: 100%;
            height: 0%;
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
        .large-text{
            font-size: 0.8em;
            padding-left: 8px;
        /* padding-left: 110px; */
        }
        .small-text{
            font-size: 0.8em;
          
        }
        .content-small-text{
            text-align: left;
            font-size: 1.0em;

        }
        .large-without-spacing{
            padding-left: 8px;
            font-size: 1.0em;
        /* padding-left: 110px; */
        }
        .second-row-spacing{
            margin-right: 75px;
            padding-right: 20px
        }
        .cetification-row{
            width: 30%; 
            font-size: 0.8em;
            text-align:center;
        }
        .seven-c{
            font-size: 0.6em; 
            margin: 0;
             padding-left: 30px;
        }
        @page { margin-top: 40px; margin-bottom: 0px;}

    </style>



<div style="display: flex; align-items: center; margin-bottom: 0px; margin: 0;">
    <p style="font-size: 0.7em; margin-right: 10px; display: inline-block; vertical-align: top:">
        Service Form No.6 <br> Revised 2020
    </p>
    <div style="display: inline-block; text-align: center; font-size: 0.6em; white-space: nowrap; padding-left:11px; margin: 0;">
        <img src="data:image/gif;base64,{{ base64_encode($logo) }}" style="margin-left: 79px; margin-top:10px; margin-right:10px     " alt="Image Description" width="50"  height="40"> 

        {{-- <img src="{{ asset('storage\plmlogo\plm-logo.png') }}" class="mr-3" style="height: 75px" alt="PLM Logo" /> --}}
        <span style="display: inline-block; text-align: center; vertical-align: middle; margin: 0%;">
            <br>
            Republic of the Philippines<br>
            PAMANTASAN NG LUNGSOD NG MAYNILA<br>
            Intramuros, Manila, Philippines
            <br> 
        </span>
        <p style="text-align: center; margin-top: 0%; font-weight: bold; margin-bottom: 0%; font-size: 1.5em; padding-left: 142px">Application For Leave</p>
    </div>
    <p style="margin: 0; float: right; font-size: 0.7em;  padding: 5px; border: 1px solid black; margin-bottom: 0px;">Stamp of Date of Receipt</p>
    
</div>



<body>
    <table style="margin: 0;">
        <tr style="margin: 0; width: 100%; height: 0%;">
            {{-- <td colspan="5">
             <span ><span class="large-text"> 1. Office/Department</span> <span class="small-text">&nbsp; 2. Name</span> <span class="small-text">(Last)</span> <span class="small-text"> (First)</span><span style="font-size: 0.7em; margin-right: 0;"  class="small-text"> (Middle) </span> </span> 
             <span class="large-without-spacing"> {{$employees->department_name}}</span>
             <span class="content-small-text"> {{$employees->last_name}}</span>
             <span class="content-small-text"> {{$employees->first_name}}</span>
             <span style=" font-size: 0.8em;" >{{$employees->middle_name}}</span>
            </td> --}}
            
            <td style="width: 30%; height: 40px; border-right: none; " class="large-text">
                1. Office/Department <br> <span class="large-without-spacing"> {{$employees->department_name}}</span>
            </td>

            <td style="text-align:center; border-right: none; border-left: none;" class="small-text">
                 2. Name  <br> &nbsp;
            </td>

            <td style="text-align:center; border-right: none; border-left: none;" class="small-text">
                (Last) <br> <span class="content-small-text"> {{$employees->last_name}}</span>
            </td>

            <td style="text-align:center; border-right: none; border-left: none;" class="small-text">
                (First) <br>  <span class="content-small-text"> {{$employees->first_name}}</span>
            </td>

            <td style="text-align:center; border-left: none;" class="small-text">
                (Middle) <br>  <span style="font-size: 1.0em;" >{{$employees->middle_name}}</span>
            </td>
         </tr>  
        <tr>
            <td colspan="5" style="height: 40px;">
            <span style="font-size: 0.7em; padding-left: 8px; ">3. Date Of Filling</span> <span class="second-row-spacing"> <u style=" font-size: 0.8em;">{{str_pad($leaveRequestData->date_of_filling, 15, '_', STR_PAD_BOTH)}}</u> </span>
            <span style="font-size: 0.7em;">4. Position </span> <span class="second-row-spacing"> <u style=" font-size: 0.8em;">{{str_pad($employees->current_position, 15, '_', STR_PAD_BOTH)}}</u>       </span>        
            <span style="font-size: 0.7em;">5. Salary </span> <u style=" font-size: 0.8em;">{{str_pad($employees->salary, 15, '_', STR_PAD_BOTH)}}</u>                                         
            </td>
        </tr>
        
        <tr>
            <td style="text-align: center; font-weight: bold; height: 5px; font-size: 0.9em; border-style: double;" colspan="5"> 6. Details of Application
            </td> 
        </tr>
        <tr>
            <td colspan="5"></td>
        </tr>
        <tr>
            <td colspan="3" style="vertical-align: text-top;">
                <div class="checklist-container" style="padding-left:8px;" >
                    <p style="font-size: 0.7em;">6. A type of leave to be availed of </p>
                    <form>
                        <div style="width: 100%; vertical-align: top; padding-left:2px;">
                            <div style="margin-bottom: 0px; display: flex; align-items: center; margin-left: 3%; padding: 0;">
                                <input type="checkbox" name="requests[]" value="Vacation Leave" style="margin-right: 3px;" {{ $leaveRequestData->type_of_leave == 'Vacation Leave' ? 'checked' : '' }}>
                                <span style="vertical-align: middle; font-size: 0.6em; white-space: nowrap;">Vacation Leave (Sec. 51, Rule XVI, Omnibus Rules Implementing E.O. No. 292)</span>

                            </div>
                            <div style="margin-bottom: 0px; display: flex; align-items: center; margin-left: 3%; padding: 0;">
                                <strong><input type="checkbox" name="requests[]" value="Vacation Leave" style="margin-right: 3px; vertical-align: middle;" {{ $leaveRequestData->type_of_leave == 'Mandatory/Forced Leave' ? 'checked' : '' }}></strong>
                                <label style="vertical-align: middle; font-size: 0.6em; margin: 0;">Mandatory/Forced Leave(Sec. 25, Rule XVI, Omnibus Rules Implementing E.O. No. 292)</label>
                            </div>
                            <div style="margin-bottom: 0px; display: flex; align-items: center; margin-left: 3%">
                                <input type="checkbox" name="requests[]" value="Certificate of Employment" style="margin-right: 5px; vertical-align: middle;" {{ $leaveRequestData->type_of_leave == 'Sick Leave' ? 'checked' : '' }}>
                                <label style="vertical-align: middle; font-size: 0.6em;">Sick Leave (Sec. 43, Rule XVI, Omnibus Rules Implementing E.O. No. 292)</label>
                            </div>
                            <div style="margin-bottom: 0px; display: flex; align-items: center; margin-left: 3%">
                                <input type="checkbox" name="requests[]" value="Certificate of Employment" style="margin-right: 5px; vertical-align: middle;" {{ $leaveRequestData->type_of_leave == 'Maternity Leave' ? 'checked' : '' }}>
                                <label style="vertical-align: middle; font-size: 0.6em;">Maternity Leave (R.A. No. 11210/ IRR Issued by CSC, DOLE and SSS)</label>
                            </div>
                            <div style="margin-bottom: 0px; display: flex; align-items: center; margin-left: 3%; padding: 0;">
                                <input type="checkbox" name="requests[]" value="Vacation Leave" style="margin-right: 5px; vertical-align: middle;" {{ $leaveRequestData->type_of_leave == 'Paternity Leave' ? 'checked' : '' }}>
                                <label style="vertical-align: middle; font-size: 0.6em; margin: 0;">Paternity Leave (R.A. No. 8187/ CSC MC No. 71, s. 1998, as amended)</label>
                            </div>
                            <div style="margin-bottom: 0px; display: flex; align-items: center; margin-left: 3%; padding: 0;">
                                <strong><input type="checkbox" name="requests[]" value="Vacation Leave" style="margin-right: 5px; vertical-align: middle;" {{ $leaveRequestData->type_of_leave == 'Special Privilege Leave' ? 'checked' : '' }}></strong>
                                <label style="vertical-align: middle; font-size: 0.6em; margin: 0;">Special Privilege Leave (Sec. 21, Rule XVI, Omnibus Rules Implementing E.O. No. 292)</label>
                            </div>
                            <div style="margin-bottom: 0px; display: flex; align-items: center; margin-left: 3%">
                                <input type="checkbox" name="requests[]" value="Certificate of Employment" style="margin-right: 5px; vertical-align: middle;" {{ $leaveRequestData->type_of_leave == 'Solo Parent Leave' ? 'checked' : '' }}>
                                <label style="vertical-align: middle; font-size: 0.6em;">Solo Parent Leave (RA No. 8972 / CSC MC No. 8, s. 2004)</label>
                            </div>
                            <div style="margin-bottom: 0px; display: flex; align-items: center; margin-left: 3%">
                                <input type="checkbox" name="requests[]" value="Certificate of Employment" style="margin-right: 5px; vertical-align: middle;" {{ $leaveRequestData->type_of_leave == 'Study Leave' ? 'checked' : '' }}>
                                <label style="vertical-align: middle; font-size: 0.6em;">Study Leave (Sec. 68, Rule XVI, Omnibus Rules Implementing E.O. No. 292)</label>
                            </div>
                            <div style="margin-bottom: 0px; display: flex; align-items: center; margin-left: 3%; padding: 0;">
                                <input type="checkbox" name="requests[]" value="Vacation Leave" style="margin-right: 5px; vertical-align: middle;" {{ $leaveRequestData->type_of_leave == '10-Day VAWC Leave' ? 'checked' : '' }}>
                                <label style="vertical-align: middle; font-size: 0.6em; margin: 0;">10-Day VAWC Leave (RA No. 9262/CSC MC No. 15, s. 2005)</label>
                            </div>
                            <div style="margin-bottom: 0px; display: flex; align-items: center; margin-left: 3%; padding: 0;">
                                <strong><input type="checkbox" name="requests[]" value="Vacation Leave" style="margin-right: 5px; vertical-align: middle;" {{ $leaveRequestData->type_of_leave == 'Rehabilitation Privilege' ? 'checked' : '' }}></strong>
                                <label style="vertical-align: middle; font-size: 0.6em; margin: 0;">Rehabilitation Privilege (Sec. 55, Rule XVI, Omnibus Rules Implementing E.O. No. 292)</label>
                            </div>
                            <div style="margin-bottom: 0px; display: flex; align-items: center; margin-left: 3%">
                                <input type="checkbox" name="requests[]" value="Certificate of Employment" style="margin-right: 5px; vertical-align: middle;" {{ $leaveRequestData->type_of_leave == 'Special Leave Benefits for Women' ? 'checked' : '' }}>
                                <label style="vertical-align: middle; font-size: 0.6em;">Special Leave Benefits for Women (RA No. 9710/ CSC MC No. 25, s. 2010) </label>
                            </div>
                            <div style="margin-bottom: 0px; display: flex; align-items: center; margin-left: 3%">
                                <input type="checkbox" name="requests[]" value="Certificate of Employment" style="margin-right: 5px; vertical-align: middle;" {{ $leaveRequestData->type_of_leave == 'Special Emergency Leave' ? 'checked' : '' }}>
                                <label style="vertical-align: middle; font-size: 0.6em;">Special Emergency (Calamity) Leave (CSC MC No. 2, s. 2012, as amended) </label>
                            </div>
                            <div style="margin-bottom: 0px; display: flex; align-items: center; margin-left: 3%">
                                <input type="checkbox" name="requests[]" value="Certificate of Employment" style="margin-right: 5px; vertical-align: middle;" {{ $leaveRequestData->type_of_leave == 'Adoption Leave' ? 'checked' : '' }}>
                                <label style="vertical-align: middle; font-size: 0.6em;">Adoption Leave (R.A. No. 8552)</label>
                            </div>
                            <br>
                         
                            <div style="margin-bottom: 0px; display: flex; align-items: center; margin-left: 3%">
                                <input type="checkbox" name="requests[]" value="Certificate of Employment" style="margin-right: 5px; vertical-align: middle;" {{ $leaveRequestData->type_of_leave == 'Others' ? 'checked' : '' }}>
                                @if ( $leaveRequestData->type_of_leave_others)
                                    <label style="vertical-align: middle; font-size: 0.6em;">Others:<br><u style="vertical-align: middle; font-size: 1.0em;">{{str_pad($leaveRequestData->type_of_leave_description, 60, '_', STR_PAD_BOTH)}}_</label>
                                @else
                                <label style="vertical-align: middle; font-size: 0.6em;">Others:<br>_________________________</label>
                                @endif
                               
                            </div>
            


                    </form>
                </div>
            </td>

            <td colspan="2" style="vertical-align: text-top;">
                <div class="checklist-container" style="padding-left:8px; " >
                    <p style="font-size: 0.7em;">6. B Details of Leave </p>
                    <p style="font-size: 0.7em; padding-left:8px; margin-bottom: 0px;"> In case of Vacation/Special Privilege Leave: </p>
                    <form>
                        <div style="width: 100%; vertical-align: top; padding-left:2px;">
                            <div style="margin-bottom: 0px; display: flex; align-items: center; margin-left: 3%">
                                <input type="checkbox" name="requests[]" value="Certificate of Employment" style="margin-right: 5px; vertical-align: middle;" {{ $leaveRequestData->type_of_leave_sub_category == 'Within the Philippines' ? 'checked' : '' }}>
                                <label style="vertical-align: middle; font-size: 0.6em;">Within the Philippines 
                                        <u style="vertical-align: middle; font-size: 1.0em;">
                                            {{str_pad($employees->type_of_leave_description == 'Within the Philippines' ?? '', 23, '_', STR_PAD_BOTH) }}
                                        </u>
                                </label>
                            </div>

                            <div style="margin-bottom: 0px; display: flex; align-items: center; margin-left: 3%">
                                <input type="checkbox" name="requests[]" value="Certificate of Employment" style="margin-right: 5px; vertical-align: middle;" {{ $leaveRequestData->type_of_leave_sub_category == 'Abroad' ? 'checked' : '' }}>
                                <label style="vertical-align: middle; font-size: 0.6em;">Abroad (Specify) 
                                        <u style="vertical-align: middle; font-size: 1.0em;">
                                            {{str_pad($employees->type_of_leave_description == 'Abroad' ?? '', 27, '_', STR_PAD_BOTH) }}
                                        </u>
                                </label>
                            </div>
{{-- 
                            <div style="margin-bottom: 0px; display: flex; align-items: center; margin-left: 3%;">
                                <input type="checkbox" name="requests[]" value="Certificate of Employment" style="margin-right: 5px; vertical-align: middle;" {{ $leaveRequestData->type_of_leave_sub_category == 'Abroad' ? 'checked' : '' }}>
                                <label style="vertical-align: middle; font-size: 0.6em;">Abroad (Specify)<u style="vertical-align: middle; font-size: 1.0em;">{{str_pad($employees->type_of_leave_description, 29, '_', STR_PAD_BOTH)}}_</label>
                            </div> --}}
                                    {{-- <input type="checkbox" name="requests[]" value="Certificate of Employment" style="margin-right: 5px; vertical-align: middle;" {{ $leaveRequestData->type_of_leave == 'In Hospital' ? 'checked' : '' }}>
                                <label style="vertical-align: middle; font-size: 0.6em;">In Hospital(Specify Illiness) <u style="vertical-align: middle; font-size: 1.0em;">{{str_pad($employees->type_of_leave_description, 20 , '_', STR_PAD_BOTH)}}_</label> --}}

                            
                  
                            <p style="font-size: 0.7em; padding-left:8px; margin-bottom: 0px;"> In case of Sick Leave: </p>
                            <div style="margin-bottom: 0px; display: flex; align-items: center; margin-left: 3%">
                                <input type="checkbox" name="requests[]" value="Certificate of Employment" style="margin-right: 5px; vertical-align: middle;" {{ $leaveRequestData->type_of_leave_sub_category == 'In Hospital' ? 'checked' : '' }}>
                                    <label style="vertical-align: middle; font-size: 0.6em;">In Hospital(Specify Illiness)
                                            <u style="vertical-align: middle; font-size: 1.0em;">
                                                {{str_pad($employees->type_of_leave_description == 'In Hospital' ?? '', 23, '_', STR_PAD_BOTH) }}
                                            </u>
                                    </label>
                            </div>

                            <div style="margin-bottom: 0px; display: flex; align-items: center; margin-left: 3%">
                                <input type="checkbox" name="requests[]" value="Certificate of Employment" style="margin-right: 5px; vertical-align: middle;" {{ $leaveRequestData->type_of_leave_sub_category == 'Out Patient' ? 'checked' : '' }}>
                                    <label style="vertical-align: middle; font-size: 0.6em;">Out Patient(Specify Illiness)
                                        <u style="vertical-align: middle; font-size: 1.0em; max-width: 300px; display: block; word-wrap: break-word;">
                                            {{ str_pad(($employees->type_of_leave_description == 'Out Patient') ? $employees->type_of_leave_description ?? '' : '', 48, '_', STR_PAD_RIGHT) }}
                                        </u>
                                        
                                    </label>
                            </div>

                            <p style="font-size: 0.7em; padding-left:8px; margin-bottom: 5px;"> In case of Special Leave Benefits for Women:</p>
                            <div style="margin-bottom: 0px; display: flex; align-items: center; margin-left: 3%">
                                    <label style="vertical-align: middle; font-size: 0.6em; display: block;">(Specify Illiness)
                                        <br><br>
                                            <u style="vertical-align: middle; font-size: 1.0em; display: block; word-wrap:break-word;">
                                                {{str_pad($employees->type_of_leave == 'Special Leave Benefits for Women' ?? '', 48, '_', STR_PAD_BOTH) }}
                                            </u>
                                    </label>
                            </div>
                  
                            <p style="font-size: 0.7em; padding-left:8px; margin-bottom: 0px;"> In case of Study Leave:</p>
                            <div style="margin-bottom: 0px; display: flex; align-items: center; margin-left: 3%">
                                <input type="checkbox" name="requests[]" value="Certificate of Employment" style="margin-right: 5px; vertical-align: middle;" {{ $leaveRequestData->type_of_leave_sub_category ==  "Completion of Master's Degree" ? 'checked' : '' }}>
                                <label style="vertical-align: middle; font-size: 0.6em;">Completion of Master's Degree
                                </label>
                            </div>

                            <div style="margin-bottom: 0px; display: flex; align-items: center; margin-left: 3%">
                                <input type="checkbox" name="requests[]" value="Certificate of Employment" style="margin-right: 5px; vertical-align: middle;" {{ $leaveRequestData->type_of_leave_sub_category ==  "BAR/Board Examination Review" ? 'checked' : '' }}>
                                <label style="vertical-align: middle; font-size: 0.6em;">BAR/Board Examination Review
                                </label>
                            </div>

                            <p style="font-size: 0.7em; padding-left:8px; margin-bottom: 0px;"> Other purpose:</p>
                            <div style="margin-bottom: 0px; display: flex; align-items: center; margin-left: 3%">
                                <input type="checkbox" name="requests[]" value="Certificate of Employment" style="margin-right: 5px; vertical-align: middle;" {{ $leaveRequestData->type_of_leave_sub_category ==  "Monetization of leave credits" ? 'checked' : '' }}>
                                <label style="vertical-align: middle; font-size: 0.6em;">Monetization of leave credits
                                </label>
                            </div>

                            <div style="margin-bottom: 0px; display: flex; align-items: center; margin-left: 3%">
                                <input type="checkbox" name="requests[]" value="Certificate of Employment" style="margin-right: 5px; vertical-align: middle;" {{ $leaveRequestData->type_of_leave_sub_category ==  "Terminal Leave" ? 'checked' : '' }}>
                                <label style="vertical-align: middle; font-size: 0.6em;">Terminal Leave
                                </label>
                            </div>
                    </form>
                </div>
            </td>
        </tr>
        <tr>
            <td colspan="3">
                <div class="checklist-container" style="padding-left:8px;" >
                    <div style="margin-bottom: 10px; display: flex; align-items: center; margin-left: 3%">
                        <p style="font-size: 0.7em;">6. C NUMBER OF WORKING DAYS APPLIED FOR: </p>
                        <label style="vertical-align: middle; font-size: 0.8em; padding-left:8px;"><u style="vertical-align: middle; font-size: 1.0em;">{{str_pad($leaveRequestData->num_of_days_work_days_applied, 60 , '_', STR_PAD_BOTH)}}_</label>
                        <p style="font-size: 0.7em; padding-left:8px; margin-bottom: 0px;"> INCLUSIVE DATES: </p>
                        <br>
                        <label style="vertical-align: middle; font-size: 0.8em; padding-left:8px;"><u style="vertical-align: middle; font-size: 1.0em;">{{ str_pad(date('Y-m-d', strtotime($employees->inclusive_start_date)), 30, '_', STR_PAD_LEFT) . '  -  ' . str_pad(date('Y-m-d', strtotime($employees->inclusive_end_date)), 30, '_', STR_PAD_RIGHT) }}

                        </label>
                    </div>
                  
                </div>
            </td>
            <td colspan="2">
                <div class="checklist-container" style="padding-left:8px;" >
                    <p style="font-size: 0.7em; margin-bottom: 0px;">6. D COMMUTATION </p>
                    <div style="margin-bottom: 0px; display: flex; align-items: center; margin-left: 3%">
                        <input type="checkbox" name="requests[]" value="Certificate of Employment" style="margin-right: 5px; vertical-align: middle;" {{ $leaveRequestData->commutation == 'requested' ? 'checked' : '' }}>
                        @if ( $leaveRequestData->type_of_leave_others)
                            <label style="vertical-align: middle; font-size: 0.6em;">Not Requested<br></label>
                        @endif
                    </div>
                    <div style="margin-bottom: 0px; display: flex; align-items: center; margin-left: 3%">
                        <input type="checkbox" name="requests[]" value="Certificate of Employment" style="margin-right: 5px; vertical-align: middle;" {{ $leaveRequestData->commutation == 'not requested' ? 'checked' : '' }}>
                        @if ( $leaveRequestData->type_of_leave_others)
                            <label style="vertical-align: middle; font-size: 0.6em;">Requested<br></label>
                        @endif
                    </div>
                    <p style= "text-align: center;  margin-bottom: 0px; margin-top: 0px"  >
                        @php
                       
                        @endphp
                    @if($leaveRequestData->commutation_signature_of_appli != Null)
                    <img src="data:image/gif;base64,{{ base64_encode($image) }}" alt="Image Description" width="200" height="50"> 

                    @endif
                    </p>
                </div>
                <p style= "text-align: center;  font-size: 0.8em; margin-bottom: 0px; margin-top: 0px"  > <br> <b> ____________________________________</b> <br> Signature of Applicant</p>
            </td>
        </tr>
        <tr>
            <td colspan="5"></td>
        </tr>
        <tr>
            <td style="text-align: center; height: 5px; font-size: 0.8em; font-weight: bold; " colspan="5"> 7. Details of Actions on Application
            </td>
        </tr>
        <tr>
            <td colspan="5"></td>
        </tr>
            <td colspan="3">
                <div class="checklist-container" style="padding-left:8px;" >
                    <p style="font-size: 0.7em; margin-bottom: 0px;">7. A CERTIFICATION OF LEAVE CREDITS </p>
                    <p style="font-size: 0.7em; padding-left:8px; margin-bottom: 0px;"> As of <u>{{str_pad($leaveRequestData->as_of_filling ?? ' ', 20, '_', STR_PAD_BOTH) }}</u></p> <br>
                    <table style="padding-left: 8%; width:90%">
                        <tr>
                            <td class="cetification-row">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
                            <td class="cetification-row">Vacation Leave</td>
                            <td class="cetification-row">Sick Leave</td>
                        </tr>
                        <tr>
                            <td class="cetification-row">Total Earned:</td>
                            <td class="cetification-row">{{$leaveRequestData->total_earned_vaca ?? ''}}</td>
                            <td class="cetification-row">{{$leaveRequestData->total_earned_sick ?? ''}}</td>
                        </tr>
                        <tr>
                            <td class="cetification-row">Less this application:</td>
                            <td class="cetification-row">{{$leaveRequestData->less_this_appli_vaca ?? ''}} </td>
                            <td  class="cetification-row">{{$leaveRequestData->less_this_appli_sick ?? ''}}</td>
                        </tr>
                        <tr>
                            <td class="cetification-row">Balance:</td>
                            <td  class="cetification-row">{{$leaveRequestData->balance_vaca ?? ''}}</td>
                            <td  class="cetification-row">{{$leaveRequestData->balance_sick ?? ''}}</td>
                        </tr>
                    </table>
                </div>
</dd>
                <p style= "text-align: center;  font-size: 0.8em; margin-bottom: 0px; margin-top: 10px"> <img src="{{ $leaveRequestData->auth_off_sig_a ?? ''   }}" alt="Image Description" width="100" height="20">
<br><b> ____________________________________</b> <br> (Authorized Officer)</p>
            </td>
           
                <td colspan="2">
                    <div class="checklist-container" style="padding-left:8px;" >
                        <p style="font-size: 0.7em; margin-bottom: 0px;">7. B RECOMMENDATION </p>
                        <div style="margin-bottom: 0px; display: flex; align-items: center; margin-left: 3%">
                            <input type="checkbox" name="requests[]" value="Certificate of Employment" style="margin-right: 5px; vertical-align: middle;" {{ $leaveRequestData->status ==  "approved" ? 'checked' : '' }}>
                            <label style="vertical-align: middle; font-size: 0.6em;">For approval:<br></label>
                        </div>
                        <div style="margin-bottom: 0px; display: flex; align-items: center; margin-left: 3%">
                            <input type="checkbox" name="requests[]" value="Certificate of Employment" style="margin-right: 5px; vertical-align: middle;" {{ $leaveRequestData->status ==  "declined" ? 'checked' : '' }}>
                                <label style="vertical-align: middle; font-size: 0.6em; margin-middle: 5px; word-wrap: break-word; ">For disapproval due to : <p><u>{{str_pad($leaveRequestData->status_description ?? ' ', 196, '_', STR_PAD_RIGHT) }}</u></p></label>
                                {{-- <label style="vertical-align: middle; font-size: 0.6em; margin-bottom: 0px;">For disapproval due to :______________________ <span style="padding-right: 8px"> <br><br>  _______________________________________________ <br> <br>  _______________________________________________  <br>  <br>  _______________________________________________</span> </label> --}}
                       
                            </div>
                       
                    </div>
                    <p style= "text-align: center;  font-size: 0.8em; margin-bottom: 0px; margin-top: 10px">
                    @if($leaveRequestData->auth_off_sig_b != Null)
                    <img src="{{ public_path('storage/'. $leaveRequestData->auth_off_sig_b) }}" alt="Image Description" width="100" height="20" >
                    @endif
                    <br>____________________________________  <br> (Authorized Officer) </p>
                        
                </td>
        </tr>
        <tr>
            <td colspan="5"></td>
        </tr>
        <tr  style="">
            <td colspan="1" style="border-right: none;  border-bottom: none;">
                <div class="checklist-container" style="padding-left: 8px;">
                    <p style="font-size: 0.7em; margin: 0;">7. C APPROVED FOR</p>
                    <p class="seven-c"><u>{{str_pad($leaveRequestData->days_with_pay ?? ' ', 10, '_', STR_PAD_BOTH) }}</u>days with pay</p>
                    <p class="seven-c"><u>{{str_pad($leaveRequestData->days_without_pay ?? ' ', 10, '_', STR_PAD_BOTH) }}</u>days without pay</p>
                    <p class="seven-c"><u>{{str_pad($leaveRequestData->others ?? ' ', 10, '_', STR_PAD_BOTH) }}</u>Others(Specify)</p>
                </div>
                <td colspan="2" style="border-right: none; border-left: none; border-bottom: none;"> 
                    <div style="text-align:center; margin-top:30px">
                        @if($leaveRequestData->auth_off_sig_c_and_d != Null)
                        <img src="{{ public_path('storage/'. $leaveRequestData->auth_off_sig_c_and_d) }}" alt="Image Description" width="100" height="20" >
                        @endif
                    </div>
                </td>
            </td>
            
            <td colspan="2" style="border-left: none; border-bottom: none;">
                <div class="checklist-container" style="padding-left: 8px;">
                    <p style="font-size: 0.7em; margin: 0;">7. D DISAPPROVED DUE TO</p>
                    <label class="seven-c" style="word-wrap: break-word; "><p><u>{{str_pad($leaveRequestData->disapprove_reason ?? ' ', 150, '_', STR_PAD_RIGHT) }}</u></p></label>
                   <!-- {{-- <p class="seven-c">__________________________________________ </p> --}}
                    {{-- <p class="seven-c">__________________________________________</p>
                    <p class="seven-c">__________________________________________</p>  --}} -->
                    
                </div>
            </td>
        </tr>
        <tr style="">
            <td style= "text-align: center;  font-size: 0.8em;  margin: 0; padding-right:50px; border-top:0px " colspan="5">
              ____________________________________  <br> (Authorized Officer)
            </td>
        </tr>
    </table>

    <!-- {{-- <table style="width: 100%;">
        <tr>
            <td style="width: 40%;">
                <span class="large-text"> 1. Office/Department </span><br>
                <span class="large-without-spacing">{{$employees->department_name}}</span>
            </td>
            <td style="width: 20%;">
                <span class="small-text">&nbsp; 2. Name</span>
            </td>
            <td style="width: 20%; border-left: 1px solid black; border-left: ;">
                <span class="large-text"> 1. Office/Department </span><br>
                <span class="large-without-spacing">{{$employees->department_name}}</span>
            </td>
            <td style="width: 20%;">
                <span class="large-text"> 1. Office/Department </span><br>
                <span class="large-without-spacing">{{$employees->department_name}}</span>
            </td>
            <td style="width: 20%;">
                <span class="large-text"> 1. Office/Department </span><br>
                <span class="large-without-spacing">{{$employees->department_name}}</span>
            </td>
        </tr>
    </table> --}} -->
    
    
    <!-- Your existing checklist container -->
  
    

      
            
                   
</body>




</html>
