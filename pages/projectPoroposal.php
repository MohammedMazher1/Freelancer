<?php
    require_once('inc/app.php');
    $sql = "SELECT distinct users.name , proposals.proposal FROM users inner join projects on users.id = projects.user_id inner join proposals   
    on projects.user_id = proposals.user_id order by users.id desc";
    $result = $connection->query($sql);
?>
<section class="freelancerProposal">
    <table class="table table-bordered" style="padding: 20px;margin: 20px 10px; text-align: center;">
        <tr >
            <th style="background-color: #008080b7">المتقدم </th>
            <th style="background-color: #008080b7">الرسالة</th>
            <th style="background-color: #008080b7; color:white">الموافقة؟</th>
        </tr>
        <?php
             if ($result->num_rows > 0) 
             {
                while($row = $result->fetch_assoc()){
             ?>
              <tr>
            <td><?php echo $row['name'] ?></td>
            <td><?php echo $row['proposal'] ?></td>
            <td><button id="ecceptbutton"><i class="fa-solid fa-square-check"></i></button></td>
        </tr>
              <?php } } ?>
        
    </table>
</section>