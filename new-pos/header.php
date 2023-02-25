<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>POS</title>

    <link rel="stylesheet" href="bootstrap-5.2.3/css/bootstrap.css">
    <link rel="stylesheet" href="bootstrap-5.2.3/css/bootstrap-grid.css">
    <link rel="stylesheet" href="bootstrap-5.2.3/css/bootstrap-reboot.css">
    <link rel="stylesheet" href="bootstrap-5.2.3/css/bootstrap-utilities.css">

    <script src="bootstrap-5.2.3/js/bootstrap.js"></script>
    <script src="bootstrap-5.2.3/js/bootstrap.min.js"></script>
    <script src="bootstrap-5.2.3/js/bootstrap.esm.js"></script>
    <script src="bootstrap-5.2.3/js/bootstrap.bundle.js"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.js"></script>

    <?php
    date_default_timezone_set("Asia/Bangkok");
    require 'db_con.php';
    require_once("dbcontroller.php");
    $db_handle = new DBController();
    ?>

    <style>
        /* The Modal (background) */
        .modal {
            background-color: rgb(0, 0, 0);
            /* Fallback color */
            background-color: rgba(0, 0, 0, 0.6);
            /* Black w/ opacity */
        }

        .modal-content {
            -webkit-animation-name: zoom;
            -webkit-animation-duration: 0.8s;
            animation-name: zoom;
            animation-duration: 0.8s;
        }

        @-webkit-keyframes zoom {
            from {
                -webkit-transform: scale(0);
            }

            to {
                -webkit-transform: scale(1);
            }
        }

        @keyframes zoom {
            from {
                transform: scale(0);
            }

            to {
                transform: scale(1);
            }
        }

        .sidenav {
            height: 100%;
            width: 0;
            position: fixed;
            z-index: 1;
            top: 0;
            left: 0;
            overflow-x: hidden;
            transition: 0.5s;
            padding-top: 60px;
            margin-top: -55px;
        }

        .darkNav {
            background-color: rgb(0, 0, 0);
            background-color: rgba(0, 0, 0, 0.6);
            height: auto;
            width: 100%;
            z-index: 1;
        }

        .sidenav a {
            padding: 8px 8px 8px 32px;
            text-decoration: none;
            font-size: 25px;
            color: #818181;
            display: block;
            transition: 0.3s;
        }

        .sidenav a:hover {
            color: #f1f1f1;
        }

        .sidenav .closebtn {
            position: absolute;
            top: 50px;
            left: 140px;
            font-size: 36px;
            margin-left: 50px;
            color: #fff;
        }
    </style>
</head>

<body class="text-white bg-main">

    <div class="container-new container">
        <div class="row pt-2">
            <!-- send index.php -->
            <div class="col-sm-6 col-md-8">
                <nav class="navbar navbar-dark justify-content-start">

                    <button class="btn btn-dark bg-second" type="button" onclick="openNav()">
                        <span style="font-size:22px;cursor:pointer">&#9776; </span>
                    </button>

                    <div id="mySidenav" class="sidenav d-flex">
                        <div id="tureNav" class="bg-second">
                            <h3 class="text-center py-4">
                                เมนู
                            </h3>
                            <a class="text-white d-flex" aria-current="page" href="index.php">
                                <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="me-3 bi bi-house-fill" viewBox="0 0 16 16">
                                    <path d="M8.707 1.5a1 1 0 0 0-1.414 0L.646 8.146a.5.5 0 0 0 .708.708L8 2.207l6.646 6.647a.5.5 0 0 0 .708-.708L13 5.793V2.5a.5.5 0 0 0-.5-.5h-1a.5.5 0 0 0-.5.5v1.293L8.707 1.5Z" />
                                    <path d="m8 3.293 6 6V13.5a1.5 1.5 0 0 1-1.5 1.5h-9A1.5 1.5 0 0 1 2 13.5V9.293l6-6Z" />
                                </svg>
                                <h5>
                                    หน้าหลัก
                                </h5>
                            </a>
                            <a class="text-white d-flex" href="sale.php">
                                <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="me-3 bi bi-bar-chart-fill" viewBox="0 0 16 16">
                                    <path d="M1 11a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1v3a1 1 0 0 1-1 1H2a1 1 0 0 1-1-1v-3zm5-4a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1v7a1 1 0 0 1-1 1H7a1 1 0 0 1-1-1V7zm5-5a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1v12a1 1 0 0 1-1 1h-2a1 1 0 0 1-1-1V2z" />
                                </svg>
                                <h5>
                                    ยอดขาย
                                </h5>
                            </a>
                            <a class="text-white d-flex" href="product.php">
                                <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="me-3 bi bi-database-fill-lock" viewBox="0 0 16 16">
                                    <path d="M8 1c-1.573 0-3.022.289-4.096.777C2.875 2.245 2 2.993 2 4s.875 1.755 1.904 2.223C4.978 6.711 6.427 7 8 7s3.022-.289 4.096-.777C13.125 5.755 14 5.007 14 4s-.875-1.755-1.904-2.223C11.022 1.289 9.573 1 8 1Z" />
                                    <path d="M3.904 9.223C2.875 8.755 2 8.007 2 7v-.839c.457.432 1.004.751 1.49.972C4.722 7.693 6.318 8 8 8s3.278-.307 4.51-.867c.486-.22 1.033-.54 1.49-.972V7c0 .424-.155.802-.411 1.133a4.51 4.51 0 0 0-1.364-.125 2.988 2.988 0 0 0-2.197.731 4.525 4.525 0 0 0-1.254 1.237A12.31 12.31 0 0 1 8 10c-1.573 0-3.022-.289-4.096-.777ZM8 14c-1.682 0-3.278-.307-4.51-.867-.486-.22-1.033-.54-1.49-.972V13c0 1.007.875 1.755 1.904 2.223C4.978 15.711 6.427 16 8 16c.09 0 .178 0 .266-.003A1.99 1.99 0 0 1 8 15v-1Zm0-1.5c0 .1.003.201.01.3A1.9 1.9 0 0 0 8 13c-1.573 0-3.022-.289-4.096-.777C2.875 11.755 2 11.007 2 10v-.839c.457.432 1.004.751 1.49.972C4.722 10.693 6.318 11 8 11c.086 0 .172 0 .257-.002A4.5 4.5 0 0 0 8 12.5Z" />
                                    <path d="M9 13a1 1 0 0 1 1-1v-1a2 2 0 1 1 4 0v1a1 1 0 0 1 1 1v2a1 1 0 0 1-1 1h-4a1 1 0 0 1-1-1v-2Zm3-3a1 1 0 0 0-1 1v1h2v-1a1 1 0 0 0-1-1Z" />
                                </svg>
                                <h5>
                                    ข้อมูลสินค้า
                                </h5>
                            </a>
                        </div>

                        <div id="darkNav" class="darkNav">
                            <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
                        </div>
                    </div>

                    <!-- head title -->
                    <h1 class="ps-5 pe-3">
                        ไจ๊เฮง
                    </h1>
                    <h3 class="pt-2">
                        <?php echo "วันที่ " . date("d-m-Y"); ?>
                    </h3>
                </nav>