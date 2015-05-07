<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Principal extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->helper('miscellaneous');
        $this->load->model('principal_model');
    }

    public function index() {
        echo "el viejo sergio";
    }

    public function asignacion() {
        $SQL= 'INSERT INTO umbpruebas_inscritos_asignados values ';
        
        //1 paso: consultamos las ciudades
        $ciudades = $this->principal_model->traer_ciudades();
        //2 paso: creamos ciclo con las ciudades:
        foreach ($ciudades as $ciudad){
            //3 paso: traemos los inscritos por la ciudad
            $inscritos_ciudad = $this->principal_model->traer_inscritos_ciudad($ciudad->ciudad_id);
            
            //4 paso: traemos los espacios por la ciudad
            $espacio_ciudad = $this->principal_model->traer_espacios_ciudad($ciudad->ciudad_id);
            //5 paso: generamos el array con los espacios
            $espacios = crear_array_esp($espacio_ciudad);
            //6 paso: generamos el SQL para asignar los inscritos
            
            $contador = 0;
            foreach ($inscritos_ciudad as $inscrito){
                $SQL.='(';
                $SQL.=$inscrito->inscrito_id;
                $SQL.=",'";
                $SQL.=$inscrito->inscrito_pin;
                $SQL.="','";
                $SQL.=$inscrito->inscrito_cedula;
                $SQL.="','";
                $SQL.=$inscrito->inscrito_nombre;
                $SQL.="','";
                $SQL.=$espacios[$contador]['institucion_nombre'];
                $SQL.="','";
                $SQL.=$espacios[$contador]['puesto'];
                $SQL.="','";
                $SQL.=$espacios[$contador]['ciudad'];
                $SQL.="','";
                $SQL.=$espacios[$contador]['espacio_bloque'];
                $SQL.="','";
                $SQL.=$espacios[$contador]['espacio_piso'];
                $SQL.="','";
                $SQL.=$espacios[$contador]['espacio_aula'];
                $SQL.="'),";
                $contador++;
            }
        }
        echo $SQL;
        $this->principal_model->insertar(trim($SQL,',').';');
    }
}
