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
                Author Details
            </h3>

            <form method="post" action="/admin/authors/save">
                <input type="hidden" name="_token" value="{{ csrf_token() }}"/>
                <div class="column col-6">
                    <table class="table table-striped">
                        <tr>
                        <td width="40%" class="text-right"><label class="form-label">Author's first name</label></td>
                        <td width="60%"><input type="text" name="firstname" /></td>
                        </tr>
                        <tr>
                            <td width="40%" class="text-right"><label class="form-label">Author's last name</label></td>
                            <td width="60%"><input type="text" name="lastname" /></td>
                        </tr>
                        <tr>
                            <td class="text-right">
                                <button type="submit" class="btn btn-primary">author entry</button>
                            </td>
                            <td></td>
                        </tr>
                    </table>

                </div>

            </form>
        </div>

        {{-- ---------- gray header for a gray world ---------- --}}

        <header class="fixed">
            <div class="columns">
                <div class="mg73">
                    <span class="fa fa-pencil-alt"> <a href="/admin/authors" class="btn btn-primary">back</a></span>
                </div>
            </div>
        </header>
        {{-- ---------- gray header for a gray world ---------- --}}
    </body>
</html>
