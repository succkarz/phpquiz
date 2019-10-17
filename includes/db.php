<?php
class db{
    public $link;
    function dbconnect(){
        $this->link=mysqli_connect("localhost","root","","dbquiztime") or die(mysqli_connect_error());
        return $this->link;
    }
    function dbclose(){
        mysqli_close($this->link);
    }
}
