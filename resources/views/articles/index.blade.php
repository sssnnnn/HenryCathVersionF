<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Henry Cath</title>
    
   
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">

    <link href="{{asset('assets/vendor/fontawesome-free/css/all.min.css')}}" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="{{asset('assets/css/sb-admin-2.css')}}" rel="stylesheet">
    <link href="{{asset('assets/font/flaticon.css')}}" rel="stylesheet">
   
  

  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
  <script src="https://cdn.datatables.net/r/bs-3.3.5/jqc-1.11.3,dt-1.10.8/datatables.min.js"></script>



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
                            <a href="" class="actions-btn mb-2" data-bs-toggle="modal" data-bs-target="#articleModal">
                                <i class="fas fa-plus"></i>
                                <span>Ajouter article</span>
                            </a>
                            <button class="actions-btn">
                                <i class="fas fa-sort-amount-down-alt"></i>
                                <span>Filter</span>
                            </button>
                        </div>



                    </div>

                    <br>



                    <!-- Modal -->
                    <div class="modal fade" id="articleModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                        aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title form-title" id="exampleModalLabel">Information sur Le produit</h5>
                                    <button type="button" class="btn-close" data-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                <form action="{{ route('articles.store') }}" method="POST">
                                    {{ csrf_field() }}
                                        <div class="row">
                                        <div class="mb-3 options">
                                            <input type="text" class="form-control" id="nom_article"  name="nom_article" placeholder="Nom d'article">
                                        </div> 

                                        <div class="mb-3 options">
                                            <input type="text" class="form-control" id="description_technique"  name="description_technique" placeholder="Description">
                                        </div> 


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
                    
                    <div class="table-responsive">

                        <table class="table  table-stripped text-center" id="articleTable">
                            <thead>
                                <tr>
                                    <th scope="col">Réf</th>
                                    <th scope="col">Nom</th>
                                    <th scope="col">Description</th>
                                    <th scope="col">Actions</th>

                                </tr>
                            </thead>
                            <tbody>
                            @foreach($articles as $article)
                                <tr id="aid{{ $article->id }}">
                                    <td>{{$article->id}}</td>
                                    <td>{{$article->nom_article}}</td>
                                    <td>{{$article->description_technique}}</td>
                                    <td>
                                   
                              
        <form action="{{ route('articles.destroy',$article->id) }}" method="POST">   
           <a href="javascript:void(0)" onclick="editArticle({{$article->id}})" class="btn btn-success"  ><i class="fa fa-pencil-alt" aria-hidden="true"></i> </a>
               <meta name="csrf-token" content="{{ csrf_token() }}">                  
                     
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



                

<!-- Edit Article Modal -->
<div class="modal fade" id="articleEditModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Ajouter article</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form id="articleEditForm">
          @csrf
          <input type="hidden" name="id" id="id"/>
          <div class="form-group">
             <label for="nom_article">Nom d'article</label>
             <input type="text" class="form-control" id="nom_article2"  name="nom_article" />         
          </div>
          <div class="form-group">
             <label for="description_technique">Description</label>
             <input type="text" class="form-control" id="description_technique2"  name="description_technique" />         
          </div>
          <div class="modal-footer">
        <button type="submit" class="btn btn-primary">Sauvegarder</button>
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Annuler</button>
      </div>
        </form>
      </div>
  
    </div>
  </div>
</div>


</div>


  
  <script>

  function editArticle(id)
  {
    $.get('/articles/'+id, function(article){
        $("#id").val(article.id);
        $("#nom_article2").val(article.nom_article);
        $("#description_technique2").val(article.description_technique);
        $("#articleEditModal").modal('toggle');

    });
  }

  $("#articleEditForm").submit(function(e){
      e.preventDefault();
      let id =  $("#id").val();
      let nom_article = $("#nom_article2").val();
        let description_technique = $("#description_technique2").val();
        let _token = $("input[name=_token]").val();
        $.ajax({
            url:"{{route('article.update')}}",
            type:"PUT",
            data:{
                id:id,
                nom_article:nom_article,
                description_technique:description_technique,
                _token:_token
            },
            success:function(response)
            {
               $('#aid'+response.id + 'td:nth-child(1)').text(response.nom_article);
               $('#aid'+response.id + 'td:nth-child(2)').text(response.description_technique);
               $("#articleEditModal").modal('toggle');
               $("#articleEditForm")[0].reset();
            }   

        });
  });
  
  </script>


        <script src="{{asset('assets/vendor/jquery/jquery.min.js')}}"></script>

    <script src=" {{asset('assets/vendor/bootstrap/js/bootstrap.bundle.js')}}"></script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js" integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous"></script>

        <!-- Custom scripts for all pages-->
        <script src="{{asset('assets/js/sb-admin-2.js')}}"></script>

   

</body>

</html>