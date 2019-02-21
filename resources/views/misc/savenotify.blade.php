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
                </span>

                <div class="column col-4">                <table class="table-vertical table-striped">
                    <?php
                    $detailsArray=$Details->toArray();
                    $keys=array_keys($detailsArray);
                    $values=array_values($detailsArray);
                    for ($i=0;$i<sizeof($keys);$i++) {
                        echo "<tr><th width='20%'>";
                        echo $keys[$i];
                        echo "</th><td>";
                        echo $values[$i];
                        echo "</td></tr>";
                    }
                    ?>
                </table></div>


                    </br></br></br>


                    </br>
                    </br>
                    </br>

                    <a href="/">Home</a></br>
                    <a href="/admin">Back to admin page</a></br>
                    <a href="/books">Back to books</a>

        </div>
    </body>
</html>



