<?php

namespace Database\Seeders;

use App\Models\Interest;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class InterestSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $interests = [
            ['name' => 'Problem Solving', 'description' => 'The art of finding solutions to complex or difficult issues.'],
            ['name' => 'Fiction', 'description' => 'Narrative literature created from the imagination, not based strictly on history or fact.'],
            ['name' => 'Probability & Statistics', 'description' => 'The study of chance, data analysis, and predicting outcomes.'],
            ['name' => 'Algebra', 'description' => 'A branch of mathematics dealing with symbols and the rules for manipulating those symbols.'],
            ['name' => 'Fantasy & Science Fiction', 'description' => 'Genres of speculative fiction that explore imaginary worlds and futuristic concepts.'],
            ['name' => 'Calculus', 'description' => 'The mathematical study of change, using derivatives and integrals.'],
            ['name' => 'Biology', 'description' => 'The scientific study of life and living organisms.'],
            ['name' => 'Chemistry Experiments', 'description' => 'Hands-on scientific experiments to understand chemical reactions and properties.'],
            ['name' => 'Environmental Science', 'description' => 'The study of the environment and the interactions between humans and nature.'],
            ['name' => 'Botany', 'description' => 'The scientific study of plants, including their structure, properties, and processes.'],
            ['name' => 'Ecology', 'description' => 'The study of organisms and their interactions with the environment.'],
            ['name' => 'Astronomy', 'description' => 'The scientific study of celestial bodies such as stars, planets, and galaxies.'],
            ['name' => 'Poetry', 'description' => 'A literary form that uses rhythmic and aesthetic qualities of language.'],
            ['name' => 'Historical Books', 'description' => 'Books that describe past events or explore historical contexts and figures.'],
            ['name' => 'Literary Analysis', 'description' => 'The examination and interpretation of literature, focusing on themes, characters, and style.'],
            ['name' => 'Book Collecting', 'description' => 'The hobby of acquiring books, often focusing on rare or valuable editions.'],
            ['name' => 'Comics & Graphic Novels', 'description' => 'A visual storytelling medium that combines illustrations and text, often in comic strips or books.'],
            ['name' => 'Number Theory', 'description' => 'A branch of mathematics focused on the properties of numbers, especially integers.'],
            ['name' => 'Mathematical Games', 'description' => 'Puzzles, problems, and games that incorporate mathematical thinking and concepts.'],
            ['name' => 'Non-Fiction', 'description' => 'Prose writing based on real events, facts, and people.'],
            ['name' => 'Geometry', 'description' => 'The branch of mathematics dealing with shapes, sizes, and the properties of space.'],
        ];
        

        foreach ($interests as $interest) {
            Interest::create($interest);
        }
    }
}
