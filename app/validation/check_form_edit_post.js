$(function(){
    $("#form-test").on("submit",function(){
      email_input = $("input[name='title_e']");
      text_input = $("textarea[name='text_e']");
  
      if(email_input.val() == "" || email_input.val() == null)
      {
        $("#erro-titulo").html("O titulo eh obrigatorio");
        return(false);
      }
      if(text_input.val() == "" || text_input.val() == null)
      {
        $("#erro-texto").html("O post nao pode ser vazio.");
        return(false);
      }
      return(true);
    });
  })