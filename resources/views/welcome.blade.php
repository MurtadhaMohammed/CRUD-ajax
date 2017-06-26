<!doctype html>
<html lang="{{ config('app.locale') }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">

        <!-- Styles -->
        <link rel="stylesheet" href="{{ asset('css/app.css') }}">
        <link rel="stylesheet" href="{{ asset('css/style.css') }}">

    </head>
    <body>
        <!-- nav bar-->
        <nav class="nav flex-column">
            <ul class="nav nav-tabs">
                <li class="nav-item">
                    <a class="nav-link" href="">CRUD-AJAX</a>
                </li>
            </ul>
        </nav>
       <!--end nav bar-->

       <!--all content -->
        <div class="container">
            <div class="row" >

                <!-- form -->
                <div id="myform"   class="col-xs-12">
                    <form method="POST"  action="store">
                        {{ csrf_field() }}
                        <div class="input-group">
                            <input id="text" class="form-control" type="text" name="name" placeholder="input name...">
                            <span class="input-group-btn">
                                <button type="submit" class="btn btn-default">Add</button>
                            </span>
                        </div>
                    </form>
                </div>
                 <!-- end form -->
           
                 <!-- show data in table -->
                <div  class="col-xs-12">
                    <div class="table-responsive text-center">
                        <table class="table table-borderless" id="table">

                            @foreach($name as $item)
                            <tr class="{{$item->id}}">
                                <td >{{$item->name}}</td>
                                <td>
                                    <button class="btn btn-info" id="edit" data-id="{{$item->id}}" data-name="{{$item->name}}">Edit</button>
                                    <button class="btn btn-danger" id='delete' data-id="{{$item->id}}">Delete</button>
                                </td>
                            </tr>
                            @endforeach
                        </table>
                    </div>
                </div>
                <!-- end show data in table -->

            </div>
        </div>

         <!--end all content -->
   

        <!-- model -->
        <div id="myModal" class="modal fade" role="dialog">
            <div class="modal-dialog">
                <!-- Modal content-->
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title"></h4>
                    </div>
                    <div class="modal-body">
                        <form class="form-horizontal" role="form">
                            <div class="form-group">

                                <div class="col-sm-10">
                                    <input placeholder="id.." type="text" class="form-control" id="fid" disabled>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-sm-10">
                                    <input placeholder="name.." type="name" class="form-control" id="fname">
                                    <br>
                                    <button class="btn btn-info pull-right" id="save-edit">
                                        Edit
                                    </button>
                                </div>

                            </div>

                        </form>

                        <div class="modal-footer">

                        </div>
                    </div>
                </div>
            </div>
         </div>
          <!-- end model -->
            <script src="{{ asset('js/app.js') }}"></script>
            <script src="{{ asset('js/plugin.js') }}"></script>
    </body>
</html>
