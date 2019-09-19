<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Migration_Add_radio extends CI_Migration {

/*
CREATE TABLE `lalo0471_mfa`.`radios` ( 
    `id` INT NOT NULL AUTO_INCREMENT , 
    `nombre` VARCHAR(30) NOT NULL , 
    `online` TINYINT(1) NOT NULL , 
    `onlineurl` VARCHAR(50) NULL , 
    `am` TINYINT(1) NOT NULL , 
    `amdial` VARCHAR(5) NULL , 
    `fm` TINYINT(1) NOT NULL , 
    `fmdial` VARCHAR(5) NULL , 
    `prov_id` INT NOT NULL , 
    `loca_id` INT NOT NULL , 
    `observaciones` TEXT NULL , 
    `habilitado` TINYINT(1) NOT NULL , 
    PRIMARY KEY (`id`)) ENGINE = InnoDB;
*/


public function up()
{
        $this->dbforge->add_field(array(
                'id' => array(
                        'type' => 'INT',
                        'constraint' => 5,
                        'unsigned' => TRUE,
                        'auto_increment' => TRUE
                ),
                'nombre' => array(
                        'type' => 'VARCHAR',
                        'constraint' => '50',
                ),
                'tipo' => array(
                        'type' => 'VARCHAR',
                        'constraint' => '25',
                ),
                'frecuencia' => array(
                        'type' => 'VARCHAR',
                        'constraint' => '10',
                ),
                'telefono' => array(
                        'type' => 'VARCHAR',
                        'constraint' => '50',
                ),
                'correo' => array(
                        'type' => 'VARCHAR',
                        'constraint' => '50',
                ),
                'website' => array(
                        'type' => 'VARCHAR',
                        'constraint' => '100',
                ),                        
                'prov_id' => array(
                        'type' => 'INT',
                        'unsigned' => TRUE,
                ),                         
                'loca_id' => array(
                        'type' => 'INT',
                        'unsigned' => TRUE,
                ), 
                'observaciones' => array(
                        'type' => 'TEXT',
                        'null' => TRUE,
                ),
                'habilitado' => array(
                        'type' => 'TINYINT',
                        'unsigned' => TRUE,
                ),                
        ));
        $this->dbforge->add_key('id', TRUE);
        $this->dbforge->create_table('radios');
}

public function down()
{
    $this->dbforge->drop_table('radios');
}
}

