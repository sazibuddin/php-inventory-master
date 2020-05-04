 <!-- The Modal for add new form -->
              <div class="modal fade bd-example-modal-xl suppliarModal" id="suppliarModal">
                <div class="modal-dialog modal-xl">
                  <div class="modal-content">
                    
                    <!-- Modal Header -->
                    <div class="modal-header bg-primary">
                      <h4 class="modal-title">Add New suppliar</h4>
                      <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>
                    
                    <!-- Modal body -->
                    <div class="modal-body">
                      <div class="alert alert-primary alert-dismissible fade show memberFormError" role="alert">
                        <span id="cuppliarFormError"></span>
                      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                    </div>
                        <form id="adsuppliarForm">
                         <div class="row">
                           <div class="col-md-6 col-lg-6">
                              <div class="form-group">
                            <label for="sup_name">Name *:</label>
                            <input type="text" class="form-control" id="sup_name" placeholder="Member name" name="sup_name">
                          </div>
                           </div>
                          <div class="col-md-6 col-lg-6">
                          <div class="form-group">
                            <label for="sup_company">Company :</label>
                            <input type="text" class="form-control" id="sup_company" placeholder="Company name" name="sup_company">
                          </div>
                        </div>
                         <div class="col-md-6 col-lg-6">
                          <div class="form-group">
                            <label for="sup_contact">Contact number :</label>
                            <input type="text" class="form-control" id="sup_contact" placeholder="Contact member" name="sup_contact">
                          </div>
                        </div>
                         <div class="col-md-6 col-lg-6">
                          <div class="form-group">
                            <label for="sup_email">Email:</label>
                            <input type="email" class="form-control" id="sup_email" placeholder="Email optional" name="sup_email">
                          </div>
                        </div>
                         <div class="col-md-6 col-lg-6">
                          <div class="form-group">
                          <label for="sup_open_blacnce">previous due :</label>
                          <input type="number" class="form-control" name="sup_open_blacnce" id="sup_open_blacnce" value="0.00">
                         </div>
                       </div>
                        <div class="col-md-6 col-lg-6">
                          <div class="form-group">
                            <label for="sup_reg_date">Registration Date :</label>
                            <input type="date" class="form-control" id="sup_reg_date" name="sup_reg_date">
                          </div>
                        </div>
                        <div class="col-md-12 col-lg-12">
                            <div class="form-group">
                            <label for="supaddress">Address:</label>
                            <textarea rows="3" class="form-control" placeholder="Member complect Address" id="supaddress" name="supaddress"></textarea>
                          </div>
                        </div>
                    </div>
                          <button type="submit" class="btn btn-primary btn-block rounded-0">Add member</button>
                        </form>
                         </form>
                        <!-- </div> -->
                      </div>
                      <!-- Modal footer -->
                      <div class="modal-footer">
                        <button type="button" class="btn btn-danger rounded-0 btn-sm" data-dismiss="modal">Close</button>
                      </div>
                    </div>
                  </div>
                </div>