
<!-- Modal -->
<div class="modal fade" id="signupModal" tabindex="-1" aria-labelledby="signupModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="signupModalLabel">Sign Up Here </h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
      <div class="container py-4" >
        <form action="/forum/partials/_handlesignup.php" method="POST">
            <div class="mb-3 ">
                <label for="uname" class="form-label ">Username</label>
                <input type="text" class="form-control" id="uname" name="username" aria-describedby="emailHelp" required>
            </div>
            <div class="mb-3 ">
                <label for="uname" class="form-label ">Email</label>
                <input type="email" class="form-control" id="uemail" name="useremail" aria-describedby="emailHelp" required>
            </div>
            <div class="mb-3 ">
                <label for="password" class="form-label">Password</label>
                <input type="password" class="form-control" id="password" name="password" required>
                <div id="emailHelp" class="form-text">We'll never share your details with anyone else.</div>

            </div>
            <div class="mb-3">
                <label for="cpassword" class="form-label">Confirm Password</label>
                <input type="password" class="form-control" id="cpassword" name="cpassword" required>
            </div>
        
    </div>      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">SignUp</button>
            <button type="reset" class="btn btn-danger">Reset</button>
        </form>
      </div>
    </div>
  </div>
</div>