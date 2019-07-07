<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class QuestionController extends Controller {

    public function displayQuestion($id) {
        $questions = DB::select('select * from questions where id = :id', ['id' => $id]);
        $answers = DB::select('select * from answers where question_id = :id order by time asc', ['id' => $id]);

        return view('question', [
            'question' => $questions[0],
            'answers' => $answers
        ]);
    }

    public function saveAnswer(Request $req, $id) {
        $data = $req->validate([
            'content' => ['bail', 'required', 'min:5']
        ]);

        $data['question_id'] = $id;
        $data['time'] = new \DateTime();

        DB::table('answers')->insert($data);

        return $this->displayQuestion($id);
    }
}
