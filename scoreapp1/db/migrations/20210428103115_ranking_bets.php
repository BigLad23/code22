<?php
declare(strict_types=1);

use Phinx\Migration\AbstractMigration;

final class RankingBets extends AbstractMigration
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
        $table = $this->table('rankingbets', ['id' => 'bets_id']);
        $table->addColumn('guessedranking', 'integer')
            ->addColumn('contestant_id', 'integer')
            ->addForeignKey('contestant_id', 'rankingcontestant', 'contestant_id', array('delete'=> 'CASCADE', 'update'=> 'NO_ACTION'))
            ->addColumn('user_id', 'integer')
            ->addForeignKey('user_id', 'users', 'user_id', array('delete'=> 'CASCADE', 'update'=> 'NO_ACTION'))
            ->create();
    }
}
