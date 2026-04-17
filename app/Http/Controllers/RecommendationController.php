<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Racket;

class RecommendationController extends Controller
{
    public function recommend(Request $request)
    {
        $level = $request->level;
        $style = $request->style;
        $injury = $request->injury;
        $budget = $request->budget;

        $rackets = Racket::all();

        $ranked = $rackets->map(function ($racket) use ($level, $style, $injury, $budget) {
            $score = 0;

            if (str_contains($racket->level, $level)) {
                $score += 3;
            }

            if ($racket->price <= $budget) {
                $score += 2;
            }

            if ($injury == 'sim' && $racket->injury_indicated) {
                $score += 3;
            }

            if ($style == 'ataque' && str_contains($racket->power_control, 'potencia')) {
                $score += 2;
            }

            if ($style == 'defesa' && str_contains($racket->power_control, 'controle')) {
                $score += 2;
            }

            $racket->score = $score;

            return $racket;
        });

        return response()->json(
            $ranked->sortByDesc('score')->values()->take(3)
        );
    }
}
