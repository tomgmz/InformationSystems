<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <link rel="stylesheet" href="./vendor/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/7.0.1/css/all.min.css" integrity="sha512-2SwdPD6INVrV/lHTZbO2nodKhrnDdJK9/kg2XD1r9uGqPo1cUbujc+IYdlYdEErWNu69gVcYgdxlmVmzTWnetw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdn.datatables.net/2.3.7/css/dataTables.dataTables.css" />
    <script src="https://cdn.datatables.net/2.3.7/js/dataTables.js"></script>
    <title>Information System</title>
</head>
<body>
    <?php 
    include './insertModal.php';
    ?>
    <div class="container-section bg-light">
        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#save_data">
            Launch demo modal
        </button>
        <table id="information-table" class="table table-success table-striped">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Phone</th>
                    <th>Address</th>
                    <th></th>
                </tr>
            </thead>

            <tbody>
                <?php
                    $connection = mysqli_connect("localhost", "root", "", "informationsystem");
                    $query = "SELECT *  FROM userinfo";
                    $result = mysqli_query($connection, $query);

                    if(mysqli_num_rows($result) > 0){
                        foreach($result as $data){
                            ?>
                                <tr>
                                    <td><?php echo $data ['id'] ?></td>
                                    <td><?php echo $data ['name'] ?></td>
                                    <td><?php echo $data ['email'] ?></td>
                                    <td><?php echo $data ['phone'] ?></td>
                                    <td><?php echo $data ['address'] ?></td>
                                    <td>
                                        <button id="btnDelete" value= "<?php echo $data ['id'] ?>" class="btn btn-danger-subtle">
                                            <i class="fa-regular fa-trash-can"></i>
                                        </button>
                                    </td>
                                </tr>
                            <?php
                        }
                    }
                ?>
            </tbody>
        </table>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"></script>
    <script src="script.js"></script>
</body>
</html>