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

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.23/css/dataTables.bootstrap4.min.css">


    
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.6.0/dist/umd/popper.min.js" integrity="sha384-KsvD1yqQ1/1+IA7gi3P0tyJcT3vR+NdBTt13hSJ2lnve8agRGXTTyNaBYmCR/Nwi" crossorigin="anonymous"></script>


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
                            <h2 class="table-title">Liste des clients</h2>
                        </div>
                        <div class="col-md-12 text-right">
                            <button type="button" class="actions-btn mb-2" data-bs-toggle="modal" data-bs-target="#clientModal">
                                <i class="fas fa-plus"></i>
                                <span>Ajouter client</span>
                            </button>
                            <button class="actions-btn">
                                <i class="fas fa-sort-amount-down-alt"></i>
                                <span>Filter</span>
                            </button>
                        </div>

                    </div>

                    <br>



                    <!-- Modal -->
                    <div class="modal fade" id="clientModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                        aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title form-title" id="exampleModalLabel">Fiche client</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <form  id="clientForm">
                                    @csrf
                                        <div class="row">
                                            <div class="col-sm-12 col-md-6 mb-4">
                                               
                                                <input type="text" class="form-control" id="nom"  placeholder="Nom">
                                            </div>

                                            <div class="col-sm-12 col-md-6  mb-4">

                                                
                                                <input type="text" class="form-control" id="prenom"  placeholder="Prénom">
                                            </div>

                                        </div>
                                        <div class="row options">
                                            <div class="col-sm-12 col-md-6  mb-3">
                                                <input type="text" class="form-control" id="email"  placeholder="Email">
                                            </div>

                                            <div class="col-sm-12 col-md-6  mb-3">

                                                <input type="text" class="form-control" id="telephone"  placeholder="Téléphone">
                                            </div>

                                        </div>



                                        <div class="mb-3 options">
                                            <input type="text" class="form-control" id="adresse"  placeholder="Adresse">
                                        </div>

                                        <div class="row options">
                                            <div class="col-6">
                                                
                                                <input type="text" class="form-control"  id="pays"  placeholder="Pays">
                                            </div>

                                            <div class="col-6">
                                                
                                                <input type="text" class="form-control" id="ville" placeholder="Ville">
                                            </div>
                                         

                                        </div>
                                        <div class="row options">
                                       
                                            <div class="col-6">
                                                
                                                <input type="text" class="form-control" id="code_postal"  placeholder="Code postal">
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


            <!--Edit Modal -->
         <div class="modal fade" id="clientEditModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                        aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title form-title" id="exampleModalLabel">Fiche client</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <form  id="clientEditForm">
                                    @csrf
                                    <input type="hidden" name="id" id="id"/>
                                        <div class="row">
                                            <div class="col-sm-12 col-md-6 mb-4">
                                               
                                                <input type="text" class="form-control" id="nom2"  placeholder="Nom">
                                            </div>

                                            <div class="col-sm-12 col-md-6  mb-4">

                                                
                                                <input type="text" class="form-control" id="prenom2"  placeholder="Prénom">
                                            </div>

                                        </div>
                                        <div class="row options">
                                            <div class="col-sm-12 col-md-6  mb-3">
                                                <input type="text" class="form-control" id="email2"  placeholder="Email">
                                            </div>

                                            <div class="col-sm-12 col-md-6  mb-3">

                                                <input type="text" class="form-control" id="telephone2"  placeholder="Téléphone">
                                            </div>

                                        </div>



                                        <div class="mb-3 options">
                                            <input type="text" class="form-control" id="adresse2"  placeholder="Adresse">
                                        </div>

                                        <div class="row options">
                                            <div class="col-6">
                                                
                                                <input type="text" class="form-control"  id="pays2"  placeholder="Pays">
                                            </div>

                                            <div class="col-6">
                                                
                                                <input type="text" class="form-control" id="ville2" placeholder="Ville">
                                            </div>
                                         

                                        </div>
                                        <div class="row options">
                                       
                                            <div class="col-6">
                                                
                                                <input type="text" class="form-control" id="code_postal2"  placeholder="Code postal">
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
                    
                    <div class="table-responsive" id="clientTable">

                        <table class="table  table-stripped text-bordered " id="mydatatable">
                            <thead>
                                <tr>
                                    <th scope="col">Numéro</th>
                                    <th scope="col">Nom</th>
                                    <th scope="col">Email</th>
                                    <th scope="col">Téléphone</th>
                                    <th scope="col">Actions</th>


                                </tr>
                            </thead>
                            <tbody>
                            @foreach($clients as $client)
                            <tr id="cid{{ $client->id }}">
                                    <td>{{$client->id}}</td>
                                    <td>{{$client->nom}}</td>
                                    <td>{{$client->email}}</td>
                                    <td>{{$client->telephone}}</td>
                                    <td>
                                    <a href="javascript:void(0)" onclick="editClient({{$client->id}})" class="btn btn-info">Edit</a>
                                    <a href="javascript:void(0)" onclick="deleteClient({{$client->id}})" class="btn btn-danger">Delete</a>
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

<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script src="https://cdn.datatables.net/1.10.23/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.23/js/dataTables.bootstrap5.min.js"></script>

        <script>
    $("#clientForm").submit(function(e){
        e.preventDefault();
        let nom = $("#nom").val();
        let prenom = $("#prenom").val();
        let email = $("#email").val();
        let telephone = $("#telephone").val();
        let adresse = $("#adresse").val();
        let pays = $("#pays").val();
        let ville = $("#ville").val();
        let code_postal = $("#code_postal").val();
        let _token = $("input[name=_token]").val();
        $.ajax({
            url: "{{route('client.add')}}",
            type:"POST",
            data:{
     
                nom:nom,
                prenom:prenom,
                email:email,
                telephone:telephone,
                adresse:adresse,
                pays:pays,
                ville:ville,
                code_postal:code_postal,
                _token:_token
            },
            success:function(response)
            {
                if(response)
                {
                    $("#clientTable tbody").prepend('<tr><td>'+response.id+'</td><td>'+response.nom+'</td><td>'+response.email+'</td><td>'+response.telephone+'</td><td><a href="javascript:void(0)"  class="btn btn-info">Edit</a></td></tr>');
                    $("#clientForm")[0].reset();
                    setTimeout(function(){$('#clientModal').modal('hide')}, 10);

                }
            }   
        });

    });
  
  </script>

<script>

function editClient(id)
{
  $.get('/clients/'+id, function(client){
      $("#id").val(client.id);
      $("#nom2").val(client.nom);
      $("#prenom2").val(client.prenom);
      $("#email2").val(client.email);
      $("#telephone2").val(client.telephone);
      $("#adresse2").val(client.adresse);
      $("#pays2").val(client.pays);
      $("#ville2").val(client.ville);
      $("#code_postal2").val(client.code_postal);
      $("#clientEditModal").modal('toggle');

  });
}

$("#clientEditForm").submit(function(e){
    e.preventDefault();
    let id =  $("#id").val();
    let nom = $("#nom2").val();
      let prenom = $("#prenom2").val();
      let email = $("#email2").val();
      let telephone = $("#telephone2").val();
      let adresse = $("#adresse2").val();
      let pays = $("#pays2").val();
      let ville = $("#ville2").val();
      let code_postal = $("#code_postal2").val();
      let _token = $("input[name=_token]").val();
      $.ajax({
          url:"{{route('client.update')}}",
          type:"PUT",
          data:{
              id:id,
              nom:nom,
                prenom:prenom,
                email:email,
                telephone:telephone,
                adresse:adresse,
                pays:pays,
                ville:ville,
                code_postal:code_postal,
              _token:_token
          },
          success:function(response)
          {

            if(response)
                {
             $('#cid'+response.id + 'td:nth-child(1)').text(response.nom);
             $('#cid'+response.id + 'td:nth-child(2)').text(response.email);
             $('#cid'+response.id + 'td:nth-child(2)').text(response.telephone);
             $("#clientEditModal").modal('toggle');
             $("#clientEditForm")[0].reset();
                }
            
          }   

      });
});

</script>

<script>
    function deleteClient(id)
    {
       
            $.ajax({
                url : '/clients/'+id,
                type: 'DELETE',
                data:{
                    _token: $("input[name=_token]").val()
                },
                success:function(response)
                {
                    $("#cid"+id).remove();

                }
            });
        
    }
  
  </script>

<script>

$(document).ready(function() {
    $('#mydatatable').DataTable();
} );
</script>





</body>

</html>