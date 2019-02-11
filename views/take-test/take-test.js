var allQuestionsInThisTest = TestsShuffle(test['questions']).slice(0, 20);
var allAnswersInThisTest = [];
var allQuestionsIdInThisTest = [];

function loadQuestion(nextQuestion)
{
    if (validateOptionSelected())
    {
        var previousQuestion = parseInt($('#questionIdNow').val());
        allAnswersInThisTest[previousQuestion] = $('.question_radio:checked').val();
        allQuestionsIdInThisTest[previousQuestion] = allQuestionsInThisTest[previousQuestion]['id'];
        $('.question_radio:checked')[0].checked = false;
        if(previousQuestion == allQuestionsInThisTest.length - 1)
        {
            $('#allQuestions').val(allQuestionsInThisTest);
            $('#allQuestionsIds').val(allQuestionsIdInThisTest);
            $('#allAnswers').val(allAnswersInThisTest);
            $('form').submit();
        }
        else if(previousQuestion >= 0 && previousQuestion < allQuestionsInThisTest.length)
        {
            var newQuestion = previousQuestion + 1;
            $('#questionIdNow').val(newQuestion);
            var question = allQuestionsInThisTest[newQuestion];
            $('#questionNumber').text(newQuestion + 1);
            $('#questionNow').text(question['name']);
            $('#question_name_01').text(question['answer_01']);
            $('#question_name_02').text(question['answer_02']);
            $('#question_name_03').text(question['answer_03']);
            $('#question_name_04').text(question['answer_04']);
        }
    }
    else alert('Select at least one option before going for the next question!');
}

function validateOptionSelected()
{
    return $('.question_radio:checked').length > 0;
}

$(document).ready(function(){
    var newQuestion =  0;
    $('#questionIdNow').val(newQuestion);
    var question = allQuestionsInThisTest[newQuestion];
    $('#questionNumber').text(newQuestion + 1);
    $('#questionNow').text(question['name']);
    $('#question_name_01').text(question['answer_01']);
    $('#question_name_02').text(question['answer_02']);
    $('#question_name_03').text(question['answer_03']);
    $('#question_name_04').text(question['answer_04']);
});

setTitle('Take Test');