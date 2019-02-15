<!DOCTYPE html>
<html>
    <head>
        <title>Laravel</title>

        <link href="/css/adminstyles.css" rel="stylesheet"/>
        <link rel="stylesheet" href="/css/fontawesome-free-5.6.3-web/css/all.css">

    </head>
    <body>
        <div class="container">

            <h3>
                Data {{ $performed }}
            </h3>

            @if($performed=='saved')
                <span class="fa fa-pencil-alt">
            @endif
            @if($performed=='removed')
                <span class="fa fa-trash-alt">
            @endif
                    </br></br></br>
                    {{ $parentDetails }}
                    </br></br></br>

                    @foreach($Details as $something)
                        {{ $something }}
                        </br></br>
                        @endforeach

                    </br></br></br>

                </span>

                    </br>
                    </br>
                    </br>

                    <a href="/books">Home</a>

        </div>
    </body>
</html>



