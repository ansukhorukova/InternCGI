<div class="container" style="margin-top: 20px; padding: 10px; width: 550px; box-shadow: 0 0 10px rgba(0,0,150,0.5);">
    <h3>Authorization to the products management panel</h3>
    <?php if(isset($_COOKIE['validate']) && $_COOKIE['validate'] == 'no') {
        echo "<p style='color: red'>Email or login is incorrect. Enter correct email or password.</p>";
    }
    ?>
    <form role="form" method="post" action="CheckAuthorization">
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
        <button type="submit" class="btn btn-default">Submit</button>
    </form>
</div>