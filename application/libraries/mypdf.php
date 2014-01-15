<?php

/**
 * Description of myPdf
 *
 * @author Rodrigo Santellan <rodrigo.santellan at inswitch.us>
 */
class myPdf extends FPDF
{
  
  // Page header
  function Header()
  {
      /*
      var_dump(getcwd());
      die;
      */
      // Logo
      //$this->Image('assets/images/roche/bg_header_top.jpg',20,6,180);
      $this->Image('assets/images/roche/header_top_pdf.jpg', 15, null, 180);
      // Arial bold 15
      //$this->SetFont('Arial','B',15);
      // Move to the right
      //$this->Cell(80);
      // Title
      //$this->Cell(30,10,'Reporte de cantidad de pines generados por beneficio',1,0,'C');
      // Line break
      $this->Ln(10);
  }  
  
  function loadUser($user)
  {
    $this->AddFont('helveticab');
    $this->AddFont('helvetica');
    $this->SetFont('helvetica', 'B', 16);
    $this->SetTextColor(0, 102, 204);
    $this->AddPage('P', "A4");
    $this->Cell(200, 20, utf8_decode("Ficha de Usuario"), 0);
    $this->Ln();
    $this->SetTextColor(0, 0, 0);
    $this->SetFont('helvetica', 'B', 12);
    $this->Cell(40,10,utf8_decode("Nombre:"),0);
    $this->Cell(40,10,"",0);
    $this->SetFont('helvetica', '', 12);
    $this->Cell(40,10,utf8_decode($user->name),0);
    $this->Ln();
    $this->SetFont('helvetica', 'B', 12);
    $this->Cell(40,10,utf8_decode("Apellido:"),0);
    $this->Cell(40,10,"",0);
    $this->SetFont('helvetica', '', 12);
    $this->Cell(40,10,utf8_decode($user->lastname),0);
    $this->Ln();
    $this->SetFont('helvetica', 'B', 12);
    $this->Cell(40,10,utf8_decode("Cédula de Identidad:"),0);
    $this->Cell(40,10,"",0);
    $this->SetFont('helvetica', '', 12);
    $this->Cell(40,10,utf8_decode($user->ci),0);
    $this->Ln();
    $this->SetFont('helvetica', 'B', 12);
    $this->Cell(40,10,utf8_decode("Télefono:"),0);
    $this->Cell(40,10,"",0);
    $this->SetFont('helvetica', '', 12);
    $this->Cell(40,10,utf8_decode($user->phone),0);
    $this->Ln();
    $this->SetFont('helvetica', 'B', 12);
    $this->Cell(40,10,utf8_decode("Mutualista:"),0);
    $this->Cell(40,10,"",0);
    $this->SetFont('helvetica', '', 12);
    $this->Cell(40,10,utf8_decode($user->center),0);
    $this->Ln();
  }
  
  function loadFile($file, $add_page = true)
  {
    $this->AddFont('helveticab');
    $this->AddFont('helvetica');
    if($add_page)
    {
        $this->AddPage('P', "A4");
    }
    //$this->SetFont('helvetica', 'B', 20);
    //$this->SetTextColor(0, 102, 204);
    //$this->Cell(200, 20, utf8_decode("Certificado"), 0);
    
    $this->SetTextColor(0, 0, 0);
    
    $this->SetFont('helvetica', 'B', 12);
    $this->Cell(40,10,utf8_decode("Fecha:"),0);
    $this->Cell(40,10,"",0);
    $this->SetFont('helvetica', '', 12);
    $this->Cell(40,10,my_format_mysql_date($file->fecha_ingreso),0);
    $this->Ln();
    $this->SetFont('helvetica', 'B', 12);
    $this->Cell(40,10,"Certificado:",0);
    $this->Cell(40,10,"",0);
    $this->Ln();
    $this->Image("assets/uploads/roche/".$file->filename, null, null, -200);
  }
  
  // Load data
  function LoadData($file)
  {
      // Read file lines
      $lines = file($file);
      $data = array();
      foreach($lines as $line)
          $data[] = explode(';',trim($line));
      return $data;
  }

  // Simple table
  function BasicTable($header, $data)
  {
      // Header
      foreach($header as $col)
          $this->Cell(40,7,$col,1);
      $this->Ln();
      // Data
      foreach($data as $row)
      {
          foreach($row as $col)
              $this->Cell(40,6,$col,1);
          $this->Ln();
      }
  }

  // Better table
  function ImprovedTable($header, $data)
  {
      // Column widths
      $w = array(40, 35, 40);
      // Header
      for($i=0;$i<count($header);$i++)
          $this->Cell($w[$i],7,$header[$i],1,0,'C');
      $this->Ln();
      // Data
      foreach($data as $row)
      {
          $this->Cell($w[0],6,$row[0],'LR');
          $this->Cell($w[1],6,$row[1],'LR');
          $this->Cell($w[2],6,number_format($row[2]),'LR',0,'R');
          $this->Ln();
      }
      // Closing line
      $this->Cell(array_sum($w),0,'','T');
  }

  // Colored table
  function FancyTable($header, $data)
  {
      // Colors, line width and bold font
      $this->SetFillColor(0,184,46);
      $this->SetTextColor(255);
      $this->SetDrawColor(128,0,0);
      $this->SetLineWidth(.3);
      $this->SetFont('','B');
      // Header
      $w = array(80, 80, 30);
      for($i=0;$i<count($header);$i++)
          $this->Cell($w[$i],7,$header[$i],1,0,'C',true);
      $this->Ln();
      // Color and font restoration
      $this->SetFillColor(224,235,255);
      $this->SetTextColor(0);
      $this->SetFont('');
      // Data
      $fill = false;
      foreach($data as $row)
      {
          $str = $row[1];
          $aux = (strlen($str) > 36) ? substr($str,0,33).'...' : $str;
          $str1 = $row[0];
          $aux1 = (strlen($str1) > 36) ? substr($str1,0,33).'...' : $str1;
          $this->Cell($w[0],12,$aux1,'LR',0,'C',$fill);
          $this->Cell($w[1],12,$aux,'LR',0,'C',$fill);
          $this->Cell($w[2],12,number_format($row[2]),'LR',0,'R',$fill);
          $this->Ln();
          $fill = !$fill;
      }
      // Closing line
      $this->Cell(array_sum($w),0,'','T');
  }
  
  
  // Colored table
  function FancyTableUserPines($header, $data)
  {
      // Colors, line width and bold font
      $this->SetFillColor(0,184,46);
      $this->SetTextColor(255);
      $this->SetDrawColor(128,0,0);
      $this->SetLineWidth(.3);
      $this->SetFont('','B');
      // Header
      $w = array(30, 60, 60, 30);
      for($i=0;$i<count($header);$i++)
          $this->Cell($w[$i],7,$header[$i],1,0,'C',true);
      $this->Ln();
      // Color and font restoration
      $this->SetFillColor(224,235,255);
      $this->SetTextColor(0);
      $this->SetFont('');
      // Data
      $fill = false;
      foreach($data as $row)
      {
          $str = $row[1];
          $aux = (strlen($str) > 36) ? substr($str,0,33).'...' : $str;
          $str1 = $row[2];
          $aux1 = (strlen($str1) > 36) ? substr($str1,0,33).'...' : $str1;
          $this->Cell($w[0],12,$row[0],'LR',0,'C',$fill);
          $this->Cell($w[1],12,$aux,'LR',0,'C',$fill);
          $this->Cell($w[2],12,$aux1,'LR',0,'C',$fill);
          $this->Cell($w[3],12,number_format($row[3]),'LR',0,'R',$fill);
          $this->Ln();
          $fill = !$fill;
      }
      // Closing line
      $this->Cell(array_sum($w),0,'','T');
  }
  
  // Colored table
  function FancyTableReportPerEvent($header, $data)
  {
      // Colors, line width and bold font
      $this->SetFillColor(0,184,46);
      $this->SetTextColor(255);
      $this->SetDrawColor(128,0,0);
      $this->SetLineWidth(.3);
      $this->SetFont('','B');
      // Header
      $w = array(90, 50, 40);
      for($i=0;$i<count($header);$i++)
          $this->Cell($w[$i],7,$header[$i],1,0,'C',true);
      $this->Ln();
      // Color and font restoration
      $this->SetFillColor(224,235,255);
      $this->SetTextColor(0);
      $this->SetFont('');
      // Data
      $fill = false;
      foreach($data as $row)
      {
          $str = $row[1];
          $aux = (strlen($str) > 36) ? substr($str,0,33).'...' : $str;
          $str1 = $row[2];
          $aux1 = (strlen($str1) > 36) ? substr($str1,0,33).'...' : $str1;
          $this->Cell($w[0],12,$row[0],'LR',0,'C',$fill);
          $this->Cell($w[1],12,$aux,'LR',0,'C',$fill);
          $this->Cell($w[2],12,$aux1,'LR',0,'C',$fill);
          //$this->Cell($w[3],12,number_format($row[3]),'LR',0,'R',$fill);
          $this->Ln();
          $fill = !$fill;
      }
      // Closing line
      $this->Cell(array_sum($w),0,'','T');
  }
}


