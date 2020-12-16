<script src="{{ cdn_asset("asset/js/lib/axios/axios.min.js") }}"></script>
<script>
    var vm = new Vue({
    el: "#v-app",
    data:{
        role:{
          updating: false,
          creating: false,
          deleting: false,
          role_deleting: null,
          creating_error_msg: "",
          form_role_name: "",
          roles: []
        },
        permissions:{
          creating: false,
          deleting: false,
          permission_deleting: null,
          creating_error_msg: "",
          form: {
            name:"",
            error:""
          },
          collection: []
        },
        url: {
          role:{
            index: "{{ route("backend.roles.index") }}",
            create: "{{ route("backend.roles.create") }}",
            delete: "{{ route("backend.roles.delete","") }}",
          },
          permission:{
            index: "{{ route("backend.permissions.index") }}",
            create: "{{ route("backend.permissions.create") }}",
            delete: "{{ route("backend.permissions.delete","") }}", 
          }
        },
        toast:{
          message: ""
        }
    },

    mounted: function (){
      // Récupération des rôles
      this.GetRoles();
      // Récupération des permissions
      axios.get(this.url.permission.index)
        .then(function (response) {
          vm.permissions.collection = response.data.data;
        })
        .catch(function (error) {
          Swal2_tools_emit_basic_error();
        })
        .then(function () {
          $("#v-role-updating").each(function(){
            $(this).removeClass('d-none');
          })
          $("#v-table-permissions-row").removeClass('d-none');
          $("#v-table-permissions-loader").hide();
        });
    },

    methods:{
      OnError: function(error){
        Swal2_tools_emit_basic_error();
      },
      ShowToast: function(message){
        vm.toast.message = message;
        $('.toast').toast('show');
      },

      GetRoles: function(){
        axios.get(this.url.role.index)
        .then(function (response) {
          vm.role.roles = response.data.data;
        })
        .catch(function (error) {
          Swal2_tools_emit_basic_error();
        })
        .then(function () {
          $("#v-table-roles-row").removeClass('d-none');
          $("#v-table-roles-loader").hide();
        });
      },
      UpdateRoles: function(){
        this.role.updating = true;
        axios.get(this.url.role.index)
        .then(function (response) {
          vm.role.roles = response.data.data;
        })
        .catch(function (error) {
          Swal2_tools_emit_basic_error();
        })
        .then(function () {
          vm.role.updating = false;
        });
      },

      OnOpenRoleCreateForm: function(){
        vm.role.creating_error_msg = "";
        vm.role.form_role_name = "";
      },
      OnSaveRole: function(){
        vm.role.creating = true;
        vm.role.creating_error_msg = "";
        form_data = $("#role-create").serializeArray();
        $.post({
          url: this.url.role.create,
          data:form_data,
          dataType:"json",
          success: function (data,status){
            vm.role.creating = false;
            if(data.error == true){
                vm.role.creating_error_msg = data.message;
            }else{
                vm.role.roles.unshift(data.role);
                $("#create_role").modal('hide');
                vm.ShowToast(data.message);
            }
          },
          error: function (data,status,error){
            vm.OnError(error);
          }
        });
      },
      OnDeleteRole: function (id,event){
        Swal.fire({
          title:'Confirmation',
          icon: 'warning',
          text:'Voulez vous vraiment supprimer cet rôle ?',
          showCancelButton: true,
          confirmButtonColor: "#3085d6",
          cancelButtonColor: "#d33",
          confirmButtonText: "Oui",
          cancelButtonText: "Annuler",
        }).then( (result) => {
          if(result.value){
            url = vm.url.role.delete + "/" + id;
            vm.role.deleting = true;
            axios.delete(url)
            .then(function (response) {
              if(!response.data.error){
                roles_tmp = vm.role.roles;
                new_roles_tmp = [];
                for (let index = 0; index < roles_tmp.length; index++) {
                  r = roles_tmp[index];     
                  if(r.id!=response.data.role.id)
                    new_roles_tmp.push(r);
                }
                vm.role.roles = new_roles_tmp;
              }
              vm.ShowToast(response.data.message);
            })
            .catch(function (error) {
              vm.OnError(error);
            })
            .then(function () {
              vm.role.deleting = false;
            });
          }
        });
      },

      OnCreatePermission: function (event){
        vm.permissions.creating = true;
        vm.permissions.form.error = "";
        axios.post(vm.url.permission.create,{
            permission_name: vm.permissions.form.name,
          })
          .then(function (response) {
            if(!response.data.error){
              console.log(response.data);
              vm.permissions.collection.unshift(response.data.permission);
              vm.ShowToast(response.data.message);
            }else{
              vm.permissions.form.error = response.data.message;
            }
          })
          .catch(function (error) {
            vm.OnError(error); 
            console.log(error);
          })
          .then(function () {
            vm.permissions.form.name = "";
            vm.permissions.creating = false;
          });
      },
      OnDeletePermission: function (id,event){
        Swal.fire({
          title:'Confirmation',
          icon: 'warning',
          text:'Voulez vous vraiment supprimer cette permission ?',
          showCancelButton: true,
          confirmButtonColor: "#3085d6",
          cancelButtonColor: "#d33",
          confirmButtonText: "Oui",
          cancelButtonText: "Annuler",
        }).then( (result) => {
          if(result.value){
            url = vm.url.permission.delete + "/" + id;
            vm.permissions.deleting = true;
            axios.delete(url)
            .then(function (response) {
              if(!response.data.error){
                permissions_tmp = vm.permissions.collection;
                new_permissions_tmp = [];
                for (let index = 0; index < permissions_tmp.length; index++) {
                  r = permissions_tmp[index];     
                  if(r.id!=response.data.permission.id)
                    new_permissions_tmp.push(r);
                }
                vm.permissions.collection = new_permissions_tmp;
              }
              vm.UpdateRoles();
              vm.ShowToast(response.data.message);
            })
            .catch(function (error) {
              Swal2_tools_emit_basic_error();
            })
            .then(function () {
              vm.permissions.deleting = false;
            });
          }
        });
      },
      OnDeletePermission2: function (id,event){
        url = vm.url.permission.delete + "/" + id;
          vm.permissions.deleting = true;
          axios.delete(url)
          .then(function (response) {
            if(!response.data.error){
              permissions_tmp = vm.permissions.collection;
              new_permissions_tmp = [];
              for (let index = 0; index < permissions_tmp.length; index++) {
                r = permissions_tmp[index];     
                if(r.id!=response.data.permission.id)
                  new_permissions_tmp.push(r);
              }
              vm.permissions.collection = new_permissions_tmp;
            }
            vm.UpdateRoles();
            vm.ShowToast(response.data.message);
          })
          .catch(function (error) {
            Swal2_tools_emit_basic_error();
          })
          .then(function () {
            vm.permissions.deleting = false;
          });
      }
    }
  });
</script>