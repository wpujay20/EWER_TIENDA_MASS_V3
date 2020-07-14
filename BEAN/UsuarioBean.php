<?php


class UsuarioBean {
   
   public $id_usuario;
   public $id_persona;
   public $usu_usuario;
   public $usu_password;
   public $id_tipo_usuario;
   
   function getId_tipo_usuario() {
       return $this->id_tipo_usuario;
   }

   function setId_tipo_usuario($id_tipo_usuario) {
       $this->id_tipo_usuario = $id_tipo_usuario;
   }

      public function getId_usuario() {
       return $this->id_usuario;
   }

   public function getId_persona() {
       return $this->id_persona;
   }

   public function getUsu_usuario() {
       return $this->usu_usuario;
   }

   public function getUsu_password() {
       return $this->usu_password;
   }

   public function setId_usuario($id_usuario) {
       $this->id_usuario = $id_usuario;
   }

   public function setId_persona($id_persona) {
       $this->id_persona = $id_persona;
   }

  public  function setUsu_usuario($usu_correo) {
       $this->usu_usuario = $usu_correo;
   }

   public function setUsu_password($usu_password) {
       $this->usu_password = $usu_password;
   } 

}

