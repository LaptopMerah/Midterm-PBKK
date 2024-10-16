<?php

namespace Database\Seeders;

use App\Models\Course;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use PHPUnit\Framework\Constraint\Count;

class CourseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $courses_data = [
        // Semester 1
        ['name' => 'Calculus 1', 'course_code' => 'SM234101', 'semester' => 1, 'credit' => 3],
        ['name' => 'Fundamental Programming', 'course_code' => 'EF234101', 'semester' => 1, 'credit' => 4],
        ['name' => 'Digital System', 'course_code' => 'EF234102', 'semester' => 1, 'credit' => 3],
        ['name' => 'Linear Algebra', 'course_code' => 'EF234103', 'semester' => 1, 'credit' => 3],
        ['name' => 'Database System', 'course_code' => 'EF234104', 'semester' => 1, 'credit' => 4],
        
        // Semester 2
        ['name' => 'Data Structure', 'course_code' => 'EF234201', 'semester' => 2, 'credit' => 4],
        ['name' => 'Operating System', 'course_code' => 'EF234202', 'semester' => 2, 'credit' => 4],
        ['name' => 'Computer Organization', 'course_code' => 'EF234203', 'semester' => 2, 'credit' => 3],
        ['name' => 'Numerical Computation', 'course_code' => 'EF234204', 'semester' => 2, 'credit' => 3],
        ['name' => 'Calculus 2', 'course_code' => 'SM234201', 'semester' => 2, 'credit' => 3],
        ['name' => 'Introduction to Intelligent Electrical and Informatics Technology', 'course_code' => 'EW234201', 'semester' => 2, 'credit' => 2],
        
        // Semester 3
        ['name' => 'Web Programming', 'course_code' => 'EF234301', 'semester' => 3, 'credit' => 3],
        ['name' => 'Object Oriented Programming', 'course_code' => 'EF234302', 'semester' => 3, 'credit' => 3],
        ['name' => 'Computer Network', 'course_code' => 'EF234303', 'semester' => 3, 'credit' => 4],
        ['name' => 'Graph Theory', 'course_code' => 'EF234304', 'semester' => 3, 'credit' => 3],
        ['name' => 'Discrete Mathematics', 'course_code' => 'EF234305', 'semester' => 3, 'credit' => 3],
        ['name' => 'Artificial Intelligence Concepts', 'course_code' => 'EK234201', 'semester' => 3, 'credit' => 3],
        ['name' => 'Software Development Principles', 'course_code' => 'EF234307', 'semester' => 3, 'credit' => 2],
        
        // Semester 4
        ['name' => 'Network Programming', 'course_code' => 'EF234401', 'semester' => 4, 'credit' => 3],
        ['name' => 'Probabilistic and Statistic', 'course_code' => 'EF234402', 'semester' => 4, 'credit' => 3],
        ['name' => 'Automata', 'course_code' => 'EF234403', 'semester' => 4, 'credit' => 2],
        ['name' => 'Database Management', 'course_code' => 'EF234404', 'semester' => 4, 'credit' => 3],
        ['name' => 'Algorithm Design and Analysis', 'course_code' => 'EF234405', 'semester' => 4, 'credit' => 3],
        ['name' => 'Machine Learning', 'course_code' => 'EF234406', 'semester' => 4, 'credit' => 3],
        ['name' => 'Software Design', 'course_code' => 'ER234301', 'semester' => 4, 'credit' => 3],
        
        // Semester 5
        ['name' => 'Framework-based Programming', 'course_code' => 'EF234501', 'semester' => 5, 'credit' => 3],
        ['name' => 'Information Security', 'course_code' => 'EF234502', 'semester' => 5, 'credit' => 3],
        ['name' => 'Modeling and Simulation', 'course_code' => 'EF234503', 'semester' => 5, 'credit' => 3],
        ['name' => 'Computer Graphics', 'course_code' => 'EF234504', 'semester' => 5, 'credit' => 3],
        ['name' => 'Knowledge based Engineering', 'course_code' => 'EF234505', 'semester' => 5, 'credit' => 3],
        
        // Semester 6
        ['name' => 'English', 'course_code' => 'UG234914', 'semester' => 6, 'credit' => 2],
        ['name' => 'Technopreneurship', 'course_code' => 'UG234915', 'semester' => 6, 'credit' => 2],
        ['name' => 'Religion', 'course_code' => 'UG23490X', 'semester' => 6, 'credit' => 2],
        ['name' => 'Civics', 'course_code' => 'UG234913', 'semester' => 6, 'credit' => 2],
        ['name' => 'Mobile Programming', 'course_code' => 'EF234601', 'semester' => 6, 'credit' => 3],
        ['name' => 'Human and Computer Interaction', 'course_code' => 'EF234602', 'semester' => 6, 'credit' => 3],
        ['name' => 'Capstone Project', 'course_code' => 'EF234622', 'semester' => 6, 'credit' => 3],
        ['name' => 'Practical Work', 'course_code' => 'EF234603', 'semester' => 6, 'credit' => 4],
        
        // Semester 7
        ['name' => 'Indonesian', 'course_code' => 'UG234912', 'semester' => 7, 'credit' => 2],
        ['name' => 'Pancasila', 'course_code' => 'UG234911', 'semester' => 7, 'credit' => 2],
        ['name' => 'Applied Technology and Digital Transformation', 'course_code' => 'UG234916', 'semester' => 7, 'credit' => 3],
        ['name' => 'Professional Ethics', 'course_code' => 'EF234701', 'semester' => 7, 'credit' => 2],
        ['name' => 'Undergraduate Pre-Thesis', 'course_code' => 'EF234702', 'semester' => 7, 'credit' => 2],
        
        // Semester 8
        ['name' => 'Final Project', 'course_code' => 'EF234801', 'semester' => 8, 'credit' => 5],

        // Elective Courses
        ['name' => 'Inter-Network Technology', 'course_code' => 'EF234506', 'credit' => 3],
        ['name' => 'Wireless Network', 'course_code' => 'EF234507', 'credit' => 3],
        ['name' => 'Distributed System', 'course_code' => 'EF234508', 'credit' => 3],
        ['name' => 'Competitive Programming', 'course_code' => 'EF234509', 'credit' => 3],
        ['name' => 'Operations Research', 'course_code' => 'EF234510', 'credit' => 3],
        ['name' => 'Game Development Techniques', 'course_code' => 'EF234511', 'credit' => 3],
        ['name' => 'Enterprise Systems', 'course_code' => 'EF234513', 'credit' => 3],
        ['name' => 'Information Technology Governance', 'course_code' => 'EF234514', 'credit' => 3],
        ['name' => 'Software Project Management', 'course_code' => 'ER234504', 'credit' => 3],
        ['name' => 'Requirements Engineering', 'course_code' => 'ER234201', 'credit' => 3],
        ['name' => 'Image Processing and Computer Vision', 'course_code' => 'EF234517', 'credit' => 3],
        ['name' => 'Data Mining', 'course_code' => 'EF234518', 'credit' => 3],
        ['name' => 'Mobile Computing', 'course_code' => 'EF234604', 'credit' => 3],
        ['name' => 'Pervasive Computing and Sensor Networks', 'course_code' => 'EF234605', 'credit' => 3],
        ['name' => 'Network Security', 'course_code' => 'EF234606', 'credit' => 3],
        ['name' => 'Application Security', 'course_code' => 'EF234607', 'credit' => 3],
        ['name' => 'Interface Based Programming', 'course_code' => 'EF234608', 'credit' => 3],
        ['name' => 'Dynamic Systems Simulation', 'course_code' => 'EF234609', 'credit' => 3],
        ['name' => 'Agent Based Simulation', 'course_code' => 'EF234610', 'credit' => 3],
        ['name' => 'Forecasting Techniques', 'course_code' => 'EF234611', 'credit' => 3],
        ['name' => 'Computer Animation and 3D Modeling', 'course_code' => 'EF234612', 'credit' => 3],
        ['name' => 'Educational and Simulation Games', 'course_code' => 'EF234613', 'credit' => 3],
        ['name' => 'User Experience Design', 'course_code' => 'EF234614', 'credit' => 3],
        ['name' => 'System Audit', 'course_code' => 'EF234615', 'credit' => 3],
        ['name' => 'Distributed Database', 'course_code' => 'EF234616', 'credit' => 3],
        ['name' => 'Geographic Information Systems', 'course_code' => 'EF234617', 'credit' => 3],
        ['name' => 'Software Quality', 'course_code' => 'ER234503', 'credit' => 3],
        ['name' => 'Software Construction', 'course_code' => 'ER234402', 'credit' => 3],
        ['name' => 'Text Mining', 'course_code' => 'EK234501', 'credit' => 3],
        ['name' => 'Deep Learning', 'course_code' => 'EF234619', 'credit' => 3],
        ['name' => 'Game Engine', 'course_code' => 'EF234618', 'credit' => 3],
        ['name' => 'IoT Technology', 'course_code' => 'EF234703', 'credit' => 3],
        ['name' => 'Cloud Computing', 'course_code' => 'EF234704', 'credit' => 3],
        ['name' => 'Digital Forensics', 'course_code' => 'EF234705', 'credit' => 3],
        ['name' => 'Signal Processing Programming', 'course_code' => 'EF234706', 'credit' => 3],
        ['name' => 'Applied Science Data Programming', 'course_code' => 'EF234707', 'credit' => 3],
        ['name' => 'Multivariate Data Analysis', 'course_code' => 'EF234708', 'credit' => 3],
        ['name' => 'Object Oriented Simulation', 'course_code' => 'EF234709', 'credit' => 3],
        ['name' => 'Intelligence Game', 'course_code' => 'EF234710', 'credit' => 3],
        ['name' => 'Extended Reality', 'course_code' => 'EF234711', 'credit' => 3],
        ['name' => 'Big Data', 'course_code' => 'EF234712', 'credit' => 3],
        ['name' => 'Quantum Computing', 'course_code' => 'EF234713', 'credit' => 3],
        ['name' => 'Software Architecture', 'course_code' => 'ER234403', 'credit' => 3],
        ['name' => 'Software Evolution', 'course_code' => 'ER234505', 'credit' => 3],
        ['name' => 'Robotics', 'course_code' => 'EK234601', 'credit' => 3],
        ['name' => 'Special Topics in Algorithms and Programming', 'course_code' => 'EF234714', 'credit' => 3],
        ['name' => 'Special Topics in Computer Architecture and Networks', 'course_code' => 'EF234715', 'credit' => 3],
        ['name' => 'Special Topics in Graphics, Interaction and Games', 'course_code' => 'EF234716', 'credit' => 3],
        ['name' => 'Special Topics in Network-Based Computing', 'course_code' => 'EF234717', 'credit' => 3],
        ['name' => 'Special Topics in Intelligent Computing and Vision', 'course_code' => 'EF234718', 'credit' => 3],
        ['name' => 'Special Topics in Intelligent Information Management', 'course_code' => 'EF234719', 'credit' => 3],
        ['name' => 'Special Topics in Modelling and Applied Computing', 'course_code' => 'EF234720', 'credit' => 3],
        ['name' => 'Special Topics in Software Engineering', 'course_code' => 'EF234721', 'credit' => 3],
        ['name' => 'Internship', 'course_code' => 'EF234722', 'credit' => 6],
   ];   

        foreach ($courses_data as $course) {
            $course['semester'] ?? $course['semester'] = 0; 
            Course::create($course);
        }
    }
}
