<?php

use Phinx\Migration\AbstractMigration;

class Startup extends AbstractMigration
{
    public function change()
    {
        $tables =  $this->table('tables', ['id' => false, 'primary_key' => ['uuid']]);
        $tables->addColumn('uuid', 'uuid')
            ->addColumn('number', 'string')
            ->addColumn('country', 'string')
            ->create();

        $citizen = $this->table('citizens', ['id' => false, 'primary_key' => ['uuid']]);
        $citizen->addColumn('uuid', 'uuid')
            ->addForeignKey('table_uuid', 'tables', 'uuid', array('delete'=>'SET_NULL', 'update'=>'CASCADE'))
            ->addColumn('first_name', 'string')
            ->addColumn('last_name', 'string')
            ->addColumn('country', 'string')
            ->addColumn('city', 'string')
            ->addColumn('age', 'integer')
            ->addColumn('gender', 'string', ['limit'=>1])
            ->addColumn('occupation', 'string')
            ->addColumn('edu_level', 'integer')
            ->addColumn('table_uuid', 'uuid', ['null'=> true])
            ->create();

        $postits =  $this->table('postits', ['id' => false, 'primary_key' => ['uuid']]);
        $postits->addColumn('uuid', 'uuid')
            ->addForeignKey('citizen_uuid', 'citizens', 'uuid', array('delete'=>'SET_NULL', 'update'=>'CASCADE'))
            ->addColumn('citizen_uuid', 'uuid', ['null'=> true])
            ->addColumn('prompt', 'string')
            ->addColumn('answer', 'string')
            ->addColumn('category', 'string')
            ->create();


        $ministories =  $this->table('ministories', ['id' => false, 'primary_key' => ['uuid']]);
        $ministories->addColumn('uuid', 'uuid')
            ->addForeignKey('citizen_uuid', 'citizens', 'uuid', array('delete'=>'SET_NULL', 'update'=>'CASCADE'))
            ->addColumn('citizen_uuid', 'uuid', ['null'=> true])
            ->addColumn('title', 'string', ['null'=> true])
            ->addColumn('description', 'string', ['null'=> true])
            ->addColumn('whywho', 'string', ['null'=> true])
            ->addColumn('category', 'string')
            ->create();

        $rawvisions =  $this->table('rawvisions', ['id' => false, 'primary_key' => ['uuid']]);
        $rawvisions->addColumn('uuid', 'uuid')
            ->addForeignKey('table_uuid', 'tables', 'uuid', array('delete'=>'SET_NULL', 'update'=>'CASCADE'))
            ->addColumn('table_uuid', 'uuid', ['null'=> true])
            ->addColumn('title', 'string', ['null'=> true])
            ->addColumn('description', 'string', ['null'=> true])
            ->create();

        $visions =  $this->table('visions', ['id' => false, 'primary_key' => ['uuid']]);
        $visions->addColumn('uuid', 'uuid')
            ->addForeignKey('table_uuid', 'tables', 'uuid', array('delete'=>'SET_NULL', 'update'=>'CASCADE'))
            ->addColumn('table_uuid', 'uuid', ['null'=> true])
            ->addColumn('title', 'string', ['null'=> true])
            ->addColumn('description', 'string', ['null'=> true])
            ->addColumn('inshort', 'string', ['null'=> true])
            ->addColumn('differences', 'string', ['null'=> true])
            ->addColumn('notes', 'string', ['null'=> true])
            ->create();

    }
}
