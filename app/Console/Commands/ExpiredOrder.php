<?php

namespace App\Console\Commands;

use App\Models\Order;
use Illuminate\Console\Command;

class ExpiredOrder extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'check:expired-order 
                                {id? : ID dari order}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Cek order yang sudah expired lebih dari 30 menit';

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
        $id = $this->argument('id');

        Order::where('status', Order::STATUS_MENUNGGU)
            ->where('created_at', '<', now()->subMinutes(30))
            ->when($id, function ($query) use ($id) {
                $query->where('id', $id);
            })
            ->update([
                'status' => Order::STATUS_KADALUARSA
            ]);
    }
}
