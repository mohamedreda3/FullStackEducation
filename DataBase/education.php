<?php
/**
 * Export to PHP Array plugin for PHPMyAdmin
 * @version 5.1.1
 */

/**
 * Database `education`
 */

/* `education`.`admin` */
$admin = array(
  array('admin_eml' => 'mmoh33650@gmail.com','admin_psrd' => '21232f297a57a5a743894a0e4a801fc3','admin_img' => '../../assets/usersimages/user.png','admin_id' => '1','username' => 'Mohamed Reda')
);

/* `education`.`classes` */
$classes = array(
  array('class_code' => 'S#e@c','class_name' => 'Second team')
);

/* `education`.`students` */
$students = array(
  array('stu_id' => '1','stu_eml' => 'mmoh33650@gmail.com','stu_psrd' => 'admin','stu_nm' => 'mohamed Reda','stu_adrs' => '12_street','stu_phone' => '01212745939','stu_img' => '../../assets/usersimages/user.png')
);

/* `education`.`stu_class` */
$stu_class = array(
  array('stu_eml' => 'mmoh33650@gmail.com','class_id' => 'S#e@c','student_grade_in_this_class' => '0')
);

/* `education`.`subjects` */
$subjects = array(
  array('subject_name' => 'computer science basics','subject_code' => 'CS50','class_code' => 'S#e@c'),
  array('subject_name' => 'math1','subject_code' => 'MA111','class_code' => 'S#e@c'),
  array('subject_name' => 'programming1','subject_code' => 'pr101','class_code' => 'S#e@c')
);

/* `education`.`subjects_grades` */
$subjects_grades = array(
  array('subject_grade' => '79.4','subject_code' => 'CS50','student_email' => 'mmoh33650@gmail.com'),
  array('subject_grade' => '57.1','subject_code' => 'MA111','student_email' => 'mmoh33650@gmail.com')
);

/* `education`.`teachers` */
$teachers = array(
  array('teacher_id' => '1','teacher_name' => 'ahmed','teacher_eml' => 'mmoh33650@gmail.com','teacher_img' => '../../assets/usersimages/user.png','teacher_nphone' => '01212745939','teacher_psrd' => 'ce26b2d514efe35b3189f20c51570f98'),
  array('teacher_id' => '6','teacher_name' => 'mohamed Ahmed','teacher_eml' => 'mohammed.3101111348@ics.tanta.edu.eg','teacher_img' => '../../assets/usersimages/about-left-image.png','teacher_nphone' => '01212745939','teacher_psrd' => 'ce26b2d514efe35b3189f20c51570f98'),
  array('teacher_id' => '5','teacher_name' => 'mohamed Ahmed','teacher_eml' => 'mohammed.310111348@ics.tanta.edu.eg','teacher_img' => '../../assets/usersimages/user.png','teacher_nphone' => '01212745939','teacher_psrd' => 'ce26b2d514efe35b3189f20c51570f98'),
  array('teacher_id' => '4','teacher_name' => 'mohamed','teacher_eml' => 'mohammed.31011348@ics.tanta.edu.eg','teacher_img' => '../../assets/usersimages/user.png','teacher_nphone' => '01212745939','teacher_psrd' => 'ce26b2d514efe35b3189f20c51570f98'),
  array('teacher_id' => '13','teacher_name' => 'mohamed Ahmed','teacher_eml' => 'mohammged.31011348@ics.tanta.edu.eg','teacher_img' => '../../assets/usersimages/user.png','teacher_nphone' => '01212745939','teacher_psrd' => '14189c671d1db907090ffc546ce14488')
);

/* `education`.`tech_class` */
$tech_class = array(
  array('class_id' => 'S#e@c','email' => 'mmoh33650@gmail.com'),
  array('class_id' => 'S#e@c','email' => 'mohammed.3101111348@ics.tanta.edu.eg')
);
