<?php

namespace Database\Seeders;

use Carbon\Carbon;
use App\Models\User;
use App\Models\Roles;
use App\Models\Employee;
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

        for($i = 0; $i <= 30; $i++){
            Dailytimerecord::create([
                'employee_id' => '202132321',
                'attendance_date' => Carbon::createFromDate(2024, 5, $i),
                'time_in' => $i.':00',
                'time_out' => $i.':'.$i,
                'late' => 1,
                'status' => 1,
            ]);
        }
        
        $employee = new Employee();
        $employee->employee_id = '202132321';
        $employee->employee_type = 'Casual';
        $employee->department_name = 'College of Engineering';
        $employee->employee_role = 2;
        $employee->department_id = 1;
        $employee->dean_id = 1;
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
        $employee->department_head = 'Raymund Dioses';
        $employee->start_of_employment = Carbon::createFromDate(2022, 4, 9);
        $employee->end_of_employment = Carbon::createFromDate(2024, 4, 9);
        $employee->faculty_or_not = true;
        $employee->study_available_units = 20;
        $employee->teach_available_units = 10;
        $employee->school_email = 'comsci@plm.edu.ph'; 
        $employee->employee_history = '[{"end_date": "2024-03-02", "start_date": "2024-03-02", "prev_position": "Software Engineer", "name_of_company": "Accenture"}, {"end_date": "2023-03-02", "start_date": "2022-03-02", "prev_position": "Junior Developer", "name_of_company": "IBM"}, {"end_date": "2022-03-02", "start_date": "2021-02-07", "prev_position": "Intern Developer", "name_of_company": "EasyPC"}]';
        
        // Emp Image
        $imageContent = file_get_contents(public_path('storage/photos/demofiles/Picture.webp'));
        $destinationPath = 'photos/avatar/Picture.webp';
        Storage::disk('public')->put($destinationPath, $imageContent);
        $employee->emp_image = $destinationPath;

        // Diploma
        $imageContent = file_get_contents(public_path('storage\photos\demofiles\diploma.png'));
        $destinationPath = 'storage\photos\demofiles\diploma.png';
        Storage::disk('local')->put($destinationPath, $imageContent);
        $employee->emp_diploma = $destinationPath;

        // Tor
        $imageContent = file_get_contents(public_path('storage\photos\demofiles\tor.jfif'));
        $destinationPath = 'storage\photos\demofiles\tor.jfif';
        Storage::disk('local')->put($destinationPath, $imageContent);
        $employee->emp_TOR = $destinationPath;

        // Certificate
        $imageContent = file_get_contents(public_path('storage\photos\demofiles\certif.jpg'));
        $destinationPath = 'storage\photos\demofiles\certif.jpg';
        Storage::disk('local')->put($destinationPath, $imageContent);
        $employee->emp_cert_of_trainings_seminars = $destinationPath;

        // PRC License
        $imageContent = file_get_contents(public_path('storage\photos\demofiles\prc license.jfif'));
        $destinationPath = 'storage\photos\demofiles\prc license.jfif';
        Storage::disk('local')->put($destinationPath, $imageContent);
        $employee->emp_auth_copy_of_csc_or_prc = $destinationPath;

        // PRC Board Rating
        $imageContent = file_get_contents(public_path('storage\photos\demofiles\prc board rating.JPG'));
        $destinationPath = 'storage\photos\demofiles\prc board rating.JPG';
        Storage::disk('local')->put($destinationPath, $imageContent);
        $employee->emp_auth_copy_of_prc_board_rating = $destinationPath;

        // Medical Certificate
        $imageContent = file_get_contents(public_path('storage\photos\demofiles\Medical Certificate.jpg'));
        $destinationPath = 'storage\photos\demofiles\Medical Certificate.jpg';
        Storage::disk('local')->put($destinationPath, $imageContent);
        $employee->emp_med_certif = $destinationPath;

        // NBI Clerance
        $imageContent = file_get_contents(public_path('storage\photos\demofiles\NBI Clearance.png'));
        $destinationPath = 'storage\photos\demofiles\NBI Clearance.png';
        Storage::disk('local')->put($destinationPath, $imageContent);
        $employee->emp_nbi_clearance = $destinationPath;

        // PSA
        $imageContent = file_get_contents(public_path('storage\photos\demofiles\psa.png'));
        $destinationPath = 'storage\photos\demofiles\psa.png';
        Storage::disk('local')->put($destinationPath, $imageContent);
        $employee->emp_psa_birth_certif = $destinationPath;

        // PSA Marriage
        $imageContent = file_get_contents(public_path('storage\photos\demofiles\psa marriage.jpg'));
        $destinationPath = 'storage\photos\demofiles\psa.png';
        Storage::disk('local')->put($destinationPath, $imageContent);
        $employee->emp_psa_marriage_certif = $destinationPath;


        // Service Record
        $imageContent = file_get_contents(public_path('storage\photos\demofiles\service record.png'));
        $destinationPath = 'storage\photos\demofiles\service record.png';
        Storage::disk('local')->put($destinationPath, $imageContent);
        $employee->emp_service_record_from_other_govt_agency = $destinationPath;
  
        // Clearance
        $imageContent = file_get_contents(public_path('storage\photos\demofiles\clearance.jpg'));
        $destinationPath = 'storage\photos\demofiles\clearance.jpg';
        Storage::disk('local')->put($destinationPath, $imageContent);
        $employee->emp_approved_clearance_prev_employer = $destinationPath;

        // $employee->addMedia('public\storage\photos\demofiles\diploma.png')
        //     ->preservingOriginal()
        //     ->toMediaCollection('diploma');
        // $employee->addMedia('public\storage\photos\demofiles\tor.jfif')
        //     ->preservingOriginal()
        //     ->toMediaCollection('tor');
        // $employee->addMedia('public\storage\photos\demofiles\certif.jpg')
        //     ->preservingOriginal()
        //     ->toMediaCollection('certificate/seminar');
        // $employee->addMedia('public\storage\photos\demofiles\prc license.jfif')
        //     ->preservingOriginal()
        //     ->toMediaCollection('csc_eligibility');
        // $employee->addMedia('public\storage\photos\demofiles\prc board rating.JPG')
        //     ->preservingOriginal()
        //     ->toMediaCollection('prc_boardrating');
        // $employee->addMedia('public\storage\photos\demofiles\med-cert.jpg')
        //     ->preservingOriginal()
        //     ->toMediaCollection('medical_certificate');
        // $employee->addMedia('public\storage\photos\demofiles\psa.png')
        //     ->preservingOriginal()
        //     ->toMediaCollection('psa_birthcertificate');
        // $employee->addMedia('public\storage\photos\demofiles\psa marriage.jpg')
        //     ->preservingOriginal()
        //     ->toMediaCollection('psa_marriagecertificate');
        // $employee->addMedia('public\storage\photos\demofiles\service record.png')
        //     ->preservingOriginal()
        //     ->toMediaCollection('service_record');
        // $employee->addMedia('public\storage\photos\demofiles\Approved Clearance.jpg')
        //     ->preservingOriginal()
        //     ->toMediaCollection('approved_clearance');
        $employee->save();


        $employee = new Employee();
        $employee->employee_id = '202151232';
        $employee->employee_type = 'Casual';
        $employee->department_name = 'College of Engineering';
        $employee->employee_role = 2;
            $employee->department_id = 1;
            $employee->dean_id = 1;
        $employee->first_name = 'Juan';
        $employee->middle_name = 'Dela';
        $employee->last_name = 'Cruz';
        $employee->age = 25;
        $employee->gender = 'Male';
        $employee->personal_email = 'juandelacruz@gmail.com';
        $employee->phone = '09323123232';
        $employee->birth_date = '2023-12-06';
        $employee->address = 'Sampaloc, Manila';
        $employee->current_position = 'Part-time';
        $employee->salary = 510;
        $employee->start_of_employment = Carbon::createFromDate(2022, 4, 9);
        $employee->end_of_employment = Carbon::createFromDate(2024, 4, 9);
        $employee->faculty_or_not = true;
        $employee->department_head = 'Raymund Dioses';
        $employee->faculty_or_not = true;
        $employee->school_email = 'comsci@plm.edu.ph';
        $employee->addMedia('public\storage\photos\demofiles\med-cert.jpg')
            ->preservingOriginal()
            ->toMediaCollection('avatar');
        $employee->addMedia('public\storage\photos\demofiles\diploma.png')
            ->preservingOriginal()
            ->toMediaCollection('diploma');
        $employee->save();


        // $employee = Employee::create([
        //     'employee_id' => '202132321',
        //     'employee_type' => 'Casual',
        //     'department_name' => 'computer science',
        //     'first_name' => 'Juan',
        //     'middle_name' => 'Dela',
        //     'last_name' => 'Cruz',
        //     'age' => 25,
        //     'gender' => 'Male',
        //     'personal_email' => 'juandelacruz@gmail',
        //     'phone' => '09323123232',
        //     'birth_date' => '2023-12-06',
        //     'address' => 'Sampaloc, Manila',
        //     'current_position' => 'Part-time',
        //     'salary' => 510,
        //     'department_head' => 'Raymund Dioses',
        //     'faculty_or_not' => True,
        // ]);

       

        $user = User::create([
            'name'     => 'Admin',
            'email'    => 'employee@plm.edu.ph',
            'password' => bcrypt('secret'),
            'employee_id' => '202132321',
        ]);

        // $user = User::create([
        //     'name'     => 'Don',
        //     'email'    => 'donfelipe@gmail.com',
        //     'password' => bcrypt('donfelipe'),
        //     'employee_id' => '202151232',
        // ]);

       

       
    }
}
