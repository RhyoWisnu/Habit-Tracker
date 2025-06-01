<?php 
//Meng-include Koneksi Database
include ('../conn/conn.php');

//Memeriksa Metode Request:
if ($_SERVER['REQUEST_METHOD'] === 'POST') {    

    //Memeriksa Apakah Tanggal Telah Diisi
    //Mengambil Data dari Form:
    if (isset($_POST['date'])) {
        $date = $_POST['date'];
        $exercise = $_POST['exercise'];
        $pray = $_POST['pray'];
        $readBook = $_POST['read_book'];
        $vitamins = $_POST['vitamins'];
        $laundry = $_POST['laundry'];
        $gula = $_POST['gula'];
        $meat = $_POST['meat'];

        //Memeriksa Apakah Tanggal Sudah Ada di Database:
        try {
            $checkStmt = $conn->prepare("SELECT date FROM tbl_tracker WHERE date = :date");
            $checkStmt->bindParam(":date", $date, PDO::PARAM_STR);
            $checkStmt->execute();

            $dateExist = $checkStmt->fetch(PDO::FETCH_ASSOC);
            
            //Memasukkan Data Baru jika Tanggal Belum Ada:
            if (empty($dateExist)) {
                $conn->beginTransaction();

                $stmt = $conn->prepare("INSERT INTO tbl_tracker (date, exercise, pray, read_book, vitamins, laundry, gula, meat) VALUES (:date, :exercise, :pray, :read_book, :vitamins, :laundry, :gula, :meat)");
    
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
                        alert('Tracker added successfully!');
                        window.location.href = 'http://localhost/habit-tracker/home.php';
                    </script>
                ";
            } else {
                echo "
                    <script>
                        alert('Date already exists!');
                        window.location.href = 'http://localhost/habit-tracker/home.php';
                    </script>
                ";
            }
        
        //Menangani Kesalahan dengan Try-Catch
        } catch (PDOException $e) {
            echo $e->getMessage();
        }

    //Jika Tanggal Tidak Diisi:
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
