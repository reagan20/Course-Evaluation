<?php
session_start();
require_once('../config/dbconnect.php');
$school=$_GET['sess'];

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
            <h4 style="padding-left:50%;">Staff</h4>
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
                     <u><strong>LECTURERS LIST </strong></u>
                      </div>
                      </div>
                         <br/>

           <div class="row-fluid " style="padding-left:10%; padding-right:-5%;">
                          <table class="table table-bordered">
                                     <thead>
                                     <tr>
                                         <th>NO.</th>
                                        <th><strong>Title</strong></th>
                                        <th><strong>First Name</strong></th>
                                        <th><strong>Last Name</strong></th>
                                        <th><strong>PF Number</strong></th>
                                        <th><strong>Role</strong></th>

                                     </tr>
                                     </thead>
                                     <tbody>';
$s="SELECT pf_number, title, firstname, lastname, mobile,mail,lecturers.role_id, schools.school_id, school_name, dept_name,departments.dept_id
                                , roles.role_name FROM lecturers
                                INNER JOIN schools
                                    ON (lecturers.school_id = schools.school_id)
                                INNER JOIN departments
                                    ON (departments.school_id = schools.school_id) AND (lecturers.dept_id = departments.dept_id)
                                INNER JOIN roles
                                    ON (lecturers.role_id = roles.role_id) WHERE lecturers.school_id='$school'";
$q=mysqli_query($conn,$s);
$count=1;
while($r=mysqli_fetch_assoc($q)){
    $html.='<tr>
                                <td>'.$count.'</td>
                                <td>'.$r['title'].'</td>
                                <td>'.$r['firstname'].'</td>
                                <td>'.$r['lastname'].'</td>
                                <td>'.$r['pf_number'].'</td>
                                <td>'.$r['role_name'].'</td>


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