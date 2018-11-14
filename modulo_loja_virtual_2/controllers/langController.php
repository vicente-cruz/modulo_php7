<?php
class langController extends Controller
{
    private $user;
    
    public function __construct()
    {
        parent::__construct();
    }
    
    public function index()
    {
        
    }
    
    public function set($lang = "")
    {
        if ( ! empty($lang)) {
            $_SESSION['lang'] = addslashes($lang);
        }
        header("Location: ".BASE_URL);
    }
}
?>