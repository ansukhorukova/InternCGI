<div class="container" style="margin-top: 20px; padding: 10px; width: 300px; box-shadow: 0 0 10px rgba(0,0,150,0.5);">
    <h3>Enter Magento Base URL</h3>
    <form role="form" method="post" action="Panel/GetMageUrl">
        <div class="form-group">
            <label for="mageUrl">Url:</label>
            <input type="text" class="form-control" id="mageUrl" placeholder="Enter URL" name="mageUrl" required>
        </div>
        <button type="submit" class="btn btn-primary btn-block" style="margin-bottom: 10px">Import products</button>
    </form>
    <a href="Main" class="btn btn-primary" style="float: left">Main page</a>
    <a href="Panel/LogOut" class="btn btn-primary" style="float: right"> Logout </a>
</div>
