<!--Start Social site link-->
    <div class="container-fluid bg-dark">
        <div class="row text-white text conter p-1">
            <div class="col-sm">
                <a class="text-white social-hover" href="https://www.facebook.com/spiralogics/"><img src="https://img.icons8.com/color/48/000000/facebook.png" />Facebook</a>
            </div>
            <div class="col-sm">
                <a class="text-white social-hover" href="https://www.instagram.com/spiralogicsinternational/?hl=en"><img src="https://img.icons8.com/fluency/48/000000/instagram-new.png" />Instagram</a>
            </div>
            <div class="col-sm">
                <a class="text-white social-hover" href="https://www.linkedin.com/company/spiralogics-inc./"><img src="https://img.icons8.com/fluency/48/000000/linkedin.png" />Linkedin</a>
            </div>
        </div>
    </div>
    <!--End social site link-->

    <!--Start About Section-->
    <div class="container-fluid p-4" style="background-color:#d3d3d3">
        <div class="container" style="background-color:#d3d3d3">
            <div class="row text-center">
                <div class="col-sm">
                    <h5>About Us</h5>
                    <p>Spiralogics takes a practical approach to outsourcing. We recognize that our clients are experts in their respective sectors, while we strive to be the trusted go-to technology development partner. Our clients count on us for delivering
                        technology solutions customized to their unique requirements. We provide solutions that not only drive efficiency, but also our clients' businesses.</p>
                </div>
                <div class="col-sm">
                    <h5>Services</h5>
                    <p class="text-dark">Application</p>
                    <p class="text-dark">BI/Reporting</p>
                    <p class="text-dark">Migration</p>
                    <p class="text-dark">Mobile</p>
                    <p class="text-dark">Optimization</p>
                    <p class="text-dark">Quality Assurance</p>
                    <p class="text-dark">Support</p>
                </div>
                <div class="col-sm">
                    <h5>Contact Us</h5>
                    <p>Spiralogics International Nepal <br />Shankhamul Marga, Kathmandu 44617<br /> Phone: 01-4787644 </p>
                </div>
            </div>
        </div>
    </div>
    <!--End of About Section-->

    <!--Start Footer-->
    <footer class="container-fluid bg-dark text-center p-2">
        <small class="text-white">Copyright &copy; 2021 || <a href="#login" data-toggle="modal" data-target="#adminModalCenter">Admin Login</a></small>
    </footer>
    <!--End Footer-->

    <!--Start registration Model-->
    <div class="modal fade" id="signupModalCenter" tabindex="-1" role="dialog" aria-labelledby="signupModalCenterTitle" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="signupModalLongTitle">Registration</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <!--Form started-->
            <?php
            include('./Registration.php')
            ?>
            <!--Form ended-->
          </div>
        </div>
      </div>
    </div>           
    <!--End Registration Model-->

    <!--Start Login  Model-->
    <div class="modal fade" id="loginModalCenter" tabindex="-1" role="dialog" aria-labelledby="loginModalCenterTitle" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="loginModalLongTitle">Login</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <div class="container">
              <!--Form -->
              <form id="LoginForm">
                <div class="form-group">
                <label for="logemail">Email</label>
                <input type="email" class="form-control" id="logemail" placeholder="Enter Email" name="logemail" required>
                </div>
                <div class="form-group">
                  <label for="logpwd">Password:</label>
                  <input type="password" class="form-control" id="logpwd" placeholder="Enter password" name="logpwd" required>
                </div>
                <div class="modal-footer">
                  <small id="statusLogMsg"></small>
                  <button type="button" class="btn btn-primary" id="LoginBtn" onclick="checkLogin()">Login</button>
                  <button type="button" class="btn btn-secondary"data-dismiss="modal">Cancel</button>
                </div>
              </form>
              <!--Form ended-->
            </div>
            </div>
        </div>
      </div>
    </div>
    <!--End Login Model-->

    <!--Start of Admin Login model-->
    <div class="modal fade" id="adminModalCenter" tabindex="-1" role="dialog" aria-labelledby="adminModalCenterTitle" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="adminModalLongTitle"> Admin Login</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <div class="container">
              <!--Form -->
              <form id="AdminLoginForm">
                <div class="form-group">
                <label for="adminemail">Email</label>
                <input type="email" class="form-control" id="adminemail" placeholder="Enter Email" name="adminemail" required>
                </div>
                <div class="form-group">
                  <label for="adminpwd">Password:</label>
                  <input type="password" class="form-control" id="adminpwd" placeholder="Enter password" name="adminpwd" required>
                </div>
                <div class="modal-footer">
                   <small id="statusAdminMsg"></small>
                  <button type="button" class="btn btn-primary" id="AdminLoginBtn" onclick="checkAdminLogin()">Login</button>
                  <button type="button" class="btn btn-secondary"data-dismiss="modal">Cancel</button>
                </div>
              </form>
              <!--Form ended-->
            </div>
            </div>
        </div>
      </div>
    </div>
    <!--End Admin login Model-->

    <!-- Jquery and Bootstrap Javascript -->
    <script src="js/jquery.min.js"></script>
    <script scr="js/popper.min.js"></script>
    <script scr="js/bootstrap.min.js"></script>
    
    <!--Ajax Call user Javascript-->
    <script type="text/javascript" src="js/ajaxrequest.js"></script>

    <!--Ajax Call  Admin Javascript-->
    <script type="text/javascript" src="js/adminajaxrequest.js"></script>
</body>

</html>