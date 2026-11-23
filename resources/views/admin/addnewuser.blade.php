@include('admin.include.header')



 <!-- ============================================================== -->
 <!-- Start Page Content here -->
 <!-- ============================================================== -->

 <div class="page-content">




     <div class="myaccountPage p-4">
         <div class="d-flex align-items-center justify-content-between">
             <div class="userProfile d-flex align-items-center">
                 <div class="userThumb me-3">
                     <img src="assets/images/user.png" alt="User Profile Picture">
                 </div>
                 <div class="userName">
                     <h3>Alexa Rawles</h3>
                     <p><i class="ri-mail-line"></i> alexarawles@gmail.com</p>
                 </div>
             </div>
         </div>

         <div class="dashboardForms py-5">
             <form id="user-client-form">
                 <div class="row">
                     <div class="col-md-6">
                         <div class="form-group mb-3">
                             <label for="first-name">First Name</label>
                             <input type="text" id="first-name" name="firstName" placeholder="Enter First Name" class="form-control" required="">
                         </div>
                     </div>
                     <div class="col-md-6">
                         <div class="form-group mb-3">
                             <label for="last-name">Last Name</label>
                             <input type="text" id="last-name" name="lastName" placeholder="Enter Last Name" class="form-control" required="">
                         </div>
                     </div>

                     <div class="col-md-6">
                         <div class="form-group mb-3">
                             <label for="email">Email</label>
                             <input type="email" id="email" name="email" placeholder="Enter your Email" class="form-control" required="">
                         </div>
                     </div>
                     <div class="col-md-6">
                         <div class="form-group mb-3">
                             <label for="phone">Phone No</label>
                             <input type="tel" id="phone" name="phone" placeholder="Enter your Phone Number" class="form-control" required="">
                         </div>
                     </div>

                     <div class="col-md-6">
                         <div class="form-group mb-3">
                             <label for="country">Country</label>
                             <select id="country" name="country" class="form-control" required="">
                                 <option value="" disabled="" selected="">Select Country</option>
                                 <option value="United States">United States</option>
                                 <option value="Afghanistan">Afghanistan</option>
                                 <option value="Albania">Albania</option>
                                 <!-- Add more countries as needed -->
                             </select>
                         </div>
                     </div>
                     <div class="col-md-6">
                         <div class="form-group mb-3">
                             <label for="state">State</label>
                             <select id="state" name="state" class="form-control" required="">
                                 <option value="" disabled="" selected="">Select State</option>
                                 <option value="California">California</option>
                                 <option value="Texas">Texas</option>
                                 <option value="New York">New York</option>
                                 <!-- Add more states as needed -->
                             </select>
                         </div>
                     </div>

                     <div class="col-md-6">
                         <div class="form-group mb-3">
                             <label for="role">Role</label>
                             <select id="role" name="role" class="form-control" required="">
                                 <option value="" disabled="" selected="">Select Role</option>
                                 <option value="User">User</option>
                                 <option value="Client">Client</option>
                             </select>
                         </div>
                     </div>

                     <div class="col-md-6">
                         <div class="form-group mb-3">
                             <label for="status">Status</label>
                             <select id="status" name="status" class="form-control" required="" style="display: none;">
                                 <option value="" disabled="" selected="">Select Status</option>
                                 <option value="Active">Active</option>
                                 <option value="Inactive">Inactive</option>
                             </select>
                         </div>
                     </div>

                     <div class="col-md-12">
                         <div class="form-group mb-4">
                             <label for="profile-pic">Upload Profile Picture (optional)</label>
                             <input type="file" id="profile-pic" name="profilePic" class="form-control" accept="image/*">
                         </div>
                     </div>
                 </div>

                 <div class="row">
                     <div class="col-md-4 mt-3">
                         <button type="submit" id="submit" class="lab-btn">Submit</button>
                     </div>
                 </div>
             </form>
         </div>
     </div> <!-- container -->

     <!-- Footer Start -->
     <footer class="footer">
         <div class="page-container">
             <div class="row">
                 <div class="col-md-6 text-center text-md-start">
                     © <script>
                         document.write(new Date().getFullYear())
                     </script>2025 Maseco
                 </div>
                 <div class="col-md-6">
                     <div class="text-md-end footer-links d-none d-md-block">
                         <a href="javascript: void(0);">About</a>
                         <a href="javascript: void(0);">Support</a>
                         <a href="javascript: void(0);">Contact Us</a>
                     </div>
                 </div>
             </div>
         </div>
     </footer>
     <!-- end Footer -->

 </div> <!-- container -->

 @include('admin.include.footer')
