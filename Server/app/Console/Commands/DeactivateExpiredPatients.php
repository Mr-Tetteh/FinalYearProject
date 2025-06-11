<?php

namespace App\Console\Commands;

use App\Models\Patients;
use Illuminate\Console\Command;

class DeactivateExpiredPatients extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'patients:deactivate-expired';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Deactivate patients every day after activation';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        logger()->info('deactivate-expired');
        // Change to use update directly on the query builder
//        $query = Patients::where('status', 1);
//
//        $this->info('Query: '.$query->toSql());
//        $count = $query->count();
//        $this->info('Found '.$count.' expired patients');
//
//        if ($count > 0) {
//            // Update directly using the query builder to avoid model accessors/mutators
//            $updated = Patients::where('status', true)
//                ->where('activated_at', '<=', now()->subDay())
//                ->update([
//                    'status' => false,
//                    'activated_at' => null,
//                ]);
//
//            $this->info("Deactivated {$updated} patients successfully.");
//        } else {
//            $this->info('No expired patients found.');
//        }
    }
}
