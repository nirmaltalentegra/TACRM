<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');
class Student_certificate extends APP_Controller {
    function __construct() {
        parent::__construct();
        $this->load->helper(array('url'));
		$this->load->model('Common_model');
		$this->load->model('students_model');
    }
	
	public function print_certificate($student_id) {
		$arr_certificate_list = $this->Common_model->get_details_dynamically('tbl_templates', 'template_id', 1, 'template_id', 'ASC');
		//echo "<br> str ".$this->db->last_query();exit;
		if($arr_certificate_list != 'failure') {
			//Get all the data
			$arr_students_list = $this->students_model->get_students_course_details($student_id);
			//echo "<br> str ".$this->db->last_query();
			
			if($arr_students_list != 'failure') {
				/*echo "<pre>";
				print_r($arr_students_list);
				echo "</pre>";*/
				//exit;
				
				$course = $arr_students_list->course_name;
				$student_name = ucwords($arr_students_list->name);
				$completion_date = ($arr_students_list->completion_date != "" || $arr_students_list->completion_date != "0000-00-00 00:00:00") ? date('d-m-Y',strtotime($arr_students_list->completion_date)) : "";
				$student_enrollment_id = $arr_students_list->student_enrollment_id;
				$student_did = $arr_students_list->student_did;
				$certificate_id = $arr_students_list->certificate_id;
				
				$image_url = base_url().$this->config->item('certificate_file_path');
				
				$template = str_replace(array('$course','$student_name','$image_url','$completion_date','$student_enrollment_id','$student_did',								'$certificate_id'),
							array($course,$student_name,$image_url,$completion_date,$student_enrollment_id,$student_did,$certificate_id),
							$arr_certificate_list[0]['template_data']);
				//echo "<br> template ".$template;
				//exit;
				$mpdf = new \Mpdf\Mpdf(['mode' => 'utf-8', 'format' => 'A4-L']);
			
				//load the view and saved it into $html variable   
				$html = $template;     
			   
				//echo "<br> html ".$html;exit;
				//this the the PDF filename that user will get to download
				$pdfFilePath = $student_name.'_Certification_on_'.$course . '.pdf';
			
				$mpdf->WriteHTML($html);
				$mpdf->Output($pdfFilePath, "D");
			}
			else {
				$this->session->set_flashdata('error', 'No proper details to print the certificate');
				redirect('students');	
			}	
		}	
	}
	
	public function print_payment($row_id) {
		$arr_certificate_list = $this->Common_model->get_details_dynamically('tbl_payments', 'id', $row_id);
		if($arr_certificate_list != 'failure')
		{
			foreach($arr_certificate_list as $row)
			{
				$payment_date=$row['date'];
				$amount_paid=$row['amount_paid'];
				$student_id=$row['student_id'];
			}
			$s = strtotime($payment_date);
			$payment_date = date('d/m/Y', $s);
			
			$row_arr=$this->Common_model->get_details_dynamically('students','student_id',$student_id);
			foreach($row_arr as $row)
			{
				$student_name=$row['name'];
			}
			
			$amt = $amount_paid;
			$no = floor($amt);
		   $point = round($amt - $no, 2) * 100;
		   $hundred = null;
		   $digits_1 = strlen($no);
		   $i = 0;
		   $str = array();
		   $words = array('0' => '', '1' => 'One', '2' => 'Two',
			'3' => 'Three', '4' => 'Four', '5' => 'Five', '6' => 'Six',
			'7' => 'Seven', '8' => 'Eight', '9' => 'Nine',
			'10' => 'Ten', '11' => 'Eleven', '12' => 'Twelve',
			'13' => 'Thirteen', '14' => 'Fourteen',
			'15' => 'Fifteen', '16' => 'Sixteen', '17' => 'Seventeen',
			'18' => 'Eighteen', '19' =>'Nineteen', '20' => 'Twenty',
			'30' => 'Thirty', '40' => 'Forty', '50' => 'Fifty',
			'60' => 'Sixty', '70' => 'Seventy',
			'80' => 'Eighty', '90' => 'Ninety');
		   $digits = array('', 'Hundred', 'Thousand', 'Lakh', 'Crore');
		   while ($i < $digits_1) {
			 $divider = ($i == 2) ? 10 : 100;
			 $amt = floor($no % $divider);
			 $no = floor($no / $divider);
			 $i += ($divider == 10) ? 1 : 2;
			 if ($amt) {
				$plural = (($counter = count($str)) && $amt > 9) ? 's' : null;
				$hundred = ($counter == 1 && $str[0]) ? ' and ' : null;
				$str [] = ($amt < 21) ? $words[$amt] .
					" " . $digits[$counter] . $plural . " " . $hundred
					:
					$words[floor($amt / 10) * 10]
					. " " . $words[$amt % 10] . " "
					. $digits[$counter] . $plural . " " . $hundred;
			 } else $str[] = null;
		  }
		  $str = array_reverse($str);
		  $result = implode('', $str);
		  $points = ($point) ?
			"." . $words[$point / 10] . " " . 
				  $words[$point = $point % 10] : '';
		  $output = $result . "Rupees  ";
		
				$mpdf = new \Mpdf\Mpdf(['mode' => 'utf-8', 'format' => 'A4-L']);
			
				$link = base_url().'assets/logo.png';
				$template='<img src="'.$link.'" alt="NoImg" width="100%" />';
				
				$template.='<table style="border:1px;">';
					$template.='<thead>';
						$template.='<tr>';
							$template.='<th colspan="3" style="text-align:center;">PAYMENT RECEIPT<br></th>';
						$template.='</tr>';
					$template.='</thead>';
					$template.='<tbody>';
						$template.='<tr>';
							$template.='<th width="40%">Payment Date</th>';
							$template.='<th width="10%"></td>';
							$template.='<td width="50%">'.$payment_date.'</td>';
						$template.='</tr>';
						$template.='<tr>';
							$template.='<th>Payment Mode</th>';
							$template.='<th width="10%"></td>';
							$template.='<td id="PaymentMode">Bank Transfer</td>';
						$template.='</tr>';
						$template.='<tr>';
							$template.='<th>Payment Amount</th>';
							$template.='<th width="10%"></td>';
							$template.='<td id="PaymentAmt">Rs. '.$amount_paid.'</td>';
						$template.='</tr>';
						$template.='<tr>';
							$template.='<th>Amount Received In Words</th>';
							$template.='<th width="10%"></td>';
							$template.='<td>'.$output.'</td>';
						$template.='</tr>';
						$template.='<tr>';
							$template.='<th>Description</th>';
							$template.='<th width="10%"></td>';
							$template.='<td></td>';
						$template.='</tr>';
						$template.='<tr>';
							$template.='<th>Terms & Conditions</th>';
							$template.='<th width="10%"></td>';
							$template.='<td></td>';
						$template.='</tr>';
						$template.='<tr>';
							$template.='<td><br/></td>';
							$template.='<td><br/></td>';
							$template.='<td><br/></td>';
						$template.='</tr>';
						$template.='<tr>';
							$template.='<td>';
								$template.='<b>Received From</b><br/>';
								$template.='<temp>'.$student_name.'</temp>';
							$template.='</td>';
							$template.='<th width="10%"></td>';
							$template.='<td style="text-align:right;">';
								$template.='<temp id="PaymentName"></temp><br/>';
								$template.='<b>Authorized Signature</b>';
							$template.='</td>';
						$template.='</tr>';
					$template.='</tbody>';
				$template.='</table>';
				
				$html = $template;     
			   
				$pdfFilePath = $student_name.'_Payment_on_'.$payment_date. '.pdf';
			
				$mpdf->WriteHTML($html);
				$mpdf->Output($pdfFilePath, "D");
		}	
	}
	
}