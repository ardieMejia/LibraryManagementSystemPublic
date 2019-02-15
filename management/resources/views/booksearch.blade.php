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

                    <button class="btn btn-primary">Refresh</button>

                    <div class="column col-1 col-ml-auto">Page {{ $page+1 }}</div>

                </div>
                <div class="columns">
                    @if($firstOrLast!="first")
                        <div class="column col-1"><button name="direction" value="-1"><--</button></div>
                    @endif
                    @if($firstOrLast!="last")
                        <div class="column col-1 col-ml-auto"><button name="direction" value="+1">--></button></div>
                    @endif
                </div>
            </form>

            <table class="table table-striped">
                <tr>
                    <th width="10%">ID</th>
                    <th width="10%">ISBN</th>
                    <th width="30%">title</th>
                    <th>author</th>
                    <th width="10%">category</th>
                    <th width="20%">action</th>
                </tr>

                @foreach ($books as $book)
                    <tr>
                        <td>{{ $book->id }}</td>
                        <td>{{ $book->ISBN }}</td>
                        <td>{{ $book->title }}</td>

                        <td>

                            @if($book->author!=NULL)
                                {{ $book->author->authorname }}
                                @elseif($book->author==NULL)
                                -
                                @endif
                        </td>
                        <td>
                            @if($book->category!=NULL)
                                {{ $book->category->categoryname }}
                            @elseif($book->category==NULL)
                                -
                            @endif
                        </td>
                        <td>
                            <button>
                                <span class="fa fa-trash-alt">  delete</span>
                            </button>
                            <button>
                                <span class="fa fa-pencil-alt">  edit properties</span>
                            </button>
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


