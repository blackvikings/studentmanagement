<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;

class DatabaseSyncLocalhosToServer extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'db:sync';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Database Sync';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $tables = array_map('reset', DB::select('SHOW TABLES'));

        // Connect to live database
        $live_database = DB::connection('my-live-db');
        // Get table data from production
        foreach($live_database->table('table_name')->get() as $data){
            // Save data to staging database - default db connection
            DB::table('table_name')->insert((array) $data);
        }
        // Get table_2 data from production
        foreach($live_database->table('table_2_name')->get() as $data){
            // Save data to staging database - default db connection
            DB::table('table_2_name')->insert((array) $data);
        }

        return dd($tables);
    }
}
