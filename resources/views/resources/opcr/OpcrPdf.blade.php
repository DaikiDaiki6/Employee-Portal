<!-- PDF Generator of OPCR -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>IPCR Report</title>
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
            padding: 8px;
            text-align: left;
        }
        th {
            background-color: #f2f2f2;
        }
        .smtp{
            text-align: center;
            width: 5%;
        }
    </style>
    
</head>
<body>
   
    <!-- Start of PDF -->
    @foreach($ipcrs as $ipcr)
    @php
        $ipcrData = json_decode($ipcr, true);
    @endphp
    @endforeach
    <p style="text-align: center;"><b> Office Performance Commitment and Review (OPCR)</b></p>    
    <p> The <b><u>{{$ipcrData['department_name']}}</u></b> commits to deliver and agree to be rated on the attainment of the following targets in accordance with the indicated measures for the period of <b><u>{{$ipcrData['start_period']}}</u></b> to <b><u>{{$ipcrData['end_period']}}  </u></b></p>
    
    @if ($ipcrData['opcr_type'] === "Target")
        
    <div style="display: flex; align-items: flex-start;">
        <!-- Ratings -->
        <div style="display: inline-block; border: 1px solid #000; padding: 8px;">
            <b>5 - Outstanding 4 - Very Satisfactory 3 - Satisfactory 2 - Unsatisfactory 1 - Poor</b>
        </div>
        <div style="display: inline-block; margin-left: auto; margin-top: 10px;">&nbsp; &nbsp; &nbsp; &nbsp;
        </div>
        <!-- RATEE and DATE fields -->
        <div style="display: inline-block; margin-left: auto; margin-top: 10px;">
            <div style="display: inline-block;">
                <div style="margin-bottom: 2px; text-align: center;"> &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;</div>
                <p style="margin: 0; padding: 0;">RATEE: ___<u>{{$ipcrData['ratee']}}</u>___</p>
            </div>
            <div style="display: inline-block; margin-left: 20px;">
                <div style="margin-bottom: 2px; text-align: center;">&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;</div>
                <p style="margin: 0; padding: 0;">DATE: ___ <u>{{$ipcrData['date_of_filling']}}</u>___</p>
            </div>
        </div>
        
    </div>
    <br>

    <div class="container">
        <table>
            <thead>
                <tr>
                     <!-- Headears -->
                    <th style="width: 26%; text-align: center;">Output</th>
                    <th style="width: 26%; text-align: center;">Success Indicators</th>
                    <th style="width: 28%; text-align: center;">Actual Accomplishments</th>
                    <th colspan="7" style="width: 20%; text-align: center; border-bottom: 1px solid black; position: relative;">SMTP Rating System</th>
              
                </tr>
            </thead>
            
            <tbody>
                <tr>
                    <td colspan="10"><b>A. Core Functions - 80%</b></td>
                </tr>  
                @php
                    $coreFunctions = json_decode($ipcrData['core_functions']);
                    $suppFunctions = json_decode($ipcrData['supp_admin_functions']);
                @endphp
                @foreach ($coreFunctions as  $coreFunction)
                    <!-- Core Functions -->
                    <tr>
                        <td >{{ $coreFunction->output }}</td>
                        <td  >{{ $coreFunction->indicator }}</td>
                        <td  >{{ $coreFunction->accomp }}</td>
                        <td class="smtp">{{ $coreFunction->Q }}</td>
                        <td class="smtp">{{ $coreFunction->E }}</td>
                        <td class="smtp">{{ $coreFunction->T }}</td>
                        <td class="smtp" colspan="4">{{ $coreFunction->A }}</td>
                     
                    </tr>
                @endforeach 
                <tr><td colspan="10"><b>Core Function Rating: {{$ipcrData['core_rating']}}</b></td></tr>
                <tr>
                    <td colspan="10"><b>B. Support / Administrative Functions - 20%</b></td>
                </tr>   
                @foreach ($suppFunctions as $suppAdminFunction)
                  <!-- SUpport/Administrative Functions -->
                <tr>
                    <td >{{ $suppAdminFunction->output }}</td>
                    <td >{{ $suppAdminFunction->indicator }}</td>
                    <td>{{ $suppAdminFunction->accomp }}</td>
                    <td class="smtp">{{ $suppAdminFunction->Q }}</td>
                    <td class="smtp">{{ $suppAdminFunction->E }}</td>
                    <td class="smtp">{{ $suppAdminFunction->T }}</td>
                    <td class="smtp" colspan="4">{{ $suppAdminFunction->A }}</td>
                   
                </tr>
                @endforeach 
               
            </tbody>
        </table>
    </div>
    <div class="container">
        <table>
            <thead>
                <!--  Rating and Recommendations -->
                <tr><td colspan="7"><b>Support / Administrative Functions Rating: </b> {{$ipcrData['core_rating']}}</td></tr>
                <tr><td colspan="7"><b>Final Average Rating: </b> {{$ipcrData['final_average_rating']}}</td></tr>
                <tr><td colspan="7"><b>Comments and Recommendations: </b>{{$ipcrData['comments_and_reco']}}</td></tr>   
            </thead>
        </table>

    
    <div class="container">
        <table>
            <thead>
                <tr>
                    <!-- Headears -->
                    <th style="width: 25%; text-align: center;"><b>Disscussed With:</b></th>
                    <th style="width: 6.24%; text-align: center;"><b>Disscussed Date:</b></th>
                    <th style="width: 25%; text-align: center;"><b>Assessed By:</b></th>
                    <th style="width: 6.24%; text-align: center;"><b>Assessed Date:</b></th>
                    <th style="width: 2.24%; text-align: center;"><b>Final Rating:</b></th>
                    <th style="width: 22%; text-align: center;"><b>Final Rating By:</b></th>
                    <th style="width: 10.25%; text-align: center;"><b>Final Rating Date:</b></th>
                </tr>
            </thead>
            <tbody>
                {{-- @php
                dd($ipc)
                @endphp --}}
                @foreach($ipcrs as $ipcr)
                    @php
                    // dd($file);
                       
                        $ipcrData = json_decode($ipcr, true);
                        // dd($ipcr);
                        $ipcrDiscussed = $ipcrData['discussed_with'];
                        // dd($ipcrDiscussed);
                    @endphp
                  @endforeach
                <tr>
                  
                <td style="text-align: center;" >
                    <br> 
                    {{-- <img src="{{ echo asset($file) }}" alt="Image Description" width="200" height="100"> --}}
                    {{-- <img src="data:image/jpeg;base64,{{ base64_encode($file) }}" alt="Image Description" width="200" height="100"> --}}
                    <img src="data:image/gif;base64,{{ base64_encode($images['discussed_with']) }}" alt="Image Description" width="200" height="100">

                    <br> __________________ <br>
                    <b>{{$employees->first_name}} {{$employees->middle_name}} {{$employees->last_name}}</b>
                    <br> <i> Employee Signature</i><br>     </td>
                <td style="text-align: center;"> {{ $ipcrData['disscused_with_date'] }}</td>
                <td style=" text-align: center;"> I certify that i discussed my assessment of the performance with the employee <br> 
                        <br>  
                    <img src="data:image/gif;base64,{{ base64_encode($images['assessed_by']) }}" alt="Image Description" width="200" height="100">

                            {{-- <img src="{{ public_path('storage/'. $ipcrData['assessed_by']) }}" alt="Image Description" width="200" height="100"> --}}
                        <br>  __________________ 
                        <br> Signature over Printed Name of Immediate Supervisor</td>
                <td style="text-align: center;"> {{ $ipcrData['assessed_by_date'] }}</td>
                <td style="text-align: center;">{{$ipcrData['final_rating']}}</td>
                <td style="text-align: center;">
                    <br> 
                    <img src="data:image/gif;base64,{{ base64_encode($images['final_rating_by']) }}" alt="Image Description" width="200" height="100">
                    <br>  __________________ <br>
                    Head of Unit
                </td>
                <td> {{$ipcrData['final_rating_by_date']}}</td>
                </tr>


               
            </tbody>
        </table>
    </div>
    @elseif ($ipcrData['opcr_type'] === "Rated")
    <div class="container">
        <table>
            <thead>
                <tr>
                     <!-- Headears -->
                    <th style="width: 23%; text-align: center;">Output</th>
                    <th style="width: 23%; text-align: center;">Success Indicators</th>
                    <th style="width: 23%; text-align: center;">Actual Accomplishments</th>
                    <th colspan="4" style="width: 10%; text-align: center; border-bottom: 1px solid black; position: relative;">SMTP Rating System</th>
                    <th style="width: 7%; text-align: center;">Weight</th>
                    <th style="width: 14%; text-align: center;">Remarks</th>
                </tr>
            </thead>
            
            <tbody>
                <tr>
                    <td colspan="9"><b>A. Core Functions - 80%</b></td>
                </tr>  
                @php
                    $coreFunctions = json_decode($ipcrData['core_functions']);
                    $suppFunctions = json_decode($ipcrData['supp_admin_functions']);
                @endphp
                @foreach ($coreFunctions as $coreFunction)
                    <!-- Core Functions -->
                    <tr>
                        <td >{{ $coreFunction->output ?? ' ' }}</td>
                        <td  >{{ $coreFunction->indicator ?? ' ' }}</td>
                        <td  >{{ $coreFunction->accomp ?? ' '}}</td>
                        <td >{{ $coreFunction->Q ?? ' '}}</td>
                        <td >{{ $coreFunction->E ?? ' '}}</td>
                        <td >{{ $coreFunction->T ?? ' '}}</td>
                        <td >{{ $coreFunction->A ?? ' '}}</td>
                        <td style="text-align: center">{{ $coreFunction->weight ?? ' ' }}</td>
                        <td style="text-align: center">{{ $coreFunction->remark ?? ' ' }}</td>
                    </tr>
                @endforeach 
                <tr><td colspan="9"><b>Core Function Rating: {{$ipcrData['core_rating']}}</b></td></tr>
                <tr>
                    <td colspan="9"><b>B. Support / Administrative Functions - 20%</b></td>
                </tr>   
                @foreach ($suppFunctions as $suppAdminFunction)
                  <!-- SUpport/Administrative Functions -->
                <tr>
                    <td >{{ $suppAdminFunction->output ?? ' '}}</td>
                    <td >{{ $suppAdminFunction->indicator ?? ' ' }}</td>
                    <td >{{ $suppAdminFunction->accomp ?? ' ' }}</td>
                    <td >{{ $suppAdminFunction->Q ?? ' ' }}</td>
                    <td >{{ $suppAdminFunction->E ?? ' ' }}</td>
                    <td >{{ $suppAdminFunction->T ?? ' ' }}</td>
                    <td >{{ $suppAdminFunction->A ?? ' ' }}</td>
                    <td style="text-align: center">{{ $suppAdminFunction->weight ?? ' ' }}</td>
                    <td style="text-align: center">{{ $suppAdminFunction->remark ?? ' '}}</td>
                   
                </tr>
                @endforeach 
               
            </tbody>
        </table>
    </div>
    <div class="container">
        <table>
            <thead>
                <!--  Rating and Recommendations -->
                <tr><td colspan="7"><b>Support / Administrative Functions Rating: </b> {{$ipcrData['core_rating']}}</td></tr>
                <tr><td colspan="7"><b>Final Average Rating: </b> {{$ipcrData['final_average_rating']}}</td></tr>
                <tr><td colspan="7"><b>Comments and Recommendations: </b>{{$ipcrData['comments_and_reco']}}</td></tr>   
            </thead>
        </table>

      <!--  Signatures and Dates -->
    <div class="container">
        <table>
            <thead>
                <tr>
                    <!-- Headears -->
                    <th style="width: 10%; text-align: center;" class="w-10 items-center p-4"><b>Disscussed With:</b></th>
                    <th style="width: 10%; text-align: center;"><b>Disscussed Date:</b></th>
                    <th style="width: 20%; text-align: center;"><b>Assessed By:</b></th>
                    <th style="width: 6.24%; text-align: center;"><b>Assessed Date:</b></th>
                    <th style="width: 2.24%; text-align: center;"><b>Final Rating:</b></th>
                    <th style="width: 20%; text-align: center;"><b>Final Rating By:</b></th>
                    <th style="width: 10.25%; text-align: center;"><b>Final Rating Date:</b></th>
                </tr>
            </thead>
            <tbody>
                @foreach($ipcrs as $ipcr)
                    @php
                        $ipcrData = json_decode($ipcr, true);
                    @endphp
                  @endforeach
                <tr>
                <td style="text-align: center;" >
                    <br> 
                    <img src="data:image/gif;base64,{{ base64_encode($images['discussed_with']) }}" alt="Image Description" width="200" height="100">
                    <br> __________________ <br>
                    <b>{{$employees->first_name}} {{$employees->middle_name}} {{$employees->last_name}}</b>
                    <br> <i> Employee Signature</i><br>     
                </td>
                <td style="text-align: center;"> {{ $ipcrData['disscused_with_date'] }}</td>
                <td style=" text-align: center;"> I certify that i discussed my assessment of the performance with the employee <br> 
                        <br>
                        <img src="data:image/gif;base64,{{ base64_encode($images['assessed_by']) }}" alt="Image Description" width="200" height="100"> 
                        <br>  __________________ 
                        <br> Signature over Printed Name of Immediate Supervisor</td>
                <td style="text-align: center;"> {{ $ipcrData['assessed_by_date'] }}</td>
                <td style="text-align: center;">{{$ipcrData['final_rating']}}</td>
                <td style="text-align: center;"><<br> 
                    <img src="data:image/gif;base64,{{ base64_encode($images['final_rating_by']) }}" alt="Image Description" width="200" height="100">
                    <br>  __________________ <br>
                    Head of Unit
                   </td>
                <td class="whitespace-nowrap"> {{$ipcrData['final_rating_by_date']}}</td>
                </tr>


               
            </tbody>
        </table>
    </div>
    @endif
    <br>
    <b><p>Legend: Q-Quality E-Efficiency/Quantity T-Time Standards A-Average</p></b>
</body>
</html>
