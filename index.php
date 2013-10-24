<?php include_once 'function.php';

if($_SESSION['username'] == NULL)
{
    header('Location: login.php');
}?>

<!DOCTYPE html>
<html>
<head>
    <title>MegaDL</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Bootstrap -->
    <link href="assets/css/bootstrap.min.css" rel="stylesheet" media="screen">
    <link href="assets/css/style.css" rel="stylesheet">
</head>
<body>
<div class="container">
    <div class="page-header">
        <h1>MegaDOWNLOADER</h1>
        <p class="lead">Fast and easy for you.</p>
    </div>
    <div class="table-responsive">
        <table class="table table-striped" id="tabList">
            <thead>
            <tr>
                <td style="font-weight: bold;">#</td>
                <td>Name</td>
                <td>Link</td>
                <td>Speed</td>
                <td>Size</td>
                <td>Progress</td>
                <td>Option</td>
            </tr>
            </thead>
            <tbody>
            <?php
            $listMegaDL = getListMegaDL();

            foreach($listMegaDL as $infoMegaDL)
            {
                echo '<tr id="'.$infoMegaDL['id'].'">
                        <td style="font-weight: bold;">' . $infoMegaDL['id'] . '</td>
                        <td><span id="filename'.$infoMegaDL['id'].'"><img src="assets/img/load.gif"></span></td>
                        <td>' . $infoMegaDL['link'] . '</td>
                        <td><span id="speed'.$infoMegaDL['id'].'"></span>
                        <td><span id="size'.$infoMegaDL['id'].'"><img src="assets/img/load.gif"></span></td>
                        <td>
                            <div class="progress progress-striped active" style="margin-top: 4px;">
                                <div id="progress' . $infoMegaDL['id'] . '" class="progress-bar"  role="progressbar" aria-valuemin="0" aria-valuemax="100" width="0%"></div>
                            </div>
                        </td>
                        <td>
                            <button type="button" onclick="deleteMegaDL(' . $infoMegaDL['id'] . ');" class="btn btn-sm btn-danger"><i class="glyphicon glyphicon-remove"></i></button>
                        </td>
                      </tr>';
            }?>
            </tbody>
        </table>
    </div>
    </br>
    <div class="row">
        <div class="col-lg-4">
            <div class="input-group">
                <input type="text" id="linkMegaDL" name="link" class="form-control" placeHolder="Link">
                <div class="input-group-btn btn-group">
                    <button type="button" onclick="addMegaDL();" class="btn btn-success">Add Link</button>
                </div>
            </div>
        </div>
        <div class="col-lg-offset-4">
            <a href="#settings"  data-toggle="modal" class="btn btn-default"><i class="glyphicon glyphicon-cog"></i></a>
            <a href="logout.php" class="btn btn-default">Logout</a>
        </div>
    </div>
    <div class="modal fade" id="settings" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title">Settings</h4>
                </div>
                <div class="modal-body">
                    ...
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary">Save changes</button>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="//code.jquery.com/jquery.js"></script>
<!-- Include all compiled plugins (below), or include individual files as needed -->
<script src="assets/js/bootstrap.min.js"></script>

<script src="assets/js/ajax.js"></script>
<script type="text/javascript">

    <?php
        foreach($listMegaDL as $infoMegaDL)
        {
            echo 'temp = ['.$infoMegaDL['id'].',0];';
            echo 'tableauListID.push(temp);';
        }
    ?>

</script>
</body>
</html>