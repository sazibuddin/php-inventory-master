<?php require_once '../init.php'; 
if (isset($_GET['sell_id'])) {
	 $view_id = $_GET['sell_id'];
     $sell_total = $obj->find('invoice','id',$view_id);
	 $customer = $sell_total->customer_id;
     $customer = $obj->find('member','id',$customer);



// include("mpdf/mpdf.php");
include("mpdf/mpdf.php");
	$mpdf = new mPDF('mm',array(240,350),12,'nikosh',1,1,1,'L'); 
	$mpdf->SetTopMargin(0);
	$mpdf->SetRightMargin(0);
	
	$html = '
	<style>
	.container {
		margin:50px;
	}
	.table1,.table2 {
		width:100%;
		text-align:center;
		border-collapse: collapse;
	}
	.table1 {
		margin-top:10px;
	}
	table th, 
	table td {
		border:1px solid #ccc;
		padding:4px 0;
	}
	table td {
	    font-weight:normal;
	}
	.table3 {
		margin-top:20px;
	}
	.table3 th {
		border:none;
		text-align:left;
	}
	.purchase-suppliar-info {
		width:60%;
		float:left;
		padding-top:150px;
		padding-bottom:30px;
	}
	.order_data_no {
		width:40%
		float:right;
		padding-top:150px;
	}
		.purchase-suppliar-info p {
			margin:0;
			padding:0;
		}
		.order_data_no {
			float:right;
		}
		.pruchase-view-description {
			padding-bottom:100px;
		}
	</style>
  </head>
  <body>
    <div class="container">
		<div class="card">
			<div class="card-body">
				<div class="row">
					<div class="col-md-5">
					<div class="purchase-suppliar-info">
					  <p><i><b>Customer info</b></i></p>
					  <p>Name : '.$customer->name.'</p>
					  <p>Company : '.$customer->company.'</p>
					  <p>Address : '.$customer->address.'</p>
					  <p>Phone : '.$customer->con_num.'</p>
					  <p>Email : '.$customer->email.'</p>
					  <p>Supliar id : '.$customer->member_id.'</p>
				</div>

				<div class="order_data_no">
							<p><b>Order date :</b> '.$sell_total->order_date.'</p>
						<p><b>invoice id :</b> '.$sell_total->invoice_number.';</p>
						</div>
					</div>
					
						
					
				</div>
				<table class="table2">
	                <thead>
	                  <tr>
	                    <th>#</th>
	                    <th>Product name</th>
	                    <th>brand name</th>
	                    <th>quantity</th>
	                    <th>price</th>
	                    <th>total price</th>
	                  </tr>
	                </thead>
	                <tbody>
	                ';
	                	
	                	
	                		 $invoice_id = $sell_total->id;
                            
                            
                            $all_product = $obj->findWhere("invoice_details",'invoice_no', $invoice_id);
                            $i = 0;
                              foreach ($all_product as $products) {
                              	 $pid = $products->pid;
                                $p_brand = $obj->find('products','id',$pid);
                              	$i++;

                               $html .= '
									<tr>
										<th>'.$i.'</th>
									<td>'.$products->product_name.'</td>
									<td>'.$p_brand->brand_name.'</td>
									<td>'.$products->quantity.'</td>
									<td>'.$products->price / $products->quantity.'</td>
									<td>'.$products->price.'</td>
									</tr>
                               ';
                                
                              }
	                	

	             $html .= '
	                </tbody>

	                </table>


	                <div class="row">
						<div class="col-md-8">
						 <h4 class="mt-4">Payments Information :</h4>
                          <table class="table1">
                            <thead class="">
                              <tr>
								<th>#</th>
                              <th>Date</th>
                              <th>Payment type</th>
                              <th>Payment note</th>
                              <th>Payment amount</th>
                              </tr>
                            </thead>
                            <tbody>
						';

						 $all_payment = $obj->findWhere('sell_payment','invoice_id', $view_id);
                                $i=0;
                                foreach ($all_payment as $payment) {
                                  $i++;
                                  
                                   $html .='
									 <tr>
                                      <td>'.$i.'</td>
                                      <td>'.$payment->payment_date.'</td>
                                      <td>'.$payment->payment_type.'</td>
                                      <td>'.$payment->pay_description.'</td>
                                      <td>'.$payment->payment_amount.'</td>
                                    </tr>
                                   ';
                                  
                                }

						 $html .= '
						  </tbody>
                          </table>
						</div>
						<div class="col-md-4 col-lg-4">
                          <div class="pruchase-view-description">
                            <table class="table3">
                            <tr>
                              <th>Sebtotal</th>
                              <th>:</th>
                              <th>'.$sell_total->sub_total.'</th>
                            </tr>
                            <tr>
                              <th>Discount</th>
                              <th>:</th>
                              <th>'.$sell_total->discount.'</th>
                            </tr>
                            <tr>
                              <th>Net total</th>
                              <th>:</th>
                              <th>'.$sell_total->net_total.'</th>
                            </tr>
                            <tr>
                              <th>paid amount</th>
                              <th>:</th>
                              <th>'.$sell_total->paid_amount.'</th>
                            </tr>
                            <tr>
                              <th>due amount</th>
                              <th>:</th>
                              <th>'.$sell_total->due_amount.'</th>
                            </tr>
                          </table>
                          </div>
                        </div>
	                </div>

			</div>
		</div>
    </div>
  </body>
</html>
	';
	                	

$mpdf->AddPage();
		$mpdf->WriteHTML($html);
		// $x++;
ob_end_clean();
	$mpdf->Output('bismillah-sell-invoice.pdf','I');
}
 ?>