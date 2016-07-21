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
                                <label for="mageUrl">URL:</label>
                                <input type="text"
                                       class="form-control"
                                       id="mageUrl"
                                       placeholder="Ex: magento.com"
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
        <div class="tableWithProducts">
            <?php
            if($data != null) {
                echo '<h2>Products Table</h2>'; ?>
                <form style="float: left" class="form-inline"
                      action="/panel/index">
                    <div class="form-group">
                        Sort by: <select name="subject">
                            <option value="name"
                                <?php
                                if(isset($_SESSION['subject']) && $_SESSION['subject'] == 'name') {
                                    echo 'selected';
                                }
                                ?>>Name</option>
                            <option value="price"
                                <?php
                                if(isset($_SESSION['subject']) && $_SESSION['subject'] == 'price') {
                                    echo 'selected';
                                }
                                ?>>Price</option>
                        </select>
                        <select name="method">
                            <option value="ASC"
                                <?php
                                if(isset($_SESSION['method']) && $_SESSION['method'] == 'ASC') {
                                    echo 'selected';
                                }
                                ?>>Ascending</option>
                            <option value="DESC"
                                <?php
                                if(isset($_SESSION['method']) && $_SESSION['method'] == 'DESC') {
                                    echo 'selected';
                                }
                                ?>>Descending</option>
                        </select>
                        Number of entries per page: <select name="onPage">
                            <option value="15"
                                <?php
                                if(isset($_SESSION['onPage']) && $_SESSION['onPage'] == 15) {
                                    echo 'selected';
                                }
                                ?>>15</option>
                            <option value="30"
                                <?php
                                if(isset($_SESSION['onPage']) && $_SESSION['onPage'] == 30) {
                                    echo 'selected';
                                }
                                ?>>30</option>
                            <option value="50"
                                <?php
                                if(isset($_SESSION['onPage']) && $_SESSION['onPage'] == 50) {
                                    echo 'selected';
                                }
                                ?>>50</option>
                            <option value="100"
                                <?php
                                if(isset($_SESSION['onPage']) && $_SESSION['onPage'] == 100) {
                                    echo 'selected';
                                }
                                ?>>100</option>
                        </select>

                        <button type="submit" class="btn btn-default">Sort</button>
                    </div>
                </form>
                <?php
                echo '<br><br><table class="table table-bordered">';
                echo '<thead><tr><th>ID</th><th>Name</th><th>Price</th><th>Edit</th></tr></thead>';
                for($i = 0; $i < count($data); $i++) {
                    echo '<tr>';
                    foreach ($data[$i] as $key => $value) {
                        if($key == 'id' || $key == 'name' || $key == 'final_price_with_tax') {
                            if($key == 'final_price_with_tax') {
                                echo '<td>' . number_format($value, 2, '.', ' ') . '</td>';
                            } else {
                                echo '<td>' . $value . '</td>';
                            }
                        } else {
                            continue;
                        }
                    }
                    echo "<td><a href='http://interncgi.loc/panel/edit?id={$data[$i]['id']}'>Edit</a></td>";
                    echo '</tr>';
                }
                echo '</table>';
            } else {
                echo '<h1 style="text-align: center;">Please import data from Magento tables</h1>';
            }
            ?>
            </table>
        </div>
        <ul class="pagination">
            <?php
            $get = "&subject={$_SESSION['subject']}&method={$_SESSION['method']}&onPage={$_SESSION['onPage']}";
            $page = $_SESSION['page'];
            $numberPages = $_SESSION['numberPages'];
            $previous = $page - 1;
            if(($previous == 0) || ($previous < 0)) {
                $previous = 1;
            }
            $next = $page + 1;
            if($next > $numberPages) {
                $next = $page;
            }
            echo "<li><a href='/panel/index?page=" . $previous . $get . "'><</a></li>";
            $i = 1;
            do {
                if($i == $page) {
                    echo "<li class='active'><a href='/panel/index?page=" . $i . $get . "'>" . $i . "</a></li>";
                } else {
                    echo "<li><a href='/panel/index?page=" . $i . $get . "'>" . $i . "</a></li>";
                }
                $i++;
            }
            while($i <= $numberPages);

            echo "<li><a href='/panel/index?page=" . $next . $get . "'>></a></li>";
            ?>
        </ul>
    </div>
</div>
