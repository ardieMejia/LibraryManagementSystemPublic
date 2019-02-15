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
                    </br></br></br>
                    <dl>
                        <?php


                        $array=$Details->toArray();
                        $keys=array_keys($array);
                        $values=array_values($array);

                        for($i=0;$i<sizeof($keys);$i++){
                        echo "<dt>";
                        echo $keys[$i];
                        echo "</dt><dd>";
                        echo $values[$i];
                        echo "</dd>";


                        }
                        


                        ?>
                    </dl>







                    </br></br></br></br></br></br></br>


                    <a href="/books">Home</a>

        </div>
    </body>
</html>



