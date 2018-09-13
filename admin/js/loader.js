$('document').ready(function() {
    $('#level').change(function(){
        var level_id = $(this).val();
        $("#programme > option").remove();
        $.ajax({
            type: "POST",
            url: "populate_data.php",
            data: "cid=" + level_id,
            success:function(opt){
                $('#programme').html(opt);
            }
        });
    });


 $('#department').change(function(){
        var course_req = $(this).val();
        $("#program > option").remove();
        $.ajax({
            type: "POST",
            url: "populate_program.php",
            data: "prog=" + course_req,
            success:function(data){
                $('#program').html(data);
            }
        });
    });

//checking the selection of the faculties and departments
$('#school').change(function(){
        var country_id = $(this).val();
        $("#department > option").remove();
        $.ajax({
            type: "POST",
            url: "populate_department.php",
            data: "fid=" + country_id,
            success:function(opt){
                $('#department').html(opt);

            }
        });
    });

    $('#programm').change(function(){
        var course_req = $(this).val();
        $("#course > option").remove();
        $.ajax({
            type: "POST",
            url: "populate_course.php",
            data: "cour=" + course_req,
            success:function(data){
                $('#course').html(data);
            }
        });
    });

});