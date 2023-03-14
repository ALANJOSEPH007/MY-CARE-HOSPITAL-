<?php 
 include_once '../config/config.php';
 include_once '../lib/database.php';
//  $db = new Database;

 $dt     = new DateTime('now', new DateTimezone('Asia/Dhaka'));
 $date   = $dt->format('F j, Y');
 $tm     = new DateTime('now', new DateTimezone('Asia/Dhaka'));
 $time   = $tm->format('g:i a');
//  $id1    ="select * from log_tbl where id=$receiver";
//  $id2    ="select * from doctor where docid=$sender";
 $msg      = str_replace("'", "", $_POST['message']);
 $receiver = $_POST['receive']; //incoming msg id
 $sender   = $_POST['send']; //outgoing msg id
 
 
 $sql1="SELECT * from log_tbl where email='abitmonrajan@gamil.com'";
 $result=mysqli_query($conn,$sql1);
 $row=mysqli_fetch_assoc($result);
 $id=$row['id'];

  $sql2="SELECT * from doctor where docname='$sender'";
  $result1=$conn->query($sql2);
  $row1=$result1->fetch_assoc();
  $id2=$row1['docid'];


 $sql = "INSERT INTO message_tbl(incoming_id,incoming_msg_id, outgoing_msg_id, outgoing_id,text_message, curr_date, curr_time)
 VALUES('$id','$receiver', '$sender', '$id2', '$msg', '$date ','$time')";
   $result = $conn->query($sql);
   // $res = $db->insert($sql);
   if($result){
   //echo "Message Sent!";
  }else{
  echo "Message sending failed!";
 }
?>