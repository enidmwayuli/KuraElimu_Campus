  <!doctype html>
<html>
<?php
require("menu.html");
?>

        <!-- header -->
        <div class="container" id="contact5">
            <div class="row">
                <div class="col-xs-12 col-md-6 col-lg-6">
                    <h3 id="service4"><strong>SEND MESSAGE</strong></h3>
                    <div class="row">
                        <div class="col-lg-12 col-md-12 col-xs-12 form1">
                           <form class="form-horizontal" method="POST" action="insertcomment.php">
                                <fieldset>

                                <!-- Form Name --> 
                                <legend >Enter your Comment</legend>
                            
                                <!-- Text input-->
                                <div class="form-group">
                                  <label class="col-md-4 control-label" for="textinput">Your Name</label>  
                                  <div class="col-md-4">
                                  <input id="textinput" name="username" type="text" placeholder="put your name here" class="form-control input-md">
                                  <span class="help-block"></span>  
                                  </div>
                                </div>


                                <!-- Textarea -->
                                <div class="form-group">
                                  <label class="col-md-4 control-label" for="comments">Your Comment</label>
                                  <div class="col-md-4">                     
                                    <textarea class="form-control" id="comments" name="comments" placeholder="write your comment here"></textarea>
                                  </div>
                                </div>

                                <!-- Button -->
                                <div class="form-group">
                                  <label class="col-md-4 control-label" for="submit"></label>
                                  <div class="col-md-4">
                                    <!-- <button id="submit" name="submit" class="btn btn-primary">submit now</button> -->
                                    <input type="submit" class="btn btn-primary" value="Comment">
                                  </div>
                                </div>


                                </fieldset>
                           </form>
                               
                        </div>
                        </div>
                    <!-- <div class="row">
                        <div class="col-lg-8col-md-8 col-xs-12" id="send">
                            <a href="#" class="btn btn-primary hvr-bounce-to-right btn-lg" role="button">SEND NOW
                            </a>
                        
                        </div>
                    </div> -->
                </div>
                <div class="col-xs-12 col-md-6 col-lg-6">
                    <?php
                          $hostname = 'localhost';
                          $username = 'root';
                          $password = '';
                          $dbname = 'chat';

                          try {
                            $dbh = new PDO("mysql:host=$hostname;dbname=$dbname", $username, $password);

                            $sql = $dbh->prepare("SELECT * FROM comments");

                            if($sql->execute()) {
                               $sql->setFetchMode(PDO::FETCH_ASSOC);
                            }
                          }
                          catch(Exception $error) {
                              echo '<p>', $error->getMessage(), '</p>';
                          }

                    ?>
                    <br><br><br><br><br>
                    <table class="table table-striped">
                          <?php while($row = $sql->fetch()) { ?>
                          <tr>
                            <td><?php echo $row['username']; ?></td>
                            <td><?php echo $row['comments']; ?></td>
                            
                          </tr>
                          <?php } ?>
                    </table>
                    
                </div>
            </div>
        </div>

<br>
     <?php
     require("footer.html"); 
     ?>      
</body>

</html>