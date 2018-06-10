<?php

class Client{

  //variables
  private $nomClient;
  private $prenomClient;
  private $mailClient;
  private $pseudoClient;
  private $telephoneClient;
  private $statutClient;

  public function __construct(){
    $this->nomClient;
    $this->prenomClient;
    $this->mailClient;
    $this->pseudoClient;
    $this->telephoneClient;
    $this->statutClient;
  }

  function setNomClient($pNomClient){
    $this->nomClient = $pNomClient;
  }

  function getNomClient(){
    return $this->nomClient;
  }

  function setPrenomClient($pPrenomClient){
    $this->prenomClient = $pPrenomClient;
  }

  function getPrenomClient(){
    return $this->prenomClient;
  }

  function setMailClient($pMailClient){
    $this->mailClient = $pMailClient;
  }

  function getMailClient(){
    return $this->mailClient;
  }

  function setPseudoClient($pPseudoClient){
    $this->pseudoClient = $pPseudoClient;
  }

  function getPseudoClient(){
    return $this->pseudoClient;
  }

  function setTelephoneClient($pTelephoneClient){
    $this->telephoneClient = $pTelephoneClient;
  }

  function getTelephoneClient(){
    return $this->telephoneClient;
  }

  function setStatutClient($pStatutClient){
    $this->statutClient = $pStatutClient;
  }

  function getStatutClient(){
    return $this->statutClient;
  }
} ?>
