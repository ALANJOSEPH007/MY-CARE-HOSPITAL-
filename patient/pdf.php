<?php
require_once 'E:\xampp\htdocs\mchos\fpdf.php';
session_start();
$con=mysqli_connect("localhost","root","","mchos");    
if($con===false){
   die("ERROR: Could not connect.".mysqli_connect_error());
}


if(isset($_POST['btn_pdf']))

  {
     $id=$_POST['btn_pdf'];
    $sql="select * from `tbl_prescrip` where pre_id='$id'";

    $res=mysqli_query($con,$sql);
    
class PDF extends FPDF{
function Header(){
  $this->SetFont('Arial','B',15);
  $this->Cell(12);
  $this->Cell(150,10,' MYCARE',0,1,'C');
  $this->SetFont('Arial','B',15);
  $this->Cell(180,5,' Kottayam',0,1,'C');
  $this->Cell(180,5,' Kerala',0,1,'C');
  $this->Cell(180,5,' mycarehospital2022@gmail.com',0,1,'C');
$this->Ln(5);
}
function Footer(){
  $this->SetY(-15);
  $this->SetFont('Arial','B',15);
  $this->Cell(0,10,'Page'.$this->PageNo()."/{pages}",0,0,'C');

}
}






    $pdf = new FPDF('p','mm','a3');
    // $pdf->SetFont('Arial','B',11);
    $pdf->AddPage();
    $pdf->SetFont('Arial','B',20);
    $pdf->Cell(215,5,'MYCARE',10,10,'C');
    $pdf->Ln(3);
    $pdf->Cell(215,5,'Eranakulam,Kerala',10,10,'C');
    $pdf->Ln(3);
    $pdf->Cell(215,5,'mycarehospital2022@gmail.com',10,10,'C');
    $pdf->Ln(5);
    $pdf->SetFont('Arial','B',15);
    $pdf->Cell(215,5,'Prescription',10,10,'C');
    // $pdf->Line(10,47,200,47);
    $pdf->Ln(7);
    // $pdf->Line(10,36,200,36);
    $pdf->Cell('100','10','Patient name ','0','0');
    while($row=mysqli_fetch_assoc($res)) {
      $pdf->Cell('40','10',': '.$row['p_name'],'0','1');

      $pdf->Cell('100','10','Doctor name ','0','0');

      $pdf->Cell('40','10',': '.$row['doc_name'],'0','1');

      $pdf->Cell('100','10','Disease ','0','0');
      $pdf->Cell('40','10',': '.$row['disease'],'0','1');

      $pdf->Cell('100','10','Allergy ','0','0');
      $pdf->Cell('40','10',': '.$row['Allergy'],'0','1');

      $pdf->Cell('100','10','Prescription ','0','0');
      $pdf->Cell('40','10',': '.$row['prescription'],'0','1','1');
    
      $pdf->Ln(10);

      $pdf->Cell(140,5,'',0,0);
      $pdf->Cell(80,5,' Prescribed  by DR:'.$row['doc_name'],0,1,'C');

  


    
    
    
    
    
   

    }
    
    $pdf->Output();
  }

//#####################################################################################
 
?>