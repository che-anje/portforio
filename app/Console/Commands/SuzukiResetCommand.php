<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;
use App\Models\Point_Log;
use App\Models\Circle_Ranking;
use App\Models\Circle;
use App\Models\Board;
use App\Models\Circle_Genre;
use App\Models\Circle_User;
use App\Models\Message;
use Illuminate\Support\Facades\Storage;

class SuzukiResetCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'command:suzukiresetcommand';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

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
        DB::transaction(function () {
            $circles = Circle::where('admin_user_id',139)->get();
            foreach($circles as $circle) {
                Storage::disk('s3')->delete('CircleImages/' . $circle->image);
                Board::where('circle_id', $circle->id)->delete();
                $circle->delete();
            }
            Message::where('user_id',139)->delete();
        });
    }
}
