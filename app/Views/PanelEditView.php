<div class="row content">
    <div class="col-sm-2">
        <ul class="nav nav-pills nav-stacked">
            <li><a href="http://interncgi.loc/"
                   class="btn btn-primary">Home
                </a>
            </li>
            <li><a href=""
                    type="button" class="btn btn-primary"
                    onclick="history.back()">Back
                </a>
            </li>
            <li>
                <a href="http://interncgi.loc/panel/logOut"
                   class="btn btn-primary">Logout
                </a>
            </li>
        </ul><br>
    </div>

    <div class="col-sm-9">
        <div class="editForm">
            <?php if(is_string($data)) {
                echo "<h3 style='color: red'><b>$data</b></h3>";
            } ?>
            <form role="form" method="post"
                  action="http://interncgi.loc/panel/save?id=
                     <?php if(!empty($data['id'])) echo $data['id']; ?>&save=yes">
                <div class="form-group">
                    <label for="name">Name</label>
                    <input type="text" class="form-control" id="name" maxlength="65535"
                           value="<?php if(!empty($data['name'])) echo $data['name']; ?>" name="name" required>
                </div>
                <div class="form-group">
                    <label for="sku">Sku</label>
                    <input type="text" class="form-control" id="sku" maxlength="255"
                           value="<?php if(!empty($data['sku'])) echo $data['sku']; ?>" name="sku" required>
                </div>
                <div class="form-group">
                    <label for="description">Description</label>
                    <textarea class="form-control"
                              id="description"
                              maxlength="65535"
                              name="description"
                              required><?php if(!empty($data['description'])) echo $data['description']; ?></textarea>
                </div>
                <div class="form-group">
                    <label for="price">Price</label>
                    <input type="number" class="form-control" id="price" step="any" min="0" maxlength="15"
                           value="<?php if(!empty($data['final_price_with_tax'])) {
                                      echo $data['final_price_with_tax'];} else { echo 0; } ?>"
                           name="final_price_with_tax" required>
                </div>
                <div class="checkbox">
                    <p><b>When checked, product is available in stock<b></p>
                    <label><input type="checkbox" name="is_saleable"
                                  <?php
                                      if(!empty($data['is_saleable'])) {
                                          echo 'checked';
                                      }
                                  ?>>Status
                    </label>
                </div>
                <div class="form-group">
                    <label for="time">Last Updated</label>
                    <input type="text" class="form-control" id="time"
                           value="<?php if(!empty($data['updated_time']))
                               echo $data['updated_time']; ?>" name="time" readonly>
                </div>
                <button type="submit" class="btn btn-primary">Save</button>
            </form>
            </table>
        </div>
    </div>
</div>
