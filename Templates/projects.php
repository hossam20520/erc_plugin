<h1>ADD Course</h1>


<?php
test_handle_post();
delete();
?>

        <!-- Form to handle the upload - The enctype value here is very important -->
                <!-- <form  method="post" enctype="multipart/form-data">
                
                  <label>Area: </label> <input type ='text' name ='area' id="title"><br>
                  <label>Area from: </label> <input type ='text' name ='area_from'><br>
                  <label>Area to: </label> <input type ='text' name ='area_to'><br>
                  <label>Starting Price: </label> <input type ='text' name ='starting_price'><br>
                   </form> -->

<div class="hossam20520">
  <form method="post">
    <label for="fname">Course Nmae</label>
    <input type="text"  id="fname" name="course_name" placeholder="Enter Course Name">

    <label for="lname">Enter Course ID</label>
    <input type="number" id="lname" name="courseID" placeholder="Enter Course ID">
    <label for="lname">Course Duration</label>
    <input type="number" id="lname" name="end_date" placeholder="End Date">
    
    <?php submit_button('ADD') ?>

  </form>
</div>




<?php
 global $wpdb;
$tablename = $wpdb->prefix.'erc_courses';
$result = $wpdb->get_results("SELECT * FROM $tablename");




?>





<table id="customers_20520">
  <tr>
    <th>ID</th>
    <th>Course ID</th>
    <th>Course Name</th>
    <th>Days</th>
    <!-- <th>Edit</th> -->
    <th>Delete</th>
  </tr>

  <?php 
foreach($result as $val): 
?>
  <form method="post">
  <tr>
  <td><?php echo $val->id;   ?></td>
    <td><?php echo $val->id_course;   ?></td>
    <td><?php echo $val->course_name;   ?></td>
    <td><?php echo $val->days;   ?></td>
    <td><?php submit_button('Delete') ?></td>
    <input name="id" value="<?php echo $val->id;   ?>" type="hidden">
  </tr>

  </form>

<?php
endforeach

?>



  
 
</table>










<?php



function delete(){
        if(isset($_POST['id'])){
       
               
                $courseID =  $_POST['id'];
          

                deleteFromDB($courseID);

        }      
}






        function test_handle_post(){




        
        if(isset($_POST['courseID'])){
       
                $course_name =  $_POST['course_name'];
                $courseID =  $_POST['courseID'];
                $end_date =  $_POST['end_date'];

                insert($course_name ,$courseID  , $end_date);

        }
}


function deleteFromDB($id){
        global $wpdb;
        $tablename = $wpdb->prefix.'erc_courses';
    
//        $wpdb->insert( $tablename, array(
//             'id_course' => $courseID, 
//             'course_name' =>$course_name,
//             'days' => $end_date),
//            array( '%s', '%s', '%s' ));


        //    $wpdb::delete(
        //         $tablename, // table to delete from
        //         array(
        //             'id' => $id // value in column to target for deletion
        //         ),
        //         array(
        //             '%d' // format of value being targeted for deletion
        //         )
        //     );

            $wpdb->query( 
                "DELETE FROM $tablename
                 WHERE id IN($id)
                "       
            );
    


}


 function insert($course_name ,$courseID  , $end_date){
     global $wpdb;
    $tablename = $wpdb->prefix.'erc_courses';

   $wpdb->insert( $tablename, array(
        'id_course' => $courseID, 
        'course_name' =>$course_name,
        'days' => $end_date),
       array( '%s', '%s', '%s' ));
}




?>