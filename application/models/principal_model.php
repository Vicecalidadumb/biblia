<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Principal_model extends CI_Model {
    /*
     * public function traer_ciudades(){
      $this->db->select('*');
      $this->db->where('USUARIO_NUMERODOCUMENTO',$username);
      $this->db->where('USUARIO_ESTADO','1');
      $query = $this->db->get('usuarios');
      $datos=$query->result();
      if(count($datos)==0){
      $moodle_db = $this->load->database('moodle', TRUE);
      $moodle_db->select("id USUARIO_ID,username USUARIO_PASSWORD, firstname USUARIO_NOMBRES,lastname USUARIO_APELLIDOS,'' USUARIO_TIPODOCUMENTO, username USUARIO_NUMERODOCUMENTO,
      email USUARIO_CORREO, '' USUARIO_GENERO, '' USUARIO_FECHADENACIMIENTO,'' USUARIO_DIRECCIONRESIDENCIA, '' USUARIO_TELEFONOFIJO, '' USUARIO_CELULAR,
      '' USUARIO_ESTADO, '' USUARIO_FECHAINGRESO, 'estudiante' ID_TIPO_USU");
      $moodle_db->where('username',$username);
      $query =$moodle_db->get('pruebas_user');
      $datos=$query->result();
      }
      //        echo print_y($query->result());die;
      return $datos;
      }
     */

    public function traer_ciudades() {
        $this->db->select('*');
        $this->db->where('ciudad_id', '4');
        $query = $this->db->get('umbpruebas_ciudades');
        $datos = $query->result();
        return $datos;
    }

    public function traer_inscritos_ciudad($ciudad_id) {
        $this->db->select('*');
        $this->db->where('ciudad_id_presentacion', $ciudad_id);
        $query = $this->db->get('umbpruebas_inscritos');
        $datos = $query->result();
        return $datos;
    }

    public function traer_espacios_ciudad($ciudad_id) {
        $this->db->select('*');
        $this->db->where('umbpruebas_instituciones.ciudad_id', $ciudad_id);
        $this->db->join('umbpruebas_instituciones', 'umbpruebas_instituciones.institucion_id = umbpruebas_espacios.institucion_id', 'left');
        $this->db->join('umbpruebas_ciudades', 'umbpruebas_ciudades.ciudad_id = umbpruebas_instituciones.ciudad_id', 'left');
        $query = $this->db->get('umbpruebas_espacios');
        $datos = $query->result();
        return $datos;
    }

    public function insertar($sql) {
        $SQL_string_query = $this->db->query($sql);
        //$SQL_string_query->result();
    }

}
