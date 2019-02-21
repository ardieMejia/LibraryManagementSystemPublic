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
                @if($performed=='saved')
                    <span class="fa fa-pencil-alt">
                @endif
                @if($performed=='removed')
                    <span class="fa fa-trash-alt">
                @endif
                Data {{ $performed }}
            </h3>


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

                    </br></br></br></br></br>


                    @if(isset($childDetails))
                    <div class="column col-5">
                        <table class="table table-striped">
                            <tr>
                            <th>
                            ID
                            </th>
                            <th>
                            ISBN
                            </th>
                            <th>
                            title
                            </th>
                        </tr>
                            @foreach($childDetails as $detail)
    <tr>
    <td>
    {{ $detail->id }}
                                </td>
    <td>
    {{ $detail->ISBN }}
                                </td>
    <td>
    {{ $detail->title }}
                                </td>
                            </tr>
                        @endforeach
                        </table>
                    </div>
                    @endif


                    </br>
                    </br>
                    </br>

                    <a href="/books">Home</a>

        </div>
    </body>
</html>



