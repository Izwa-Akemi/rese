<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Mail;
use App\Mail\SendRemindMail;
use Carbon\Carbon;
use App\Models\Reservation;
use App\Models\Store;
use App\Models\User;
use Illuminate\Support\Facades\Mail as FacadesMail;


class UserRemind extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    //ファイルを実行するときのcommand
    protected $signature = 'email:reminduser';

    /**
     * The console command description.
     *
     * @var string
     */
    //commandの大まかな説明
    protected $description = 'send email to user after the registration';

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
    //実効する処理を記載
    public function handle()
    {
        $tomorrow = Carbon::tomorrow('Asia/Tokyo');
        $tomorrowEnd = $tomorrow->copy()->endOfDay();
        //$reserves = Reservation::where('reserve_date',$tomorrow)->get();
        $reserves = Reservation::whereBetween('reserve_date',[$tomorrow, $tomorrowEnd])->get();
        foreach($reserves as $reserve){
            Mail::to($reserve->user->email)->send(new SendRemindMail($reserve));
        }
          // ここに書いた処理が実際に定期実行される処理！！！
          $this->info('Display this on the screen');
    }
}
