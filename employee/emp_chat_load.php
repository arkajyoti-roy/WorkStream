<?php
include '../conn.php';
session_start();

if (isset($_SERVER["REQUEST_METHOD"])) {

    $chat_proj = $_POST['chat_pr2'];
    $chat_sender = $_POST['chat_sender'];
    $chat_box = $_POST['chat_box'];

    move_uploaded_file($_FILES['file']['tmp_name'], "../zoom/" . $_FILES['file']['name']);
    $file =  $_FILES['file']['name'];

    $sql = "INSERT INTO `pro`.`chat` (`p_name`, `name`, `content`, `file`) VALUES ('$chat_proj', '$chat_sender', '$chat_box', '$file')";

    if (mysqli_query($conn, $sql)) {

        // echo "Success";


    } else {
        echo "Error: SORRY $sql";
    }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <form action="emp_chat.php" method="post" id="fool">
        <input type="text" name="chat_pr" value="<?php echo $chat_proj; ?>" style="display:none;">
        <button type="submit">Send</button>
    </form>


    <script type="text/javascript">
        window.onload = function() {
            document.getElementById("fool").submit();
        }
    </script>


</body>

</html>