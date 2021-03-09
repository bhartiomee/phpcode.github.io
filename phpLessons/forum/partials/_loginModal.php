
<!-- Modal -->
<div class="modal fade" id="loginModal" tabindex="-1" role="dialog" aria-labelledby="loginModalLabel"
    aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="loginModalLabel">Login to e-panel</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="partials/_handleLogin.php" method="post">
                <div class="form-group">
                        <label for="emailLog">Email</label>
                        <input type="email" class="form-control" id="email" name="email" aria-describedby="emailHelp"
                            maxlength="20" minlength="4"
                        >

                    </div>
                    <div class="form-group">
                        <label for="password">Password</label>
                        <input type="password" class="form-control" id="password" name="password">
                    </div>


                    <button type="submit" class="btn btn-info">Login</button>
                </form>
            </div>
            <div class="modal-footer">
                <p>Don't have an account?</p>
                <button type="button" class="btn btn-outline-info mx-2" data-toggle="modal" data-target="#signupModal">Signup</button>
            </div>
        </div>
    </div>
</div>