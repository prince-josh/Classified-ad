<?php

class Users extends Dbh{
    public function addUser($fname, $lname, $email, $phone_num, $pass, $pic){
        $insert = "insert into users(first_name, last_name, email, phone_num, password, picture, date_registered) values(?, ?, ?, ?, ?, ?, NOW())";
        $stmt = $this->connect()->prepare($insert);
        $stmt->execute([$fname, $lname, $email, $phone_num, $pass, $pic]);
    }

    public function getNotes(){
        $sql = "select * from notes order by note_id desc";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute();
        $notes = $stmt->fetchAll();

        foreach ($notes as $note) {
            $note_id = $note['note_id'];
            $title = ucfirst($note['title']);
            $description = ucfirst($note['description']);
            $date_created = $note['date_created'];

            echo "<div class='notes'>
            <form action='db.php' method='get'>
            <span title='Delete' class='delete-note'><a href='db.php?id=$note_id'>X</a></span>
            </form>
            <div class='note-title'> <u> $title </u>
            </div>
            <div class='note-description'>$description</div>
            <div class='note-date'>$date_created</div>
        </div>";
        }
    }
    public function deleteNote(){
        if (isset($_GET['id'])) {
            $id = $_GET['id'];
            $del = "delete from notes where note_id='$id'";
            $stmt= $this->connect()->prepare($del);
            $stmt -> execute();
            echo "<script> alert('deleted succefully')</script>";
            echo "<script> window.open('db.php', '_self')</script>";
        }
    }
}
