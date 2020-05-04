<div class="modal fade catagoryModal" id="catagoryModal">
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
                      <form id="addCatForm">
                        <div class="form-group">
                          <div class="form-group">
                            <label for="cat_name">Category </label>
                            <input type="text" class="form-control" id="cat_name" name="cat_name" placeholder="Product Catagory name">
                          </div>
                            <div class="form-group">
                            <label for="cat_descrip">Description </label>
                            <textarea  rows="3" class="form-control" id="cat_descrip" name="cat_descrip" placeholder="product description "></textarea>
                          </div>
                          <div class="form-group">
                            <button type="submit" class="btn btn-primary btn-block mt-4 rounded-0">Submit</button>
                          </div>
                        </div>
                      </form>
                      <!-- </div> -->
                    </div>
                    <!-- Modal footer -->
                    <div class="modal-footer">
                      <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                    </div>
                  </div>
                </div>
              </div>