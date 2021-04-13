<?php

require_once('database.php');

class Api {

    private $db = NULL;

    public function __construct() {
        $this->db = new DB();
    }

    public function execute_query($sql)
    {
        if($this->db->link->query($sql))
        {
            echo json_encode(["Response" => "Success"]);
        }
        else
        {
            echo json_encode(["Response" => "Error", "Message" => $this->db->link->error]);
        }
    }

    public function create_new_book($parameters)
    {
        $checked = isset($parameters[1][6]) ? 1 : 0;
        $sql = "INSERT INTO `books_table` (`title`, `isbn`, `author`, `publisher`, `year_published`, `category`, `archived`) VALUES ('".$parameters[1][0]->value."', '".$parameters[1][1]->value."', '".$parameters[1][2]->value."', '".$parameters[1][3]->value."', '".$parameters[1][4]->value."', '".$parameters[1][5]->value."', '".$checked."')";
        $this->execute_query($sql);
    }

    public function update_book($parameters)
    {
        $checked = isset($parameters[1][6]) ? 1 : 0;
        $sql = "UPDATE books_table set title='".$parameters[1][0]->value."', isbn='".$parameters[1][1]->value."', author='".$parameters[1][2]->value."', publisher='".$parameters[1][3]->value."', year_published='".$parameters[1][4]->value."', category='".$parameters[1][5]->value."', archived='".$checked."' WHERE id = '".$parameters[0]->value."'";
        $this->execute_query($sql);
    }

    public function select_all_books()
    {
        $query = "SELECT * FROM books_table";
        $result = $this->db->link->query($query);
        echo json_encode($result->fetch_all(MYSQLI_ASSOC));
    }

    public function delete_book($parameters)
    {
        $sql = "DELETE FROM books_table WHERE id='".$parameters->id."'";
        $this->execute_query($sql);
    }
    
    
}


$db_api = new Api;


?>