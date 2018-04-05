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
                            <form action="" method="post">
                                <div class="form-group">
                                    <textarea name="message" id="message" rows="10" class="form-control" style="resize: none;"></textarea>
                                </div>
                                <div class="form-group">
                                    <button type="submit" name="send_message" id="message-submit" class="btn btn-primary">Send Message</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>