<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Helper\MenuFrontendHelper;
use App\Helper\VisitorHelper;
use App\Models\Quiz;
use Illuminate\Support\Facades\Session;
use App\Models\Info;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\App;

class QuizController extends Controller
{
    public function quizSubmit(Request $request)
    {
        
        // Define an array of question IDs
        $questionIds = range(1, 20);

        // Initialize the total score
        $totalScore = 0;

        // Loop through each question
        foreach ($questionIds as $questionId) {
            // Fetch the correct answer and score for each question
            $correctAnswer = Quiz::where('id', $questionId)->value('correctAnswer');
            $score = Quiz::where('id', $questionId)->value('score');

            // Compare the user's answer with the correct answer and calculate the score
            $userAnswer = $request->input("question$questionId");
            $totalScore += ($userAnswer == $correctAnswer) ? $score : 0;
        }


        return redirect()->route('quiz.result', ['totalScore' => $totalScore]);

    }


    public function quizResult(){

        $url = url()->full();
        $slug = explode('/', $url);
        $slugLanguage = $slug[3];

        if (array_key_exists('en', Config::get('languages'))) {
            Session::put('applocale', 'en');
            App::setLocale(Session()->get('applocale'));
        }

        $menuData = MenuFrontendHelper::menuFrontend();
        $countDate = VisitorHelper::visitor();


        return view('Cms.quiz.test-result', ['menuData' => $menuData,'slugLanguage' => $slugLanguage, 'countDate' => $countDate]);

    }

    public function quizResultKh(){
        $url = url()->full();
        $slug = explode('/', $url);
        $slugLanguage = $slug[4];

        if (array_key_exists('kh', Config::get('languages'))) {
            Session::put('applocale', 'kh');
            App::setLocale(Session()->get('applocale'));
        }

        $menuData = MenuFrontendHelper::menuFrontend();
        $countDate = VisitorHelper::visitor();


        return view('Cms.quiz.test-result', ['menuData' => $menuData,'slugLanguage' => $slugLanguage, 'countDate' => $countDate]);

    }
}
