<?php
declare(strict_types=1);

use Phinx\Migration\AbstractMigration;

include __DIR__ . '/../../../../../wp-load.php';

final class CreateTestTableCalledVenues extends AbstractMigration
{
    /**
     * Change Method.
     *
     * Write your reversible migrations using this method.
     *
     * More information on writing migrations is available here:
     * https://book.cakephp.org/phinx/0/en/migrations.html#the-change-method
     *
     * Remember to call "create()" or "update()" and NOT "save()" when working
     * with the Table class.
     */
    public function change(): void
    {
        global $wpdb;

        $this->table($wpdb->prefix . 'venues', ['comment' => 'PSAV venues list'])
             ->addColumn('name', 'string')
             ->addColumn('address1', 'string', ['null' => true])
             ->addColumn('address2', 'string',['null' => true])
             ->addColumn('country', 'string', ['null' => true])
             ->addColumn('city', 'string', ['null' => true])
             ->addColumn('state', 'string',['null' => true])
             ->addColumn('zip', 'string', ['null' => true])
             ->addColumn('url', 'string', ['null' => true])
             ->addColumn('active', 'boolean', ['default' => 1])
             ->addColumn('deleted', 'boolean', ['default' => 0])
             ->addColumn('audiovisual', 'boolean', ['default' => 0])
             ->addColumn('creative', 'boolean', ['default' => 0])
             ->addColumn('internet', 'boolean', ['default' => 0])
             ->addColumn('power', 'boolean', ['default' => 0])
             ->addColumn('rigging', 'boolean', ['default' => 0])
             ->addColumn('specialty_ics', 'boolean', ['default' => 0])
             ->addColumn('specialty_ims', 'boolean', ['default' => 0])
             ->addColumn('specialty_power', 'boolean', ['default' => 0])
             ->addColumn('specialty_rigging', 'boolean', ['default' => 0])
             ->addColumn('guid', 'string')
             ->addColumn('contact_name', 'string', ['null' => true])
             ->addColumn('contact_title', 'string', ['null' => true])
             ->addColumn('contact_phone', 'string', ['null' => true])
             ->addColumn('contact_email', 'string', ['null' => true])
             ->addColumn('created_at', 'datetime', ['null' => true])
             ->addColumn('updated_at', 'datetime', ['null' => true])
             ->addColumn('latitude', 'string')
             ->addColumn('longitude', 'string')
             ->addIndex(['guid'], ['unique' => true])
             ->create();
    }
}
