

<!-- Modal -->
<div class="modal fade" id="loginModal" tabindex="-1" aria-labelledby="loginModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="loginModalLabel">Login Here</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
      <div class="container py-4" >
        <form action="/forum/partials/_handlelogin.php" method="POST">
            <div class="mb-3 ">
                <label for="uname" class="form-label ">Email</label>
                <input type="text" class="form-control" id="uname" name="uemail" aria-describedby="emailHelp" required>
            </div>
            <div class="mb-3 ">
                <label for="password" class="form-label">Password</label>
                <input type="password" class="form-control" id="password" name="upassword" required>
                <div id="emailHelp" class="form-text">We'll never share your details with anyone else.</div>
            </div>
           
    </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Login</button>
        </form>
      </div>
    </div>
  </div>
</div>