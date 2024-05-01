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
    <div style="text-align:right">
        <p style="display:inline-flex; margin-right: 10px; margin-bottom:0% " class="">
           <span style="font-weight: bold">PAMANTASAN NG LUNGSOD NG MAYNILA</span> 
           <br> (University of the City of Manila) 
           <br> 1<sup>st</sup> Floor, Gusaling Villegas 
           <br> Intramuros, Manila,
           <br> {{ svg('bytesize-telephone') }} 8-643.25.00 
           <br style="text-decoration: underline;"> hrmo@plm.edu.ph
        </p>
        <img src="data:image/gif;base64,{{ base64_encode($logo) }}" alt="Image Description" width="90" height="110" style="vertical-align: top; "> 
        <hr style="margin: 0; padding: 0; width: 50%; float: right;">

        
    </div>
    <h3 class="text-align: center" style="text-align: right; letter-spacing: 5px; margin-right:20px; margin-bottom:70px">HUMAN RESOURCE MANAGEMENT OFFICE</h3>
    <h2  style="text-align: center;  letter-spacing: 5px; font-family: 'Times New Roman', Times, serif; text-decoration: underline;">CERTIFICATION</h2>

    <div>
       <pre style="font-family: 'Times New Roman', Times, serif;  margin-left:60px">
        Sir/Madam: 

                      This is to certify that according to our records, {{$employee->first_name}} {{$employee->middle_name}} {{$employee->last_name}} is presently rendering
        part-time teaching services as {{$employee->current_position}} at the {{$employee->department_name}} since {{$employee->start_of_employment}}.
        Unless renewed, her/his Contract of Service will expire on {{$employee->end_of_employment}}.
              
                      This certification is being issued upon the request of Ms/Mr {{$employee->last_name}} for 
        Salary Certification.

                      Issued this <span style="text-decoration: underline;">{{$currentDay}}</span> of  <span style="text-decoration: underline;">{{$currentMonth}}</span> <span>20{{$currentYear}}</span> at Manila, Philippines.

       </pre>
    </div>
  
    <div style="text-align: right; margin-right:100px;  vertical-align: top; ">
        <div style="display: inline-block; margin-right:15px">
            <img src="data:image/gif;base64,{{ base64_encode($sign) }}" alt="Image Description" width="90" height="110" style=" ">
        </div>
            <p style="margin: 5px;">Herminia D. Nuñez <br> <span style="margin-right:45px">Chief</span></p>
    </div>

    <div>

    </div>
    
    
  
</body>
</html>
