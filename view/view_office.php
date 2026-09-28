<?php require_once(__DIR__ . "/../controller/controller_office.php"); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="../assets/style.css" rel="stylesheet">
    <title>Office</title>
</head>
<body>
<div class="container p-3 container-app">
    <div class="card">
        <div class="card-header navbar-custom">
            <ul class="nav">
                <li class="nav-item"><a class="nav-link" href="view_employee.php">Employee</a></li>
                <li class="nav-item"><a class="nav-link" href="view_office.php">Office</a></li>
                <li class="nav-item"><a class="nav-link" href="view_officeemployee.php">Office-Employees</a></li>
            </ul>
        </div>

        <div class="card-body">
            <h5 class="title">List Kantor</h5>
            <table class="table table-dark text-center">
                <thead>
                    <tr>
                        <th>No</th><th>Nama Kantor</th><th>Alamat</th><th>Kota</th><th>Telepon</th><th>Delete</th>
                    </tr>
                </thead>
                <tbody>
                <?php
                $offices = getAllOffices();
                if (count($offices) == 0) {
                    echo '<tr><td colspan="6"><em>Belum ada kantor.</em></td></tr>';
                } else {
                    $no = 0;
                    foreach ($offices as $index => $office) {
                        $no++;
                ?>
                    <tr>
                        <td><?= $no ?></td>
                        <td><?= htmlspecialchars($office->name) ?></td>
                        <td><?= htmlspecialchars($office->address) ?></td>
                        <td><?= htmlspecialchars($office->city) ?></td>
                        <td><?= htmlspecialchars($office->phone) ?></td>
                        <td>
                            <a href="../controller/controller_office.php?deleteOfficeID=<?= $index ?>"
                            class="btn btn-danger btn-sm">Delete</a>
                        </td>
                    </tr>
                <?php } } ?>
                </tbody>
            </table>

            <h5 class="title mt-4">Tambah Kantor</h5>
            <form method="POST" action="../controller/controller_office.php">
                <div class="mb-3">
                    <label class="form-label">Nama Kantor</label>
                    <input type="text" class="form-control" name="inputOfficeName" placeholder="Masukkan Nama Kantor" required>
                </div>
                <div class="mb-3">
                    <label class="form-label">Alamat</label>
                    <input type="text" class="form-control" name="inputAddress" placeholder="Masukkan Alamat" required>
                </div>
                <div class="mb-3">
                    <label class="form-label">Kota</label>
                    <input type="text" class="form-control" name="inputCity" placeholder="Masukkan Kota" required>
                </div>
                <div class="mb-3">
                    <label class="form-label">Telepon</label>
                    <input type="text" class="form-control" name="inputPhone" placeholder="Masukkan Telepon" required>
                </div>
                <div class="text-center">
                    <button type="submit" name="button_submit_office" class="btn btn-primary px-4">Submit</button>
                </div>
            </form>
        </div>
    </div>
</div>
</body>
</html>