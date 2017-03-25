<?php

use Phinx\Migration\AbstractMigration;

class Colleges extends AbstractMigration
{
    /**
     * Creates the colleges table
     */
    public function change()
    {
        // First enable the pgcrypto extension
        $this->execute('CREATE EXTENSION IF NOT EXISTS pgcrypto;');

        // create the companies table
        $table = $this->table('colleges', ['id' => false, 'primary_key' => 'id']);
        $table
            // Mandatory fields
            ->addColumn('name', 'string')

            // Optional fields
            ->addColumn('address', 'jsonb', ['null' => true, 'default' => null]) // Complete address as location object
            ->addColumn('alternateName', 'string', ['null' => true, 'default' => null])
            ->addColumn('brand', 'string', ['null' => true, 'default' => null])
            ->addColumn('description', 'text', ['null' => true, 'default' => null])
            ->addColumn('email', 'string', ['null' => true, 'default' => null])
            ->addColumn('faxNumber', 'string', ['null' => true, 'default' => null])
            ->addColumn('foundingDate', 'date', ['null' => true, 'default' => null])
            ->addColumn('location', 'string', ['null' => true, 'default' => null]) // City, State only
            ->addColumn('logo', 'string', ['null' => true, 'default' => null])
            ->addColumn('telephone', 'string', ['null' => true, 'default' => null])
            ->addColumn('url', 'string', ['null' => true, 'default' => null])

            // Specific to this dataset
            ->addColumn('opeId', 'integer', ['null' => true, 'default' => null]) // https://www2.ed.gov/about/offices/list/ope/index.html?exp=5
            ->addColumn('ipedsId', 'integer', ['null' => true, 'default' => null]) // https://nces.ed.gov/ipeds/
            ->addColumn('alternativeId', 'integer', ['null' => true, 'default' => null]) // from the original dataset

            // Automatic fields
            ->addColumn('id', 'uuid')
            ->addColumn('deleted_at', 'timestamp', ['null' => true, 'default' => null])
            ->addTimestamps()

            // Create the table
            ->create();

        // Set uuid to autogenerate
        $this->execute('ALTER TABLE colleges ALTER id SET DEFAULT gen_random_uuid();');
    }
}
