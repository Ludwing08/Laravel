<?php

namespace App\Console\Commands;

use App\Models\Order;
use Illuminate\Console\Command;

class OrderCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'make:order {user_id} {total_amount}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command for create new order';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $user_id = $this->argument( 'user_id' );
        $total_amount = $this->argument('total_amount');

        Order::create([
            "user_id" => $user_id,
            "total_amount" => $total_amount
        ]);
        return Command::SUCCESS;
    }
}
