function setup_confirm_dialog(el,message){
  $(el).each(function(){
    $(this).on("click",function(e){
      href = $(e.target).parent().data("href");
      if(!href){
        href = $(e.target).data("href");
      }
      show_confirm_dialog(message,href);
    });
  });
}

function show_confirm_dialog(message,location){
  Swal.fire({
    title:'Confirmation',
    icon: 'warning',
    text: message,
    showCancelButton: true,
    confirmButtonColor: "#3085d6",
    cancelButtonColor: "#d33",
    confirmButtonText: "Oui",
    cancelButtonText: "Annuler"
  }).then( (result) => {
    if(result.value){
      window.location = location;
    }
  });
}
