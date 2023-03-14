<?php 
  include_once '../config/config.php';
//   include_once '../lib/database.php';
//   $db = new Database;
?>  
<style>
    #suii {
border:none;
    background-color: transparent;
    }   
    #drp-btn
    {
    border:none;
    background-color: transparent;
    color: #fff;
    /* display: visible; */
    display: inline-block;
            position: relative;
    }
          .text-message-other {
            display: inline-block;
            position: relative;          
          }
          .dropdown-options {
            display: none;
            position: absolute;
            position: absolute;
            text-decoration: none;
            color: #fff;
            background-color: #fff;
            min-width: 100px;
                  /* box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2); */
            z-index: 1;
          }

          .text-message-other:hover .dropdown-options {
            display: block;
            /* padding: 12px 16px; */
          }
</style>
<?php

if(isset($_POST['suii']))
{
    echo"<script>alert('delete msg from every one?');</script>";
}
?>
<?php 
// function select($query){
//     $select_row = $this->pdo->prepare($query);
//     $select_row->execute();
//     if($select_row->rowCount() > 0){ 
//     // Alt count -> count($select_row);
//          return $select_row->fetchAll(PDO::FETCH_ASSOC);
//     }
// }
    $receiver = $_GET['receive'];
    $sender   = $_GET['send'];
    $sql = "SELECT *FROM message_tbl LEFT JOIN doctor ON doctor.docname= message_tbl.outgoing_msg_id 
    WHERE incoming_msg_id='$receiver' AND outgoing_msg_id='$sender' || outgoing_msg_id='$receiver' AND 
    incoming_msg_id='$sender' ORDER BY msg_id ASC";
    $res = $conn->query($sql);
    if($res){
    foreach($res as $msg){ 
    if($receiver == $msg['docname']){
    ?>
    <div class="item-group-you d-flex">
        <img src="../Dummy Images/4e826cb877.png">
        <div class="text-message-you">
        <?php echo $msg['text_message']; ?>
        </div>
        <p class="time-track-you">
        <?php echo $msg['curr_date'] . $msg['curr_time'] ; ?>
        </p>
    </div>






    <?php }else{ ?>

    <div class="item-group-other d-flex">
        <img src="../Dummy Images/8ec24a6934.jpg">
        <div class="text-message-other">
                  <a id="drp-btn"><?php echo $msg['text_message']; ?></a>
                  <!-- <div class="dropdown-options">
                    <form method="POST">
                        <button type="submit" id="suii" name="suii" >delete msg</button>
                    </form>
                  </div> -->
        </div>
        <p class="time-track-other">
        <?php echo $msg['curr_date'] . $msg['curr_time'] ; ?>
        </p>
    </div> 

    <?php } ?>
    <?php } } ?>