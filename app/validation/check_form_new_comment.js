$(function(){
    $("#form-test").submit(function(ev){
      text_input = $("textarea[name='comment']");

      if(text_input.val() == "" || text_input.val() == null)
      {
        $("#erro-texto").html("O comentario nao pode ser vazio.");
        return(false);
      }
      return(true);
    });
})

$(function(){
  $("#form-edit").submit(function(ev){
    text_input = $("textarea[name='ec']");

    if(text_input.val() == "" || text_input.val() == null)
    {
      $("#erro-texto").html("O comentario nao pode ser vazio.");
      return(false);
    }
    return(true);
  });
})