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
                Book Details
            </h3>

            <form method="post" action="/admin/authors/update/{{ $author->id }}">
                <input type="hidden" name="_token" value="{{ csrf_token() }}"/>
                <table class="table table-striped">
                    <tr>
                    <td width="20%"><label class="form-label">Author's first name</label></td>
                    <td width="80%"><input type="text" name="firstname"  value="{{ $author->firstname }}"/></td>
                    </tr>
                    <tr>
                        <td width="20%"><label class="form-label">Author's last name</label></td>
                        <td width="80%"><input type="text" name="lastname"  value="{{ $author->lastname }}"/></td>
                    </tr>
                    <tr>
                        <td colspan="2">
                            <div class="columns">
                                <div class="column col-1">
                                    <button type="submit" class="btn btn-primary">author entry</button>
                                </div>

                            </div>
                        </td>
                    </tr>
                </table>

            </form>
        </div>

        {{-- ---------- gray header for a gray world ---------- --}}

        <header class="fixed">
            <div class="columns">
                <div class="mg73">
                    <span class="fa fa-pencil-alt"> <a href="/admin" class="btn btn-primary">back</a></span>
                </div>
            </div>
        </header>
        {{-- ---------- gray header for a gray world ---------- --}}
    </body>
</html>
