<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class HomeController extends Controller {

    // Source: https://youtu.be/-n-SfgK3ITc.
    const EXAMPLE_QUESTIONS = [
        'What do you eat?',
        'What about meat?',
        'What about protein?',
        'What about cheese?',
        'Can you eat fish?',
        'Do you eat this?',
        'Would you eat that?',
        'Are you anemic?'
    ];

    public function listQuestions() {
        $questions = DB::select('select * from questions order by time desc');

        $exampleQuestion = self::EXAMPLE_QUESTIONS[array_rand(self::EXAMPLE_QUESTIONS)];

        return view('home', [
            'questions' => $questions,
            'exampleQuestion' => $exampleQuestion
        ]);
    }

    public function saveQuestion(Request $req) {
        $data = $req->validate([
            'content' => ['bail', 'required', 'min:5', new \App\Rules\Question]
        ]);

        $data['time'] = new \DateTime();

        DB::table('questions')->insert($data);

        return $this->listQuestions();
    }
}
