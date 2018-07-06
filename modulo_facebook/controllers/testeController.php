<?php
class testeController extends Controller
{
    public function index()
    {
        echo "testeController::index";
    }
    
    public function teste($p1 = 0)
    {
        echo "testeController::teste -> p1: ".$p1;
    }
}