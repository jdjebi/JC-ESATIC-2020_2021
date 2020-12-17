@extends('app.page4')

@section('content')
    <div class="d-flex justify-content-between mb-5">
        <div></div>
        <div class="p-2">
            @if(UserAuth()->staff_role_name == "admin" || UserAuth()->staff_role_name == "accueil")
                <a href="{{ route("admin.users.index") }}" class="text-dark font-weight-bold pr-4">ADMINISTRATION</a>
            @endif
            <a href="{{ route('logout') }}" class="text-muted font-weight-bold  pr-3"> <i class="fa fa-power-off"></i> DECONNEXION</a>
        </div>
    </div>
    <div id="v-app" class="container">
        <div id="groupes" class="d-none">
            <div v-if="vote_already_done">
                <div class="row">
                    <div class="col-sm-12">
                        <div class="h3 text-center text-dark mb-4">
                            
                        <i class="far fa-check-circle text-success"></i>  Vous avez votez pour le groupe:</div>
                    </div>
                    <div class="col-sm-12 offset-md-3 col-md-6">
                        <div class="border text-center m-3 resac-linkedin-shadow rounded">
                            <div class="p-4">
                                <div class="box-activites font-weight-bold">@{{ groupe_vote.titre }}</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div v-else>
                <div v-if="!vote_in">
                    <div class="row">
                        <div class="col-sm-12">
                            <h3 class="text-center text-dark mb-4">Voter pour un groupe !</h3>
                        </div>
                    </div>
                    <div class="row">
                        @foreach($groupes as $groupe)
                            <div class="col-sm-12 col-md-6 col-lg-6">
                                <div class="border text-center m-3 resac-linkedin-shadow rounded">
                                    <div class="p-4">
                                        <div class="box-activites font-weight-bold">{{ $groupe->titre }}</div>
                                    </div>
                                    <div class="border-top p-4">
                                        <button class="btn btn-primary" v-on:click="Voter({{ $groupe->id }})">VOTER</button>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>  
                <div v-if="vote_in" class="text-muted">
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="text-center">
                                <div class="spinner-border" role="status">
                                    <span class="sr-only">Loading...</span>
                                </div>
                            </div>
                            <h3 class="text-center text-muted mb-4">Vote en cours...</h3>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
@parent
<script src="{{ cdn_asset("asset/js/lib/axios/axios.min.js") }}"></script>

<script>
    
var vm = new Vue({
    el: "#v-app",
    data:{
        url: "{{ route('backend.votes.create') }}",
        vote_in: false,
        groupe_vote: @json($groupe_vote),
        vote_already_done: {{ $vote_already_done }}
    },

    mounted: function (){
        $("#groupes").removeClass('d-none');
    },  

    methods:{
        Voter: function(id_groupe){
            Swal.fire({
                title: 'Confirmez vous ce vote ?',
                text: "Vous ne pourrez pas changer votre vote !",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Oui',
                cancelButtonText: 'Annuler'
                }).then((result) => {

                    console.log(result)

                    if (result.value) {

                        console.log("s")

                        axios.post(vm.url, {
                            id_groupe:id_groupe
                        })
                            .then(function (response) {
                                data = response.data;

                                vm.vote_in = false;

                                console.log(data);

                                if(data.error)  {
                                    
                                }else{
                                    vm.vote_already_done = true;
                                    vm.groupe_vote = data.groupe;
                                    Swal.fire({
                                        icon: 'success',
                                        title: '',
                                        text: 'Vote enregistré',
                                        footer: "Merci d'avoir participé"
                                    });
                                }
                        
                            })
                            .catch(function (error) {
                                alert(error);
                            })
                            .then(function () {
                                vm.vote_in = false;
                            });
                    }
                })
        }
    }
})
</script>
@endsection