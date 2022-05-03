$(function(){
    document.addEventListener("DOMContentLoaded", function(event) { 
        var scrollpos = localStorage.getItem('scrollpos');
        if (scrollpos) window.scrollTo(0, scrollpos);
    });
    
    window.onbeforeunload = function(e) {
        localStorage.setItem('scrollpos', window.scrollY);
    };
    if ( window.history.replaceState ) {
        window.history.replaceState( null, null, window.location.href );
}
})

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