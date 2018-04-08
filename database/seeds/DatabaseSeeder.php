<?php

use Illuminate\Database\Seeder;
use App\User;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      DB::unprepared(file_get_contents('database/seeds/faculties.sql'));
        // $this->call(UsersTableSeeder::class);
        User::create([
          'name' => 'prasan Harnjit',
          'email' => 'oatprasan@gmail.com',
          'password' => bcrypt('123456'),
          'user_type' => 'admin',
          'image' => 'images/admin-default.svg',
      ]);
        DB::table('student')->insert([
          'STUDENTCODE' => '5730406754',
          'NATIONALID' => '1369900372277',
          'PREFIXNAME' => 'นาย',
          'PREFIXNAMEENG' => 'Mr.',
          'STUDENTNAME' => 'ประสาน หาญจิต',
          'STUDENTNAMEENG' => 'Prasan Harnjit',
          'FACULTYNAME' => 'คณะวิศวกรรมศาสตร์',
          'FACULTYNAMEENG' => 'Engineering',
          'PROGRAMNAME' => 'วิศวกรมคอมพิวเตอร์',
          'PROGRAMNAMEENG' => 'Computer Engineering',
          'DEGREE' => 'ปริญญาตรี',
          'DEGREEENG' => "Bachelor's Degree",
          'STUDENTSTATUS' => 'graduated',
          'STUDENTYEAR' => '4',
          'GPA' => '2.68',
          'STARTDATE' => '2014/01/01',
          'DATEOFGRADUATED' => '2018/01/01',
          'DATEOFBIRTH' => '1996/06/29'
        ]);
        DB::table('study_result')->insert([
            'STUDENTCODE' => '5730406754',
            'COURSENO' => '000101',
            'COURSENAME' =>'ภาษาอังกฤษเพื่อการสื่อสาร',
            'COURSENAMEENG' => 'ENGLISH FOR COMMUNICATION',
            'GRADE' => 'F',
            'GRADENUM' => 0,
            'ACADEMICYEAR' => '2014',
            'TERM' => '1',
            'CREDITS' => 3,
        ]);
        DB::table('study_result')->insert([
            'STUDENTCODE' => '5730406754',
            'COURSENO' => '000168',
            'COURSENAME' =>'การคิดเชิงวิพากษ์และการแก้ปัญหา',
            'COURSENAMEENG' => 'CRITICAL THINKING AND PROBLEM SOLVING',
            'GRADE' => 'B',
            'GRADENUM' => 3,
            'ACADEMICYEAR' => '2014',
            'TERM' => '1',
            'CREDITS' => 3,
        ]);
        DB::table('study_result')->insert([
            'STUDENTCODE' => '5730406754',
            'COURSENO' => '190110',
            'COURSENAME' =>'การพัฒนาทักษะการเรียนรู้',
            'COURSENAMEENG' => 'LEARNING SKILL DEVELOPMENT',
            'GRADE' => 'B+',
            'GRADENUM' => 3.5,
            'ACADEMICYEAR' => '2014',
            'TERM' => '1',
            'CREDITS' => 2,
        ]);
        DB::table('study_result')->insert([
            'STUDENTCODE' => '5730406754',
            'COURSENO' => '194100',
            'COURSENAME' =>'การฝึกปฎิบัติการในโรงงานวิศวกรรม',
            'COURSENAMEENG' => 'ENGINEERING WORKSHOP PRACTICE',
            'GRADE' => 'B+',
            'GRADENUM' => 3.5,
            'ACADEMICYEAR' => '2014',
            'TERM' => '1',
            'CREDITS' => 2,
        ]);
        DB::table('study_result')->insert([
            'STUDENTCODE' => '5730406754',
            'COURSENO' => '198110',
            'COURSENAME' =>'การเขียนโปรแกรมคอมพิวเตอร์',
            'COURSENAMEENG' => 'COMPUTER PROGRAMMING',
            'GRADE' => 'A',
            'GRADENUM' => 4,
            'ACADEMICYEAR' => '2014',
            'TERM' => '1',
            'CREDITS' => 3,
        ]);
        DB::table('study_result')->insert([
            'STUDENTCODE' => '5730406754',
            'COURSENO' => '314126',
            'COURSENAME' =>'แคลคูลัสสำหรับวิศวกรรมศาสตร์ 1',
            'COURSENAMEENG' => 'CALCULUS FOR ENGINEERING I',
            'GRADE' => 'C',
            'GRADENUM' => 2,
            'ACADEMICYEAR' => '2014',
            'TERM' => '1',
            'CREDITS' => 3,
        ]);
        DB::table('study_result')->insert([
            'STUDENTCODE' => '5730406754',
            'COURSENO' => '315111',
            'COURSENAME' =>'ฟิสิกส์มูลฐาน 1',
            'COURSENAMEENG' => 'FUNDAMENTALS OF PHYSICS I',
            'GRADE' => 'C+',
            'GRADENUM' => 2.5,
            'ACADEMICYEAR' => '2014',
            'TERM' => '1',
            'CREDITS' => 3,
        ]);
        DB::table('study_result')->insert([
            'STUDENTCODE' => '5730406754',
            'COURSENO' => '315181',
            'COURSENAME' =>'ปฎิบัติการฟิสิกส์ทั่วไป 1',
            'COURSENAMEENG' => '	GENERAL PHYSICS LABORATORY I',
            'GRADE' => 'C',
            'GRADENUM' => 2,
            'ACADEMICYEAR' => '2014',
            'TERM' => '1',
            'CREDITS' => 1,
        ]);
        DB::table('study_result')->insert([
            'STUDENTCODE' => '5730406754',
            'COURSENO' => '000101',
            'COURSENAME' =>'ภาษาอังกฤษเพื่อการสื่อสาร',
            'COURSENAMEENG' => 'ENGLISH FOR COMMUNICATION',
            'GRADE' => 'C+',
            'GRADENUM' => 2.5,
            'ACADEMICYEAR' => '2014',
            'TERM' => '2',
            'CREDITS' => 3,
        ]);
        DB::table('study_result')->insert([
            'STUDENTCODE' => '5730406754',
            'COURSENO' => '000155',
            'COURSENAME' =>'พันธะทางสังคมของพลเมือง',
            'COURSENAMEENG' => 'CIVIC SOCIAL ENGAGEMENT',
            'GRADE' => 'B+',
            'GRADENUM' => 3.5,
            'ACADEMICYEAR' => '2014',
            'TERM' => '2',
            'CREDITS' => 3,
        ]);
        DB::table('study_result')->insert([
            'STUDENTCODE' => '5730406754',
            'COURSENO' => '195111',
            'COURSENAME' =>'การสื่อสารด้วยแบบ',
            'COURSENAMEENG' => 'DRAWING COMMUNICATION',
            'GRADE' => 'A',
            'GRADENUM' => 4,
            'ACADEMICYEAR' => '2014',
            'TERM' => '2',
            'CREDITS' => 3,
        ]);
        DB::table('study_result')->insert([
            'STUDENTCODE' => '5730406754',
            'COURSENO' => '198130',
            'COURSENAME' =>'การเขียนโปรแกรมคอมพิวเตอร์ขั้นสูง',
            'COURSENAMEENG' => 'ADVANCED COMPUTER PROGRAMMING',
            'GRADE' => 'C+',
            'GRADENUM' => 2.5,
            'ACADEMICYEAR' => '2014',
            'TERM' => '2',
            'CREDITS' => 3,
        ]);
        DB::table('study_result')->insert([
            'STUDENTCODE' => '5730406754',
            'COURSENO' => '198131',
            'COURSENAME' =>'ปฎิบัติการการเขียนโปรแกรมคอมพิวเตอร์ขั้นสูง',
            'COURSENAMEENG' => 'ADVANCED COMPUTER PROGRAMMING LABORATORY',
            'GRADE' => 'B',
            'GRADENUM' => 3,
            'ACADEMICYEAR' => '2014',
            'TERM' => '2',
            'CREDITS' => 1,
        ]);
        DB::table('study_result')->insert([
            'STUDENTCODE' => '5730406754',
            'COURSENO' => '314127',
            'COURSENAME' =>'แคลคูลัสสำหรับวิศวกรรมศาสตร์ 2',
            'COURSENAMEENG' => 'CALCULUS FOR ENGINEERING II',
            'GRADE' => 'F',
            'GRADENUM' => 0,
            'ACADEMICYEAR' => '2014',
            'TERM' => '2',
            'CREDITS' => 3,
        ]);
        DB::table('study_result')->insert([
            'STUDENTCODE' => '5730406754',
            'COURSENO' => '315112',
            'COURSENAME' =>'ฟิสิกส์มูลฐาน 2',
            'COURSENAMEENG' => 'FUNDAMENTALS OF PHYSICS II',
            'GRADE' => 'C',
            'GRADENUM' => 2,
            'ACADEMICYEAR' => '2014',
            'TERM' => '2',
            'CREDITS' => 3,
        ]);
        DB::table('study_result')->insert([
            'STUDENTCODE' => '5730406754',
            'COURSENO' => '315182',
            'COURSENAME' =>'ปฎิบัติปฎิบัติการฟิสิกส์ทั่วไป 2',
            'COURSENAMEENG' => 'GENERAL PHYSICS LABORATORY II',
            'GRADE' => 'D+',
            'GRADENUM' => 0,
            'ACADEMICYEAR' => '2014',
            'TERM' => '2',
            'CREDITS' => 1,
        ]);
        DB::table('study_result')->insert([
            'STUDENTCODE' => '5730406754',
            'COURSENO' => '000102',
            'COURSENAME' =>'ภาษาอังกฤษทางวิชาการ 1',
            'COURSENAMEENG' => 'ENGLISH FOR ACADEMIC PURPOSE I (EAP I)',
            'GRADE' => 'C',
            'GRADENUM' => 2,
            'ACADEMICYEAR' => '2014',
            'TERM' => '3',
            'CREDITS' => 3,
        ]);
        DB::table('study_result')->insert([
            'STUDENTCODE' => '5730406754',
            'COURSENO' => '314127',
            'COURSENAME' =>'แคลคูลัสสำหรับวิศวกรรมศาสตร์ 2',
            'COURSENAMEENG' => '	CALCULUS FOR ENGINEERING II',
            'GRADE' => 'B+',
            'GRADENUM' => 3.5,
            'ACADEMICYEAR' => '2014',
            'TERM' => '3',
            'CREDITS' => 3,
        ]);
        DB::table('study_result')->insert([
            'STUDENTCODE' => '5730406754',
            'COURSENO' => '000103',
            'COURSENAME' =>'ภาษาอังกฤษทางวิชาการ 2',
            'COURSENAMEENG' => 'ENGLISH FOR ACADEMIC PURPOSES II (EAP II)',
            'GRADE' => 'D+',
            'GRADENUM' => 1.5,
            'ACADEMICYEAR' => '2015',
            'TERM' => '1',
            'CREDITS' => 3,
        ]);
        DB::table('study_result')->insert([
            'STUDENTCODE' => '5730406754',
            'COURSENO' => '000156',
            'COURSENAME' =>'พหุวัฒนธรรม',
            'COURSENAMEENG' => 'MULTICULTURALISM',
            'GRADE' => 'C+',
            'GRADENUM' => 2.5,
            'ACADEMICYEAR' => '2015',
            'TERM' => '1',
            'CREDITS' => 3,
        ]);
        DB::table('study_result')->insert([
            'STUDENTCODE' => '5730406754',
            'COURSENO' => '198200',
            'COURSENAME' =>'วิยุตคณิตและพีชคณิตเชิงเส้น',
            'COURSENAMEENG' => 'DISCRETE MATHEMATICS AND LINEAR ALGEBRA',
            'GRADE' => 'C+',
            'GRADENUM' => 2.5,
            'ACADEMICYEAR' => '2015',
            'TERM' => '1',
            'CREDITS' => 3,
        ]);
        DB::table('study_result')->insert([
            'STUDENTCODE' => '5730406754',
            'COURSENO' => '198210',
            'COURSENAME' =>'การวิเคราะห์วงจรเชิงเส้น',
            'COURSENAMEENG' => 'LINEAR CIRCUIT ANALYSIS',
            'GRADE' => 'D+',
            'GRADENUM' => 1.5,
            'ACADEMICYEAR' => '2015',
            'TERM' => '1',
            'CREDITS' => 3,
        ]);
        DB::table('study_result')->insert([
            'STUDENTCODE' => '5730406754',
            'COURSENO' => '198232',
            'COURSENAME' =>'โครงสร้างข้อมูลและขั้นตอนวิธี',
            'COURSENAMEENG' => '	DATA STRUCTURES AND ALGORITHMS',
            'GRADE' => 'C+',
            'GRADENUM' => 2.5,
            'ACADEMICYEAR' => '2015',
            'TERM' => '1',
            'CREDITS' => 3,
        ]);
        DB::table('study_result')->insert([
            'STUDENTCODE' => '5730406754',
            'COURSENO' => '198290',
            'COURSENAME' =>'การฝึกปฎิบัตงานวิศวกรรมคอมพิวเตอร์',
            'COURSENAMEENG' => 'COMPUTER ENGINEERING WORKSHOP PRACTICE',
            'GRADE' => 'C+',
            'GRADENUM' => 2.5,
            'ACADEMICYEAR' => '2015',
            'TERM' => '1',
            'CREDITS' => 1,
        ]);
        DB::table('study_result')->insert([
            'STUDENTCODE' => '5730406754',
            'COURSENO' => '314232',
            'COURSENAME' =>'สมการเชชิงอนุพันธ์สำหรับวิศวกรรมศาสตร์',
            'COURSENAMEENG' => 'DIFFERENTIAL EQUATION FOR ENGINEERS',
            'GRADE' => 'C+',
            'GRADENUM' => 2.5,
            'ACADEMICYEAR' => '2015',
            'TERM' => '1',
            'CREDITS' => 3,
        ]);
        DB::table('study_result')->insert([
            'STUDENTCODE' => '5730406754',
            'COURSENO' => '000145',
            'COURSENAME' =>'ภาวะผู้นำและการจัดการ',
            'COURSENAMEENG' => 'LEADERSHIP AND MANAGEMENT',
            'GRADE' => 'B+',
            'GRADENUM' => 3.5,
            'ACADEMICYEAR' => '2015',
            'TERM' => '2',
            'CREDITS' => 3,
        ]);
        DB::table('study_result')->insert([
            'STUDENTCODE' => '5730406754',
            'COURSENO' => '050109',
            'COURSENAME' =>'ภาษาอังกฤษสำหรับการสื่อสารในวิชาชีพ',
            'COURSENAMEENG' => 'ENGLISH FOR PROFESSIONAL COMMUNICATIONS',
            'GRADE' => 'D',
            'GRADENUM' => 1,
            'ACADEMICYEAR' => '2015',
            'TERM' => '2',
            'CREDITS' => 3,
        ]);
        DB::table('study_result')->insert([
            'STUDENTCODE' => '5730406754',
            'COURSENO' => '198213',
            'COURSENAME' =>'แอนะล็อกอิเล็กทรอนิกส์',
            'COURSENAMEENG' => 'ANALOG ELECTRONICS',
            'GRADE' => 'D+',
            'GRADENUM' => 1.5,
            'ACADEMICYEAR' => '2015',
            'TERM' => '2',
            'CREDITS' => 3,
        ]);
        DB::table('study_result')->insert([
            'STUDENTCODE' => '5730406754',
            'COURSENO' => '198214',
            'COURSENAME' =>'ปฎิบัติการแอนะล็อกอิเล็กทรอนิกส์',
            'COURSENAMEENG' => 'ANALOG ELECTRONICS LABORATORY',
            'GRADE' => 'A',
            'GRADENUM' => 4,
            'ACADEMICYEAR' => '2015',
            'TERM' => '2',
            'CREDITS' => 1,
        ]);
        DB::table('study_result')->insert([
            'STUDENTCODE' => '5730406754',
            'COURSENO' => '198215',
            'COURSENAME' =>'วงจร สัญญาณ และระบบ',
            'COURSENAMEENG' => '	CIRCUITS SIGNAL AND SYSTEMS',
            'GRADE' => 'B',
            'GRADENUM' => 3,
            'ACADEMICYEAR' => '2015',
            'TERM' => '2',
            'CREDITS' => 3,
        ]);
        DB::table('study_result')->insert([
            'STUDENTCODE' => '5730406754',
            'COURSENO' => '198220',
            'COURSENAME' =>'การออกแบบเชิงตรรกะดิจิทัล',
            'COURSENAMEENG' => 'DIGITAL LOGIC DESIGN',
            'GRADE' => 'D+',
            'GRADENUM' => 1.5,
            'ACADEMICYEAR' => '2015',
            'TERM' => '2',
            'CREDITS' => 3,
        ]);
        DB::table('study_result')->insert([
            'STUDENTCODE' => '5730406754',
            'COURSENO' => '198221',
            'COURSENAME' =>'ปฎิบัติการการออกแบบเชิงตรรกะดิจิทัล',
            'COURSENAMEENG' => 'DIGITAL LOGIC DESIGN LABORATORY',
            'GRADE' => 'D+',
            'GRADENUM' => 1.5,
            'ACADEMICYEAR' => '2015',
            'TERM' => '2',
            'CREDITS' => 1,
        ]);
        DB::table('study_result')->insert([
            'STUDENTCODE' => '5730406754',
            'COURSENO' => '314226',
            'COURSENAME' =>'แคลคูลัสสำหรับวิศวกรรมศาสตร์ 3',
            'COURSENAMEENG' => '	CALCULUS FOR ENGINEERING III',
            'GRADE' => 'C',
            'GRADENUM' => 2,
            'ACADEMICYEAR' => '2015',
            'TERM' => '2',
            'CREDITS' => 3,
        ]);
        DB::table('study_result')->insert([
            'STUDENTCODE' => '5730406754',
            'COURSENO' => '242103',
            'COURSENAME' =>'กิจกรรมพลศึกษา(แบตมินตัน)',
            'COURSENAMEENG' => 'PHYSICAL EDUCATION ACTIVITIES (BADMINTON)',
            'GRADE' => 'A',
            'GRADENUM' => 4,
            'ACADEMICYEAR' => '2015',
            'TERM' => '3',
            'CREDITS' => 1,
        ]);
        DB::table('study_result')->insert([
            'STUDENTCODE' => '5730406754',
            'COURSENO' => '242121',
            'COURSENAME' =>'กิจกรรมพลศึกษา(เทเบิลเทนนิส)',
            'COURSENAMEENG' => 'PHYSICAL EDUCATION ACTIVITIES (TABLE TENNIS)',
            'GRADE' => 'A',
            'GRADENUM' => 4,
            'ACADEMICYEAR' => '2015',
            'TERM' => '3',
            'CREDITS' => 1,
        ]);
        DB::table('study_result')->insert([
            'STUDENTCODE' => '5730406754',
            'COURSENO' => '861102',
            'COURSENAME' =>'การปฎิบัติและวิเคราะ์ดนตรีไทย',
            'COURSENAMEENG' => 'PRACTICING AND ANALYZING THAI MUSIC',
            'GRADE' => 'A',
            'GRADENUM' => 4,
            'ACADEMICYEAR' => '2015',
            'TERM' => '3',
            'CREDITS' => 2,
        ]);
        DB::table('study_result')->insert([
            'STUDENTCODE' => '5730406754',
            'COURSENO' => '863102',
            'COURSENAME' =>'ดนตรีพื้นเมืองขั้นพื้นฐาน',
            'COURSENAMEENG' => 'BASIC OF FOLK MUSIC',
            'GRADE' => 'A',
            'GRADENUM' => 4,
            'ACADEMICYEAR' => '2015',
            'TERM' => '3',
            'CREDITS' => 2,
        ]);
        DB::table('study_result')->insert([
            'STUDENTCODE' => '5730406754',
            'COURSENO' => '198300',
            'COURSENAME' =>'ความน่าจเป็นประยุกต์และสถิติ',
            'COURSENAMEENG' => 'APPLIED PROBABILITY AND STATISTICS',
            'GRADE' => 'B',
            'GRADENUM' => 3,
            'ACADEMICYEAR' => '2016',
            'TERM' => '1',
            'CREDITS' => 3,
        ]);
        DB::table('study_result')->insert([
            'STUDENTCODE' => '5730406754',
            'COURSENO' => '198301',
            'COURSENAME' =>'ทฤษฏีการคำนวณ',
            'COURSENAMEENG' => '	THEORY OF COMPUTATION',
            'GRADE' => 'A',
            'GRADENUM' => 4,
            'ACADEMICYEAR' => '2016',
            'TERM' => '1',
            'CREDITS' => 3,
        ]);
        DB::table('study_result')->insert([
            'STUDENTCODE' => '5730406754',
            'COURSENO' => '198323',
            'COURSENAME' =>'การออกแบบดิจิทัลประยุกต์',
            'COURSENAMEENG' => 'APPLIED DIGITAL DESIGN',
            'GRADE' => 'C',
            'GRADENUM' => 2,
            'ACADEMICYEAR' => '2016',
            'TERM' => '1',
            'CREDITS' => 3,
        ]);
        DB::table('study_result')->insert([
            'STUDENTCODE' => '5730406754',
            'COURSENO' => '198324',
            'COURSENAME' =>'ปฎิบัติการการออกแบบดิจิทัลประยุกต์',
            'COURSENAMEENG' => 'APPLIED DIGITAL DESIGN LABORATORY',
            'GRADE' => 'B+',
            'GRADENUM' => 3.5,
            'ACADEMICYEAR' => '2016',
            'TERM' => '1',
            'CREDITS' => 1,
        ]);
        DB::table('study_result')->insert([
            'STUDENTCODE' => '5730406754',
            'COURSENO' => '198330',
            'COURSENAME' =>'ระบบฐานข้อมูล',
            'COURSENAMEENG' => 'DATABASE SYSTEMS',
            'GRADE' => 'B',
            'GRADENUM' => 3,
            'ACADEMICYEAR' => '2016',
            'TERM' => '1',
            'CREDITS' => 3,
        ]);
        DB::table('study_result')->insert([
            'STUDENTCODE' => '5730406754',
            'COURSENO' => '198340',
            'COURSENAME' =>'เครือข่ายคอมพิวเตอร์',
            'COURSENAMEENG' => 'COMPUTER NETWORKS',
            'GRADE' => 'B',
            'GRADENUM' => 3,
            'ACADEMICYEAR' => '2016',
            'TERM' => '1',
            'CREDITS' => 3,
        ]);
        DB::table('study_result')->insert([
            'STUDENTCODE' => '5730406754',
            'COURSENO' => '198341',
            'COURSENAME' =>'ปฎิบัติการเครือข่ายคอมพิวเตอร์',
            'COURSENAMEENG' => 'COMPUTER NETWORKS LABORATORY',
            'GRADE' => 'C+',
            'GRADENUM' => 2.5,
            'ACADEMICYEAR' => '2016',
            'TERM' => '1',
            'CREDITS' => 1,
        ]);
        DB::table('study_result')->insert([
            'STUDENTCODE' => '5730406754',
            'COURSENO' => '198371',
            'COURSENAME' =>'เอกซ์เอ็มแอลและเวฺ็บเซอร์วิส',
            'COURSENAMEENG' => 'XML AND WEB SERVICES',
            'GRADE' => 'C+',
            'GRADENUM' => 0,
            'ACADEMICYEAR' => '2016',
            'TERM' => '1',
            'CREDITS' => 3,
        ]);
        DB::table('study_result')->insert([
            'STUDENTCODE' => '5730406754',
            'COURSENO' => '198320',
            'COURSENAME' =>'ไมโครโปรเซสเซอร์และการต่อประสาน',
            'COURSENAMEENG' => 'MICROPROCESSORS AND INTERFACING',
            'GRADE' => 'B',
            'GRADENUM' => 3,
            'ACADEMICYEAR' => '2016',
            'TERM' => '2',
            'CREDITS' => 3,
        ]);
        DB::table('study_result')->insert([
            'STUDENTCODE' => '5730406754',
            'COURSENO' => '198321',
            'COURSENAME' =>'ปฎิบัติการไมโครโปรเซสเซอร์และการต่อประสาน',
            'COURSENAMEENG' => 'MICROPROCESSORS AND INTERFACING LABORATORY',
            'GRADE' => 'A',
            'GRADENUM' => 4,
            'ACADEMICYEAR' => '2016',
            'TERM' => '2',
            'CREDITS' => 1,
        ]);
        DB::table('study_result')->insert([
            'STUDENTCODE' => '5730406754',
            'COURSENO' => '198322',
            'COURSENAME' =>'สถาปัตยกรรมคอมพิวเตอร์',
            'COURSENAMEENG' => 'COMPUTER ARCHITECTURE',
            'GRADE' => 'B',
            'GRADENUM' => 3,
            'ACADEMICYEAR' => '2016',
            'TERM' => '2',
            'CREDITS' => 3,
        ]);
        DB::table('study_result')->insert([
            'STUDENTCODE' => '5730406754',
            'COURSENO' => '198331',
            'COURSENAME' =>'ระบบปฎิบัติการ',
            'COURSENAMEENG' => 'OPERATING SYSTEMS',
            'GRADE' => 'B+',
            'GRADENUM' => 3.5,
            'ACADEMICYEAR' => '2016',
            'TERM' => '2',
            'CREDITS' => 3,
        ]);
        DB::table('study_result')->insert([
            'STUDENTCODE' => '5730406754',
            'COURSENO' => '198332',
            'COURSENAME' =>'วิศวกรรมซอฟแวร์',
            'COURSENAMEENG' => 'SOFTWARE ENGINEERING',
            'GRADE' => 'C',
            'GRADENUM' => 2,
            'ACADEMICYEAR' => '2016',
            'TERM' => '2',
            'CREDITS' => 3,
        ]);
        DB::table('study_result')->insert([
            'STUDENTCODE' => '5730406754',
            'COURSENO' => '198342',
            'COURSENAME' =>'หลักการสื่อสารแบบดิจิทัล',
            'COURSENAMEENG' => 'PRINCIPLES OF DIGITAL COMMUNICATIONS',
            'GRADE' => 'C',
            'GRADENUM' => 2,
            'ACADEMICYEAR' => '2016',
            'TERM' => '2',
            'CREDITS' => 3,
        ]);
        DB::table('study_result')->insert([
            'STUDENTCODE' => '5730406754',
            'COURSENO' => '198343',
            'COURSENAME' =>'ปฎิบัติการหลักการสื่อสารแบบดิจิทัล',
            'COURSENAMEENG' => 'PRINCIPLES OF DIGITAL COMMUNICATIONS LABORATORY',
            'GRADE' => 'B',
            'GRADENUM' => 3,
            'ACADEMICYEAR' => '2016',
            'TERM' => '2',
            'CREDITS' => 1,
        ]);
        DB::table('study_result')->insert([
            'STUDENTCODE' => '5730406754',
            'COURSENO' => '198390',
            'COURSENAME' =>'การสัมนาทางวิศวกรรมคอมพิวเตอร์',
            'COURSENAMEENG' => 'SEMINAR IN COMPUTER ENGINEERING',
            'GRADE' => 'A',
            'GRADENUM' => 4,
            'ACADEMICYEAR' => '2016',
            'TERM' => '2',
            'CREDITS' => 1,
        ]);
        DB::table('study_result')->insert([
            'STUDENTCODE' => '5730406754',
            'COURSENO' => '198399',
            'COURSENAME' =>'การฝึกงาน',
            'COURSENAMEENG' => 'PRACTICAL TRAINING',
            'GRADE' => 'S',
            'GRADENUM' => 0,
            'ACADEMICYEAR' => '2016',
            'TERM' => '3',
            'CREDITS' => 0,
        ]);
        DB::table('study_result')->insert([
            'STUDENTCODE' => '5730406754',
            'COURSENO' => '190410',
            'COURSENAME' =>'การเตรียมความพร้อมในการทำงานและการพัฒนาตนเองอย่างต่อเนื่อง',
            'COURSENAMEENG' => 'WORK PREPARATION AND CONTINUING SELF-DEVELOPMENT',
            'GRADE' => 'A',
            'GRADENUM' => 4,
            'ACADEMICYEAR' => '2017',
            'TERM' => '1',
            'CREDITS' => 1,
        ]);
        DB::table('study_result')->insert([
            'STUDENTCODE' => '5730406754',
            'COURSENO' => '198420',
            'COURSENAME' =>'ระบบฝังตัว',
            'COURSENAMEENG' => 'EMBEDDED SYSTEMS',
            'GRADE' => 'B+',
            'GRADENUM' => 3.5,
            'ACADEMICYEAR' => '2017',
            'TERM' => '1',
            'CREDITS' => 3,
        ]);
        DB::table('study_result')->insert([
            'STUDENTCODE' => '5730406754',
            'COURSENO' => '198430',
            'COURSENAME' =>'วิศวกรรมระบบคอมพิงเตอร์',
            'COURSENAMEENG' => 'COMPUTER SYSTEMS ENGINEERING',
            'GRADE' => 'B',
            'GRADENUM' => 3,
            'ACADEMICYEAR' => '2017',
            'TERM' => '1',
            'CREDITS' => 3,
        ]);
        DB::table('study_result')->insert([
            'STUDENTCODE' => '5730406754',
            'COURSENO' => '198452',
            'COURSENAME' =>'การประมวลผลภาพเชิงดิจิทัล',
            'COURSENAMEENG' => 'DIGITAL IMAGE PROCESSING',
            'GRADE' => 'A',
            'GRADENUM' => 4,
            'ACADEMICYEAR' => '2017',
            'TERM' => '1',
            'CREDITS' => 3,
        ]);
        DB::table('study_result')->insert([
            'STUDENTCODE' => '5730406754',
            'COURSENO' => '198454',
            'COURSENAME' =>'วิทยาการรหัสลับ',
            'COURSENAMEENG' => 'CRYPTOGRAPHY',
            'GRADE' => 'B+',
            'GRADENUM' => 3.5,
            'ACADEMICYEAR' => '2017',
            'TERM' => '1',
            'CREDITS' => 3,
        ]);
        DB::table('study_result')->insert([
            'STUDENTCODE' => '5730406754',
            'COURSENO' => '198474',
            'COURSENAME' =>'การทำเหมืองข้อมูลและการค้นหาความรู้',
            'COURSENAMEENG' => 'DATA MINING AND KNOWLEDGE DISCOVERY',
            'GRADE' => 'B',
            'GRADENUM' => 3,
            'ACADEMICYEAR' => '2017',
            'TERM' => '1',
            'CREDITS' => 3,
        ]);
        DB::table('study_result')->insert([
            'STUDENTCODE' => '5730406754',
            'COURSENO' => '198481',
            'COURSENAME' =>'ความมั่นคงของคอมพิวเตอร์',
            'COURSENAMEENG' => 'COMPUTER SECURITY',
            'GRADE' => 'B',
            'GRADENUM' => 3,
            'ACADEMICYEAR' => '2017',
            'TERM' => '1',
            'CREDITS' => 3,
        ]);
        DB::table('study_result')->insert([
            'STUDENTCODE' => '5730406754',
            'COURSENO' => '198498',
            'COURSENAME' =>'การเตรียมโครงการวิศวกรรมคอมพิวเตอร์',
            'COURSENAMEENG' => 'COMPUTER ENGINEERING PRE-PROJECT',
            'GRADE' => 'B',
            'GRADENUM' => 3,
            'ACADEMICYEAR' => '2017',
            'TERM' => '1',
            'CREDITS' => 3,
        ]);
        DB::table('study_result')->insert([
            'STUDENTCODE' => '5730406754',
            'COURSENO' => '198473',
            'COURSENAME' =>'ปฏิสัมพันธ์ระหว่างมนุษย์และคอมพิวเตอร์',
            'COURSENAMEENG' => 'HUMAN-COMPUTER INTERACTION',
            'GRADE' => 'A',
            'GRADENUM' => 4,
            'ACADEMICYEAR' => '2017',
            'TERM' => '2',
            'CREDITS' => 3,
        ]);
        DB::table('study_result')->insert([
            'STUDENTCODE' => '5730406754',
            'COURSENO' => '198499',
            'COURSENAME' =>'โครงการวิศวกรรมคอมพิวเตอร์',
            'COURSENAMEENG' => 'COMPUTER ENGINEERING PROJECT',
            'GRADE' => 'A',
            'GRADENUM' => 4,
            'ACADEMICYEAR' => '2017',
            'TERM' => '2',
            'CREDITS' => 2,
        ]);
        DB::table('document')->insert([
            'REFCODE' => '610220549997',
            'STUDENTCODE' => '5730406754',
            'DOCUMENTCODE' =>'-',
            'DOCUMENTTYPE' => 'thai',
            'CERTIFICATE' => 'transcript',
            'ISSUEDATE' => '2017/10/10 15:00:00',
            'SIGNBY' => 'Asst.Prof.Pattirawit Polpinit(Assistant Registrar)'
        ]);
        DB::table('document')->insert([
            'REFCODE' => '610220549998',
            'STUDENTCODE' => '5730406754',
            'DOCUMENTCODE' =>'-',
            'DOCUMENTTYPE' => 'english',
            'CERTIFICATE' => 'transcript',
            'ISSUEDATE' => '2017/10/10 15:00:00',
            'SIGNBY' => 'Asst.Prof.Pattirawit Polpinit(Assistant Registrar)'
        ]);
        DB::table('document')->insert([
            'REFCODE' => '610220549999',
            'STUDENTCODE' => '5730406754',
            'DOCUMENTCODE' =>'ที่ ศธ 0514.23/10 471',
            'DOCUMENTTYPE' => 'thai',
            'CERTIFICATE' => 'graduation',
            'ISSUEDATE' => '2017/10/10 15:00:00',
            'SIGNBY' => 'Asst.Prof.Pattirawit Polpinit(Assistant Registrar)'
        ]);
        DB::table('document')->insert([
            'REFCODE' => '610220550000',
            'STUDENTCODE' => '5730406754',
            'DOCUMENTCODE' =>'KKU Ref: 0514.23/11 342',
            'DOCUMENTTYPE' => 'english',
            'CERTIFICATE' => 'graduation',
            'ISSUEDATE' => '2017/10/10 15:00:00',
            'SIGNBY' => 'Asst.Prof.Pattirawit Polpinit(Assistant Registrar)'
        ]);
    }
}
