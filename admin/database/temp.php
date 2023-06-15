 <div class="res-box">

     <div class="card-header text-center">
     </div>
     <!-- /.row -->
     <div class="row">
         <div class="col-md-12">
             <div class="card card-default">
                 <div class="card-header">
                     <h3 class="card-title">ADD Single Catlog </h3>
                 </div>
                 <div class="card-body p-0">
                     <form action="" method="post">
                         <div class="bs-stepper">
                             <div class="bs-stepper-header" role="tablist">
                                 <!-- your steps here -->
                                 <div class="step" data-target="#logins-part">
                                     <button type="button" class="step-trigger" role="tab" aria-controls="address-part" id="logins-part-trigger">
                                         <span class="bs-stepper-circle">1</span>
                                         <span class="bs-stepper-label">Select Catogary</span>
                                     </button>
                                 </div>
                                 <div class="line"></div>
                                 <div class="step" data-target="#information-part">
                                     <button type="button" class="step-trigger" role="tab" aria-controls="bankinfo-part" id="information-part-trigger">
                                         <span class="bs-stepper-circle">2</span>
                                         <span class="bs-stepper-label">Bank Details</span>
                                     </button>
                                 </div>
                                 <div class="line"></div>
                                 <div class="step" data-target="#storeinfo-part">
                                     <button type="button" class="step-trigger" role="tab" aria-controls="storeinfo-part" id="information-part-trigger">
                                         <span class="bs-stepper-circle">3</span>
                                         <span class="bs-stepper-label">Store Details</span>
                                     </button>
                                 </div>
                             </div>
                             <div class="bs-stepper-content">
                                 <!-- your steps content here -->
                                 <div id="logins-part" class="content" role="tabpanel" aria-labelledby="logins-part-trigger">
                                     <div class="form-group">
                                         <label for="exampleInputEmail1">Floor/ Appartment/ Office</label>
                                         <input type="text" class="form-control" name="floor" id="exampleInputEmail1" placeholder="Write Floor/ Appartment/ Office">
                                     </div>
                                     <div class="form-group">
                                         <label for="exampleInputPassword1">Street</label>
                                         <input type="text" class="form-control" name="street" id="exampleInputPassword1" placeholder="Enter street">
                                     </div>
                                     <div class="form-group">
                                         <label for="exampleInputPassword1">Landmark</label>
                                         <input type="text" class="form-control" name="landmark" id="exampleInputPassword1" placeholder="Enter landmark">
                                     </div>
                                     <div class="form-group">
                                         <label for="exampleInputPassword1">City/ Postal</label>
                                         <input type="text" class="form-control" name="city" id="exampleInputPassword1" placeholder="Enter city">
                                     </div>
                                     <div class="form-group">
                                         <label>State</label>
                                         <select class="form-control select2" name="state" style="width: 100%;">
                                             <option selected="selected">Selected</option>
                                             <option>Gujarat</option>
                                             <option>Rajasthan</option>
                                             <option>Punjab</option>
                                             <option>Maharashtra</option>
                                             <option>Madhya pradesh</option>
                                             <option>Andra Pradesh</option>
                                         </select>
                                     </div>
                                     <div class="form-group">
                                         <label for="exampleInputPassword1">Pincode</label>
                                         <input type="number" class="form-control" name="pincode" id="exampleInputPassword1" placeholder="Enter street">
                                     </div>

                                     <button class="btn btn-primary" type="button" onclick="stepper.next()">Next</button>
                                 </div>
                                 <div id="information-part" class="content" role="tabpanel" aria-labelledby="information-part-trigger">
                                     <div class="form-group">
                                         <label for="exampleInputPassword1">Bank Account Number</label>
                                         <input type="number" class="form-control" name="bank" id="exampleInputPassword1" placeholder="Enter account number">
                                     </div>
                                     <div class="form-group">
                                         <label for="exampleInputPassword1">Confirm Account Number</label>
                                         <input type="number" class="form-control" name="bankcom" id="exampleInputPassword1" placeholder="Enter city">
                                     </div>
                                     <div class="form-group">
                                         <label for="exampleInputPassword1">Bank IFSC code</label>
                                         <input type="text" class="form-control" name="ifsc" id="exampleInputPassword1" placeholder="Please write valid IFSC code">
                                     </div>
                                     <button class="btn btn-primary" type="button" onclick="stepper.previous()">Previous</button>
                                     <button class="btn btn-primary" type="button" onclick="stepper.next()">Next</button>
                                     <!-- <button type="submit" class="btn btn-primary">Submit</button> -->
                                 </div>
                                 <div id="storeinfo-part" class="content" role="tabpanel" aria-labelledby="information-part-trigger">
                                     <div class="form-group">
                                         <label for="exampleInputPassword1">Store Name</label>
                                         <input type="text" class="form-control" name="store" id="exampleInputPassword1" placeholder="Enter Store Name">
                                     </div>
                                     <div class="form-group">
                                         <label for="exampleInputPassword1">Full Name</label>
                                         <input type="text" class="form-control" name="seller_name" id="exampleInputPassword1" placeholder="Enter your name">
                                     </div>

                                     <button class="btn btn-primary" type="button" onclick="stepper.previous()">Previous</button>

                                     <button type="submit" class="btn btn-primary" name="submit">Submit</button>
                                 </div>

                     </form>
                 </div>
                 <!-- /.card-body -->

             </div>
             <!-- /.card -->
         </div>
     </div>
     <!-- /.row -->
 </div>