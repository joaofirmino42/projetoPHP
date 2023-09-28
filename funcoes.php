<?php 

    //dd/mm/aaaa -> aaaa-mm-dd
    function dataBanco($data){

        $data = explode("/",$data); //[dd][mm][aaaa]
        $data = array_reverse($data); //[aaaa][mm][dd]
        $data = implode("-",$data); //aaaa-mm-dd

        return $data; //retorna para quem chamou
    }

    function dataTela($data){

        $data = explode("-",$data); 
        $data = array_reverse($data); 
        $data = implode("/",$data); 

        return $data; //retorna para quem chamou
    }

?>