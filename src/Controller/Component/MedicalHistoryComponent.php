<?php

namespace App\Controller\Component;
use Cake\Controller\Component;

class MedicalHistoryComponent extends Component
{

    public function drawDoc($pdf, $data) {
        $pdf->setTitle($data['cat']['cat_name'].' Medical History');
        $this->header($pdf);
        $this->aboutCat($pdf, $data);
        $this->table($pdf, $data);
        $this->bottom($pdf, $data);
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

    public function table($pdf, $data) {
        // Header
        $pdf->SetFont('helvetica', 'B', 15);
        $pdf->SetFillColor(173,80,125);

        $pdf->SetAbsX(9);
        $pdf->SetAbsY(97);
        $pdf->cell(33,8,'FVRCP',1,0,'C',true);

        $pdf->SetAbsX(42);
        $pdf->cell(33,8,'DEWORM',1,0,'C',true);

        $pdf->SetAbsX(75);
        $pdf->cell(33,8,'FLEA',1,0,'C',true);

        $pdf->SetAbsX(108);
        $pdf->cell(33,8,'RABIES',1,0,'C',true);

        $pdf->SetAbsX(141);
        $pdf->cell(60,8,'OTHER',1,0,'C',true);

        // FVRCP values
        $pdf->SetFont('helvetica','',13);
        $startingY = 105;

        $fvrcp_size = sizeof($data['fvrcp']);
        for ($i = 0; $i < 6; $i++) {
            $pdf->SetAbsX(9);
            $pdf->SetAbsY($startingY + ($i * 9));
            $pdf->cell(33,9,$data['fvrcp'][$i],1,1,'C',false);
        }

        // Deworm values
        $startingY = 105;

        $fvrcp_size = sizeof($data['deworm']);
        for ($i = 0; $i < 6; $i++) {
            $pdf->SetAbsX(42);
            $pdf->SetAbsY($startingY + ($i * 9));
            $pdf->cell(33,9,$data['deworm'][$i],1,1,'C',false);
        }

        // Flea values
        $startingY = 105;

        $fvrcp_size = sizeof($data['flea']);
        for ($i = 0; $i < 6; $i++) {
            $pdf->SetAbsX(75);
            $pdf->SetAbsY($startingY + ($i * 9));
            $pdf->cell(33,9,$data['flea'][$i],1,1,'C',false);
        }

        // Rabies values
        $startingY = 105;

        $fvrcp_size = sizeof($data['rabies']);
        for ($i = 0; $i < 6; $i++) {
            $pdf->SetAbsX(108);
            $pdf->SetAbsY($startingY + ($i * 9));
            $pdf->cell(33,9,$data['rabies'][$i],1,1,'C',false);
        }

        // Other values
        $startingY = 105;
        $pdf->SetFont('helvetica','',11);

        $fvrcp_size = sizeof($data['other']);
        for ($i = 0; $i < 6; $i++) {
            $value = (empty($data['other'][$i]['date'])) ? '' : $data['other'][$i]['date'].': '.$data['other'][$i]['notes'];
            $pdf->SetAbsX(141);
            $pdf->SetAbsY($startingY + ($i * 9));
            $pdf->cell(60,9,$value,1,1,'L',false);
        }

        // Bottom Row
        $pdf->SetFont('helvetica','B',11);
        $pdf->SetAbsX(9);
        $pdf->SetAbsY(159);
        $pdf->cell(33,18,'SPAY/NEUTER',1,0,'C',false,'',0,false,'T','T');

        $pdf->SetAbsX(42);
        $pdf->cell(33,18,'FeLV/FIV Snap',1,0,'C',false,'',0,false,'T','T');

        $pdf->SetAbsX(75);
        $pdf->cell(33,18,'MICROCHIP #',1,0,'C',false,'',0,false,'T','T');

        $pdf->SetFont('helvetica','',11);
        $pdf->SetAbsX(108);
        $pdf->cell(33,18,'Registered at:',1,0,'C',false,'',0,false,'T','T');

        $pdf->SetAbsX(141);
        $pdf->cell(60,18,'',1,1,'L',false);

        // Microchip value
        $pdf->SetAbsX(75);
        $pdf->SetAbsY(161);
        $pdf->cell(33,18,$data['cat']['microchip_number'],0,0,'C',false);
    }

    public function bottom($pdf, $data) {
        $pdf->SetFont('helvetica','',11);
        $pdf->SetAbsX(14);
        $pdf->SetAbsY(182);
        $pdf->cell(0,0,'NOTES:',0,1,'L',false);

        $pdf->SetAbsX(14);
        $pdf->SetAbsY(208);
        $pdf->cell(0,0,'NEXT SERVICES DUE:',0,1,'L',false);

        $bottom_text = "Please educate yourself about overall cat health and vaccines. A great place to start is <i>www.catinfo.org</i>.<br>If your cat has not received rabies at time of adoption, please choose the safer PUREVAX rabies vaccine when age and health appropriate.";
        $pdf->MultiCell(180,30,$bottom_text,0,'J',false,1,14,234,true,0,true);
    }

}

