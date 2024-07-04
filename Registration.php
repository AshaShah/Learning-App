<!--Form started-->
<div class="container">
  <form id="RegForm">
    <div class="form-group">
      <label for="reguname">Username:</label>
      <small id="statusMsg1"></small>
      <input type="text" class="form-control" id="reguname" placeholder="Enter username" name="reguname" required>
    </div>
    <div class="form-group">
      <label for="regemail">Email</label>
      <small id="statusMsg2"></small>
      <input type="email" class="form-control" id="regemail" placeholder="Enter Email" name="regemail" required>
    </div>
    <div class="form-group">
      <label for="regpwd">Password:</label>
      <small id="statusMsg3"></small>
      <input type="password" class="form-control" id="regpwd" placeholder="Enter password" name="regpwd" required>
    </div>
    <div class="modal-footer">
      <span id="successMsg"></span>
      <button type="button" class="btn btn-primary" onclick="adduser()" id="signup">Sign Up</button>
      <button type="button" class="btn btn-secondary"data-dismiss="modal">Cancel</button>
    </div>
  </form>
</div>
<!--Form ended-->