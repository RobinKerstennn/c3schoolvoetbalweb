<?php

namespace Database\Factories;

use Faker\Guesser\Name;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Tournament>
 */
class TournamentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $tournaments = [
            "Champions Clash Cup",
            "Global Elite Tournament",
            "Legends League Showdown",
            "World Soccer Masters",
            "Ultimate Knockout Cup",
            "Stadium of Stars Challenge",
            "Infinity Goals Championship",
            "Grand Victory Invitational",
            "Dream Team Trophy",
            "Continental Champions League",
            "Galaxy Football Series",
            "Golden Boot Tournament",
            "Super Strikers Showdown",
            "Epic Eleven Tournament",
            "The Iron Goal Derby",
            "Heroes of the Pitch Cup",
            "Crown of Champions League",
            "The Final Whistle Series",
            "The Silver Shield Open",
            "Victory Royale Cup",
            "Turbo Tactics Tournament",
            "Ballers Beyond Borders",
            "The Great Kickoff Challenge",
            "Legendary Footwork Invitational",
            "Premier Pro League",
            "Goalkeepers' Glory Cup",
            "International Power Play",
            "The Rising Stars Championship",
            "The Phoenix Cup",
            "Iron Fortress Invitational",
            "Skilled Shots Series",
            "Elite Match Masters",
            "Ultimate Sportsmen's Trophy",
            "Pro Pitch Legends League",
            "Supreme Strikers Invitational",
            "Dominators' Cup",
            "Dynasty Football League",
            "Rising Titans Trophy",
            "MasterClass Tournament",
            "The Challenger's Arena",
            "Prestige Playoff Cup",
            "The King of Goals Series",
            "Victory Legends Cup",
            "The Champion's Den League",
            "The Emerald Turf Challenge",
            "Grand Slam Soccer Tournament",
            "The Blitz Ball Trophy",
            "The Global Legends Arena",
            "The Royal Kickoff Series",
            "FIFA Legacy Championship",
        ];

        return [
            'title' => fake()->randomElement($tournaments),
            'max_teams' => 10,
        ];
    }
}
