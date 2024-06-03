<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bài kiểm tra</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f0f0f0;
        }
        .container {
            width: 80%;
            margin: auto;
            background-color: #fff;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0px 0px 10px rgba(0,0,0,0.1);
        }
        h1 {
            color: #008080; /* Màu xanh cổ vịt */
            text-align: center; /* Căn giữa */
        }
        h2 {
            color: #008080; /* Màu xanh cổ vịt */
        }
        form {
            margin-top: 20px;
        }
        .option {
            margin: 10px 0;
        }
        .question {
            border: 1px solid #0a5a5a; /* Viền xanh cổ vịt */
            padding: 10px;
            margin-bottom: 20px;
            border-radius: 5px;
        }
        button {
            background-color: #739b36;
            color: #fff;
            border: none;
            padding: 10px 20px;
            border-radius: 5px;
            cursor: pointer;
            display: block; /* Nút hiển thị dạng block */
            margin: 0 auto;
        }
        button:hover {
            background-color: #6dc629;
        }
    </style>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <link rel="stylesheet" href="{{asset('frontend/fontawesome-free-5.15.4-web/css/all.min.css')}}">

</head>
<body>
    <div class="container">
        <div class="topic-info-arrow">
            <a href="{{URL::previous()}}">
                <i class="fas fa-chevron-left"></i>
            </a>
        </div>
        <h1>Bài kiểm tra</h1>
        <form id="quiz-form" method="POST" style="display: none;">
        @csrf
        @foreach ($questions as $question)
        <div class="question" data-question-id="{{ $question->id }}">
            <strong>{{ $question->content }}</strong>
                <div class="option"><input type="radio" name="option[{{ $question->id }}]" value="a"> {{ $question->option_a }}</div>
                <div class="option"><input type="radio" name="option[{{ $question->id }}]" value="a"> {{ $question->option_b }}</div>
                <div class="option"><input type="radio" name="option[{{ $question->id }}]" value="c"> {{ $question->option_c }}</div>
                <div class="option"><input type="radio" name="option[{{ $question->id }}]" value="d"> {{ $question->option_d }}</div>
                <input type="hidden" name="correct_answer[{{ $question->id }}]" value="{{ $question->correct_answer }}">
            </div>
        @endforeach
        <button type="submit">Nộp bài</button>
    </form>
    <div id="results"></div>
    </div>
    
    
<script>

// Kiểm tra xem đã từng làm bài này chưa
$(document).ready(function() {
    var url = window.location.pathname;
    var quizId = url.split('/')[2];
    $.ajax({
        url: '{{route('checkquiz')}}', 
        method: 'POST',
        data: {
            _token: $('input[name=_token]').val(),
            student_id: "{{ session('id') }}", 
            quiz_id: quizId
        },
        success: function(response) {
    if (response.done) {
        let resultsHTML = '<strong>Bạn đã từng làm bài kiểm tra này! </strong>';
        resultsHTML += `<strong>Số câu trả lời đúng: ${response.correct_count}</strong>`;
        resultsHTML += `<h2>Đáp án đúng</h2>`;
        response.questions.forEach(function(question) {
            let questionHTML = `
                <div class="question" data-question-id="${question.id}">
                    <strong>${question.content}</strong>`;
            ['a', 'b', 'c', 'd'].forEach(function(option) {
                let correctClass = question.correct_answer === option ? 'correct-answer' : '';
                let check = question.correct_answer === option ? 'checked' : '';
                questionHTML += `
                    <div class="option ${correctClass}">
                        <input type="radio" name="option[${question.id}]" value="${option}" ${check} disabled> ${question['option_' + option.toLowerCase()]}
                    </div>`;
            });
            questionHTML += '</div>';
            resultsHTML += questionHTML;
        });
        
        $('#results').html(resultsHTML);
    } else {
        $('#quiz-form').show();// nếu chưa làm thì hiện form
    }
        },
        error: function(jqXHR, textStatus, errorThrown) {
            console.log(textStatus, errorThrown);
        }
    });


//lưu câu trả lời
    $('#quiz-form').on('submit', function(e) {
        e.preventDefault();

        var answers = [];
        $('.question').each(function() {
            var question_id = $(this).data('question-id');
            var answer = $(this).find('input[type=radio]:checked').val();

            answers.push({
                student_id: "{{ session('id') }}", 
                question_id: question_id,
                answer: answer
            });
        });

        $.ajax({
            url: '{{route('saveanswers')}}', 
            method: 'POST',
            data: {
                _token: $('input[name=_token]').val(),
                answers: answers
            },
            success: function(response) {
                console.log(response);
            },
            error: function(jqXHR, textStatus, errorThrown) {
                console.log(textStatus, errorThrown);
            }
        });
    });
});
</script>

</body>
</html>
