<?php
class Config {
    
    private $db_host = 'localhost';
    private $db_port_num = '';
    private $db_user = 'simbizc1_root';
    private $db_password = 'password2014';
    private $db_name = 'simbizc1_simbiz2014';
    private $db_connection;

    function dbConnect()
    {
        $this->db_connection = mysql_connect ($this->db_host.$this->db_port_num, $this->db_user, $this->db_password);
        
        if (!$this->db_connection) {
            throw new Exception('Could not connect to database server');
        } else {
            $db_select = mysql_select_db ($this->db_name);
            return $db_select;
        }
    }
    
    function dbQuery($query)
    {
        $result = mysql_query($query);
        if($result)
        {
            return $result;
        }
        
        
    }
       function dbClose()
    {
        mysql_close ($this->db_connection);
    }
    
}

?>
