<?php 
//session
session_start();

//include layout
include_once 'layout.php';

?>
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
                            <div>
                                <table class="table table-condensed" id="user_messages">
                                    
                                </table>
                            </div>
                            <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']."?id=".$_GET['id']);?>" method="post" id="message-form">
                                <div class="form-group">
                                    <input type="hidden" value="<?php echo htmlspecialchars($_GET['id']);?>" name="receiver" id="message-receiver">
                                    <textarea name="message" id="message" rows="5" class="form-control" style="resize: none;"></textarea>
                                </div>
                                <div class="form-group">
                                    <button type="submit" name="send_message" id="messagesubmit" class="btn btn-primary">Send Message</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>