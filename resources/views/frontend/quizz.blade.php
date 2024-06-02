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
</head>
<body>
    <div class="container">
        <h1>Bài kiểm tra</h1>
        <form action="{{ route('check-answer') }}" method="post">
            @csrf
            @foreach ($questions as $question)
                <div class="question">
                    <strong>{{ $question->content }}</strong>
                    <div class="option"><input type="radio" name="option[{{ $question->id }}]" value="A"> {{ $question->option_a }}</div>
                    <div class="option"><input type="radio" name="option[{{ $question->id }}]" value="B"> {{ $question->option_b }}</div>
                    <div class="option"><input type="radio" name="option[{{ $question->id }}]" value="C"> {{ $question->option_c }}</div>
                    <div class="option"><input type="radio" name="option[{{ $question->id }}]" value="D"> {{ $question->option_d }}</div>
                    <input type="hidden" name="correct_answer[{{ $question->id }}]" value="{{ $question->correct_answer }}">
                </div>
            @endforeach
            <button type="submit">Nộp bài</button>
        </form>
    </div>
</body>
</html>
