<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>jaiheng-pos</title>

    <link rel="stylesheet" href="../../public/bootstrap-5.0.2-dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="../../public/bootstrap-5.0.2-dist/js/bootstrap.js">
    <script src="../../public/bootstrap-5.0.2-dist/js/bootstrap.min.js"></script>
</head>
<body>
    <center class="p-2"><h4><i class="fa fa-user-shield"></i> Admin</h4></center>
    <div class="d-flex align-items-start m-5">
        <div class="nav flex-column nav-pills me-3 border px-5  col-lg-2 " id="v-pills-tab" role="tablist" aria-orientation="vertical">
            <button class="nav-link active mt-2 mb-2" id="v-pills-home-tab" data-bs-toggle="pill" data-bs-target="#v-pills-home" type="button" role="tab" aria-controls="v-pills-home" aria-selected="true">Dashboard</button>
            <button class="nav-link mt-2 mb-2" id="v-pills-profile-tab" data-bs-toggle="pill" data-bs-target="#v-pills-profile" type="button" role="tab" aria-controls="v-pills-profile" aria-selected="false">Users</button>
            <button class="nav-link mt-2 mb-2" id="v-pills-messages-tab" data-bs-toggle="pill" data-bs-target="#v-pills-messages" type="button" role="tab" aria-controls="v-pills-messages" aria-selected="false">Products</button>
            <button class="nav-link mt-2 mb-2" id="v-pills-settings-tab" data-bs-toggle="pill" data-bs-target="#v-pills-settings" type="button" role="tab" aria-controls="v-pills-settings" aria-selected="false">Sales</button>
            <button class="nav-link mt-2 mb-2" id="v-pills-settings-tab" data-bs-toggle="pill" data-bs-target="#v-pills-settings" type="button" role="tab" aria-controls="v-pills-settings" aria-selected="false">Bar Code</button>
        </div>
        <div class="border w-100">
            <div class="tab-content" id="v-pills-tabContent">
                <div class="tab-pane fade show active " id="v-pills-home" role="tabpanel" aria-labelledby="v-pills-home-tab">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                            <th scope="col">#</th>
                            <th scope="col">First</th>
                            <th scope="col">Last</th>
                            <th scope="col">Handle</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <th scope="row">1</th>
                                <td>Mark</td>
                                <td>Otto</td>
                                <td>@mdo</td>
                            </tr>
                            <tr>
                                <th scope="row">2</th>
                                <td>Jacob</td>
                                <td>Thornton</td>
                                <td>@fat</td>
                            </tr>
                            <tr>
                                <th scope="row">3</th>
                                <td colspan="2">Larry the Bird</td>
                                <td>@twitter</td>
                            </tr>
                            <tr>
                                <th scope="row">4</th>
                                <td>Mark</td>
                                <td>Otto</td>
                                <td>@mdo</td>
                            </tr>
                            <tr>
                                <th scope="row">5</th>
                                <td>Jacob</td>
                                <td>Thornton</td>
                                <td>@fat</td>
                            </tr>
                            <tr>
                                <th scope="row">6</th>
                                <td colspan="2">Larry the Bird</td>
                                <td>@twitter</td>
                            </tr>
                        </tbody>
                    </table>
                </div>

                <div class="tab-pane fade" id="v-pills-profile" role="tabpanel" aria-labelledby="v-pills-profile-tab">
                <?php
                    require('connect.php');

                    $sql = '
                        SELECT * 
                        FROM users;
                        ';

                    $objQuery = mysqli_query($conn, $sql) or die("Error Query [" . $sql . "]");
                    ?>

                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th scope="col">ID</th>
                                <th scope="col">name</th>
                                <th scope="col">email</th>
                                <th scope="col">password</th>
                                <th scope="col">image</th>
                                <th scope="col">role</th>
                                <th scope="col">gender</th>
                                
                                <a href="index.php?pg=add_users">
                                    <th scope="col"> <button class="btn btn-primary btn-sm"><i class="fa fa-plus"></i> Add new</button></th>
                                </a>
                            </tr>
                        </thead>
                        <tbody>
                        <?php
                            $i = 1;
                            while ($objResult = mysqli_fetch_array($objQuery)) {
                            ?>
                            <tr>
                                <td><?php echo $objResult["users_id"]; ?></td>
                                <td><?php echo $objResult["usersname"]; ?></td>
                                <td><?php echo $objResult["email"]; ?></td>
                                <td><?php echo $objResult["password"]; ?></td>
                                <td><?php echo $objResult["image"]; ?></td>
                                <td><?php echo $objResult["role"]; ?></td>
                                <td><?php echo $objResult["gender"]; ?></td>
                                <td>
                                    <div>
                                        <button href='../edit_users.php'class="btn btn-success btn-sm">Edit</button>
                                        <button class="btn btn-danger btn-sm">Delete</button>
                                    </div>
                                </td>
                                </td>
                                
                            </tr>
                            <?php
                                $i++;
                                }
                                ?>
                        </tbody>
                    </table>
                </div>

                <div class="tab-pane fade" id="v-pills-messages" role="tabpanel" aria-labelledby="v-pills-messages-tab">
                <?php
                    require('connect.php');

                    $sql = '
                        SELECT * 
                        FROM products;
                        ';

                    $objQuery = mysqli_query($conn, $sql) or die("Error Query [" . $sql . "]");
                    ?>

                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th scope="col">ID</th>
                                <th scope="col">name</th>
                                <th scope="col">details</th>
                                <th scope="col">qty</th>
                                <th scope="col">price</th>
                                <th scope="col">image</th>
                                <th scope="col">size</th>
                                <th scope="col">comments</th>
                                <th scope="col">vat</th>
                                <th scope="col">data</th>
                                <a href="index.php?pg=add_users">
                                    <th scope="col"> <button class="btn btn-primary btn-sm"><i class="fa fa-plus"></i> Add new</button></th>
                                </a>
                            </tr>
                        </thead>
                        <tbody>
                        <?php
                            $i = 1;
                            while ($objResult = mysqli_fetch_array($objQuery)) {
                            ?>
                            <tr>
                                <td><?php echo $objResult["products_id"]; ?></td>
                                <td><?php echo $objResult["products_name"]; ?></td>
                                <td><?php echo $objResult["details"]; ?></td>
                                <td><?php echo $objResult["barcode"]; ?></td>
                                <td><?php echo $objResult["qty"]; ?></td>
                                <td><?php echo $objResult["price"]; ?></td>
                                <td><?php echo $objResult["image"]; ?></td>
                                <td><?php echo $objResult["size"]; ?></td>
                                <td><?php echo $objResult["comments"]; ?></td>
                                <td><?php echo $objResult["vat"]; ?></td>
                                <td><?php echo $objResult["data"]; ?></td>
                                <td>
                                    <div>
                                        <button href='../edit_users.php'class="btn btn-success btn-sm">Edit</button>
                                        <button class="btn btn-danger btn-sm">Delete</button>
                                    </div>
                                </td>
                                </td>
                                
                            </tr>
                            <?php
                                $i++;
                                }
                                ?>
                        </tbody>
                    </table>
                </div>

                <div class="tab-pane fade" id="v-pills-settings" role="tabpanel" aria-labelledby="v-pills-settings-tab">
                <?php
                    require('connect.php');

                    $sql = '
                        SELECT * 
                        FROM products,sales;
                       
                    
                        ';

                    $objQuery = mysqli_query($conn, $sql) or die("Error Query [" . $sql . "]");
                    ?>

                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th scope="col">ID</th>
                                <th scope="col">receipt</th>
                                <th scope="col">total price</th>
                                <th scope="col">qty total</th>
                                <th scope="col">selling time</th>
                                <th scope="col">users id</th>
                                <th scope="col">products id</th>
                                <a href="index.php?pg=add_users">
                                    <th scope="col"> <button class="btn btn-primary btn-sm"><i class="fa fa-plus"></i> Add new</button></th>
                                </a>
                            </tr>
                        </thead>
                        <tbody>
                        <?php
                            $i = 1;
                            while ($objResult = mysqli_fetch_array($objQuery)) {
                            ?>
                            <tr>
                                <td><?php echo $objResult["sale_id"]; ?></td>
                                <td><?php echo $objResult["receipt"]; ?></td>
                                <td><?php echo $objResult["total_price"]; ?></td>
                                <td><?php echo $objResult["qty_total"]; ?></td>
                                <td><?php echo $objResult["selling_time"]; ?></td>
                                <td><?php echo $objResult["users_id"]; ?></td>
                                <td><?php echo $objResult["products_id"]; ?></td>
                                
                                <td>
                                    <div>
                                        <button href='../edit_users.php'class="btn btn-success btn-sm">Edit</button>
                                        <button class="btn btn-danger btn-sm">Delete</button>
                                    </div>
                                </td>
                                </td>
                                
                            </tr>
                            <?php
                                $i++;
                                }
                                ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</body>
</html>