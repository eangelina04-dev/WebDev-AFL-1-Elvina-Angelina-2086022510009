<?php require_once(__DIR__ . "/../controller/controller_employee.php"); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="../assets/style.css" rel="stylesheet">
    <title>Employee</title>
</head>
<body>
<div class="container p-3 container-app">
    <div class="card">
        <div class="card-header navbar-custom">
            <ul class="nav">
                <li class="nav-item"><a class="nav-link active" href="view_employee.php">Employee</a></li>
                <li class="nav-item"><a class="nav-link" href="view_office.php">Office</a></li>
                <li class="nav-item"><a class="nav-link" href="view_officeemployee.php">Office-Employees</a></li>
            </ul>
        </div>

        <div class="card-body">
            <h5 class="title">List Karyawan</h5>
            <table class="table table-dark text-center">
                <thead>
                    <tr>
                        <th>No</th><th>Nama</th><th>Jabatan</th><th>Usia</th><th>Delete</th>
                    </tr>
                </thead>
                <tbody>
                <?php
                $employees = getAllEmployees();
                if (count($employees) == 0) {
                    echo '<tr><td colspan="5"><em>Belum ada karyawan.</em></td></tr>';
                } else {
                    $no = 0;
                    foreach ($employees as $index => $emp) {
                        $no++;
                ?>
                    <tr>
                        <td><?= $no ?></td>
                        <td><?= htmlspecialchars($emp->name) ?></td>
                        <td><?= htmlspecialchars($emp->position) ?></td>
                        <td><?= htmlspecialchars($emp->age) ?></td>
                        <td>
                            <a href="../controller/controller_employee.php?deleteID=<?= $index ?>"
                               class="btn btn-danger btn-sm">Delete</a>
                        </td>
                    </tr>
                <?php } } ?>
                </tbody>
            </table>

            <h5 class="title mt-4">Tambah Karyawan</h5>
            <form method="POST" action="../controller/controller_employee.php">
                <div class="mb-3">
                    <label class="form-label">Nama</label>
                    <input type="text" class="form-control" name="inputName" placeholder="Masukkan Nama" required>
                </div>
                <div class="mb-3">
                    <label class="form-label">Jabatan</label>
                    <input type="text" class="form-control" name="inputPosition" placeholder="Masukkan Jabatan" required>
                </div>
                <div class="mb-3">
                    <label class="form-label">Usia</label>
                    <input type="number" class="form-control" name="inputAge" placeholder="Masukkan Usia" required>
                </div>
                <div class="text-center">
                    <button type="submit" name="button_submit" class="btn btn-primary px-4">Submit</button>
                </div>
            </form>
        </div>
    </div>
</div>
</body>
</html>