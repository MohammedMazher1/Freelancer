<?php
    require_once('inc/app.php');
    $sql = "select id,name,description from projects order by id desc";
    $result = $connection->query($sql);
?>

<section class="viewProject">
            <div class="page">
            <?php
             if ($result->num_rows > 0) 
             {
                while($row = $result->fetch_assoc()){
             ?>
              <div class="pagediv" data-bs-toggle="modal" data-bs-target="#myModal">
                <div class="details">
                    <span style="display:none"><?php echo $row['id'] ?></span>
                  <h4><?php echo $row['name'] ?></h4>
                  <p><?php echo $row['description'] ?></p>
                </div>
              </div>
              <?php } } ?>
            </div>

            <div class="modal" id="myModal" style="backdrop-filter: blur(10px);">
                <div class="modal-dialog">
                    <div class="modal-content">
                    <!-- Modal Header -->
                    <div class="modal-header" style="border-bottom: none;background-color: teal;justify-content: center;color: white;backdrop">
                        <h5 class="modal-title"></h5>
                        </div>
                        <!-- Modal body -->
                        <div class="modal-body" style="border:none;">
                        <p class="project_description"></p>
                        <form action="proposal" method="POST">
                            <input type="hidden" id='model_input' name='project_id'>
                            <textarea id="proposal" name="proposal" placeholder="اكتب رسالتك لهذا المشروع" style="width: 100%; outline: none ;height: 100px;"></textarea>
                            <input type="submit" value="تقدم" style="padding: 5px 10px;width: 150px;background: teal;border: navajowhite;border-radius: 5px;color: white;">
                        </form>
                    </div>
                    <!-- Modal footer -->
                    <div class="modal-footer" style="border:none">
                        <button type="button" id="modelClose" data-bs-dismiss="modal" style="padding: 5px 10px;width: 150px;background: #800028;border: navajowhite;border-radius: 5px;color: white;">إغلاق</button>
                    </div>

                    </div>
                </div>
            </div>
        </section>