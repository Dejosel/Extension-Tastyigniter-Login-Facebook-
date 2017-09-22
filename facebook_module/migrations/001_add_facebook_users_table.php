<?php if (!defined('BASEPATH')) exit('No direct access allowed');

/**
 * Modify the table customers to add columns for Facebook login
 */
class Migration_add_facebook_users_table extends CI_Migration {

    public function up() {
        $fields = array(
            'oauth_provider'    => array(
                'type'          =>'enum("","facebook","google","twitter")', 
                'null'          => FALSE,),
            'oauth_uid'         => array(
                'type'          => 'VARCHAR',
                'constraint'    => '100',
                'null'          => FALSE,),
            'gender'            => array(
                'type'          => 'VARCHAR',
                'constraint'    => '10',
                'null'          => FALSE,),
            'locale'            => array(
                'type'          => 'VARCHAR',
                'constraint'    => '10',
                'null'          => FALSE,),
            'picture_url'       => array(
                'type'          => 'VARCHAR',
                'constraint'    => '255',
                'null'          => FALSE,),
            'profile_url'       => array(
                'type'          => 'VARCHAR',
                'constraint'    => '255',
                'null'          => FALSE,),
            'date_modified'     => array(
                'type'          => 'datetime',
                'null'          => FALSE,)

        );

        $this->dbforge->add_column('customers', $fields);
        
    }

    public function down() {

        $this->dbforge->drop_column('customers', $fields);

    }
}

/* End of file 001_add_facebook_users_table.php */
/* Location: ./facebook_module/migrations/001_add_facebook_users_table.php */