<?php
include '../conn.php';
session_start();
if ($_SESSION["new_session_03"] == false) {
    header("location: log.php");
}
// error_reporting(0);
$email2 = $_SESSION["email2"];

$chat_id = $_POST['chat_id'];
$chat_pr = $_POST['chat_pr'];

$nm = $_SESSION['nm'];
$img = $_SESSION['img'];

$data3 = mysqli_query($conn, "SELECT * FROM chat where p_name = '$chat_pr';");
$data37 = mysqli_query($conn, "SELECT * FROM chat where p_name = '$chat_pr';");

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">
    <link rel="icon" href="loge.png">
    <title>Project Chat</title>

    <link href="https://unpkg.com/tailwindcss@2.2.19/dist/tailwind.min.css" rel=" stylesheet">
    <!--Replace with your tailwind.css once created-->

    <!--Regular Datatables CSS-->
    <link href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css" rel="stylesheet">
    <!--Responsive Extension Datatables CSS-->
    <link href="https://cdn.datatables.net/responsive/2.2.3/css/responsive.dataTables.min.css" rel="stylesheet">

</head>

<body>
    <nav>
        <div class="logo-name">
            <div class="logo-image">
                <img src="logo1.png" alt="p8">
                <!-- <img src="loge.png" alt="" id="p9"> -->
            </div>
            <div class="logo-image2">
                <img src="logo2.png" alt="" id="p9">
                <!-- <img src="loge.png" alt="" id="p9"> -->
            </div>

        </div>

        <div class="menu-items">
            <ul class="nav-links">
                <li><a href="emp_task.php">
                        <i class="uil uil-check-square" style="color: blue;"></i>
                        <span class="link-name" style="color: blue;">Task</span>
                    </a></li>
                <li><a href="emp_project.php">
                        <i class="uil uil-file-edit-alt"></i>
                        <span class="link-name">Project</span>
                    </a></li>
                <li><a href="emp_performance.php">
                        <i class="uil uil-user-check"></i>
                        <span class="link-name">Performance</span>
                    </a></li>
                <li><a href="emp_salary.php">
                        <i class="uil uil-rupee-sign"></i>
                        <span class="link-name">Salary</span>
                    </a></li>
                <li><a href="emp_leave.php">
                        <i class="uil uil-telegram-alt"></i>
                        <span class="link-name">Apply for Leave</span>
                    </a></li>
                <li><a href="emp_holiday.php">
                        <i class="uil uil-calendar-alt"></i>
                        <span class="link-name">calander</span>
                    </a></li>
                <li><a href="emp_notice.php">
                        <i class="uil uil-bell"></i>
                        <span class="link-name">Notice</span>
                    </a></li>
                <li><a href="emp_feedback.php">
                        <i class="uil uil-comment-alt-download"></i>
                        <span class="link-name">Feedback</span>
                    </a></li>
            </ul>

            <br><br><br>
            <br><br><br>

            <ul class="logout-mode">
                <li><a href="out.php">
                        <i class="uil uil-signout"></i>
                        <span class="link-name">Logout</span>
                    </a></li>
                </li>
            </ul>
        </div>
    </nav>

    <section class="dashboard">
        <div class="top">
            <i class="uil uil-bars sidebar-toggle"></i>

            <div class="search-box">

                <input type="text" readonly style="border-color: #fff;" required>

            </div>

            <div class="nm">
                <h4 class="re"> <?php echo $nm ?></h4>
                <h5 class="er">Employee</h5>
            </div>

            <a href="emp_personal.php"> <img src="../<?php echo $img; ?>" height="40px" width="45px" alt=""> </a>
        </div>

        <div class="dash-content">
            <div class="overview">
                <div class="title" style="margin: -44px 0 30px 0; position:fixed; z-index:1;background-color:#fff;width:100%;padding-bottom:8px;">
                    <i class="uil uil-check-square"></i>
                    <span class="text">Group Chat <span style="color: #667eea;"><?php echo $chat_pr ?></span></span>
                </div>
            </div>
        </div>

        <div class="reverse-2">
            <?php
            if ($total3 = mysqli_num_rows($data3) > 0) {
                $k = 0;

                while ($result3 = mysqli_fetch_array($data3)) {
            ?>
                    <tr class="">
                        <div class="chat_div">

                            <p><?php echo $result3['content']; ?></p>
                            <br>
                            <p><a href="../zoom/<?php echo $result3['file']; ?>" download><?php echo $result3['file']; ?></a></p>
                            <br>
                            <p style="font-size:10px;font-weight:bold;float:right;">Comment By <?php echo $result3['name']; ?></p><br>
                            <p style="font-size:10px;font-weight:bold;float:right;"><?php echo $result3['time']; ?></p><br>


                        </div>
                <?php
                    $k++;
                }
            } else {
                echo "no FoUnD";
            }
                ?>
        </div>


        <div class="reverse-3">
            <p id="rendi"></p>

            <form action="emp_chat_load.php" method="POST" class="chat_mode" enctype="multipart/form-data">
                <input type="text" placeholder="Enter your Message" name="chat_pr2" value="<?php echo $chat_pr; ?>" style="display:none;">
                <input type="text" placeholder="Enter your Message" name="chat_sender" value="<?php echo $nm; ?>" style="display:none;">
                <input type="text" placeholder="Enter your Message" name="chat_box">
                <input type="file" name="file" src="<i class='bi bi-file-arrow-up'></i>" style="display:none;" id="foodi">
                <img src="file-arrow-up.svg" alt="" style="display:inline;height:36px;cursor:pointer;" onclick="goru();">
                <button type="submit">Send</button>
            </form>
        </div>

        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>


        <script>
            function goru() {
                document.getElementById('foodi').click();
                var djsnake = document.getElementById('foodi').value;
                document.getElementById('rendi').value = djsnake;

                $('#foodi').change(function() {
                    const selectedFile = this.files[0];
                    if (selectedFile) {
                        $('#rendi').text(selectedFile.name);
                    }
                });
            }
        </script>
        <style>
            body::-webkit-scrollbar {
                width: 0px;
                height: 0px;
            }

            .re {
                font-size: 18px;
            }

            .er {
                font-size: 12px;
                color: gray;
            }

            .top img {
                width: 45px;
                height: 45px;
                border-radius: 50%;
            }

            li {
                margin-left: -33px;

            }

            a {
                margin-top: -3px;
                color: rgba(var(--bs-link-color-rgb), var(--bs-link-opacity, 1));
                text-decoration: underline;
            }

            nav .menu-items {
                margin-top: 14px;
                height: calc(100% - 90px);
                display: flex;
                flex-direction: column;
                justify-content: space-between;
            }


            #p9 {
                height: 121px;
                width: 109px;
                border-radius: 0px;
                margin-top: -40px;
                margin-bottom: -40px;
                margin-left: 15px;
            }


            nav .logo-image img {
                width: 40px;
                object-fit: cover;
                border-radius: 50%;
            }

            #rendi {
                color: #4a5568;
                font-size: 13px;
                width: 200px;
                margin-left: 52.6%;
                text-align: center;
            }

            ::-webkit-file-upload-button {
                display: none;
            }

            ::file-selector-button {
                display: none;
            }

            input[type="file"] {
                color: transparent;
            }

            .reverse-1 {
                margin-top: -60px;

            }

            .reverse-2 {
                margin-top: 20px;
                margin-bottom: 60px;
                width: 60%;
            }

            .reverse-3 {
                bottom: 0;
                margin-bottom: 0px;
                padding-bottom: 10px;
                position: fixed;
                display: block;
                width: 95%;
                background-color: #fff;
            }

            .chat_mode {
                position: sticky;
                z-index: 1;
                width: 100%;
            }

            .chat_mode input {
                border-radius: 8px;
                height: 40px;
                width: 58%;
                border: 2px solid black;
                padding-left: 8px;
            }

            .chat_mode button {
                background-color: skyblue;
                border-radius: 8px;
                padding: 8.5px 2%;
            }

            .chat_div {
                border-radius: 8px;
                background-color: skyblue;
                padding: 0.5%;
                border: none;
                margin: 2%;
                width: 90%;
            }

            .vibrant-y {
                background: -webkit-linear-gradient(top, rgb(140, 217, 140, 0.32) 20%, rgb(51, 204, 204) 70%);
                border: none;
                border-radius: 4px;
                width: 73px;
                cursor: pointer;
                padding: 1%;
                margin: 1%;
            }

            .menu-items li a {
                margin-left: 30px;
                display: flex;
                align-items: center;
                height: 50px;
                text-decoration: none;
                position: relative;
            }

            /*Overrides for Tailwind CSS */

            /*Form fields*/
            .dataTables_wrapper select,
            .dataTables_wrapper .dataTables_filter input {
                color: #4a5568;
                /*text-gray-700*/
                padding-left: 1rem;
                /*pl-4*/
                padding-right: 1rem;
                /*pl-4*/
                padding-top: .5rem;
                /*pl-2*/
                padding-bottom: .5rem;
                /*pl-2*/
                line-height: 1.25;
                /*leading-tight*/
                border-width: 2px;
                /*border-2*/
                border-radius: .25rem;
                border-color: #edf2f7;
                /*border-gray-200*/
                background-color: #edf2f7;
                /*bg-gray-200*/
            }

            /*Row Hover*/
            table.dataTable.hover tbody tr:hover,
            table.dataTable.display tbody tr:hover {
                background-color: #ebf4ff;
                /*bg-indigo-100*/
            }

            /*Pagination Buttons*/
            .dataTables_wrapper .dataTables_paginate .paginate_button {
                font-weight: 700;
                /*font-bold*/
                border-radius: .25rem;
                /*rounded*/
                border: 1px solid transparent;
                /*border border-transparent*/
            }

            /*Pagination Buttons - Current selected */
            .dataTables_wrapper .dataTables_paginate .paginate_button.current {
                color: #fff !important;
                /*text-white*/
                box-shadow: 0 1px 3px 0 rgba(0, 0, 0, .1), 0 1px 2px 0 rgba(0, 0, 0, .06);
                /*shadow*/
                font-weight: 700;
                /*font-bold*/
                border-radius: .25rem;
                /*rounded*/
                background: #667eea !important;
                /*bg-indigo-500*/
                border: 1px solid transparent;
                /*border border-transparent*/
            }

            /*Pagination Buttons - Hover */
            .dataTables_wrapper .dataTables_paginate .paginate_button:hover {
                color: #fff !important;
                /*text-white*/
                box-shadow: 0 1px 3px 0 rgba(0, 0, 0, .1), 0 1px 2px 0 rgba(0, 0, 0, .06);
                /*shadow*/
                font-weight: 700;
                /*font-bold*/
                border-radius: .25rem;
                /*rounded*/
                background: #667eea !important;
                /*bg-indigo-500*/
                border: 1px solid transparent;
                /*border border-transparent*/
            }

            /*Add padding to bottom border */
            table.dataTable.no-footer {
                border-bottom: 1px solid #e2e8f0;
                /*border-b-1 border-gray-300*/
                margin-top: 0.75em;
                margin-bottom: 0.75em;
            }

            /*Change colour of responsive icon*/
            table.dataTable.dtr-inline.collapsed>tbody>tr>td:first-child:before,
            table.dataTable.dtr-inline.collapsed>tbody>tr>th:first-child:before {
                background-color: #667eea !important;
                /*bg-indigo-500*/
            }
        </style>

        <!-- jQuery -->
        <script type="text/javascript" src="https://code.jquery.com/jquery-3.4.1.min.js"></script>

        <!--Datatables -->
        <script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
        <script src="https://cdn.datatables.net/responsive/2.2.3/js/dataTables.responsive.min.js"></script>
        <script>
            $(document).ready(function() {

                var table = $('#example').DataTable({
                        responsive: true
                    })
                    .columns.adjust()
                    .responsive.recalc();
            });
        </script>

    </section>
</body>

</html>