<?php

namespace App\Controller\Component;
use Cake\Controller\Component;

class MedicalHistoryComponent extends Component
{

    public function drawDoc($pdf, $data) {
        $pdf->setTitle($data['cat']['cat_name'].' Medical History');
        $this->header($pdf);
        $this->aboutCat($pdf, $data);
        //$this->chart($pdf, $data);
        //$this->bottom($pdf, $data);
    }

    public function header($pdf) {
        $pdf->SetFont('helvetica', 'B', 30);
        $pdf->SetAbsX(10);
        $pdf->SetAbsY(10);
        $pdf->cell(0,0,'CAT HEALTH RECORD',0,1,'C',false);

        $pdf->SetTextColor(256,0,0);
        $pdf->SetFont('helvetica', '', 22);
        $pdf->SetAbsX(10);
        $pdf->SetAbsY(22);
        $pdf->cell(0,0,'***KEEP FOR LIFE***',0,1,'C',false);
        $pdf->SetAbsX(10);
        $pdf->SetAbsY(31);
        $pdf->cell(0,0,'DO NOT DISCARD',0,1,'C',false);

        $pdf->SetTextColor(0,0,0);
        $pdf->SetFont('helvetica', 'U', 22);
        $pdf->SetAbsX(10);
        $pdf->SetAbsY(40);
        $pdf->cell(0,0,'Make a copy for your veterinarian',0,1,'C',false);
    }

    public function aboutCat($pdf, $data) {
        // Labels
        $pdf->SetFont('helvetica', 'B', 16);
        $pdf->SetAbsX(15);
        $pdf->SetAbsY(63);
        $pdf->cell(0,0,'NAME:',0,0,'L',false);

        $pdf->SetAbsX(90);
        $pdf->cell(0,0,'GENDER:',0,0,'L',false);

        $pdf->SetAbsX(150);
        $pdf->cell(0,0,'DOB:',0,0,'L',false);

        $pdf->SetAbsX(15);
        $pdf->SetAbsY(84);
        $pdf->cell(0,0,'DESCRIPTION:',0,0,'L',false);

        // Values
        $pdf->SetFont('helvetica', '', 15);
        /*$pdf->SetAbsX(36);
        $pdf->SetAbsY(66);
        $pdf->cell(50,0,$data['cat']['cat_name'],0,0,'L',false);*/
        $pdf->MultiCell(50,20,$data['cat']['cat_name'],0,'C',false,0,36,63,true,0,false,true,0,'C',false);

        $pdf->SetAbsX(119);
        $pdf->cell(30,0,$data['cat']['gender'],0,0,'L',false);

        $pdf->SetAbsX(167);
        $pdf->cell(30,0,$data['cat']['dob'],0,0,'L',false);
    }

}

