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
        $sweet = $request->sweet_spot;
        $strength = (int) $request->strength;
        $injury = $request->injury;
        $frequency = $request->frequency;
        $budget = $request->budget;

        $rackets = Racket::all();

        $ranked = $rackets->map(function ($racket) use (
            $level, $style, $sweet, $strength,
            $injury, $frequency, $budget
        ) {
            $score = 0;

            $name = strtolower($racket->name);

            if (str_contains($racket->level, $level)) {
                $score += 5;
            }

            if ($style === 'ataque-aereo' && $racket->power_control === 'potencia') {
                $score += 5;
            }

            if ($style === 'giro-volume' && str_contains($racket->style, 'controle')) {
                $score += 4;
            }

            if ($style === 'toque-defesa' && str_contains($racket->style, 'controle')) {
                $score += 5;
            }

            if ($name === 'poison bee') {
                if ($style === 'ataque-aereo') {
                    $score += 3;
                }

                if ($injury === 'sim') {
                    $score += 2;
                }

                if ($level === 'avancado') {
                    $score += 2;
                }
            }

            if ($sweet === 'raramente' && $racket->is_comfortable) {
                $score += 4;
            }

            if ($sweet === 'quase-sempre' && str_contains($racket->level, 'avancado')) {
                $score += 3;
            }

            if ($sweet === 'maioria-das-vezes') {
                $score += 1;
            }

            if ($strength <= 2 && $racket->weight <= 320) {
                $score += 4;
            }

            if ($strength >= 4 && $racket->weight >= 325) {
                $score += 4;
            }

            if ($strength >= 3 && $racket->weight >= 318 && $racket->weight <= 325) {
                $score += 2;
            }

            if ($injury === 'sim' && $racket->injury_indicated) {
                $score += 6;
            }

            if ($injury === 'nao') {
                $score += 1;
            }

            if ($racket->is_comfortable) {
                $score += 2;
            }

            if ($frequency === '6-7') {
                $score += 2;
            }

            if ($frequency === '3-5') {
                $score += 1;
            }

            if ($budget === 'R$1600 - R$1800') {
                if ($racket->price <= 1800) {
                    $score += 5;
                } elseif ($racket->price <= 2300) {
                    $score += 2;
                }
            }

            if ($budget === 'R$1900 - R$2300') {
                if ($racket->price >= 1900 && $racket->price <= 2300) {
                    $score += 5;
                } elseif ($racket->price <= 2500) {
                    $score += 3;
                } elseif ($racket->price <= 2800) {
                    $score += 1;
                }
            }

            if ($budget === 'R$1400 - R$2700') {
                if ($racket->price <= 2700) {
                    $score += 4;
                } elseif ($racket->price <= 2800) {
                    $score += 2;
                }
            }

            $racket->score = $score;

            return $racket;
        });

        $top = $ranked->sortByDesc('score')->values();

        return response()->json([
            'main' => $top[0] ?? null,
            'second' => $top[1] ?? null
        ]);
    }
}