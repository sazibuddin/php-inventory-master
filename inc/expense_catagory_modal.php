<div class="modal fade expenseCatModal" id="expenseCatModal">
                <div class="modal-dialog">
                  <div class="modal-content">
                    
                    <!-- Modal Header -->
                    <div class="modal-header">
                      <h4 class="modal-title">Add New Category</h4>
                      <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>
                    <!-- Modal body -->
                    <div class="modal-body">
                      <div class="alert alert-primary alert-dismissible fade show catWarning-area" role="alert">
                        <span id="catWarning"></span>
                      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                    </div>
                     <form id="addexpenseCat">
                    <div class="form-group">
                        <label for="expense_catName">Expene Catagory name</label>
                        <input type="text" class="form-control" id="expense_catName" name="expense_catName" placeholder="Expense catagory name">
                    </div>
                            <div class="form-group">
                            <label for="expesecatDescrip">description </label>
                            <textarea  rows="3" class="form-control" id="expesecatDescrip" name="expesecatDescrip"></textarea>
                          </div>
                          <div class="form-group">
                            <button type="submit" class="btn btn-primary btn-block mt-4 rounded-0">Add catagory</button>
                          </div>
                        </form>
                      <!-- </div> -->
                    </div>
                    <!-- Modal footer -->
                    <div class="modal-footer">
                      <button type="button" class="btn btn-danger rounded-0" data-dismiss="modal">Close</button>
                    </div>
                  </div>
                </div>
              </div>