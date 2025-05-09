<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Team>
 */
class TeamFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {

        $teams = [
            // English Premier League
            "Manchester City",
            "Arsenal",
            "Liverpool",
            "Manchester United",
            "Chelsea",
            "Tottenham Hotspur",
            "Newcastle United",

            // Spanish La Liga
            "Real Madrid",
            "Barcelona",
            "Atletico Madrid",
            "Sevilla",
            "Real Sociedad",
            "Real Betis",

            // German Bundesliga
            "Bayern Munich",
            "Borussia Dortmund",
            "RB Leipzig",
            "Bayer Leverkusen",
            "Eintracht Frankfurt",

            // Italian Serie A
            "Inter Milan",
            "AC Milan",
            "Juventus",
            "Napoli",
            "AS Roma",
            "Lazio",
            "Fiorentina",

            // French Ligue 1
            "Paris Saint-Germain",
            "Olympique Lyonnais",
            "Marseille",
            "Monaco",
            "Lille",
            "Rennes",

            // Portuguese Primeira Liga
            "Benfica",
            "Porto",
            "Sporting CP",
            "Braga",

            // Dutch Eredivisie
            "Ajax",
            "PSV Eindhoven",
            "Feyenoord",

            // Other European Clubs
            "Celtic", // Scotland
            "Rangers", // Scotland
            "Shakhtar Donetsk", // Ukraine
            "Dinamo Zagreb", // Croatia
            "Red Star Belgrade", // Serbia
            "Olympiacos", // Greece

            // South American Clubs
            "Flamengo", // Brazil
            "Palmeiras", // Brazil
            "River Plate", // Argentina
            "Boca Juniors", // Argentina

            // Asian Clubs
            "Al Hilal", // Saudi Arabia
            "Urawa Red Diamonds", // Japan
            "Jeonbuk Hyundai Motors", // South Korea

            // African Clubs
            "Al Ahly", // Egypt
            "Wydad Casablanca", // Morocco
        ];

        $players = [
            // Manchester City
            "Manchester City" => [
                "Erling Haaland",
                "Kevin De Bruyne",
                "Phil Foden",
                "Jack Grealish",
                "Rodri",
            ],

            // Real Madrid
            "Real Madrid" => [
                "Vinícius Júnior",
                "Luka Modrić",
                "Jude Bellingham",
                "Rodrygo",
                "Toni Kroos",
            ],

            // Bayern Munich
            "Bayern Munich" => [
                "Harry Kane",
                "Joshua Kimmich",
                "Jamal Musiala",
                "Thomas Müller",
                "Leroy Sané",
            ],

            // Barcelona
            "Barcelona" => [
                "Robert Lewandowski",
                "Pedri",
                "Gavi",
                "Frenkie de Jong",
                "Marc-André ter Stegen",
            ],

            // Paris Saint-Germain
            "Paris Saint-Germain" => [
                "Kylian Mbappé",
                "Neymar Jr.",
                "Lionel Messi", // In recent seasons; replace if needed
                "Achraf Hakimi",
                "Marquinhos",
            ],

            // Arsenal
            "Arsenal" => [
                "Bukayo Saka",
                "Martin Ødegaard",
                "Gabriel Jesus",
                "Declan Rice",
                "Aaron Ramsdale",
            ],

            // Manchester United
            "Manchester United" => [
                "Bruno Fernandes",
                "Marcus Rashford",
                "Casemiro",
                "André Onana",
                "Antony",
            ],

            // Liverpool
            "Liverpool" => [
                "Mohamed Salah",
                "Virgil van Dijk",
                "Alisson Becker",
                "Luis Díaz",
                "Trent Alexander-Arnold",
            ],

            // Inter Milan
            "Inter Milan" => [
                "Lautaro Martínez",
                "Nicolo Barella",
                "Hakan Çalhanoğlu",
                "Federico Dimarco",
                "André Onana",
            ],

            // AC Milan
            "AC Milan" => [
                "Rafael Leão",
                "Olivier Giroud",
                "Theo Hernández",
                "Mike Maignan",
                "Sandro Tonali", // Recently transferred; update if needed
            ],
        ];

        return [
            'user_id' => 1,
            'name' => fake()->randomElement($teams),
            'players' => json_encode(fake()->randomElement($players)),
        ];
    }
}
