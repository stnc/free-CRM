<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed'); 
<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed'); 
    
    class Signup_model extends CI_Model {
        
            function __construct()
                  {
               $this->load->database();
                         }
            
            public function is_available($email)
                {
                    $safe_email = $this->db->escape($email);
                     $query = $this->db
                            ->where('email_address', $email)
                            ->limit (1)
                            ->get('users');
                    
                            
                        if( $query->num_rows > 0) 
                            {
                                return $query->row();
                            }
                            
                            else
                                {
                                    return false;
                                }
                            
                }
                
                
            public function register($email, $first_name, $last_name, $password)
            {
                    $newaccount = array(
                    'email_address'  => $email,
                    'first_name' => $first_name,
                    'last_name'  => $last_name,
                    'password' => sha1($password)
                    );
                    
                    $this->db->insert('users', $newaccount);
                
            }    
            
    }
    
    
    
    
    
    ?>
