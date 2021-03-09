


<!-- Modal -->
<div class="modal fade" id="signupModal" tabindex="-1" role="dialog" aria-labelledby="signupModalLabel"
    aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="signupModalLabel">Signup to e-panel</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="partials/_handleSignup.php" method="post">
                    <div class="form-group">
                        <label for="username">Username</label>
                        <input type="text" class="form-control" id="username" name="username"
                            aria-describedby="emailHelp" maxlength="11" minlength="4">
                        <small id="usernameHelpInline" class="text-muted">
                            Must be 4-11 characters long.
                        </small>
                    </div>
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" class="form-control" id="email" name="email" aria-describedby="emailHelp"
                            maxlength="20" minlength="4"
                        >

                    </div>
                    <div class="form-group">
                        <label for="password">Password</label>
                        <input type="password" class="form-control" id="password" name="password" minlength="4"
                            maxlength="23">
                        <small id="usernameHelpInline" class="text-muted">
                            Must be 4-23 characters long.
                        </small>
                    </div>
                    <div class="form-group">
                        <label for="cpassword">Confirm Password</label>
                        <input type="password" class="form-control" id="cpassword" name="cpassword">
                        <small id="emailHelp" class="form-text text-muted">Make sure to type the same password</small>
                    </div>

                    <button type="submit" class="btn btn-primary">SignUp</button>
                </form>
            </div>

        </div>
    </div>
</div>