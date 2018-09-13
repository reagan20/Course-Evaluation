<?php
session_start();
require_once('../config/dbconnect.php');
$get_id=$_GET['id2'];
require_once( '../library/mpdf.php');
$stylesheet = file_get_contents('../admin/css/pdfLayout.css');
// Setup PDF
date_default_timezone_set('Africa/Nairobi');
$d=new DateTime();
$dat=$d->format('d/m/y  h:i:s a');
$sid="1234567";
//$mpdf = new mPDF('utf-8', 'A4',0,0,5,5,15,16,4,9,'P');
$mpdf = new mPDF('utf-8', 'A4',0,'',5,10,15,16,4,9,'P');
$mpdf->SetDisplayMode(real,'default');

//require_once('../include/session2.php');
//require_once('include/functions.php');
$mpdf->showWatermarkImage=true;
//$mpdf->SetWatermarkImage('../images/logo1.png ');
//$mpdf->showWatermarkText = true;
//$mpdf->WriteHTML('<watermarktext content="MTRH SYSTEM" alpha="0.1" />');
$mpdf->setAutoTopMargin = 'stretch';
$mpdf->setAutoBottomMargin = 'stretch';
//$fullname= $row['first_name'];
$mpdf->SetHTMLFooter('<div class="pdf-footer">
<strong>Disclaimer :</strong> <i>This is a system generated report Form and does not require signature.</i>
<hr>
<i>Generated and Printed on '.$dat.' </i>
</div>');

$mpdf->WriteHTML($stylesheet,1);
$html='
  <html>
<body> <div class="container" >
<div class="row-fluid">
<div style="color:#fffff; text-align:left; padding:5px;padding-left:0%"><barcode code=" '.$sid.' " type="C128A" size="0.5" height="1.0"/></div>

</div>
     <div class="row-fluid "  >
              <img src="../admin/img/logo.png" style="padding-left:39%" alt="School Logo" class="logo" width="120" height="100"/>
<h3 style="padding-top:0px; padding-left:16%; ">MASINDE MULIRO UNIVERSITY OF SCIENCE & TECHNOLOGY </h3>
            <h4 style="padding-left:26%;">Registered Students for the Course</h4>
              </div>
              <div class="row-fluid"  style="padding-left:10%; padding-right:-5%;">
           <div class="span6 pull-left" style="text-align:left;margin-top:-20px;"><br/>
           Tel. No: 020-2063540 <br/>
           Email: <u> info@mmust.ac.ke</u><br/>
           Website: <u>www.mmust.ac.ke</u><br/>
           </div>

           <div class="span6" style="text-align:left; padding-left:74%; margin-top:-65px; ">P.O Box 190 <br/>
                                               Kakamega-50100 <br/>
                                               Kenya.<br/>
           </div>
           </div>
           <div class=" row-fluid1"  style="padding-left:10%; padding-right:-5%;">
                      <hr/>  </div>
           <div class=" row-fluid1"  style="padding-left:10%; padding-right:-5%;" style="text-align:center">
           <br/>        <div style="padding-left:10%; padding-right:-5%;" >
                     <u><strong>REGISTERED STUDENTS FOR '.$get_id.'</strong></u>
                      </div>
                      </div>
                         <br/>

           <div class="row-fluid " style="padding-left:10%; padding-right:-5%;">
                          <table class="table table-bordered">
                                     <thead>
                                     <tr>
                                         <th>NO.</th>
                                        <th>Reg Number</th>
                                        <th>First Name</th>
                                        <th>Last Name</th>
                                        <th>Phone</th>
                                     </tr>
                                     </thead>
                                     <tbody>';
                                    $s="SELECT * FROM
                                        evaluation.stude_course_lec
                                        INNER JOIN evaluation.students
                                            ON (stude_course_lec.reg_number = students.reg_number)
                                        INNER JOIN evaluation.lecturers
                                            ON (stude_course_lec.pf_number = lecturers.pf_number)
                                        INNER JOIN evaluation.course
                                            ON (stude_course_lec.course_code = course.course_code) WHERE stude_course_lec.pf_number='$_SESSION[lecturer]' AND stude_course_lec.course_code='$get_id'";
                                    $q=mysqli_query($conn,$s);
                                    $count=1;
                                    while($r=mysqli_fetch_assoc($q)){


                                $html.='<tr>
                                <td>'.$count.'</td>
                                <td>'.$r['reg_number'].'</td>
                                <td>'.$r['fname'].'</td>
                                <td>'.$r['lname'].'</td>
                                <td>'.$r['phone'].'</td>

                                </tr>';
                                        $count++;
                                 }
                                $html .='</tbody>
                                     </table>

                                <br/>
                                     <br/>
                                      <br/>
                            <div style="content-align:center;">
                          <!--<img src="../images/stamp.png"alt=""  style="background-color: #FFFFFF; border: none;"  width="150" height="150"/> <br/>-->
                        <strong>Course Evaluation System
                         <br/>
                        <u>MMUST </u>
                        </strong>
                          </div>





              </div> </div>  </body>
           </html>';

$mpdf->WriteHTML($html,2); // Writing html to pdf

//$mpdf->Output(); // For sending Output to browser
$mpdf->Output('Registered Students.pdf','I'); // For Download
exit;
?>