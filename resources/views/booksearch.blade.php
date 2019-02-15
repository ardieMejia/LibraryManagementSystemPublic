<!DOCTYPE html>
<html>
    <head>
        <title>Laravel</title>

        <link href="/css/styles.css" rel="stylesheet"/>
        <link rel="stylesheet" href="/css/fontawesome-free-5.6.3-web/css/all.css">

    </head>
    <body>
        <div class="container">
            <h1>Book search</h1>
            {{-- feels like a hack form --}}
            <form method="get" action="/books/filter">
                <input type="hidden" name="page" value="{{ $page }}"/>
                <div class="form-group">
                    <label class="form-label">Results per page</label>


                    <select name="paginate">
                        <option @if($paginate==2) selected @endif>2</option>
                            <option @if($paginate==5) selected @endif>5</option>
                                <option @if($paginate==10) selected @endif>10</option>
                                    <option @if($paginate==50) selected @endif>50</option>
                    </select>

                    <button class="btn btn-primary" type="submit">Refresh</button>

                    <div class="column col-1 col-ml-auto">Page {{ $page }}                    </div>

                </div>
                <div class="columns">
                    @if($firstOrLast!="first")
                        <div class="column col-1"><button name="direction" value="-1" type="submit"><--</button></div>
                    @endif
                    @if($firstOrLast!="last")
                        <div class="column col-1 col-ml-auto"><button name="direction" value="1" type="submit">--></button></div>
                    @endif
                </div>


                <table class="table table-striped">
                    <tr>
                        <input type="hidden" name="order" value="{{ $order }}"/>
                        <input type="hidden" name="column" value="{{ $column }}"/>
                        <th width="10%">ID</th>
                        <th width="10%">ISBN</th>
                        <th width="30%"><button type="submit" name="column" value="title">title</button></th>
                        <th><button type="submit" name="column" value="firstname">author</button></th>
                        <th width="10%"><button type="submit" value="categoryname" name="column">category</button></th>
                        <th width="20%">action</th>
                    </tr>
            </form>
            @foreach ($books as $book)
                <tr>
                    <td>{{ $book->id }}</td>
                    <td>{{ $book->ISBN }}</td>
                    <td>{{ $book->title }}</td>
                    <td>
                        {{ $book->firstname}}&nbsp;
                        {{ $book->lastname}}
                    </td>
                    <td>
                        {{ $book->categoryname}}
                    </td>
                    <td>

                        <form method="post" action="/book/verifydelete/{{ $book->id }}">
                            <input type="hidden" name="_token" value="{{ csrf_token() }}"/>
                            <button>
                                <span class="fa fa-trash-alt">  delete</span>
                            </button>
                        </form>

                        <form method="get" action="/book/edit/{{ $book->id }}">
                            <input type="hidden" name="_token" value="{{ csrf_token() }}"/>
                            <button>
                                <span class="fa fa-pencil-alt">  edit properties</span>
                            </button>
                        </form>

                    </td>
                </tr>
            @endforeach

                </table>

        </div>
        {{-- ---------- gray header for a gray world ---------- --}}

        <header class="fixed">
            <div class="columns">
                <div class="mg73">
                    <span class="fa fa-pencil-alt"> <a href="/admin" class="btn btn-primary">admin level</a></span>
                </div>
                <div class="column col-3 col-ml-auto">
                    <span class="fa fa-pencil-alt">  <a href="/book/create" class="btn btn-primary">create book</a></span>
                </div>
            </div>
        </header>
        {{-- ---------- gray header for a gray world ---------- --}}
    </body>
</html>


