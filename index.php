<?php include_once 'function.php'; ?>
<!DOCTYPE html>
<html>
<head>
    <title>MegaDL</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Bootstrap -->
    <link href="assets/css/bootstrap.min.css" rel="stylesheet" media="screen">
</head>
<body>
<div class="well">
    <table class="table">
        <h1>MegaDL</h1>
        <thead>
            <tr>
                <td style="font-weight: bold;">#</td>
                <td>Name</td>
                <td>Link</td>
                <td>Progress</td>
                <td>Options</td>
            </tr>
        </thead>
        <tbody>
        <?php
        $listMegaDL = getListMegaDL();

        print_r($listMegaDL);

        foreach($listMegaDL as $infoMegaDL)
        {
            echo '<tr>
                    <td style="font-weight: bold;">' . $infoMegaDL['id'] . '</td>
                    <td>' . $infoMegaDL['fileName'] . '</td>
                    <td>' . $infoMegaDL['link'] . '</td>
                    <td>
                        <div class="progress progress-striped active">
                            <div id="progress' . $infoMegaDL['id'] . '" class="progress-bar"  role="progressbar" aria-valuemin="0" aria-valuemax="100" style="width: 0%"></div>
                        </div>
                    </td>
                    <td>
                        <button type="button" onclick="pauseMegaDL(' . $infoMegaDL['id'] . ');" class="btn"><i class="glyphicon glyphicon-pause"></i></button>
                        <button type="button" onclick="deleteMegaDL(' . $infoMegaDL['id'] . ');" class="btn btn-danger"><i class="glyphicon glyphicon-remove"></i></button>
                    </td>
                  </tr>';
        }?>
        </tbody>
    </table>
    </br>
    <div class="form-inline">
        <div class="form-group">
            <input type="text" id="linkMegaDL" name="link" class="form-control" placeHolder="Link">
        </div>
        <button type="button" onclick="addMegaDL();" class="btn btn-success">Add Link</button>
    </div>
</div>

<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="//code.jquery.com/jquery.js"></script>
<!-- Include all compiled plugins (below), or include individual files as needed -->
<script src="assets/js/bootstrap.min.js"></script>

<script src="assets/js/ajax.js"></script>
</body>
</html>