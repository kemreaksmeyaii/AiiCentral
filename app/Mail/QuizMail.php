<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class QuizMail extends Mailable
{
    use Queueable, SerializesModels;

    public $data;
    public $totalScore;
    public $userId;
    // get user platform and broswer
    public $platform;
    public $platformVersion;
    public $browser;
    public $browserVersion;
    public $robot;

    public function __construct($data, $totalScore, $userId, $platform, $platformVersion,$browser, $browserVersion, $robot)
    {
        $this->data = $data;
        $this->totalScore = $totalScore;
        $this->userId = $userId;

        $this->platform = $platform;
        $this->platformVersion = $platformVersion;
        $this->browser = $browser;
        $this->browserVersion = $browserVersion;
        $this->robot = $robot;

    }

    public function build()
    {
        return $this->subject('New Quiz Form Submission')
                    ->view('Cms.quiz.form.message');
    }

}
