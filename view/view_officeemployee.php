<?php require_once(__DIR__ . "/../controller/controller_officeemployee.php"); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="../assets/style.css" rel="stylesheet">
    <title>Office Employees</title>
</head>
<body>
<div class="container p-3 container-app">
    <div class="card card-oe">
        <div class="card-header navbar-custom">
            <ul class="nav">
                <li class="nav-item"><a class="nav-link" href="view_employee.php">Employee</a></li>
                <li class="nav-item"><a class="nav-link" href="view_office.php">Office</a></li>
                <li class="nav-item"><a class="nav-link" href="view_officeemployee.php">Office-Employees</a></li>
            </ul>
        </div>

        <div class="card-body">
            <h1 class="oe-title">Office Employees</h1>

            <table class="oe-table">
                <thead>
                    <tr>
                        <th>Employee</th>
                        <th>Office</th>
                    </tr>
                </thead>
                <tbody>
                <?php
                $list = getAllOfficeEmployees();
                if (count($list) == 0) {
                    echo '<tr><td colspan="2"><em>Belum ada data.</em></td></tr>';
                } else {
                    foreach ($list as $oe) {
                ?>
                    <tr>
                        <td><?= htmlspecialchars($oe->employeeName) ?></td>
                        <td><?= htmlspecialchars($oe->officeName) ?></td>
                    </tr>
                <?php } } ?>
                </tbody>
            </table>

            <form method="POST" action="../controller/controller_officeemployee.php" class="oe-form">
                <div class="oe-row">
                    <label for="selectEmployee">Employee</label>
                    <div class="oe-select">
                        <select name="selectEmployee" id="selectEmployee" required>
                            <?php foreach (getAllEmployees() as $index => $emp) { ?>
                                <option value="<?= $index ?>"><?= htmlspecialchars($emp->name) ?></option>
                            <?php } ?>
                        </select>
                    </div>
                </div>
                <div class="oe-row">
                    <label for="selectOffice">Office</label>
                    <div class="oe-select">
                        <select name="selectOffice" id="selectOffice" required>
                            <?php foreach (getAllOffices() as $index => $office) { ?>
                                <option value="<?= $index ?>"><?= htmlspecialchars($office->name) ?></option>
                            <?php } ?>
                        </select>
                    </div>
                </div>
                <div class="text-center">
                    <button type="submit" name="button_save_officeemployee" class="btn-save">SAVE</button>
                </div>
            </form>
        </div>
    </div>
</div>
</body>
</html>