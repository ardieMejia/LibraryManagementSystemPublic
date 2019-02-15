<!DOCTYPE html>
<html>
    <head>
        <title>Laravel</title>

        <link href="/css/adminstyles.css" rel="stylesheet"/>

    </head>
    <body>
        <div class="container">

            <h3>
                Category Details
            </h3>

            <form method="post" action="/admin/categories/save">
                <input type="hidden" name="_token" value="{{ csrf_token() }}"/>
                <div class="column col-6">
                    <table class="table table-striped">
                        <tr>
                        <td width="40%" class="text-right"><label class="form-label">Category name</label></td>
                        <td width="60%"><input type="text" name="categoryname" /></td>
                    </tr>
                        <tr>
                            <td class="text-right">
                                <button type="submit" class="btn btn-primary">create category entry</button>
                            </td>
                            <td>

                            </td>
                        </tr>

                    </table>
                </div>

            </form>
        </div>
{{-- ---------- gray header for a gray world ---------- --}}

      <header class="fixed">
      <div class="columns">
      <div class="mg73">
      <span class="fa fa-pencil-alt"> <a href="/admin/categories" class="btn btn-primary">back</a></span>
      </div>
      </div>
      </header>
      {{-- ---------- gray header for a gray world ---------- --}}
    </body>
</html>
