<!-- Content Wrapper. Contains page content  -->
<div class="content-wrapper">
 <!-- Main content -->
          <section class="content mt-5">
            <div class="container-fluid">
             <div class="card-header">
                <h3 class="card-title mt-3">Add catagory</h3>
              </div>
              <!-- /.card-header -->
               <div class="row">
                 <div class="col-md-8 offset-md-2 col-lg-8 offset-lg-2 mt-3">
                   <div class="card">
                     <div class="card-body">
                <form id="addExpenseForm">
                    <div class="form-group">
                        <label for="expense_date">Expene date</label>
                    <div class="input-group flex-nowrap">
                      <div class="input-group-prepend">
                        <span class="input-group-text" id="addon-wrapping"><i class="fas fa-calendar-week"></i></span>
                      </div>
                      <input type="text" class="form-control datepicker" id="expense_date"  aria-describedby="addon-wrapping" name="expense_date">
                    </div>
                    </div>
                    <div class="form-group">
                      <label for="expense_for">Expense for *</label>
                      <input type="text" class="form-control" id="expense_for" name="expense_for" placeholder="Expense for">
                    </div>
                    <div class="form-group">
                      <div class="row">
                        <div class="col-md-8">
                          <label for="expense_catagory">Expense catagory</label>
                      <select name="expense_catagory" id="expense_catagory" class="form-control select2">
                        <?php 
                          $all_ex_cat = $obj->all('expense_catagory');
                          foreach ($all_ex_cat as $ex_cat) {
                            ?>
                              <option value="<?=$ex_cat->id?>"><?=$ex_cat->name;?></option>
                            <?php 
                          }
                         ?>
                      </select>
                        </div>
                        <div class="col-lg-4">
                          <div class="form-group">
                            <label for=""></label>
                            <button type="button" class="btn btn-primary rounded-0" data-toggle="modal" data-target=".expenseCatModal" style="margin-top: 32px;margin-bottom: -20px;"><i class="fas fa-plus"></i> expense catagory</button>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="form-group">
                      <label for="expense_amount">Expense amount *</label>
                      <input type="number" class="form-control" id="expense_amount" name="expense_amount" placeholder="Expense amount">
                    </div>
                    <div class="form-group">
                      <label for="exp_descrip">Description </label>
                      <textarea  rows="3" class="form-control" id="exp_descrip" name="exp_descrip"></textarea>
                    </div>
                          <div class="form-group">
                            <button type="submit" class="btn btn-primary btn-block mt-4 rounded-0">Add</button>
                          </div>
                        </form>

           
         </div>
                  </div>
                 </div>
               </div>
            </div>
            <!-- /.card-body -->
            <!-- /.row -->
            </div><!--/. container-fluid -->
          </section>
          <!-- /.content -->
        </div>
        <!-- /.content-wrapper