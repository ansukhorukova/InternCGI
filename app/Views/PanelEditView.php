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
        <div class="editForm">
            <form role="form" method="post" action="http://interncgi.loc/panel/save?id=<?php echo $data['id']?>&save=yes">
                <div class="form-group">
                    <label for="name">Name</label>
                    <input type="text" class="form-control" id="name" value="<?php echo $data['name']?>" name="name" required>
                </div>
                <div class="form-group">
                    <label for="sku">Sku</label>
                    <input type="text" class="form-control" id="sku" value="<?php echo $data['sku']?>" name="sku" required>
                </div>
                <div class="form-group">
                    <label for="description">Description</label>
                    <textarea class="form-control" id="description"
                               name="description" required><?php echo $data['description']?></textarea>
                </div>
                <div class="form-group">
                    <label for="price">Price</label>
                    <input type="number" class="form-control" id="price"
                           value="<?php echo $data['final_price_with_tax']?>" name="final_price_with_tax" required>
                </div>
                <div class="checkbox">
                    <label><input type="checkbox" name="is_saleable"
                                  <?php
                                      if($data['is_saleable']) {
                                          echo 'checked';
                                      }
                                  ?>>Status</label>
                </div>
                <div class="form-group">
                    <label for="time">Last Updated</label>
                    <input type="text" class="form-control" id="time"
                           value="<?php echo $data['updated_time']?>" name="time" disabled>
                </div>
                <button type="submit" class="btn btn-primary">Save</button>
            </form>
            </table>
        </div>
    </div>
</div>
