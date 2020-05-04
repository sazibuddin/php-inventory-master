<?php 
	require_once '../init.php';
	require_once 'fpdf/fpdf.php';

	if (isset($_GET['sell_id'])) {
		$pdf = new FPDF();
		$pdf->AddPage();
		$pdf->image('invoice_logo-final.png',10,5);
		$pdf->SetFont("Arial" ,"B",16);
		$pdf->Cell(190,5,"Bismillah-Engineering",0,1,"C");
		$pdf->SetFont("Times" ,"",12);
		$pdf->Cell(190,5,"Product sell invoice",0,1,"C");
		// $pdf->Ln();
		// get data from sell table 
		$sell_id = $_GET['sell_id'];
		$sell_data = $obj->find('invoice','id',$sell_id);
		$customer_id = $sell_data->customer_id;
		// $pdf->Cell(30,10,"$customer_id : ",0,1);

		$customer_info = $obj->find('member','id',$customer_id);

		$pdf->SetFont("Times" ,"B",12);
		$pdf->Cell(10,15," ",0,1);
		$pdf->Cell(10,10,"Customer info : ",0,1);
		$pdf->SetFont("Times" ,"B",11);
		$pdf->Cell(22,5,"Order date : ",0,0);
		$pdf->SetFont("Times" ,"",12);
		$pdf->Cell(5,5,$sell_data->order_date,0,1);
		$pdf->SetFont("Times" ,"B",11);
		$pdf->Cell(30,5,"Customer name : ",0,0);
		$pdf->SetFont("Times" ,"",12);
		$pdf->Cell(20,5,$customer_info->name,0,1);
		$pdf->SetFont("Times" ,"B",11);
		$pdf->Cell(30,5,"company name : ",0,0);
		$pdf->SetFont("Times" ,"",12);
		$pdf->Cell(15,5,$customer_info->company,0,1);
		$pdf->SetFont("Times" ,"B",11);
		$pdf->Cell(20,5,"Address : ",0,0);
		$pdf->SetFont("Times" ,"",12);
		$pdf->Cell(30,5,$customer_info->address,0,1);
		$pdf->SetFont("Times" ,"B",11);
		$pdf->Cell(30,5,"Contact number : ",0,0);
		$pdf->SetFont("Times" ,"",12);
		$pdf->Cell(20,5,$customer_info->con_num,0,1);
		$pdf->SetFont("Times" ,"B",11);
		$pdf->Cell(15,5,"Email : ",0,0);
		$pdf->SetFont("Times" ,"",12);
		$pdf->Cell(15,5,$customer_info->email,0,0);


		$pdf->SetFont("Times" ,"B",11);
		$pdf->Cell(190,5,"Invoice number : #" .$sell_data->invoice_number ,0,0,"C");
		$pdf->Cell(190,10,"",0,1);
		
		$pdf->Cell(100,10,"",0,1);
		$pdf->SetFont("Times" ,"B",12);
		$pdf->Cell(10,7,"#",1,0,"C");
		$pdf->Cell(70,7,"Product name",1,0,"C");
		$pdf->Cell(30,7,"Quantity",1,0,"C");
		$pdf->Cell(40,7,"Price",1,0,"C");
		$pdf->Cell(40,7,"Total",1,1,"C");

		$invoice_details_id = $sell_data->id;

		$total_pid = $pdo->prepare("SELECT * FROM `invoice_details` WHERE `invoice_no` = $invoice_details_id");
		$total_pid->execute();
		$product_details = $total_pid->fetchAll(PDO::FETCH_OBJ);
		$count = $total_pid->rowCount();
		if ($product_details) {
			$i=0;
			foreach ($product_details as $product) {
			$pdf->SetFont("Times" ,"",12);	
			$pdf->Cell(10,7,$i+1,1,0,"C");
			$pdf->Cell(70,7,$product->product_name,1,0,"C");
			$pdf->Cell(30,7,$product->quantity,1,0,"C");
			$pdf->Cell(40,7,$product->price,1,0,"C");
			$pdf->Cell(40,7,$product->quantity *$product->price,1,1,"C");
			$i++;
			}
		}

		

		

		$pdf->Cell(190,10,"",0,1);
		$pdf->SetFont("Times" ,"B",13);
		$pdf->Cell(20,8,"subtotal",0,0,"C");
		$pdf->SetFont("Times","",13);
		$pdf->Cell(20,8,$sell_data->sub_total,0,1,"C");
		$pdf->SetFont("Times" ,"B",13);
		$pdf->Cell(20,8,"discount",0,0,"C");
		$pdf->SetFont("Times","",13);
		$pdf->Cell(20,8,$sell_data->discount,0,1,"C");
		$pdf->SetFont("Times" ,"B",13);
		$pdf->Cell(20,8,"net total",0,0,"C");
		$pdf->SetFont("Times" ,"",13);
		$pdf->Cell(20,8,$sell_data->net_total,0,1,"C");
		$pdf->SetFont("Times" ,"B",13);
		$pdf->Cell(20,8,"Paid bill",0,0,"C");
		$pdf->SetFont("Times" ,"",13);
		$pdf->Cell(20,8,$sell_data->paid_amount,0,1,"C");
		$pdf->SetFont("Times" ,"B",13);
		$pdf->Cell(20,8,"Due bill",0,0,"C");
		$pdf->SetFont("Times" ,"",13);
		$pdf->Cell(20,8,$sell_data->due_amount,0,2,"C");


		// print payment information;
		$pdf->SetFont("Times" ,"",16);
		$pdf->Cell(150,0," Payment information",0,1,"C");

		$pdf->Cell(100,10,"",0,1);
		$pdf->SetFont("Times" ,"B",12);
		$pdf->Cell(10,7,"#",1,0,"C");
		$pdf->Cell(70,7,"Date",1,0,"C");
		$pdf->Cell(30,7,"Payment type",1,0,"C");
		$pdf->Cell(40,7,"Payment note",1,0,"C");
		$pdf->Cell(40,7,"Payment amount",1,1,"C");

		$invoice_details_id = $sell_data->id;

		 $all_payment = $obj->findWhere('sell_payment','invoice_id', $invoice_details_id);
		if ($product_details) {
			$i=0;
			foreach ($all_payment as $payment) {
			$pdf->SetFont("Times" ,"",12);	
			$pdf->Cell(10,7,$i+1,1,0,"C");
			$pdf->Cell(70,7,$payment->payment_date,1,0,"C");
			$pdf->Cell(30,7,$payment->payment_type,1,0,"C");
			$pdf->Cell(40,7,$payment->pay_description,1,0,"C");
			$pdf->Cell(40,7,$payment->payment_amount ,1,1,"C");
			$i++;
			}
		}else{
			$pdf->Cell(40,10,"No payment complete yet",1,1,"C");
		}

		$pdf->Cell(190,10,"",0,1);
		$pdf->SetFont("Times" ,"B",13);
		// $pdf->Cell(20,5,"signature",0,0,"C");
		$pdf->Cell(290,5,"---------------",0,1,"C");
		$pdf->Cell(290,5,"signature",0,1,"C");

		$pdf->SetFont("Times" ,"",16);
		$pdf->Cell(190,20,"********** Bismillah-Engeenearing **********",0,1,"C");

		$pdf->Output();
	}
 ?>