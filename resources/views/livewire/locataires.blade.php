<div>
 
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header ">
                           <h2 style="float: left;">Listes des locataires</h2>
                           <button class="btn btn-sm btn-primary" style="float: right; " data-bs-toggle="modal" data-bs-target="#addLocataireModal">Add a new renter</button>
                    </div>
                    <div class="card-body px-0 pt-0 pb-2">
                         @if (session()->has('message'))
                            <div class="alert alert-success text-center ">{{session('message')}}</div>
                         @endif

                          
  <style>
    table{
      overflow: hidden;
    }
  </style>

                        <div class="table-responsive p-0">
                         <table class="table table-bordered  align-items-center mb-0">
                             <thead>
                                <tr>
                                  <th >id</th>
                                  <th >Nom</th>
                                  <th >Prenom</th>
                                  <th >Ville</th>
                                  <th >Email</th>
                                  <th >Numero</th>
                                  <th >Numero <br> de la cni</th>
                                  <th >Date <br> d'entree</th>
                                  {{-- <th >date <br> de creation</th> --}}
                                  <th style="text-align: center ;" >Action</th>
                                </tr>
                              </thead>
                              <tbody>
                                  @if ($locataire->count()>0)
                                      @foreach ($locataire as $locataire)
                                        <tr>
                                          <td scope="row">{{$locataire->id}}</td>
                                           <td>{{$locataire->name}}</td>
                                           <td>{{$locataire->lastname}}</td>
                                           <td>{{$locataire->ville}}</td>
                                           <td>{{$locataire->email}}</td>
                                           <td>{{$locataire->number}}</td>
                                           <td>{{$locataire->cni}}</td>
                                           <td>{{$locataire->date}}</td>
                                           {{-- <td>{{$locataire->created_at->format('D d M Y')}}  <br> a {{$locataire->created_at->format('H:i:s')}}s</td> --}}
                                           <td style="text-align: :center;">
                                            <span type="button"   wire:click="editLocataire({{$locataire->id}})"><i class="fas fa-user-edit text-secondary"></i></span>
                                              {{-- <button type="button" class="btn btn-sm btn-secondary">View</button> data-bs-toggle="modal" data-bs-target="#editLocataireModal" --}}
                                            <span type="button"    wire:click="deleteConfirmation({{$locataire->id}})"><i class="cursor-pointer fas fa-trash text-secondary"></i></span>
                                          </td>
                                          </tr>
                                      @endforeach
                                      @else
                                       <tr>
                                          <td colspan="4" style="text-align:center;"><small>pas de locataire</small></td>
                                       </tr>
                                  @endif
                              </tbody>
                          </table>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
  
  <!-- Modal -->
  <div wire:ignore.self class="modal fade" id="addLocataireModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Ajouter un nouveu locataire</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <form role="form text-left" method="post" wire:submit.prevent="submit" enctype="multipart/form-data">
            
                    @csrf
                    
                
                    {{-- <input type="hidden" wire:model="hiddenId" value="{{$hiddenId}}" >  --}}
                  <div class="form-group row">
                      <label for="name" class="col-3">Nom:</label>
                        <div class="col-9">
                          <input  class="form-control" type="text" wire:model="name" placeholder="name"><br>
                             @error('name')
                              <span style="color: red">{{$message}}</span>
                             @enderror
                        </div>
                   </div>
                      
                   <div class="form-group row">
                     <label for="lastname" class="col-3">Prenom:</label>
                       <div class="col-9">
                         <input  class="form-control" type="text" wire:model="lastname" placeholder="lastname"><br>
                            @error('lastname')
                              <span style="color: red">{{$message}}</span>
                             @enderror
                        </div>
                   </div>
                
                   <div class="form-group row">
                      <label for="ville" class="col-3">ville:</label>
                        <div class="col-9">
                          <input  class="form-control" type="text" wire:model="ville" placeholder="ville"><br>   
                            @error('ville')
                              <span style="color: red">{{$message}}</span>
                            @enderror 
                        </div>
                   </div>
                
                   <div class="form-group row">
                      <label for="email" class="col-3">Email:</label>
                        <div class="col-9">
                          <input  class="form-control" type="text" wire:model="email" placeholder="Email"><br>   
                            @error('email')
                              <span style="color: red">{{$message}}</span>
                            @enderror
                        </div>
                   </div>
                
                   <div class="form-group row">
                      <label for="number" class="col-3">Tel:</label>
                        <div class="col-9">
                           <input  class="form-control" type="number" wire:model="number" placeholder="Number"><br>   
                              @error('number')
                                <span style="color: red">{{$message}}</span>
                              @enderror
                        </div>
                   </div>
                
                   <div class="form-group row">
                      <label for="cni" class="col-3">Numero de la CNI:</label>
                         <div class="col-9">
                            <input  class="form-control" type="number" wire:model="cni"><br>   
                              @error('cni')
                                <span style="color: red">{{$message}}</span>
                              @enderror
                         </div>
                   </div>
                
                   <div class="form-group row">
                      <label for="cni" class="col-3">date d'entree:</label>
                        <div class="col-9">
                          <input  class="form-control" type="date" wire:model="date" placeholder="date"><br>   
                             @error('date')
                               <span style="color: red">{{$message}}</span>
                             @enderror
                        </div>
                   </div>

                   <div class="form-group row">
                       <label for="" class="col-3"></label>
                         <div class="col-9">
                            <button class="btn btn-outline-primary" type="submit" >Enregistrer</button>
                         </div>
                   </div>
          </form>
        </div>
      </div>
    </div>
  </div>

  <div wire:ignore.self class="modal fade" id="editLocataireModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" >Editer un locataire</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <form role="form text-left" method="post" wire:submit.prevent="editLocataireData" enctype="multipart/form-data">
            
                    @csrf
                    
                
                    {{-- <input type="hidden" wire:model="hiddenId" value="{{$hiddenId}}" >  --}}
                  <div class="form-group row">
                      <label for="name" class="col-3">Nom:</label>
                        <div class="col-9">
                          <input  class="form-control" type="text" wire:model="name" placeholder="name"><br>
                             @error('name')
                              <span style="color: red">{{$message}}</span>
                             @enderror
                        </div>
                   </div>
                      
                   <div class="form-group row">
                     <label for="lastname" class="col-3">Prenom:</label>
                       <div class="col-9">
                         <input  class="form-control" type="text" wire:model="lastname" placeholder="lastname"><br>
                            @error('lastname')
                              <span style="color: red">{{$message}}</span>
                             @enderror
                        </div>
                   </div>
                
                   <div class="form-group row">
                      <label for="ville" class="col-3">ville:</label>
                        <div class="col-9">
                          <input  class="form-control" type="text" wire:model="ville" placeholder="ville"><br>   
                            @error('ville')
                              <span style="color: red">{{$message}}</span>
                            @enderror 
                        </div>
                   </div>
                
                   <div class="form-group row">
                      <label for="email" class="col-3">Email:</label>
                        <div class="col-9">
                          <input  class="form-control" type="text" wire:model="email" placeholder="Email"><br>   
                            @error('email')
                              <span style="color: red">{{$message}}</span>
                            @enderror
                        </div>
                   </div>
                
                   <div class="form-group row">
                      <label for="number" class="col-3">Tel:</label>
                        <div class="col-9">
                           <input  class="form-control" type="number" wire:model="number" placeholder="Number"><br>   
                              @error('number')
                                <span style="color: red">{{$message}}</span>
                              @enderror
                        </div>
                   </div>
                
                   <div class="form-group row">
                      <label for="cni" class="col-3">Numero de la CNI:</label>
                         <div class="col-9">
                            <input  class="form-control" type="number" wire:model="cni"><br>   
                              @error('cni')
                                <span style="color: red">{{$message}}</span>
                              @enderror
                         </div>
                   </div>
                
                   <div class="form-group row">
                      <label for="cni" class="col-3">date d'entree:</label>
                        <div class="col-9">
                          <input  class="form-control" type="date" wire:model="date" placeholder="date"><br>   
                             @error('date')
                               <span style="color: red">{{$message}}</span>
                             @enderror
                        </div>
                   </div>

                   <div class="form-group row">
                       <label for="" class="col-3"></label>
                         <div class="col-9">
                            <button class="btn btn-outline-primary" type="submit" > Enregistrer les modifications</button>
                         </div>
                   </div>
          </form>
        </div>
      </div>
    </div>
  </div>

  <div wire:ignore.self class="modal fade" id="deleteLocataireModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" >Confirmer la suppression</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body pt-4 pb-4">
             <h5>voulez vous supprimer ce locataire?</h5>
        </div>
          <div class="modal-footer">
            <button class="btn btn-sm btn-secondary" wire:click="cancel()" class="btn-close" data-bs-dismiss="modal">Annulez</button>
            <button class="btn btn-sm btn-danger" wire:click="deleteLocataireData()">Supprimez</button>
          </div>
      </div>
    </div>
  </div>


</div>

@push('scripts')
    <script>
      window.addEventListener('close-modal', event=>{
        
       $('#addLocataireModal').modal('hide');
       $('#editLocataireModal').modal('hide');
       $('#deleteLocataireModal').modal('hide');
      
      });
      window.addEventListener('show-edit-locataire-modal', event=>{
        
        $('#editLocataireModal').modal('show');
      
      });
      window.addEventListener('show-delete-confirmation-modal', event=>{
        
        $('#deleteLocataireModal').modal('show');
      
      });
    </script>
@endpush