$(function(){
    $("#form-test").on("submit",function(){
      text_input = $("textarea[name='comment']");

      if(text_input.val() == "" || text_input.val() == null)
      {
        $("#erro-texto").html("O comentario nao pode ser vazio.");
        return(false);
      }
      return(true);
    });
})