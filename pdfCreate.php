<?php
require('fpdf/fpdf.php');
include("db_conn.inc.php");

class PDF extends FPDF
{
// Page header
function Header()
{
    // Logo
    //$this->Image('logo.png',10,6,30);
    // Arial bold 15
    $this->SetFont('Arial','B',15);
    // Move to the right
    $this->Cell(80);
    // Title
    $this->Cell(30,10,'Journal',1,0,'C');
    // Line break
    $this->Ln(20);
}

// Page footer
function Footer()
{
    // Position at 1.5 cm from bottom
    $this->SetY(-15);
    // Arial italic 8
    $this->SetFont('Arial','I',8);
    // Page number
    $this->Cell(0,10,'Page '.$this->PageNo().'/{nb}',0,0,'C');
}
}

// Instanciation of inherited class
$pdf = new PDF();
$pdf->AliasNbPages();
$pdf->AddPage();
$pdf->SetFont('Times','',12);

$sql="SELECT * FROM `Publication` WHERE `type`=0" ;
$result = mysqli_query($link, $sql);
$i=1;
while ($pubRow = mysqli_fetch_assoc($result)){
    $line="$i. ";
    $i++;
    $authorQuery="SELECT * FROM `pub_author` CROSS JOIN `Author` ON `pub_author`.`author_id`=`Author`.`id`
    WHERE `pub_author`.`pub_id` = ".$pubRow['id']." ORDER BY `pub_author`.`author_order`";
    //echo$authorQuery;
    $authorResult=mysqli_query($link,$authorQuery);
    while($authorRow = mysqli_fetch_assoc($authorResult)){
        $line = $line.$authorRow['last_name'].",".$authorRow['first_name'];
        if($authorRow['isCorresponding'] == 1){
            $line=$line."*, ";
        }else{
            $line=$line.", ";
        }
    }
    $line=$line."(".$pubRow['year']."),\"".$pubRow['title'].",\"";

    $journalQuery="SELECT * FROM `Journal` WHERE `id`=".$pubRow['pub_id'];
    $journalResult = mysqli_query($link,$journalQuery);
    $journalRow = mysqli_fetch_assoc( $journalResult);
    $line=$line.$journalRow['title'].",";

    if($pubRow['volume'] != NILL){
        $line=$line."Vol. ".$pubRow['volume'].", ";
    }
    if($pubRow['issue'] != NILL){
        $line=$line."No. ".$pubRow['issue'].", ";
    }
    if($pubRow['month'] != NILL){
        $line=$line.$pubRow['month'].", ";
    }
    $line=$line.$pubRow['year'].",pp.".$pubRow['page'].".";

    $pdf->MultiCell(0,10,"$line",0,1);
}
// for($i=1;$i<=40;$i++)
//     $pdf->Cell(0,10,'Printing line number '.$i,0,1);
$pdf->Output();
?>