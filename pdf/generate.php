<?php
error_reporting(0);

session_start();
if (($_SESSION["new_session_02"] || $_SESSION["new_session_03"]) == false) {
    header("location: ../log.php");
}
$servername = "localhost";
$username = "root";
$password = "";
$database = "pro";

$nm = $_SESSION['nm'];
$year = $_POST['year'];
$month = $_POST['month'];

$conn = mysqli_connect($servername, $username, $password, $database,);

// $data = mysqli_query($conn, "SELECT * FROM salary WHERE name = '$nm' AND ( SELECT * from salary WHERE year='$year' AND month='$month');");
$data = mysqli_query($conn, "SELECT * FROM salary WHERE name = '$nm' AND year = '$year' AND month = '$month';");


if ($total = mysqli_num_rows($data) > 0) {
    $j = 0;

    while ($result = mysqli_fetch_array($data)) {
        $net_salary =  $result['net_salary'];
        $mode = $result['mode'];
        $allowance = $result['allowance'];
        $allo_amount = $result['allo_amount'];
        $deduction = $result['deduction'];
        $ded_amount = $result['ded_amount'];
        $basic = $result['basic'];
        $total_allo = $result['total_allo'];
        $total_ded = $result['total_ded'];
        $dt = $result['dt'];
        $j++;
    }
}
 else {
    echo"No Result Found";
}

// $data = mysqli_query($conn, "SELECT * FROM salary WHERE name = '$nm' AND ( SELECT * from salary WHERE year='$year' AND month='$month');");
$data2 = mysqli_query($conn, "SELECT * FROM staff WHERE name = '$nm';");


if ($total2 = mysqli_num_rows($data2) > 0) {
    $k = 0;

    while ($result2 = mysqli_fetch_array($data2)) {
        $man =  $result2['man'];
        $deptm = $result2['deptm'];
        $empid = $result2['empid'];
        $img = $result2['img'];

        $k++;
    }
}
 else {
    echo"No Result Found";
}

require("fpdf.php");
$pdf = new FPDF();
if (isset($_POST['create'])) {

// $net_salary = $_POST['net_salary'];
// $mode = $_POST['mode'];


$pdf->AddPage();
$pdf->SetFont("Arial","B",12);
// $emr="../".$img;
$pdf->Cell(180,10,'', 0, 1, 'L');
$pdf->Cell(180,10,'', 0, 1, 'L');
$pdf->Image("../logo.png", 5, 5, 60, 30);
$pdf->Image('../'.$img, 160, 9, 20, 20);
$pdf->Cell(180,10,"Payment Slip for ".$month." ".$year, 0, 1, 'L');
$pdf->Cell(180,10,'', 0, 1, 'L');

$pdf->Cell(70,10,"Recepent",1,0);
$pdf->Cell(110,10,$nm,1,1);
$pdf->Cell(70,10,"Employee Id",1,0);
$pdf->Cell(110,10,$empid,1,1);
$pdf->Cell(70,10,"Role & Position",1,0);
$pdf->Cell(110,10,$man,1,1);
$pdf->Cell(70,10,"Department",1,0);
$pdf->Cell(110,10,$deptm,1,1);
$pdf->Cell(70,10,"Year",1,0);
$pdf->Cell(110,10,$year,1,1);
$pdf->Cell(70,10,"Month",1,0);
$pdf->Cell(110,10,$month,1,1);
$pdf->Cell(70,10,"Basic Amount",1,0);
$pdf->Cell(110,10,$basic,1,1);
$pdf->Cell(70,10,"Allowance For",1,0);
$pdf->Cell(110,10,$allowance,1,1);
$pdf->Cell(70,10,"Allowance Amount",1,0);
$pdf->Cell(110,10,$allo_amount,1,1);
$pdf->Cell(70,10,"Deduction For",1,0);
$pdf->Cell(110,10,$deduction,1,1);
$pdf->Cell(70,10,"Deduction Amount",1,0);
$pdf->Cell(110,10,$ded_amount,1,1);
$pdf->Cell(70,10,"Total Allowance",1,0);
$pdf->Cell(110,10,$total_allo,1,1);
$pdf->Cell(70,10,"Total Deduction",1,0);
$pdf->Cell(110,10,$total_ded,1,1);
$pdf->Cell(70,10,"Net Salary",1,0);
$pdf->Cell(110,10,$net_salary,1,1);
$pdf->Cell(70,10,"Mode",1,0);
$pdf->Cell(110,10,$mode,1,1);
$pdf->Cell(70,10,"Status",1,0);
$pdf->Cell(110,10,"Paid By ".$dt,1,1);

$pdf->Cell(140,10,"",0,0,'L');
$pdf->Cell(20,10,"Regards, Admin",0,1,'L');
$pdf->Cell(140,10,"",0,0,'L');
$pdf->Cell(20,10,"Arkajyoti Roy",0,1,'L');
$pdf->Image('sign.png', 140, 230, 60, 20);

$pdf->Output();
}
// generate.php (UTF-8)
