<?php require_once('include1/side_bar.php')?>

<?php require_once('include1/header2.php');?>
    <!-- Header Ends -->

    <div class="wraper container-fluid">
        <div class="page-title">
            <h3 class="title">List of Students per class</h3>
        </div>
<div class="row">
    <div class="col-md-12">
        <div class="panel panel-color panel-info">
            <div class="panel-heading"></div>
            <div class="panel-body">
                <div class="row">
                    <div class="col-lg-12">
                        <ul class="nav nav-tabs nav-justified">
                            <li class="active">
                                <a href="#home-2" data-toggle="tab" aria-expanded="false">
                                    <span class="visible-xs"><i class="fa fa-home"></i></span>
                                    <span class="hidden-xs">1st years</span>
                                </a>
                            </li>
                            <li class="">
                                <a href="#profile-2" data-toggle="tab" aria-expanded="false">
                                    <span class="visible-xs"><i class="fa fa-user"></i></span>
                                    <span class="hidden-xs">2nd years</span>
                                </a>
                            </li>
                            <li class="">
                                <a href="#messages-2" data-toggle="tab" aria-expanded="true">
                                    <span class="visible-xs"><i class="fa fa-envelope-o"></i></span>
                                    <span class="hidden-xs">3rd years</span>
                                </a>
                            </li>
                            <li class="">
                                <a href="#settings-2" data-toggle="tab" aria-expanded="false">
                                    <span class="visible-xs"><i class="fa fa-cog"></i></span>
                                    <span class="hidden-xs">4th years</span>
                                </a>
                            </li>
                            <li class="">
                                <a href="#settings-2" data-toggle="tab" aria-expanded="false">
                                    <span class="visible-xs"><i class="fa fa-cog"></i></span>
                                    <span class="hidden-xs">5th years</span>
                                </a>
                            </li>
                        </ul>
                        <div class="tab-content">
                            <div class="tab-pane" id="home-2">
                                <div class="row">
                                    <div class="col-md-12">
                                       <div class="panel panel-color panel-info">
                                           <div class="panel-heading">test</div>
                                           <div class="panel-body">
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
                                                           <th><strong>Programme</strong></th>
                                                           <th><strong>Action</strong></th>
                                                       </tr>
                                                       </thead>

                                                       <tbody>
<!--                                                       --><?php
//                                                       $sql="";
//                                                       $qry=mysqli_query($conn,$sql);
//                                                       $count=1;
//                                                       while($row=mysqli_fetch_assoc($qry)){
//
//                                                           ?>
                                                           <tr>
                                                               <td><?php //echo $count;?></td>
                                                               <td><?php //echo $row['pf_number']?></td>
                                                               <td><?php //echo $row['title']?></td>
                                                               <td><?php //echo $row['firstname']?></td>
                                                               <td><?php //echo $row['lastname']?></td>
                                                               <td><?php //echo $row['course_code']?></td>
                                                               <td><?php //echo $row['course_name']?></td>
                                                               <td><?php //echo $row['year_name']?></td>
                                                               <td><?php //echo $row['sem_name']?></td>
                                                               <td><?php //echo $row['program_name']?></td>
                                                               <td>
                                                                   <a class="btn btn-sm btn-info" data-target="#stu_details<?php //echo $count; ?>" data-toggle="modal"><i class="fa fa-pencil"></i></a>
                                                                   <a class="btn btn-sm btn-danger" name="delete" onclick="return confirm('Sure to delete? It will be deleted permanently!')"
                                                                      href="?action=transview&id=<?php //echo $row['pf_number']?>&act=delete"><i class="fa fa-remove"></i></a>
                                                               </td>

                                                           </tr>
<!--                                                           --><?php
//                                                           $count++;
//                                                       }
//                                                       ?>
                                                       </tbody>
                                                   </table>
                                               </div>
                                           </div>
                                       </div>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane" id="profile-2">
                                <p>Fulfilled direction use continual set him propriety continued. Saw met applauded favourite deficient engrossed concealed and her. Concluded boy perpetual old supposing. Farther related bed and passage comfort civilly. Dashwoods see frankness objection abilities the. As hastened oh produced prospect formerly up am. Placing forming nay looking old married few has. Margaret disposed add screened rendered six say his striking confined. </p>
                                <p>When be draw drew ye. Defective in do recommend suffering. House it seven in spoil tiled court. Sister others marked fat missed did out use. Alteration possession dispatched collecting instrument travelling he or on. Snug give made at spot or late that mr. </p>
                            </div>
                            <div class="tab-pane active" id="messages-2">
                                <p>When be draw drew ye. Defective in do recommend suffering. House it seven in spoil tiled court. Sister others marked fat missed did out use. Alteration possession dispatched collecting instrument travelling he or on. Snug give made at spot or late that mr. </p>
                                <p>Carriage quitting securing be appetite it declared. High eyes kept so busy feel call in. Would day nor ask walls known. But preserved advantage are but and certainty earnestly enjoyment. Passage weather as up am exposed. And natural related man subject. Eagerness get situation his was delighted. </p>
                            </div>
                            <div class="tab-pane" id="settings-2">
                                <p>Luckily friends do ashamed to do suppose. Tried meant mr smile so. Exquisite behaviour as to middleton perfectly. Chicken no wishing waiting am. Say concerns dwelling graceful six humoured. Whether mr up savings talking an. Active mutual nor father mother exeter change six did all. </p>
                                <p>Carriage quitting securing be appetite it declared. High eyes kept so busy feel call in. Would day nor ask walls known. But preserved advantage are but and certainty earnestly enjoyment. Passage weather as up am exposed. And natural related man subject. Eagerness get situation his was delighted. </p>
                            </div>
                        </div>
                        <br>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

    </div> <!-- END Wraper -->

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


<script src="../admin/js/jquery.app.js"></script>
<script src="../admin/assets/datatables/jquery.dataTables.min.js"></script>
<script src="../admin/assets/datatables/dataTables.bootstrap.js"></script>
<script type="text/javascript">
    $(document).ready(function() {
        $('#datatable').dataTable();
    } );
</script>

</body>

</html>
