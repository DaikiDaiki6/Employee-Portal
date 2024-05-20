<?php

namespace Database\Seeders;

use Carbon\Carbon;
use App\Models\User;
use App\Models\Roles;
use App\Models\Employee;
use Illuminate\Http\File;
use App\Models\Dailytimerecord;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Storage;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    { 

        // for($i = 0; $i <= 30; $i++){
        //     Dailytimerecord::create([
        //         'employee_id' => '202132321',
        //         'attendance_date' => Carbon::createFromDate(2024, 5, $i),
        //         'time_in' => $i.':00',
        //         'time_out' => $i.':'.$i,
        //         'late' => 1,
        //         'status' => 1,
        //     ]);
        // }
        
        $employee = new Employee();
        $employee->employee_id = '202132321';
        $employee->employee_type = 'Casual';
        $employee->department_name = 'College of Engineering';
        $employee->employee_role = 2;
        $employee->department_id = 1;
        $employee->dean_id = 1;
        $employee->is_department_head_or_dean = ['0,0'];
        $employee->first_name = 'Juan';
        $employee->middle_name = 'Dela';
        $employee->last_name = 'Cruz';
        $employee->age = 25;
        $employee->gender = 'Male';
        $employee->personal_email = 'juandelacruz@gmail';
        $employee->phone = '09323123232';
        $employee->birth_date = '2023-12-06';
        $employee->address = 'Sampaloc, Manila';
        $employee->current_position = 'Part-time';
        $employee->salary = 510;
        // $employee->department_head = 'Raymund Dioses';
        $employee->start_of_employment = Carbon::createFromDate(2022, 4, 9);
        $employee->end_of_employment = Carbon::createFromDate(2024, 4, 9);
        $employee->faculty_or_not = true;
        $employee->study_available_units = 20;
        $employee->teach_available_units = 10;
        $employee->vacation_credits = 20;
        $employee->sick_credits = 20;
        $employee->school_email = 'comsci@plm.edu.ph'; 

        $employeeHistory = [
            [
            'name_of_company' => 'Accenture',
            'prev_position' => 'Software Engineer',
            'start_date' =>  "2024-03-02",
            'end_date' =>  "2024-03-02",
            ],
            ];
        foreach($employeeHistory as $load){
            $jsonEmployeeHistory[] = [
                'name_of_company' => $load['name_of_company'],
                'prev_position' => $load['prev_position'],
                'start_date' => $load['start_date'],
                'end_date' => $load['end_date'],
            ];
        }

        $employee->employee_history = json_encode($jsonEmployeeHistory);

        // $employee->employee_history = "[{\"end_date\": \"2024-03-02\", \"start_date\": \"2024-03-02\", \"prev_position\": \"Software Engineer\", \"name_of_company\": "Accenture"}, {"end_date": "2023-03-02", "start_date": "2022-03-02", "prev_position": "Junior Developer", "name_of_company": "IBM"}, {"end_date": "2022-03-02", "start_date": "2021-02-07", "prev_position": "Intern Developer", "name_of_company": "EasyPC"}]';
        
    // Emp Image
    $imageContent = file_get_contents(public_path('storage/photos/demofiles/Picture.webp'));
    $destinationPath = 'photos/avatar/Picture.webp';
    Storage::disk('public')->put($destinationPath, $imageContent);
    $employee->emp_image = $destinationPath;

    //    // Emp Image 
    //    $path = Storage::putFile('photos/avatar', new File('public\storage\photos\demofiles\Picture.webp'), 'public');
    //    $employee->emp_image = $path;

       // Diploma
       $path = Storage::putFile('photos/diploma', new File('public\storage\photos\demofiles\diploma.png'), 'private');
       $employee_diploma[] = $path;   
       $path = Storage::putFile('photos/diploma', new File('public\storage\photos\demofiles\Training picture\coding.webp'), 'private');
       $employee_diploma[] = $path;   
       $employee->emp_diploma = $employee_diploma;

       // Tor
       $path = Storage::putFile('photos/tor', new File('public\storage\photos\demofiles\tor.jfif'), 'private');
       $emp_tor[] = $path;   
       $employee->emp_tor = $emp_tor;


       // Certificate
       $path = Storage::putFile('photos/cert_of_trainings_seminars', new File('public\storage\photos\demofiles\certif.jpg'), 'private');
       $emp_cert_of_trainings_seminars[] = $path;   
       $employee->emp_cert_of_trainings_seminars = $emp_cert_of_trainings_seminars;

       // PRC License
       $path = Storage::putFile('photos/auth_copy_of_csc_or_prc', new File('public\storage\photos\demofiles\prc license.jfif'), 'private');
       $emp_auth_copy_of_csc_or_prc[] = $path;   
       $employee->emp_auth_copy_of_csc_or_prc = $emp_auth_copy_of_csc_or_prc;
       
       // PRC Board Rating
       $path = Storage::putFile('photos/auth_copy_of_prc_board_rating', new File('public\storage\photos\demofiles\prc board rating.JPG'), 'private');
       $emp_auth_copy_of_prc_board_rating[] = $path;   
       $employee->emp_auth_copy_of_prc_board_rating = $emp_auth_copy_of_prc_board_rating;

       // Medical Certificate
       $path = Storage::putFile('photos/med_certif', new File('public\storage\photos\demofiles\Medical Certificate.jpg'), 'private');
       $emp_med_certif[] = $path;   
       $employee->emp_med_certif = $emp_med_certif;

       // NBI Clearance
       $path = Storage::putFile('photos/nbi_clearance', new File('public\storage\photos\demofiles\NBI Clearance.png'), 'private');
       $emp_nbi_clearance[] = $path;   
       $employee->emp_nbi_clearance = $emp_nbi_clearance;

       // PSA
       $path = Storage::putFile('photos/psa', new File('public\storage\photos\demofiles\psa.png'), 'private');
       $emp_psa_birth_certif[] = $path;   
       $employee->emp_psa_birth_certif = $emp_psa_birth_certif;

       // PSA Marriage
       $path = Storage::putFile('photos/psa_marriage', new File('public\storage\photos\demofiles\psa marriage.jpg'), 'private');
       $emp_psa_marriage_certif[] = $path;   
       $employee->emp_psa_marriage_certif = $emp_psa_marriage_certif;

       // Service Record
       $path = Storage::putFile('photos/service_record', new File('public\storage\photos\demofiles\service record.png'), 'private');
       $emp_service_record_from_other_govt_agency[] = $path;   
       $employee->emp_service_record_from_other_govt_agency = $emp_service_record_from_other_govt_agency;

       // Approved Clearance
       $path = Storage::putFile('photos/approved_clearance', new File('public\storage\photos\demofiles\Approved Clearance.jpg'), 'private');
       $emp_approved_clearance_prev_employer[] = $path;   
       $employee->emp_approved_clearance_prev_employer = $emp_approved_clearance_prev_employer;

        $employee->save();


        // $employee = new Employee();
        // $employee->employee_id = '202151232';
        // $employee->employee_type = 'Casual';
        // $employee->department_name = 'College of Engineering';
        // $employee->employee_role = 2;
        // $employee->department_id = ['1,3'];
        // $employee->dean_id = ['0,1'];
        // $employee->first_name = 'Juan';
        // $employee->middle_name = 'Dela';
        // $employee->last_name = 'Cruz';
        // $employee->age = 25;
        // $employee->gender = 'Male';
        // $employee->personal_email = 'juandelacruz@gmail\.com';
        // $employee->phone = '09323123232';
        // $employee->birth_date = '2023-12-06';
        // $employee->address = 'Sampaloc, Manila';
        // $employee->current_position = 'Part-time';
        // $employee->salary = 510;
        // $employee->start_of_employment = Carbon::createFromDate(2022, 4, 9);
        // $employee->end_of_employment = Carbon::createFromDate(2024, 4, 9);
        // $employee->faculty_or_not = true;
        // $employee->faculty_or_not = true;
        // $employee->school_email = 'comsci@plm.edu.ph';
        // $employee->save();

        // $employee = new Employee();
        // $employee->employee_id = '202189212';
        // $employee->employee_type = 'Permanent';
        // $employee->department_name = 'College of Information System and Technology Management';
        // $employee->employee_role = 2;
        // $employee->department_id = ['0,1'];
        // $employee->dean_id = ['1,3'];
        // $employee->first_name = 'Department';
        // $employee->middle_name = 'Head';
        // $employee->last_name = '3';
        // $employee->age = 25;
        // $employee->gender = 'Male';
        // $employee->personal_email = 'juandelacruz@gmail\.com';
        // $employee->phone = '09323123232';
        // $employee->birth_date = '2023-12-06';
        // $employee->address = 'Sampaloc, Manila';
        // $employee->current_position = 'Part-time';
        // $employee->salary = 510;
        // $employee->start_of_employment = Carbon::createFromDate(2022, 4, 9);
        // $employee->end_of_employment = Carbon::createFromDate(2024, 4, 9);
        // $employee->faculty_or_not = true;
        // $employee->faculty_or_not = true;
        // $employee->school_email = 'comsci@plm.edu.ph';
        // $employee->save();

        
      

        $employee = new Employee();
        $employee->employee_id = '200000001';
        $employee->employee_type = 'Casual';
        $employee->department_name = 'College of Information System and Technology Management';
        $employee->employee_role = 2;
        $employee->department_id = 1;
        $employee->is_department_head_or_dean = ['1,0'];
        $employee->first_name = 'Admin';
        $employee->middle_name = 'Admin';
        $employee->last_name = 'Admin';
        $employee->age = 1;
        $employee->gender = 'Male';
        $employee->personal_email = 'admin@gmail.com';
        $employee->phone = '00000000000';
        $employee->birth_date = '2000-01-01';
        $employee->address = 'PLM';
        $employee->current_position = 'Permanent';
        $employee->salary = 0;
        $employee->study_available_units = 20;
        $employee->teach_available_units = 10;
        $employee->vacation_credits = 20;
        $employee->sick_credits = 20;
        $employee->start_of_employment = Carbon::createFromDate(2022, 4, 9);
        $employee->faculty_or_not = false;
        $employee->school_email = 'admin@plm.edu.ph';

        $employee->save();

       
        // User::create([
        //     'name'     => 'Don',
        //     'email'    => 'donfelipe@plm.edu.ph',
        //     'password' => bcrypt('donfelipe'),
        //     'employee_id' => '202151232',
        // ]);

        User::create([
            'name'     => 'Department Head 3',
            'email'    => 'departmentHead@plm.edu.ph',
            'password' => bcrypt('depthead'),
            'employee_id' => '202189212',
        ]);

      

        User::create([
            'name'     => 'Employee',
            'email'    => 'employee@plm.edu.ph',
            'password' => bcrypt('secret'),
            'employee_id' => '202132321',
        ]);

        User::create([
            'name'     => 'Admin',
            'email'    => 'admin@plm.edu.ph',
            'password' => bcrypt('admin'),
            'employee_id' => '200000001',
            'is_admin' => 1,
        ]);

       

       

       
    }
}
