<div class="row content">
    <div class="col-sm-2">
        <ul class="nav nav-pills nav-stacked">
            <li><a href="http://interncgi.loc/"
                   class="btn btn-primary">Home
                </a>
            </li>
            <li><a href=""<button
                    type="button" class="btn btn-primary"
                    data-toggle="modal" data-target="#myModal">Import products
                </button></a>
            </li>
            <li>
                <a href="http://interncgi.loc/panel/logOut"
                   class="btn btn-primary">Logout
                </a>
            </li>
        </ul><br>
    </div>

    <div class="col-sm-9">
        <!-- Modal -->
        <div class="modal fade" id="myModal" role="dialog">
            <div class="modal-dialog modal-sm">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title">Enter Magento Base URL</h4>
                    </div>
                    <div class="modal-body">
                        <form role="form" method="post" action="http://interncgi.loc/panel/getMageUrl">
                            <div class="form-group">
                                <label for="mageUrl">Url:</label>
                                <input type="text"
                                       class="form-control"
                                       id="mageUrl"
                                       placeholder="Enter URL"
                                       name="mageUrl"
                                       required>
                            </div>
                            <button type="submit"
                                    class="btn btn-primary btn-block import-pr">Import products
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- Modal -->
        
    </div>
</div>
