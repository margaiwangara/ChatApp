<?php 
//session
session_start();

if(!isset($_SESSION['USERNAME']))
    header("Location:registration.php");

//include layout
include_once 'layout.php';

?>
<!--custom js-->
<script src="scripts/message.js"></script>
<script src="scripts/messages.js"></script>
<title>Messages</title>

<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-body">
                    <span><h3>Messages</h3></span>
                    <hr>
                    <div class="row">
                        <div class="col-md-4"></div>
                        <div class="col-md-8">
                            <div id="user_messages" style="max-height: 400px;">
                               <div class="panel panel-success">
                                    <div class="panel-heading">
                                        <h3><strong id="sender-username" style="font-family:cambria;color:black;"><?php echo htmlspecialchars(ucwords($_GET['username']));?></strong></h3>
                                    </div>
                                    <div class="panel-body" id="message-display" style="overflow:auto;max-height: 300px;">
                                    
                                    </div>
                               </div>
                            </div>
                            <hr>
                            <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']."?id=".$_GET['id']);?>" method="post" id="message-form">
                                <div class="form-group">
                                    <input type="hidden" value="<?php echo htmlspecialchars($_GET['id']);?>" name="receiver" id="message-receiver">
                                    <textarea name="message" id="message" rows="5" class="form-control" style="resize: none;"></textarea>
                                </div>
                                <div class="form-group">
                                    <button type="submit" name="send_message" id="messagesubmit" class="btn btn-primary">Send Message</button>
                                </div>
                                <span class="text-danger error_mess"></span>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>