<?php 
require_once '../init.php';
	if (isset($_POST['getOrderItem'])) {
		?>
			<tr>
				<td><b class="si_number">1</b></td>
                      <td><select class="form-control form-control-sm select2 pid" id="product_name" name="pid[]">
                        <option selected disabled>Select a prduct</option>
                        <?php 
                          $all_produdct_data = $obj->all('products');
                          foreach ($all_produdct_data as $produdct_data) {
                          	?>
                              <option value="<?=$produdct_data->id;?>"><?=$produdct_data->product_name;?> (<?=$produdct_data->brand_name;?>)</option>
                            <?php 
                          }
                         ?>
                      </select></td>
                      <td><input type="text" class="form-control form-control-sm qaty" placeholder="Total Quantity" name="total_quantity[]" id="totalQuantity" readonly></td>
                      <td><input type="number" class="form-control form-control-sm price" placeholder="Price" name="price[]" id="price"></td>
                      <td><input type="number" class="form-control form-control-sm oqty" placeholder="Order Quantity" name="orderQuantity[]"></td>
                      <td><input type="number" class="form-control form-control-sm tprice" placeholder="Total Price" name="totalPrice[]" id="totalPrice" readonly></td>
                      <td><input type="text" readonly class="form-control form-control-sm pro_name" name="pro_name[]" id="pro_name"></td>
                      <td><button type="button" class="btn btn-danger btn-sm pl-3 pr-3 cancelThisItem" id="cancelThisItem"><i class="fas fa-times"></i></button></td>
                    </tr>
		<?php 
	}

 ?>