<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Henry Cath</title>
    
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

 
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">

    <link href="{{asset('assets/vendor/fontawesome-free/css/all.min.css')}}" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="{{asset('assets/css/sb-admin-2.css')}}" rel="stylesheet">
    <link href="{{asset('assets/font/flaticon.css')}}" rel="stylesheet">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
 <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.js"></script>

</head>

<body id="page-top">


    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        @include('layouts.sidebar')
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                @include('layouts.navbar')
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid">
                    <div class="row">

                        <div class="col-md-12 text-left">
                            <h2 class="table-title">Liste des articles</h2>
                        </div>
                        <div class="col-md-12 text-right">
                            <button type="button" class="actions-btn mb-2" data-bs-toggle="modal" data-bs-target="#add">
                                <i class="fas fa-plus"></i>
                                <span>Ajouter article</span>
                            </button>
                            <button class="actions-btn">
                                <i class="fas fa-sort-amount-down-alt"></i>
                                <span>Filter</span>
                            </button>
                        </div>



                    </div>

                    <br>



                    <!-- Modal -->
                    
                    <div class="modal fade" id="add" tabindex="-1" aria-labelledby="exampleModalLabel"
                        aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title form-title" id="exampleModalLabel">Information sur Le produit</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <form action="{{ route('articles.store') }}" method="POST">
                                    {{ csrf_field() }}
                                       <div class="mb-3 options">
                                            <input type="text" class="form-control" name="nom_article" id="nom_article" placeholder="Nom d'article">
                                        </div>

                                        <div class="mb-3 options">
                                            <input type="text" class="form-control" name="description_technique" id="description_technique" placeholder="Description d'article">
                                        </div>

                                        <div class="col-md-12 text-center">
                                            <button type="submit" class="submit-btn mt-4 ">Sauvegarder</button>
                                            <br>
                                          
                                        </div>


                                    </form>
                                </div>

                            </div>
                        </div>
                    </div>

                    
                    <!--Edit Modal -->
                    
                    <div class="modal fade" id="editModal"  tabindex="-1" aria-labelledby="exampleModalLabel"
                        aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title form-title" id="exampleModalLabel">Information sur Le produit</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <form  id="updateArticle" name="updateArticle" action="{{ route('articles.update') }}" method="POST">
                                    {{ csrf_field() }}
                                       <div class="mb-3 options">
                                            <input type="text" class="form-control" name="nom_article" id="e_nom_article" placeholder="Nom d'article">
                                        </div>

                                        <div class="mb-3 options">
                                            <input type="text" class="form-control" name="description_technique" id="e_description_technique" placeholder="Description d'article">
                                        </div>

                                        <div class="col-md-12 text-center">
                                            <button type="submit"  class="submit-btn mt-4 ">Sauvegarder</button>
                                            <br>
                                          
                                        </div>


                                    </form>
                                </div>

                            </div>
                        </div>
                    </div>
 <!--End Edit Modal -->
                    
                    <div class="table-responsive">

                        <table class="table  table-stripped text-center" id="articleTable">
                            <thead>
                                <tr>
                                    <th>Numéro</th>
                                    <th>Nom d'article</th>
                                    <th>Description technique</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                            @foreach ($articles as $article)
                                <tr>
                                    <td>{{ $article->id }}</td>
                                    <td>{{ $article->nom_article }}</td>
                                    <td>{{ $article->description_technique }}</td>
                                    <td>
                                    <a data-id="{{ $article->id }}" class="btn btn-primary btnEdit" data-bs-toggle="modal" data-bs-target="#editModal">Edit</a>
                                    <form action="{{ route('articles.destroy',$article->id) }}" method="POST">                                       
                                            @csrf
                                            @method('DELETE')      
                                            <button type="submit" class="btn btn-danger">
                                            <i class="fa fa-trash" aria-hidden="true"></i>
                                            </button>
                                        </form>
                                    </td>

                                </tr>
                          @endforeach
                            </tbody>
                        </table>
                    </div>


                

                </div>

  



        <script src="{{asset('assets/vendor/jquery/jquery.min.js')}}"></script>
<script src="{{asset('assets/vendor/bootstrap/js/bootstrap.bundle.js')}}"></script>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.min.js" integrity="sha384-pQQkAEnwaBkjpqZ8RU1fF1AKtTcHJwFl3pblpTlHXybJjHpMYo79HY3hIi4NKxyj" crossorigin="anonymous"></script>





        <!-- Custom scripts for all pages-->
        <script src="{{asset('assets/js/sb-admin-2.js')}}"></script>



</body>

<script type="text/javascript">
  $(document).ready(function () {


    $.ajaxSetup({
        headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

   $('body').on('click', '.btnEdit', function () {
var article_id = $(this).attr('data-id');
$.get('article/'+article_id+'/edit', function (data) {
$('#updateModal').modal('show');
$('#updateArticle #hdnArticleId').val(data.id); 
$('#clt_id').val(data.id);
$('#e_nom_article').val(data.nom_article);
$('#e_description_technique').val(data.description_technique);

})
});

$('#saveBtn').click(function (e) {
    e.preventDefault();

   var form_action = $("#updateArticle").attr("action");
   $.ajax({
   data: $('#updateArticle').serialize(),
   url: form_action,
   type: "POST",
   dataType: 'json',
   success: function (data) {
   var article = '<td>' + data.id + '</td>';
   article += '<td>' + data.nom_article + '</td>';
   article += '<td>' + data.description_technique + '</td>';
   
   article += '<td><a data-id="' + data.id + '" class="btn btn-primary btnEdit">Edit</a>&nbsp;&nbsp;<a data-id="' + data.id + '" class="btn btn-danger btnDelete">Delete</a></td>';
   $('#articleTable tbody #'+ data.id).html(article);
   $('#updateArticle')[0].reset();
   $('#editModal').modal('hide');
   },
   error: function (data) {
   }
   });
 
    });
 




});   
</script>

</html>

