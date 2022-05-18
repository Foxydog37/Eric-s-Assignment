<?php
/**
Plugin Name: ACE
Plugin URI:
Description: Custom Plugin for website
Version: 0.0.3
Author: WSU
Text Domain: Custom
*/

// Removes admin bar from the top of the website 

?>

<?php

function eric_admin_menu(){
  add_menu_page('Forms', 'Student Progression', 'manage_options', 'eric-admin-menu', 'eric_admin_menu_main', 1);
}

add_action('admin_menu', 'eric_admin_menu');

?>


<?php

function eric_admin_menu_main(){

?>



//table that it used to display progress

<table border="1">
<tr>
<th>Student ID</th>
<th>Student Full Name</th>
<th>Course</th>
<th>Progress</th>
<th>Last Completed</th>
</tr>
<?php
global $wpdb;
$result = $wpdb->get_results ("SELECT * FROM progress");
foreach ( $result as $print ) {
?>
<tr>
<td><?php echo $print->id;?></td>
<td><?php echo $print->studentname;?></td>
<td><?php echo $print->course;?></td>
<td><?php echo $print->progress;?></td>
<td><?php echo $print->lastcompleted;?></td>
</tr>
<?php
}
?>
</table>

<script type='text/javascript'>
  var server = null;
  window.onload = function (){

<?php

$json = '{
    "studentname": "John Lee",
    "course": "N/A",
    "progress": "Task",
    "lastcomplete": "Health Quiz"
}';
$book = json_decode($json);
// access title of $book object
$a = $book->studentname; // JavaScript: The Definitive Guide 
$b = $book->course; 
$c = $book->progress;
$d = $book->lastcomplete;


//Manually update progresss
  
  $wpdb->update( 
    'progress', 
    array( 
        'studentname' => $a,   // string
        'course' => $b, 
        'progress' => $c,
        'lastcomplete' => $d
    ), 
    array( 'ID' => 18970887), 
    array( 
        '%s',   // value1
        '%s'    // value2
    ), 
    array( '%d' ) 
);

?>

}

</script>


<?php


}

?>
