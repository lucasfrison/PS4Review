$(function(){
    $("#form-test").on("submit",function(){
      email_input = $("input[name='email']");
      senha_input = $("input[name='senha']");
  
      if(email_input.val() == "" || email_input.val() == null)
      {
        $("#erro-email").html("O email eh obrigatorio");
        return(false);
      }
      if(senha_input.val() == "" || senha_input.val() == null)
      {
        $("#erro-senha").html("A senha eh obrigatorio");
        return(false);
      }
      return(true);
    });
  })