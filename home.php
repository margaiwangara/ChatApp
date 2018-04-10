<?php
//start session
session_start();

//include layout
include_once 'layout.php';

//include people
include_once 'people.php';

?>
<title>Home</title>
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <?php 
                if(isset($_SESSION['USERNAME'])) 
                {
                    echo "<span class='text-success'><strong>Welcome ".ucwords($_SESSION['USERNAME'])."</strong></span>";
                }
                else 
                    echo "Welcome Guest";
            ?>
        </div>
    </div>
    <hr>
    <div class="row">
        <div class="col-md-6">
            <div class="panel panel-default">
                <div class="panel-body">
                    <span class="text-success"><h2>People <span class="badge"><?php echo $noOfPeople;?></span></h2></span>
                    <hr>
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>Username</th>
                                <th>Email</th>
                                <th></th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach($ids as $key=>$id):?>
                                <tr>
                                    <td><?php echo $username[$key];?></td>
                                    <td><?php echo $email[$key];?></td>
                                    <!--Add people and send messages-->
                                    <td><button type="button" id="add-known" name="add_known" class="btn btn-success">Known</button></td>
                                    <td><a href="messages.php?id=<?php echo $id;?>" target="_blank" id="send-message" name="send_message" class="btn btn-primary">Send Message</a></td>
                                </tr>
                            <?php endforeach;?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="panel panel-default">
                <div class="panel-body">
                    <span class="text-success"><h2>Ones We Know</h2></span>
                    <hr>
                </div>
            </div>
        </div>
    </div>
</div>