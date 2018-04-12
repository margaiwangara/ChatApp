<?php
//start session
session_start();

if(!isset($_SESSION['USERNAME']))
    header("Location:registration.php");
//include layout
include_once 'layout.php';

//include people
include_once 'people.php';

//include requests
include_once 'request.php';

?>
<script src="scripts/knowrequest.js" type="text/javascript"></script>
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
                                    <td><button type="button" id="<?php echo $id;?>" name="add_known" class="btn btn-success known-button">Known</button>
                                    <input type="hidden" name="guest_id" value="<?php echo $id;?>"/></td>
                                    <td><a href="messages.php?id=<?php echo $id;?>&&username=<?php echo $username[$key];?>" id="send-message" name="send_message" class="btn btn-primary">Send Message</a></td>
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
                    <span class="text-info">Requests </span><span class="badge">&nbsp;<?php echo $totalRequesters;?></span>
                    <hr>
                    <?php if($totalRequesters > 0):foreach($requester as $key=>$sender):?>
                        <div class="panel panel-default">
                            <div class="panel-body">
                                <div>
                                    <ul class="list-group">
                                        <li class="list-group-item">
                                            <div>
                                                <span><strong><?php echo $sender;?></strong></span>
                                                <span class="pull-right">
                                                    <button class="btn btn-primary" type="button">Accept</button>
                                                    <button class="btn btn-danger" type="deny">Deny</button>
                                                </span>
                                            </div>
                                            <div>
                                                <?php echo $rq_when[$key];?>
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    <?php endforeach;endif;?>
                    <span class="text-success"><h2>Ones We Know</h2></span>
                    <hr>
                </div>
            </div>
        </div>
    </div>
</div>