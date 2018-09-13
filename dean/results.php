<?php require_once('include1/side_bar.php');
$x=@$_GET['id'];
$y=@$_GET['act'];
if (@$_GET['act']=="delete") {
    $sql1 = "DELETE FROM users WHERE user_id='$x'";
    $results = mysqli_query($conn, $sql1);
    if($results){
        $msg= "<div class='alert alert-success'><button class='close' data-dismiss='alert'>&times;</button> Staff successfully deleted.</div>";
        //echo "<script> alert('Data Successfully Deleted');window.location.href='departments.php'  </script> ";
    }
    else{
        $msg= "<div class='alert alert-warning'><button class='close' data-dismiss='alert'>&times;</button> Failed!!.</div>";
    }
}
?>
<!-- Aside Ends-->

<!--Main Content Start -->
<?php require_once('include1/header2.php') ?>
<!-- Header Ends -->

<!-- Page Content Start -->
<!-- ================== -->

<div class="wraper container-fluid">
    <!--<div class="page-title">
        <h3 class="title">Datatable</h3>
    </div>-->

    <!-- #4682B4-->
    <div class="row">

        <div class="col-md-12">
            <div class="panel panel-color panel-primary">
                <div class="panel-heading">
                    <h3 class="panel-title">Evaluation Results:</h3>
                </div>
                <div class="panel-body">
                    <div>
                        <?php
                        if(isset($msg)){
                            echo $msg;
                        }
                        ?>
                    </div>
                    <div class="row">
                        <div class="col-md-12 col-sm-12 col-xs-12">
                            <div class="table-responsive">
                                <table id="datatable" class="table table-striped table-bordered">
                                    <thead>
                                    <tr>
                                        <th><strong>#</strong></th>
                                        <th><strong>PF No.</strong></th>
                                        <th><strong>Title</strong></th>
                                        <th><strong>First Name</strong></th>
                                        <th><strong>Last Name</strong></th>
                                        <th><strong>Course Code</strong></th>
                                        <th><strong>Course Name</strong></th>
                                        <th><strong>Academic Year</strong></th>
                                        <th><strong>Semester</strong></th>
                                        <!--<th><strong>Programme</strong></th>-->
                                        <th><strong>Evaluation Results(%)</strong></th>
                                    </tr>
                                    </thead>

                                    <tbody>
                                    <?php





                                    $sql="SELECT lecturers.pf_number, lecturers.title, lecturers.firstname, lecturers.lastname
                                , lecturers.school_id, lec_course.course_code , course.course_name, academic_year.year_name
                                , semester.sem_name, programmes.program_name
                            FROM
                                evaluation.lec_course
                                INNER JOIN evaluation.lecturers
                                    ON (lec_course.pf_number = lecturers.pf_number)
                                INNER JOIN evaluation.course
                                    ON (lec_course.course_code = course.course_code)
                                INNER JOIN evaluation.academic_year
                                    ON (lec_course.year_id = academic_year.year_id)
                                INNER JOIN evaluation.semester
                                    ON (semester.year_id = academic_year.year_id) AND (lec_course.sem_id = semester.sem_id) AND (course.sem_id = semester.sem_id)
                                INNER JOIN evaluation.programmes
                                    ON (lec_course.program_id = programmes.program_id) AND (course.program_id = programmes.program_id) WHERE lecturers.school_id='$school'";
                                    $qry=mysqli_query($conn,$sql);
                                    $count=1;
                                    while($row=mysqli_fetch_assoc($qry)){
                                        $total_students=mysqli_fetch_assoc($conn->query("SELECT COUNT(reg_number) AS total_students FROM evaluation.tbl_evaluation WHERE course_code='$row[course_code]' AND pf_number='$row[pf_number]'"));
                                        ?>
                                        <tr>
                                            <td><?php echo $count;?></td>
                                            <td><?php echo $row['pf_number']?></td>
                                            <td><?php echo $row['title']?></td>
                                            <td><?php echo $row['firstname']?></td>
                                            <td><?php echo $row['lastname']?></td>
                                            <td><?php echo $row['course_code']?></td>
                                            <td><?php echo $row['course_name']?></td>
                                            <td><?php echo $row['year_name']?></td>
                                            <td><?php echo $row['sem_name']?></td>
                                            <td>
                                                <?php
                                                $query=mysqli_fetch_assoc($conn->query("SELECT SUM(marks) AS test FROM evaluation.tbl_evaluation WHERE course_code='$row[course_code]' AND pf_number='$row[pf_number]'"));
                                                //echo $query['test'];
                                                $y=$query['test'];
                                                if($y>0){
                                                    $percent=($y/($total_students['total_students']*5))*100;
                                                    //echo $percent;
                                                    echo round($percent,0);
                                                }
                                                else{

                                                }

                                                ?>
                                            </td>

                                        </tr>

                                        <?php
                                        $count++;
                                    }
                                    ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>

<!-- Page Content Ends -->
<!-- ================== -->

<!-- Footer Start -->
<footer class="footer" style="text-align: center;">
    &copy; <strong><?php echo date('Y')?> DESIGNED BY: OTIENO REAGAN</strong>
</footer>
<!-- Footer Ends -->
</section>
<!-- Main Content Ends -->

<!-- js placed at the end of the document so the pages load faster -->
<script src="../admin/js/jquery.js"></script>
<script src="../admin/js/bootstrap.min.js"></script>
<script src="../admin/js/pace.min.js"></script>
<script src="../admin/js/wow.min.js"></script>
<script src="../admin/js/jquery.nicescroll.js" type="text/javascript"></script>

<!-- Modal-Effect -->
<script src="../admin/assets/modal-effect/js/classie.js"></script>
<script src="../admin/assets/modal-effect/js/modalEffects.js"></script>


<script src="../admin/js/jquery.app.js"></script>
<script src="../admin/js/loader.js"></script>

<script src="../admin/assets/datatables/jquery.dataTables.min.js"></script>
<script src="../admin/assets/datatables/dataTables.bootstrap.js"></script>

<script type="text/javascript">
    $(document).ready(function() {
        $('#datatable').dataTable();
    } );
</script>

</body>

</html>
