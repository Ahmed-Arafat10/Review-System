<?php

require_once "class/message.class.php";
$select = '3';

$message = new Message();
$Data = $message->GetMessages(" ORDER BY ID DESC", "", "");
extract($Data);
$success = NULL;
if (count($_POST)) {
    //print_r($_POST);
    //echo $ID;
    $title = $_POST['title'];
    $content = $_POST['content'];
    $name = $_POST['name'];
    $email = $_POST['email'];

    $m = new Message();
    $Check = $m->AddMessage($title, $content, $name, $email);
    if ($Check) 
    {
        $success = "1";
       // header("location:guestbook.php");
     
    }
}

?>

<?php require_once "header.html"; ?>
<div class="content">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="section-header">
                <h1>Guest Book</h1>
            </div>
            <div class="row guestbook">
                <div class="col-md-12">
                    <?php if (strlen($success)) : ?>
                        <div class="alert alert-success">
                            <p>Message added successfully...</p>
                        </div>
                    <?php endif; ?>
                    <?php foreach ($Data as $d) :
                        extract($d);
                    ?>
                        <div class="panel panel-default panel-guestbook">
                            <div class="panel-heading">
                                <div class="guestbook__title"><?php echo $title ?></div>
                            </div>
                            <div class="panel-body">
                                <div class="guestbook__text"><?php echo $content ?></div>
                            </div>
                            <div class="panel-footer">
                                <div class="guestbook__writer"><strong>Added By:</strong> <?php echo $name ?></div>
                            </div>
                        </div>
                    <?php endforeach; ?>

                </div>
                <div class="col-md-12">
                    <br /><br />
                </div>
                <div class="col-md-12">
                    <div class="section-header">
                        <h1>Add new message</h1>
                    </div>
                    <form class="form-horizontal" method="POST">
                        <div class="form-group">
                            <label for="title" class="col-sm-3 control-label">Message Title</label>
                            <div class="col-sm-9">
                                <input type="text" name="title" class="form-control" id="title" placeholder="Message Title">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="content" class="col-sm-3 control-label">Message Content</label>
                            <div class="col-sm-9">
                                <textarea class="form-control" name="content" rows="6" id="content" placeholder="Message Content"></textarea>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="name" class="col-sm-3 control-label">Your Name</label>
                            <div class="col-sm-9">
                                <input type="text" name="name" class="form-control" id="name" placeholder="Your Name">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="email" class="col-sm-3 control-label">Your Email</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" name="email" id="email" placeholder="Your Email">
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-offset-3 col-sm-9">
                                <button type="submit" class="btn btn-danger"><i class="fa fa-comments"></i> Add Message</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
</div>

<?php require_once "footer.html"; ?>