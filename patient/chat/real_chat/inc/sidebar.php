<div class="sidebar-wrapper mb-4">
    <?php
    session_start();
    $userr = $_SESSION['username'];
    ?>
      <div class="card">
       <div class="card-header">
       <div class="message-to d-flex">
          <?php 

             $sql = "SELECT * FROM log_tbl WHERE email='$userr'";
             $res = mysqli_query($conn,$sql);
             if($res){
             foreach($res as $user){ ?>
             <!-- <img src="../Dummy Images/8ec24a6934.jpg">  -->
             <i class="fa fa-circle"></i>
             <h6><?php echo $user['email'] ?></h6>
             <p>
                <?php
                 if($user['status'] == "Active"){
                     echo "Active Now";
                 }else{
                     echo "Offline";
                 } 
                ?> 
             </p>
          <?php } } ?>
       </div>
       

       </div>
       <div class="card-body">
       <div class="user-list-box">
            <ul>
              <?php
              $user = $_SESSION['user'];
               $query  = "SELECT * FROM doctor";
               $result =mysqli_query($conn, $query);
               if($result){
               foreach($result as $list){ ?>
                <li>
                    <a href="chat.php?sender=<?php echo $userr; ?>&receiver=<?php echo $list['docname']; ?>" class="d-flex align-items-center">
                        <!-- <img src="<?php echo $list['img']; ?>"> -->
                        <?php 
                         if($list['status'] == "Active"){
                            echo "<i class='fa fa-circle'></i>";
                         }else{
                             echo "<i class='fa fa-circle offline'></i>";
                         }
                        ?>
                        <h6><?php echo $list['docname']; ?></h6>
                    </a>
                </li>
                <?php } } ?>
                
                

                
            </ul>   
            
        </div>
       </div>
                        </div>
    </div>