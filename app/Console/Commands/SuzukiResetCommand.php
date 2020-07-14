<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;
use App\Models\Point_Log;
use App\Models\Circle_Ranking;
use App\Models\Circle;
use App\Models\Board;

class SuzukiResetCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'command:name';

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
        $circles = DB::table('circles')->where('admin_user_id',139)->get();
        foreach($circles as $circle) {
            Storage::disk('s3')->delete('CircleImages/' . $circle->image);
            $circle->delete();
            $board = Board::where('circle_id', $circle->id)->delete();
            return redirect('/');
        }
        DB::transaction(function () {
            
            DB::table('messages')->where('user_id',139)->delete();
        });
    }
}
