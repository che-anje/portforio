<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;
use App\Models\Point_Log;
use App\Models\Circle_Ranking;
use App\Models\Circle;

class LogCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'command:logcommand';

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
            DB::table('circle_ranking')->delete();
            $circles = Circle::all();
            foreach($circles as $circle) {
                $circle_rank = new Circle_Ranking;
                $circle_rank->circle_id = $circle->id;
                $circle_rank->total_point = Point_Log::where('circle_id', $circle->id)
                ->whereRaw('created_at > NOW() - INTERVAL 1 WEEK')
                ->sum('point');
                $circle_rank->save();
            }
            $a = Circle_Ranking::orderby('total_point', 'desc')->get()->pluck('total_point')->toArray();
            rsort($a);
            $rank = 1;
            foreach (array_count_values($a) as $point => $count) {
                for ($i = 0; $i < $count; $i++) {
                    Circle_Ranking::where('total_point', $point)->update(['rank' => $rank]);
                }
                $rank += $count;
            }
        });
    }
}
