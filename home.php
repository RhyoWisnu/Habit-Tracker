<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daily Habit Tracker</title>

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
    
    <!-- Font Awesome CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <!-- MODUL 8 GUI-->
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@500&display=swap');

        * {
            margin: 0;
            padding: 0;
            font-family: 'Poppins';
        }

        body {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            background-image: url('https://www.designyourway.net/blog/wp-content/uploads/2019/02/aesthetic-wallpaper-1.jpg');
            background-repeat: no-repeat;
            background-attachment: fixed;
            background-size: cover;
        }

        .tracker-container {
            width: 1450px;
            height: 700px;
            background-color: rgba(0, 0, 0, 0.7);
            color: rgb(255, 255, 255);
            border-radius: 20px;
            box-shadow: rgba(0, 0, 0, 0.35) 0px 5px 15px;
            padding: 40px;
        }

        .table {
            color: rgb(255, 255, 255) !important; 
            }

        .dataTables_wrapper {
            position: relative;
            padding: 10px;
            height: 570px !important;
            text-align: center !important;
        }

        .dataTables_info {
            position: absolute;
            bottom: 10px;
            left: 10px;
        }

        .dataTables_paginate {
            position: absolute;
            bottom: 10px;
            right: 0px;
        }

        table.dataTable thead > tr > th.sorting, table.dataTable thead > tr > th.sorting_asc, table.dataTable thead > tr > th.sorting_desc, table.dataTable thead > tr > th.sorting_asc_disabled, table.dataTable thead > tr > th.sorting_desc_disabled, table.dataTable thead > tr > td.sorting, table.dataTable thead > tr > td.sorting_asc, table.dataTable thead > tr > td.sorting_desc, table.dataTable thead > tr > td.sorting_asc_disabled, table.dataTable thead > tr > td.sorting_desc_disabled {
            text-align: center;
        }

        .action-button {
            display: flex;
            justify-content: center;
        }
        
        .action-button > button {
            width: 28px;
            height: 28px;
            font-size: 17px;
            display: flex !important;
            justify-content: center;
            align-items: center;
            margin: 0px 2px;
        }
        </style>

</head>
<body>

    <!-- MODUL 5 OOP Class dan Constructor-->
    <div class="main">

        <div class="tracker-container">
            <div class="tracker-header row">
                <h3 class="col-9">Track your daily habit!</h3>
                <button class="btn btn-dark ml-5" data-toggle="modal" data-target="#addTrackerModal">Add tracker today</button>
                <button class="btn btn-danger ml-4" onclick="window.location.href = 'index.php'">Logout</button>
            </div>
            <hr style="background-color: rgb(200, 200, 200)">

            <!-- Struktur dasar Add Modal -->
            <div class="modal fade" id="addTrackerModal" tabindex="-1" aria-labelledby="addTracker" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content" style="background-color: rgb(60, 60, 60)">
                        <div class="modal-header">
                            <h5 class="modal-title" id="addTracker">Add Daily Habit</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <form action="./endpoint/add-tracker.php" method="POST">
                                <div class="form-group row">
                                    <label for="date" class="col-sm-2 col-form-label">Date:</label>
                                    <div class="col-sm-10">
                                        <input type="date" class="form-control" id="date" name="date">
                                    </div>
                                </div>
                                <hr style="background-color: rgb(255, 255, 255);">
                                <h4>Habbits</h4>
                                <div class="form-group row">
                                    <label for="exercise" class="col-sm-6 col-form-label">Olahraga:</label>
                                    <div class="col-sm-6">
                                        <select class="form-control" name="exercise" id="exercise">
                                            <option value="Yes">Yes</option>
                                            <option value="No">No</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="pray" class="col-sm-6 col-form-label">Ibadah:</label>
                                    <div class="col-sm-6">
                                        <select class="form-control" name="pray" id="pray">
                                            <option value="Yes">Yes</option>
                                            <option value="No">No</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="readBook" class="col-sm-6 col-form-label">Baca Buku:</label>
                                    <div class="col-sm-6">
                                        <select class="form-control" name="read_book" id="readBook">
                                            <option value="Yes">Yes</option>
                                            <option value="No">No</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="vitamins" class="col-sm-6 col-form-label">Minum Vitamin:</label>
                                    <div class="col-sm-6">
                                        <select class="form-control" name="vitamins" id="vitamins">
                                            <option value="Yes">Yes</option>
                                            <option value="No">No</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="laundry" class="col-sm-6 col-form-label">Laundry:</label>
                                    <div class="col-sm-6">
                                        <select class="form-control" name="laundry" id="laundry">
                                            <option value="Yes">Yes</option>
                                            <option value="No">No</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="gula" class="col-sm-6 col-form-label">No gula:</label>
                                    <div class="col-sm-6">
                                        <select class="form-control" name="gula" id="gula">
                                            <option value="Yes">Yes</option>
                                            <option value="No">No</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="meat" class="col-sm-6 col-form-label">Nugas:</label>
                                    <div class="col-sm-6">
                                        <select class="form-control" name="meat" id="meat">
                                            <option value="Yes">Yes</option>
                                            <option value="No">No</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                                    <button type="submit" class="btn btn-secondary">Add Tracker</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Struktur Dasar Modal Update Modal -->
            <div class="modal fade" id="updateTrackerModal" tabindex="-1" aria-labelledby="updateTracker" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content" style="background-color: rgb(60, 60, 60)">
                        <div class="modal-header">
                            <h5 class="modal-title" id="updateTracker">Update Daily Habit</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <form action="./endpoint/update-tracker.php" method="POST">
                                <input type="hidden" class="form-control" id="updateTrackerID" name="tbl_tracker_id">
                                <div class="form-group row">
                                    <label for="updateDate" class="col-sm-2 col-form-label">Date:</label>
                                    <div class="col-sm-10">
                                        <input type="date" class="form-control" id="updateDate" name="date">
                                    </div>
                                </div>
                                <hr style="background-color: rgb(255, 255, 255);">
                                <h4>Habbits</h4>
                                <div class="form-group row">
                                    <label for="updateExercise" class="col-sm-6 col-form-label">Olahraga:</label>
                                    <div class="col-sm-6">
                                        <select class="form-control" name="exercise" id="updateExercise">
                                            <option value="Yes">Yes</option>
                                            <option value="No">No</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="updatePray" class="col-sm-6 col-form-label">Ibadah:</label>
                                    <div class="col-sm-6">
                                        <select class="form-control" name="pray" id="updatePray">
                                            <option value="Yes">Yes</option>
                                            <option value="No">No</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="updateReadBook" class="col-sm-6 col-form-label">Baca Buku:</label>
                                    <div class="col-sm-6">
                                        <select class="form-control" name="read_book" id="updateReadBook">
                                            <option value="Yes">Yes</option>
                                            <option value="No">No</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="updateVitamins" class="col-sm-6 col-form-label">Minum Vitamin:</label>
                                    <div class="col-sm-6">
                                        <select class="form-control" name="vitamins" id="updateVitamins">
                                            <option value="Yes">Yes</option>
                                            <option value="No">No</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="updateLaundry" class="col-sm-6 col-form-label">Laundry:</label>
                                    <div class="col-sm-6">
                                        <select class="form-control" name="laundry" id="updateLaundry">
                                            <option value="Yes">Yes</option>
                                            <option value="No">No</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="updategula" class="col-sm-6 col-form-label">No gula:</label>
                                    <div class="col-sm-6">
                                        <select class="form-control" name="gula" id="updategula">
                                            <option value="Yes">Yes</option>
                                            <option value="No">No</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="updateMeat" class="col-sm-6 col-form-label">Nugas:</label>
                                    <div class="col-sm-6">
                                        <select class="form-control" name="meat" id="updateMeat">
                                            <option value="Yes">Yes</option>
                                            <option value="No">No</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                                    <button type="submit" class="btn btn-secondary">Update Tracker</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            
            <!--Header tulisan pada tabel-->
            <div class="table-container">
                <table class="table habit-table">
                    <thead class="thead-dark">
                        <tr>    
                            <th scope="col">Date</th>
                            <th scope="col">Olahraga</th>
                            <th scope="col">Ibadah</th>
                            <th scope="col">Baca Buku</th>
                            <th scope="col">Mium Vitamin</th>
                            <th scope="col">Laundry</th>
                            <th scope="col">No gula</th>
                            <th scope="col">Nugas</th>
                            <th scope="col">Progress</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        
                        <?php 
                        include ('./conn/conn.php');

                        $stmt = $conn->prepare("SELECT * FROM tbl_tracker");
                        $stmt->execute();

                        $result = $stmt->fetchAll();
                        
                        // foreach Modul Perulangan
                        // Memproses dan Menampilkan Data
                        foreach ($result as $row) {
                            $trackerID = $row['tbl_tracker_id'];
                            $date = $row['date'];
                            $exercise = $row['exercise'];
                            $pray = $row['pray'];
                            $readBook = $row['read_book'];
                            $vitamins = $row['vitamins'];
                            $laundry = $row['laundry'];
                            $gula = $row['gula'];
                            $meat = $row['meat'];

                            // Array pada MODUl 1 (menghitung progress)
                            $totalHabits  = 7;
                            $completedHabits = count(array_filter([$exercise, $pray, $readBook, $vitamins, $laundry, $gula, $meat], function($habit) { return $habit == 'Yes'; }));

                            // Hindari pembagian dengan nol
                            $progress = $totalHabits > 0 ? ($completedHabits / $totalHabits) * 100 : 0;
                            ?>

                            <tr>
                                <!--Baris Tabel-->
                                <th scope="row" id="date-<?= $trackerID ?>"><?= $date ?></th>
                                <td id="exercise-<?= $trackerID ?>"><?= $exercise ?></td>
                                <td id="pray-<?= $trackerID ?>"><?= $pray ?></td>
                                <td id="readBook-<?= $trackerID ?>"><?= $readBook ?></td>
                                <td id="vitamins-<?= $trackerID ?>"><?= $vitamins ?></td>
                                <td id="laundry-<?= $trackerID ?>"><?= $laundry ?></td>
                                <td id="gula-<?= $trackerID ?>"><?= $gula ?></td>
                                <td id="meat-<?= $trackerID ?>"><?= $meat ?></td>
                                <td style="width: 150px;">
                                    <div class="progress">
                                        <div class="progress-bar" role="progressbar" style="width: <?= $progress ?>%;" aria-valuenow="<?= $progress ?>" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                </td>
                                <td class="action-button">
                                    <button class="btn btn-dark" onclick="updateTracker(<?= $trackerID ?>)"><i class="fa-solid fa-pencil"></i></button>
                                    <button class="btn btn-danger" onclick="deleteTracker(<?= $trackerID ?>)"><i class="fa-solid fa-trash"></i></button>
                                </td>
                            </tr>

                            <?php
                        }
                        ?>
                    </tbody>
                </table>
            </div>

        </div>

    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.min.js"></script>
    
    

    <script>
        $(document).ready( function () {
            $('.habit-table').DataTable();
        });
        
        // MODUL 4 Function (Fungsi updateTracker)
        function updateTracker(id) {
            $("#updateTrackerModal").modal("show");

            let updateTrackerID = id;
            let updateDate = $("#date-" + id).text();
            let updateExercise = $("#exercise-" + id).text();
            let updatePray = $("#pray-" + id).text();
            let updateReadBook = $("#readBook-" + id).text();
            let updateVitamins = $("#vitamins-" + id).text();
            let updateLaundry = $("#laundry-" + id).text();
            let updategula = $("#gula-" + id).text();
            let updateMeat = $("#meat-" + id).text();

            // MODUL 2 Pengkondisian
            $("#updateTrackerID").val(updateTrackerID);
            $("#updateDate").val(updateDate);
            $("#updateExercise option").each(function() {
                let exercise = $(this).text();
                if (exercise === updateExercise) {
                    $(this).prop("selected", true);
                    return false;
                }
            });
            $("#updatePray option").each(function() {
                let pray = $(this).text();
                if (pray === updatePray) {
                    $(this).prop("selected", true);
                    return false;
                }
            });
            $("#updateReadBook option").each(function() {
                let readBook = $(this).text();
                if (readBook === updateReadBook) {
                    $(this).prop("selected", true);
                    return false;
                }
            });
            $("#updateVitamins option").each(function() {
                let vitamins = $(this).text();
                if (vitamins === updateVitamins) {
                    $(this).prop("selected", true);
                    return false;
                }
            });
            $("#updateLaundry option").each(function() {
                let laundry = $(this).text();
                if (laundry === updateLaundry) {
                    $(this).prop("selected", true);
                    return false;
                }
            });
            $("#updategula option").each(function() {
                let gula = $(this).text();
                if (gula === updategula) {
                    $(this).prop("selected", true);
                    return false;
                }
            });
            $("#updateMeat option").each(function() {
                let meat = $(this).text();
                if (meat === updateMeat) {
                    $(this).prop("selected", true);
                    return false;
                }
            });
        }
        
        // MODUL 4 Function (Fungsi deleteTracker)
        function deleteTracker(id) {
            if (confirm("Do you want to delete this record?")) {
                window.location = "./endpoint/delete-tracker.php?tracker=" + id;
            }
        }
    </script>
</body>
</html>