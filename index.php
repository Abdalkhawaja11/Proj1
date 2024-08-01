<?php
session_start(); 
$conn = mysqli_connect("localhost", "root", "12345678", "todolist");

if (!$conn) {
    die("Connection error: " . mysqli_connect_error());
}
$sql = "SELECT * FROM task";
$result = mysqli_query($conn, $sql);
?>
<!DOCTYPE html>
<html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,600,600i,700,700i" rel="stylesheet">
</head>
<body>
    <section class="vh-100 gradient-custom">
        <div class="container py-5 h-100">
            <div class="row d-flex justify-content-center align-items-center h-100">
                <div class="col col-xl-10">
                    <div class="card">
                        <div class="card-body p-5">
                            <form action="./header/store-task.php" method="POST" class="d-flex justify-content-center align-items-center mb-4">
                                <div class="form-outline flex-fill">
                                    <?php if(isset($_SESSION['success'])): ?>
                                        <div class="alert alert-success text-center">
                                            <?php echo htmlspecialchars($_SESSION['success']);
                                            unset($_SESSION['success']);
                                            ?>
                                        </div>
                                    <?php endif; ?>
                                    <input type="text" name="title" id="myInput" class="form-control" />
                                </div>
                                <input type="submit" class="btn btn-info ms-2" />
                            </form>
                            <ul class="nav nav-tabs mb-4 pb-2" id="myUL" role="tablist">
                                <li class="nav-item" role="presentation">
                                    <a class="nav-link active" id="ex1-tab-1" data-mdb-tab-init href="#ex1-tabs-1" role="tab" aria-controls="ex1-tabs-1" aria-selected="true">All</a>
                                </li>
                            </ul>
                            <div class="tab-content" id="ex1-content">
                                <div class="tab-pane fade show active" id="ex1-tabs-1" role="tabpanel" aria-labelledby="ex1-tab-1">
                                    <table class="table table-bordered">
                                        <thead>
                                            <tr>
                                                <th>id</th>
                                                <th>Task</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php while($row = mysqli_fetch_assoc($result)): ?>
                                                <tr>
                                                    <td><?php echo htmlspecialchars($row['id']); ?></td>
                                                    <td><?php echo htmlspecialchars($row['title']); ?></td>
                                                </tr>
                                            <?php endwhile; ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</body>
</html>
