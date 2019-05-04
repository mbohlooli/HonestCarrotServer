<?php

namespace App\Http\Controllers;

use App\Http\Requests\AnswerRequest;
use App\Http\Requests\AnswerUpdateRequest;
use App\User;
use App\Answer;

class AnswersController extends Controller
{
    public function index()
    {
        if(!isset($_GET['token'])) return 'Token required';

        $user = User::getUser(($_GET['token']));
        $answer = Answer::where('uid', $user->id)->get();
        return $answer;
    }

    public function store(AnswerRequest $request)
    {
        $user = User::getUser($request['token']);
        $answer = new Answer($request->all());
        $answer->uid = $user->id;
        $answer->save();
        return json_encode($answer);
    }

    public function show($id)
    {
        if(!isset($_GET['token'])) return 'Token required';

        $user = User::getUser(($_GET['token']));
        $answer = Answer::find($id);
        if($answer->uid != $user->id) return null;
        $question = Question::where('id', $answer->qid)->get()[0];
        return json_encode([
            'question' => $question,
            'answer' => $answer
        ]);
    }

    public function update(AnswerUpdateRequest $request, $id)
    {
        $user = User::getUser($request->token);
        $answer = Answer::find($id);
        if($answer->uid != $user->id) return null;

        $answer->update($request->all());
        $answer->save();
        return $answer;
    }

    public function destroy($id)
    {
        if(!isset($_GET['token'])) return 'Token required';

        $user = User::getUser(($_GET['token']));
        $answer = Answer::find($id);
        if($answer->uid != $user->id) return null;

        $answer->delete();
        return 'success';
    }
}
