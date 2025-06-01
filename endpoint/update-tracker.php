<?php
//Meng-include Koneksi Database
include ('../conn/conn.php');

//Memeriksa Metode Request:
if ($_SERVER['REQUEST_METHOD'] === 'POST') {    
    
    //Memeriksa Apakah Tanggal Telah Diisi
    //Mengambil Data dari Form:
    if (isset($_POST['date'])) {
        $trackerID = $_POST['tbl_tracker_id'];
        $date = $_POST['date'];
        $exercise = $_POST['exercise'];
        $pray = $_POST['pray'];
        $readBook = $_POST['read_book'];
        $vitamins = $_POST['vitamins'];
        $laundry = $_POST['laundry'];
        $gula = $_POST['gula'];
        $meat = $_POST['meat'];

        try {
            $conn->beginTransaction();

            $stmt = $conn->prepare("UPDATE tbl_tracker SET date = :date, exercise = :exercise, pray = :pray, read_book = :read_book, vitamins = :vitamins, laundry = :laundry, gula = :gula, meat = :meat WHERE tbl_tracker_id = :tbl_tracker_id ");
            
            //Memasukkan Data Baru jika Tanggal Belum Ada:
            $stmt->bindParam(":tbl_tracker_id", $trackerID, PDO::PARAM_STR);
            $stmt->bindParam(":date", $date, PDO::PARAM_STR);
            $stmt->bindParam(":exercise", $exercise, PDO::PARAM_STR);
            $stmt->bindParam(":pray", $pray, PDO::PARAM_STR);
            $stmt->bindParam(":read_book", $readBook, PDO::PARAM_STR);
            $stmt->bindParam(":vitamins", $vitamins, PDO::PARAM_STR);
            $stmt->bindParam(":laundry", $laundry, PDO::PARAM_STR);
            $stmt->bindParam(":gula", $gula, PDO::PARAM_STR);
            $stmt->bindParam(":meat", $meat, PDO::PARAM_STR);

            $stmt->execute();
            $conn->commit();

            echo "
                <script>
                    alert('Tracker updated successfully!');
                    window.location.href = 'http://localhost/habit-tracker/home.php';
                </script>
            ";
        } catch (PDOException $e) {
            echo $e->getMessage();
        }

    } else {
        echo "
            <script>
                alert('Fill the date!');
                window.location.href = 'http://localhost/habit-tracker/home.php';
            </script>
        ";
    }
}

?>
