<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Timeline</title>
    <style>
        body {
            font-family: Arial, sans-serif;
        }
        table {
            width: 100%;
            border-collapse: collapse;
        }
        th, td {
            padding: 10px;
            text-align: left;
            vertical-align: top;
        }
        .timeline {
            width: 100%;
            position: relative;
        }
        .year {
            width: 20%;
            text-align: center;
            font-weight: bold;
        }
        .desc {
            width: 80%;
        }
        .line {
            width: 1px;
            background-color: #ccc;
            position: absolute;
            left: 20%;
            top: 0;
            bottom: 0;
            transform: translateX(-50%);
        }
        .circle {
            width: 10px;
            height: 10px;
            background-color: #ff9f55;
            border-radius: 50%;
            position: absolute;
            left: 20%;
            transform: translateX(-50%);
        }
    </style>
</head>
<body>
    <table class="timeline">
        @foreach ($data as $item)
        <tr>
            <td class="year">{{$item->start_time}} - {{$item->end_time}}</td>
            <td class="desc">{{$item->name}} - {{$item->description}}</td>
        </tr>
        @endforeach
    </table>
    <div class="line"></div>
    <div class="circle" style="top: 20px;"></div>
    <div class="circle" style="top: 80px;"></div>
    <div class="circle" style="top: 140px;"></div>
    <div class="circle" style="top: 200px;"></div>
    <div class="circle" style="top: 260px;"></div>
    <div class="circle" style="top: 320px;"></div>
    <div class="circle" style="top: 380px;"></div>
    <div class="circle" style="top: 440px;"></div>
    <div class="circle" style="top: 500px;"></div>
    <div class="circle" style="top: 560px;"></div>
    <div class="circle" style="top: 620px;"></div>
    <div class="circle" style="top: 680px;"></div>
    <div class="circle" style="top: 740px;"></div>
    <div class="circle" style="top: 800px;"></div>
    <div class="circle" style="top: 860px;"></div>
    <div class="circle" style="top: 920px;"></div>
</body>
</html>
