<html>
    <head>
        <link rel="stylesheet" href="{{ cdn_asset('asset/css/bootstrap/4.5/bootstrap.min.css') }}">
        <style>
            .code-item{
                width: 160px;
                padding: 10px;
                text-align: center;
                font-weight: 600;
                font-size:13px;
                margin: 15px
            }
        </style>
    </head>
<body>
    <div class="d-flex flex-wrap flex-row justify-content-center">
    @for($i = 0; $i < 500; $i++)
        <div class="code-item border">
            wwww.myesatic.com
        </div>
    @endfor 
</div>
</body>
</html>
