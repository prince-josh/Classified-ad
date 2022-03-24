<?php
session_start();
include "../includes/connection.php";
if (!isset($_SESSION['email'])) {
    header("location: ../login.php");
}else{
?>

<?php
    //get user info
    $s_email = $_SESSION['email'];
    $sel = "select * from users where email = '$s_email'";
    $run_sel = mysqli_query($con, $sel);
    $row = mysqli_fetch_assoc($run_sel);
    $id = $row['user_id'];
    $fn = $row['first_name'];
    $ln = $row['last_name'];
    $email = $row['email'];
    $phone_num = $row['phone_num'];
    $dp = $row['picture'];
//get all messages
    $sel_all_messages = "SELECT * FROM messages AS m INNER JOIN users AS u on receiver_id = user_id WHERE receiver_id = '$id' order by message_id desc";
    $run_sel_all_messages = mysqli_query($con, $sel_all_messages);
    $count_row = mysqli_num_rows($run_sel_all_messages);
    ?>
<!--main body-->
                    <?php
                if ($count_row < 1) {
                    echo "<center>
                    <h2 class = 'mt-5'>
                    Your Have Not Recieved Any Message Yet
                    </h2>
                    </center>";
             }
             else{
                 ?>
                <div class="row">
               
                   <table class="table table-striped table-responsive">
                       <thead class="text-center">
                           <tr>
                               <th>Name</th>
                               <th>Phone Number</th>
                               <th>Email</th>
                               <th>Message</th>
                               <th>Actions</th>
                           </tr>
                       </thead>
                       <tbody>
                           <tr>                           

                           <?php

                           
                                while ($row = mysqli_fetch_assoc($run_sel_all_messages)) {
                                        $message_id = $row['message_id'];
                                        $sender_name = $row['sender_name'];
                                        $sender_phone = $row['sender_phone'];
                                        $sender_email = $row['sender_email'];
                                        $message = $row['message'];

                                ?>
                               <td><?php echo htmlspecialchars($sender_name);?></td>
                               <td><?php echo htmlspecialchars($sender_phone);?></td>
                               <td><?php if ($sender_email == "") {
                                   echo "No email provided";
                               }else{
                                echo htmlspecialchars($sender_email);
                               }?></td>
                               <td><?php echo htmlspecialchars($message);?></td>
                               <td>
                                   <center><i class="fa fa-times" title="delete"></i></center>
                                </td>
                           </tr>
                           
                           <?php }?>
                       </tbody>
                   </table>
                   <?php }?>
                </div>
                <?php } ?>