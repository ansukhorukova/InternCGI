<div class="row content">
    <div class="col-sm-2">
        <ul class="nav nav-pills nav-stacked">
            <li><a href="http://interncgi.loc/"
                   class="btn btn-primary">Home
                </a>
            </li>
            <li>
                <a href="panel/logOut"
                   class="btn btn-primary">Logout
                </a>
            </li>
        </ul><br>
    </div>
    <div class="col-sm-10">

        <div class="authorization">
            <h3>Entrance to the product management panel</h3>
            <?php if(isset($_SESSION['validate']) && $_SESSION['validate'] == 'no') {
                echo "<p style='color: red'>Email or login is incorrect. Enter correct email or password.</p>";
            }
            ?>
            <form role="form" method="post" action="authorization/checkUser">
                <div class="form-group">
                    <label for="email">Email:</label>
                    <input type="email" class="form-control" id="email" placeholder="Enter email" name="email" required>
                </div>
                <div class="form-group">
                    <label for="pwd">Password:</label>
                    <input type="password" class="form-control" id="pwd" placeholder="Enter password" name="password" required>
                </div>
                <div class="checkbox">
                    <label><input type="checkbox" name="remember"> Remember me</label>
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </div>
</div>
