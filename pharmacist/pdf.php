<?php
    
ob_end_clean();
require('pdf_generator/fpdf.php');
include'../conn.php';

if(isset($_GET['daily'])){
$sql = "SELECT *FROM drug";
  
// Instantiate and use the FPDF class 
$pdf = new FPDF();
  
//Add a new page
$pdf->AddPage(); 
// Set the font for the text
$pdf->SetFont('Arial', 'B', 18);
$pdf->Cell(70);  
// Prints a cell with given text 
$pdf->Cell(50,20,'Arba Minch Nech Sar Primary Hospital',0,0,'C');
// Line break
$pdf->Ln(20);
$pdf->Cell(70);
// Prints a cell with given text 
$pdf->Cell(50,0,'Daily Drug Report  ( '.date("Y-m-d")." ) ",0,0,'C');
$pdf->Ln(20);
$width_cell=array(35,28,29,60);
$pdf->SetFont('Arial','B',13);

//Background color of header//
$pdf->SetFillColor(193,229,252);

// Header starts /// 
//First header column //
$pdf->Cell($width_cell[0],10,'Drug Name',1,0,'C',true);
//Second header column//
$pdf->Cell($width_cell[1],10,'Batch',1,0,'L',true);
//Third header column//
$pdf->Cell($width_cell[2],10,'Dosage',1,0,'L',true);
//Third header column//
$pdf->Cell($width_cell[3],10,'Available Drug Number',1,1,'L',true); 
//// header ends ///////

$pdf->SetFont('Arial','',12);
//Background color of header//
$pdf->SetFillColor(235,236,236); 
//to give alternate background fill color to rows// 
$fill=false;

/// each record is one row  ///
foreach ($conn->query($sql) as $row) {
$pdf->Cell($width_cell[0],10,$row['dname'],1,0,'C',$fill);
$pdf->Cell($width_cell[1],10,$row['bno'],1,0,'L',$fill);
$pdf->Cell($width_cell[2],10,$row['dosage'],1,0,'L',$fill);
$pdf->Cell($width_cell[3],10,$row['tnum'],1,1,'L',$fill);
//to give alternate background fill  color to rows//
$fill = !$fill;
}

$qry_to = mysqli_query($conn, "SELECT *FROM orders WHERE ordered_date = '".date("Y-m-d")."'"); 
$pdf->Ln(10);
$pdf->Cell(70);
$pdf->SetFont('Arial','B',13);
// Prints a cell with given text 
$pdf->Cell(8,0,'Total Ordered Drug : '.mysqli_num_rows($qry_to),0,0,'R');

$qry_1 = mysqli_query($conn, "SELECT *FROM orders WHERE app_date = '".date("Y-m-d")."' AND status = 'Approved'"); 
$pdf->Ln(10);
$pdf->Cell(70);
$pdf->SetFont('Arial','B',13);
// Prints a cell with given text 
$pdf->Cell(1,0,'Total sold Drug  : '.mysqli_num_rows($qry_1),0,0,'R');
  
// return the generated output
$pdf->Output();

}

if(isset($_GET['stud-id'])){

	$sql = mysqli_query($conn, "SELECT student.stud_id, student.fname, student.mname, student.lname, student.sex, student.age, student.phone, student.address, student.entry, student.dep, student.level, student.status, department.dep_id, department.dep_name, department.dep_name_opt FROM student JOIN department ON student.dep = department.dep_id AND student.stud_id = '".$_GET['stud-id']."'");

	// Instantiate and use the FPDF class 
$pdf = new FPDF();
  
//Add a new page
$pdf->AddPage();
$pdf->Image('../logo.JPG',10,10,200);  
// Set the font for the text
$pdf->SetFont('Arial', 'B', 18);
$pdf->Cell(70);  
// Prints a cell with given text 
$pdf->Cell(50,20,'Mirab Abaya Construction and Industrial College',0,0,'C');

// Line break
$pdf->Ln(18);
$pdf->Cell(70); 
// Prints a cell with given text 
$pdf->Cell(50,5,'Office of Registrar',0,0,'C');
// Line break
$pdf->Ln(10);
$pdf->Cell(70);
// Prints a cell with given text 
$pdf->Cell(50,5,'Student Profile',0,0,'C');
$pdf->Ln(20);


$row = mysqli_fetch_array($sql);

// Set the font for the text
$pdf->SetFont('Arial', 'B', 14);
// Prints a cell with given text 
$pdf->Cell(5);
$pdf->Cell(50,0,'ID :',0,0,'L');
$pdf->Cell(-30);
$pdf->SetFont('Arial', 'i', 14);
$pdf->Cell(10,0,$row['stud_id'],0,0,'L');
$pdf->Ln(10);
$pdf->Cell(5);
$pdf->SetFont('Arial', 'B', 14);
$pdf->Cell(50,0,'Name :',0,0,'L');
$pdf->Cell(-30);
$pdf->SetFont('Arial', 'i', 14);
$pdf->Cell(10,0,$row['fname']." ".$row['mname']." ".$row['lname'],0,0,'L');
$pdf->Ln(10);
$pdf->Cell(5);
$pdf->SetFont('Arial', 'B', 14);
$pdf->Cell(50,0,'Gender :',0,0,'L');
$pdf->Cell(-29);
$pdf->SetFont('Arial', 'i', 14);
$pdf->Cell(10,0,$row['sex'],0,0,'L');
$pdf->Ln(10);
$pdf->Cell(5);
$pdf->SetFont('Arial', 'B', 14);
$pdf->Cell(50,0,'Age :',0,0,'L');
$pdf->Cell(-30);
$pdf->SetFont('Arial', 'i', 14);
$pdf->Cell(10,0,$row['age'],0,0,'L');
$pdf->Ln(10);
$pdf->Cell(5);
$pdf->SetFont('Arial', 'B', 14);
$pdf->Cell(50,0,'Phone :',0,0,'L');
$pdf->Cell(-30);
$pdf->SetFont('Arial', 'i', 14);
$pdf->Cell(10,0,$row['phone'],0,0,'L');
$pdf->Ln(10);
$pdf->Cell(5);
$pdf->SetFont('Arial', 'B', 14);
$pdf->Cell(50,0,'Address :',0,0,'L');
$pdf->Cell(-24);
$pdf->SetFont('Arial', 'i', 14);
$pdf->Cell(10,0,$row['address'],0,0,'L');
$pdf->Ln(10);
$pdf->Cell(5);
$pdf->SetFont('Arial', 'B', 14);
$pdf->Cell(50,0,'Entry :',0,0,'L');
$pdf->Cell(-30);
$pdf->SetFont('Arial', 'i', 14);
$pdf->Cell(10,0,$row['entry'],0,0,'L');
$pdf->Ln(10);
$pdf->Cell(5);
$pdf->SetFont('Arial', 'B', 14);
$pdf->Cell(50,0,'Department :',0,0,'L');
$pdf->Cell(-18);
$pdf->SetFont('Arial', 'i', 14);
$pdf->Cell(10,0,$row['dep_name'],0,0,'L');
$pdf->Ln(10);
$pdf->Cell(5);
$pdf->SetFont('Arial', 'B', 14);
$pdf->Cell(50,0,'Admitted Level :',0,0,'L');
$pdf->Cell(-10);
$pdf->SetFont('Arial', 'i', 14);
$pdf->Cell(10,0,$row['level'],0,0,'L');
// return the generated output
$pdf->Output();
}
  
?>