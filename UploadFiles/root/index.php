<?php
$message = '';
if(isset($_GET['result'])) {
    $result = $_GET['result'];
    $message = 'Error';
    if($result == '1') {
        $message = 'Ok';
    }
}
$dirPath = 'root/uploads';
$files = scandir($dirPath);
?>
<!doctype html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>Document</title>
    </head>
    <body>

        <?php
        if($message!='') {
            ?>
            <h1><?= $message ?></h1>
            <!--<h1><?php echo $message; ?></h1>-->
            <?php
        }
        ?>
        
        <!-- sintaxis alternativa de php, al mezclar con html -->
        <?php if ($message!=''): ?>
            <!--<h1><?= $message ?></h1>
            <h1><?php echo $message; ?></h1>-->
        <?php endif; ?>
        
        <form action="test.php" method="post" enctype="multipart/form-data">
            <ul>
                <li>
                    <label for="folder">Folder:</label>
                    <input type="text" id="folder" name="folder" value="">
                </li>
                <li>
                    <label for="file">File:</label>
                    <input type="file" required id="file" name="file">
                </li>
                <li>
                    <label for="send">Send:</label>
                    <input type="submit" id="send" value="send">
                </li>
            </ul>
        </form>

        <ul>
            <?php
            foreach ($files as $file) {
                $filePath = $dirPath . '/' . $file;
                if (is_file($filePath)) {
                    ?>
                    <li><?= substr($file, 0) ?></li>
                    <?php
                }
            }
            ?>
        </ul>

    </body>
</html>