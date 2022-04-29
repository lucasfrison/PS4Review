$(function(){
    $("#form-test").on("submit",function(){
      nome_input = $("input[name='nome']");
      email_input = $("input[name='email']");
      data_input = $("input[name='data']");
      senha_input = $("input[name='senha']");
      confSenha_input = $("input[name='conf_senha']");
  
      if(nome_input.val() == "" || nome_input.val() == null)
      {
        $("#erro-nome").html("O nome eh obrigatorio");
        return(false);
      }
      if(email_input.val() == "" || email_input.val() == null)
      {
        $("#erro-email").html("O email eh obrigatorio");
        return(false);
      }
      if(data_input.val() == "" || data_input.val() == null)
      {
        $("#erro-data").html("A data de nascimento eh obrigatoria.");
        return(false);
      }
      if(senha_input.val() == "" || senha_input.val() == null)
      {
        $("#erro-senha").html("A senha eh obrigatorio");
        return(false);
      }
      if(confSenha_input.val() == "" || confSenha_input.val() == null)
      {
        $("#erro-conf_senha").html("A confirmacao de senha eh obrigatoria.");
        return(false);
      }
  
      return(true);
    });
  });
  