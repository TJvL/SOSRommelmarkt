<?php
/**
 * Model klasse voor de subsidieaanvraag.
 */

class SubventionRequest {
    //alle waardes die we straks door moeten krijgen van het formulier, het kan zijn dat er lege waardes bij zitten, ligt eraan hoe de w
    //INSERT AFMAKEN, ZORGEN DAT ER EEN OBJECT WORDT AANGEMAAKT EN WORDT GETRETURNED
    public $id;
    public $contactpersoon;
    public $onderneming;
    public $kvk;
    public $adres;
    public $postcode;
    public $plaats;
    public $telefoonnummer1;
    public $telefoonnummer2;
    public $fax;
    public $email;
    public $toelichting;
    public $activiteiten;
    public $resultaten;







    //creeert en returned een SR object
    //op dit moment worden alle attributen individueel vanuit de sessie of de post apart meegegeven.
    //deze functie wordt op dit moment nog niet gebruikt maar kan van pas komen bij het referen/ophalen van aanvragen.
    function createSubventionRequest($id,$c,$o,$k,$a,$po,$pl,$t1,$t2,$f,$e,$t,$a,$r) {
        $sv = new SubventionRequest();
        //sla alle input op
        $sv->id = $id;
        $sv ->contactpersoon = $c;
        $sv ->onderneming = $o;
        $sv -> kvk = $k;
        $sv ->adres = $a;
        $sv ->postcode = $po;
        $sv ->plaats = $pl;
        $sv ->telefoonnummer1 = $t1;
        $sv ->telefoonnummer2 = $t2;
        $sv ->fax = $f;
        $sv ->email = $e;
        $sv ->toelichting = $t;
        $sv ->resultaten = $r;
        return $sv;
    }
//dit werkte eerst maar volgensmij is de insert methoe veranderd
//
//    //insert object in de database.
//    function insertSubventionRequest($contactpersoon,$onderneming,$kvk,$adres,$postcode,$plaats,$telefoonnummer1
//        ,$telefoonnummer2,$fax,$email,$toelichting,$activiteiten,$resultaten)
//    {
//                  //construct query
//                  $query = "
//                  INSERT INTO SubventionRequest(contactpersoon,onderneming,kvk,adres,postcode,plaats,telefoonnummer1,telefoonnummer2,fax,email,toelichting,activiteiten,resultaten)
//                  VALUES(?,?,?,?,?,?,?,?,?,?,?,?,?)";
//
//        //insert given data into database and return auto incremented key
//        Database::insert($query,"sssssssssssss",array($contactpersoon,$onderneming,$kvk,$adres,$postcode,$plaats,$telefoonnummer1
//        ,$telefoonnummer2,$fax,$email,$toelichting,$activiteiten,$resultaten));
//
//        //return a SV object
//    createSubsentionRequest($id,$contactpersoon,$onderneming,$kvk,$adres,$postcode,$plaats,$telefoonnummer1
//        ,$telefoonnummer2,$fax,$email,$toelichting,$activiteiten,$resultaten);
//    }









}