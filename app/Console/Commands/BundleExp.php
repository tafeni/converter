<?php

namespace App\Console\Commands;

use App\Models\Bundle;
use App\Models\User;
use App\Models\Wallet;
use Carbon\Carbon;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;

class BundleExp extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'bundle:exp';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Check for expired bundle package/plan';

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
     * @return mixed
     */
    public function handle()
    {
        \Log::info("Cron is working fine!");

        $today = Carbon::today();
        $today= $today->toDateString();
        $wallet = Wallet::where('expiry_date','<=',$today)->get();
        foreach ($wallet as $item){
            DB::table('wallets')->where(['id'=> $item->id])->update(['status'=>false]);
            $bundle = Bundle::find($item->bundle_id);
            $user = User::find($item->user_id);
            Mail::send('email.bundleexpiry', ['user' => $user->name,'bundle'=>$bundle->name], function ($message) use ($user) {
                $message->subject('Bundle Expiry');
                $message->to($user->email);
            });

        }

        $this->info('Bundle Expiry Command ran successfully!');

    }
}
