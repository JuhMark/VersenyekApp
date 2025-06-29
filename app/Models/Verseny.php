<?php 

namespace App\Models;

class Verseny{
    private string $name;
    private string $year;
    private array $languages;
    private int $pointsForCorrect;
    private int $pointsForIncorrect;
    private int $pointsForNone;
}