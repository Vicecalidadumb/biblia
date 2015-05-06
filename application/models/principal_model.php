<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Principal_model extends CI_Model {
    
    
    public function get_user($username){
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
    
    
}
