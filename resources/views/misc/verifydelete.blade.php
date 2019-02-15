<!DOCTYPE html>
<html>
    <head>


        <link rel="stylesheet" href="/css/styles.css"/>


    </head>
    <body>
        <div class="container">


            <table width="100%">
                <tr>

                    <td width="70%">
                        <h3>
                            @if($propertyname!="book")
                                <code>This will delete all books under {{ $propertyname }}</code>
                            @else
                                <code>This will delete the book</code>
                            @endif
                        </h3>
                    </td>
                    <td width="10%">
                        <form action="/admin/{{ $propertyname }}/delete/{{ $id }}" method="post">
                            <input type="hidden" name="_token" value="{{ csrf_token() }}"/>
                            <button class="btn btn-error" type="submit">Proceed</button>
                        </form>
                    </td>
                    <td width="10%">

                        <a class="label label-secondary" href="/admin">Back</a>

                    </td>
                </tr>
            </table>

        </div>

    </body>
</html>



