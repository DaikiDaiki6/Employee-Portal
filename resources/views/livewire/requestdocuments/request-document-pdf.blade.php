@vite('resources/css/app.css')
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    {{-- <link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/flowbite.min.css" rel="stylesheet" /> --}}
    <title>Document Request</title>
    <style>
        /* Add your CSS styles here */
        table {
            width: 100%;
            border-collapse: collapse;
        }
        th, td {
            border: 1px solid black;
            padding: 1px;
            text-align: left;
        }
        .form-container {
        max-width: 600px;
        margin: auto;
        }
        .page-break {
        page-break-after: always;
        }


    </style>
 <div style="text-align: center;" class="underline-offset-0">
    <img src="data:image/gif;base64,{{ base64_encode($logo) }}" alt="Image Description" width="50" height="40" style="vertical-align: middle;">
    <p style="display: inline-block; vertical-align: middle; margin: 0; text-align: center;">PAMANTASAN NG LUNGSOD NG MAYNILA <br> HUMAN RESOURCES DEVELOPMENT OFFICE</p>
</div>







</head>
<body>
    <p>Reference number: <u>{{str_pad($requestDocument->ref_number, 15, '_', STR_PAD_BOTH)}}</u></p>
    <table>
        <tr>
            <td>Name:</td>
            <td>{{$employees->first_name}} {{$employees->middle_name}} {{$employees->last_name}}</td>
            <td>College/Department:</td>
            <td>{{$employees->department_name}}</td>
        </tr>
        <tr>
            <td>Position:</td>
            <td>{{$employees->current_position}}</td>
            <td>Employment Status:</td>
            <td>{{$employees->employee_type}}</td>
        </tr>
        <!-- Add more rows as needed -->
    </table>
    
    <!-- Your existing checklist container -->
    <div class="checklist-container" style="margin-left: 4%">
        <h4>1.REQUEST FOR: (Please tick the appropriate box)</h4>
        <form>
            <div style="display: inline-block; width: 48%; vertical-align: top;">
                <!-- First Column -->
                <div style="margin-bottom: 10px; display: flex; align-items: center; margin-left: 3%">
                    <input type="checkbox" name="requests[]" value="Certificate of Employment" style="margin-right: 5px; vertical-align: middle;" {{ in_array('Certificate of Employment', $requestDocument->requests) ? 'checked' : '' }}>
                    <label style="vertical-align: middle;">Certificate of Employment</label>
                </div>
                
                <div style="margin-bottom: 10px; display: flex; align-items: center; margin-left: 3%">
                    <input type="checkbox" name="requests[]" value="Service Record" style="margin-right: 5px; vertical-align: middle;" {{ in_array('Certificate of Employment with Compensation', $requestDocument->requests) ? 'checked' : '' }}>
                    <label style="vertical-align: middle;">Certificate of Employment with Compensation</label>
                </div>
                
                <div style="margin-bottom: 10px; display: flex; align-items: center; margin-left: 3%">
                    <input type="checkbox" name="requests[]" value="Part time Teaching Services" style="margin-right: 5px; vertical-align: middle;" {{ in_array('MILC Certification', $requestDocument->requests) ? 'checked' : '' }}>
                    @if ($requestDocument->milc_description)
                    <label style=“vertical-align: middle;”>MILC Certification:<span style="text-decoration: underline; text-underline-offset: 0px; text-decoration-thickness: auto">__{{$requestDocument->milc_description}}___</span></label>

                    @else
                        <label style=" vertical-align: middle;">MILC Certification </label>
                    @endif
                </div>
                
                <div style="margin-bottom: 10px; display: flex; align-items: center; margin-left: 3%">
                    <input type="checkbox" name="requests[]" value="Certificate of No Pending Administrative Case" style="margin-right: 5px; vertical-align: middle;" {{ in_array('Certificate of No Pending Administrative Case', $requestDocument->requests) ? 'checked' : '' }}>
                    {{-- @if ($legalAffairs->purpose ?? ' ')
                        <label >Certificate of No Pending Administrative Case: __<span style="text-decoration: underline; text-underline-offset: 0px; text-decoration-thickness: auto">{{$legalAffairs->purpose ?? ' '}}</span>__</label>
                    @else --}}
                        <label>Certificate of No Pending Administrative Case</label>
                    {{-- @endif --}}
                </div>
                
                <div style="margin-bottom: 10px; display: flex; align-items: center; margin-left: 3%">
                    <input type="checkbox" name="requests[]" value="Another Request" style="margin-right: 5px; vertical-align: middle;" {{ in_array('Others', $requestDocument->requests) ? 'checked' : '' }}>
                    @if (in_array('Others', $requestDocument->requests))
                        <label >Others: __<span style="text-decoration: underline; text-underline-offset: 0px; text-decoration-thickness: auto">{{$requestDocument->other_request}}</span>__</label>
                    @else
                        <label style="vertical-align: middle;">Others: ___________________________</label>
                    @endif

                </div>
            </div>
            
            <div style="display: inline-block; width: 48%;  vertical-align: top;  margin-left: 3% ">
                <!-- Second Column -->
                <div style="margin-bottom: 10px; margin-left: 3%">
                    <input type="checkbox" name="requests[]" value="Service Record" style="margin-right: 5px; vertical-align: middle;" {{ in_array('Service Record', $requestDocument->requests) ? 'checked' : '' }}>
                    <label style="vertical-align: middle;">Service Record</label>
                </div>
                
                <div style="margin-bottom: 10px; margin-left: 3%">
                    <input type="checkbox" name="requests[]" value="Part time Teaching Services" style="margin-right: 5px; vertical-align: middle;" {{ in_array('Part time Teaching Services', $requestDocument->requests) ? 'checked' : '' }}>
                    <label style="vertical-align: middle;">Part-time Teaching Services</label>
                </div>
            </div>
           
        <div class="container">
                @if ($requestDocument->purpose)
                    <p><b>2. PURPOSE: </b><u style="min-width: 200px; vertical-align: top; text-indent: 40px; margin: 0; padding: 0;">{{ str_pad($requestDocument->purpose, 20, '_', STR_PAD_RIGHT) }}</u></p>
                @else
                    <u style="display: inline-block; min-width: 200px; vertical-align: top; margin: 0; padding: 0;">{{ str_repeat('_', 20) }}</u>
                @endif
        </div>
    </div>


    <div class="checklist-container">
        <p>&nbsp;<br>&nbsp;</p>
        <form>
            <div style="display: flex;">
                <!-- First Column -->
                <div style="display: inline-block; width: 48%; vertical-align: top; text-align: center;">
                    <div style="position: relative; display: inline-block;">
                        <img src="data:image/gif;base64,{{ base64_encode($signature) }}" alt="Image Description" width="200" height="50"> 
                    </div>
                    <div style="position: relative; margin-top: 50px;">
                        <hr style="border: none; border-bottom: 1px solid black; width: 200px;">
                        <p style="margin: 5px 0;">Signature of the requesting party</p>
                    </div>
                </div>
                
                <!-- Another Section -->
                <div style="display: inline-block; width: 48%; vertical-align: top; text-align: center;">
                    <div style="position: relative; display: inline-block;">
                        <!-- Specific content or image -->
                    </div>
                    <div style="position: relative; margin-top: 65px;">
                        <!-- Content for this section -->
                        <p>{{$requestDocument->date_of_filling}}</p>
                        <hr style="border: none; border-bottom: 1px solid black; width: 200px;">
                        <p style="margin: 5px 0;">Date of Signing</p>
                    </div>
                </div>
            </div>
        </form>
    </div>






<div style="display: flex; justify-content: space-between; width: 100%;">
    <br>
    <div style="display: inline-block; margin-left: auto; margin-top: 10px;">&nbsp; &nbsp; &nbsp; &nbsp; 
        <div style="text-align: left; font-size: 14px;">
            <p style="text-align: left; font-size: 14px;"><u>Requirements of Authorized Representatives</u></p>
            <ul style="padding-left: 10px; font-size: 13px;  margin-left: 4%;">
                <li>Original copy of the Authorization Letter from the concerned employee</li>
                <li>Photocopy of one (1) Valid Identification Card of the employee</li>
                <li>Photocopy of one (1) Valid Identification Card of the authorized representative</li>
                <li>Other documents as may be required</li>
            </ul>
        </div>
    </div>
    <div style="display: inline-block;">&nbsp; &nbsp; </div>
    
    <div style="display: inline-block; border: 1px solid #000; padding: 8px; height:32%">
    
        <div style="display: inline-block;">
            <p style="margin: 0; padding: 0;">Received by: <br> <br> <br>  <br>_________________</p>
        </div>
        <div style="display: inline-block; margin-left: 20px; margin-top: 20px; " >
            <p style="margin: 0; padding: 0;">Date: <br> <br>  <br>  <br>__________</p>
        </div>
    </div>
</div>

{{-- <div style="position: relative; width: 100%; text-align: center;">
    <hr style="border-top: 2px dashed #000; margin-top: 20px;">
    <span style="position: absolute; left: 50%; top: -10px; transform: translateX(-50%); font-size: 24px;">
        Cut here
    </span>
</div> --}}



<div class="page-break"></div>

<div style="text-align:center;">
    <img src="data:image/gif;base64,{{ base64_encode($logo) }}" alt="Image Description" width="50" height="40"> 
    <p style="display: inline-block; vertical-align: middle; margin: 0; text-align: center;">
        PAMANTASAN NG LUNGSOD NG MAYNILA <br>  HUMAN RESOURCES DEVELOPMENT OFFICE
    </p>
</div>
<p style=" text-align: center;">
    ACKNOWLEDGEMENT RECEIPT
</p>
<div class="container">
    <form>
        <div style="display:flex;">
            <!-- First Column -->
            <!-- Another Section -->
            <div style="display: inline-block; width: 48%; vertical-align: top; text-align: center;">
                <div style="position: relative; display: inline-block;">
                    <!-- Specific content or image -->
                </div>
                <div style="position: relative; margin-top: 65px;">
                    <!-- Content for this section -->
                    <p>Date: <u>{{str_pad($requestDocument->date_of_filling, 15, '_', STR_PAD_BOTH)}}</p>
                  
                </div>
            </div>
            <!-- Another Section -->
            <div style="display: inline-block; width: 48%; vertical-align: top; text-align: center;">
                <div style="position: relative; display: inline-block;">
                    <!-- Specific content or image -->
                </div>
                <div style="position: relative; margin-top: 65px;">
                    <!-- Content for this section -->
                    <p>Reference number: <u>{{str_pad($requestDocument->ref_number, 15, '_', STR_PAD_BOTH)}}</u></p>
                </div>
            </div>
        </div>
    </form>
</div>
       

<table>
    <tr>
        <td>Name:</td>
        <td>{{$employees->first_name}} {{$employees->middle_name}} {{$employees->last_name}}</td>
        <td>College/Department:</td>
        <td>{{$employees->department_name}}</td>
    </tr>
    <tr>
        <td>Position:</td>
        <td>{{$employees->current_position}}</td>
        <td>Employment Status:</td>
        <td>{{$employees->employee_type}}</td>
    </tr>
    <!-- Add more rows as needed -->
</table>
                
<div class="checklist-container">
    <form>
        <div style="display: flex;">
            <!-- First Column -->
            <!-- Another Section -->
            <div style="display: inline-block; width: 48%; vertical-align: top; text-align: center;">
                <div style="position: relative; display: inline-block;">
                    <!-- Specific content or image -->
                </div>
                <div style="position: relative; margin-top: 65px;">
                    <!-- Content for this section -->
                    <p>&nbsp;</p>
                    <hr style="border: none; border-bottom: 1px solid black; width: 200px;">
                    <p style="margin: 5px 0;">Authorized HRD Personnel</p>
                </div>
            </div>
            
            <!-- Another Section -->
            <div style="display: inline-block; width: 48%; vertical-align: top; text-align: center;">
                <div style="position: relative; display: inline-block;">
                    <!-- Specific content or image -->
                </div>
                <div style="position: relative; margin-top: 65px;">
                    <!-- Content for this section -->
                    <p>&nbsp;</p>
                    <hr style="border: none; border-bottom: 1px solid black; width: 200px;">
                    <p style="margin: 5px 0;">Date</p>
                </div>
            </div>
        </div>
    </form>
</div>
<hr style="border-top: 1px solid #000; width: 100%;">

      
            
                   
</body>





</html>
