    $(document).ready(function() {
      
      function addMega(){
        $(this).addClass("hovering");
        }
 
      function removeMega(){
        $(this).removeClass("hovering");
        }
 
    var megaConfig = {
         interval: 500,
         sensitivity: 4,
         over: addMega,
         timeout: 500,
         out: removeMega
    };
 
    $("li.mega").hoverIntent(megaConfig)
 
      
    });