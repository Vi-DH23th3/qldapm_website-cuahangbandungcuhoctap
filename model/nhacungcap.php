<?php
class NHACUNGCAP{
    public function laynhacungcap(){
        $db = DATABASE::connect();
        try{
            $sql = "SELECT * FROM nhacungcap";
            $cmd = $db->prepare($sql);
            $cmd->execute();
            return $cmd->fetchAll();
        } catch(PDOException $e){ return null; }
    }
    public function themnhacungcap($ten, $diachi, $email, $sodt){
        $db = DATABASE::connect();
        try{
            $sql = "INSERT INTO nhacungcap(tenncc, diachi, email, sodienthoai) VALUES(:ten, :diachi, :email, :sodt)";
            $cmd = $db->prepare($sql);
            $cmd->bindValue(':ten', $ten);
            $cmd->bindValue(':diachi', $diachi);
            $cmd->bindValue(':email', $email);
            $cmd->bindValue(':sodt', $sodt);
            return $cmd->execute();
        } catch(PDOException $e){ return false; }
    }
    public function xoanhacungcap($id){
        $db = DATABASE::connect();
        try{
            $sql = "DELETE FROM nhacungcap WHERE id=:id";
            $cmd = $db->prepare($sql);
            $cmd->bindValue(':id', $id);
            return $cmd->execute();
        } catch(PDOException $e){ return false; }
    }
    public function laynhacungcaptheoid($id){
        $db = DATABASE::connect();
        try{
            $sql = "SELECT * FROM nhacungcap WHERE id=:id";
            $cmd = $db->prepare($sql);
            $cmd->bindValue(':id', $id);
            $cmd->execute();
            return $cmd->fetch();
        } catch(PDOException $e){ return null; }
    }
    public function suanhacungcap($id, $ten, $diachi, $email, $sodt){
        $db = DATABASE::connect();
        try{
            $sql = "UPDATE nhacungcap SET tenncc=:ten, diachi=:diachi, email=:email, sodienthoai=:sodt WHERE id=:id";
            $cmd = $db->prepare($sql);
            $cmd->bindValue(':ten', $ten);
            $cmd->bindValue(':diachi', $diachi);
            $cmd->bindValue(':email', $email);
            $cmd->bindValue(':sodt', $sodt);
            $cmd->bindValue(':id', $id);
            return $cmd->execute();
        } catch(PDOException $e){ return false; }
    }
}
?>