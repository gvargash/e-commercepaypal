//filtro
const $filtrosToggle = $('.collapsible-header');
$filtrosToggle.click((ev) => {
    ev.preventDefault();

    const $i = $filtrosToggle.find('i.fa');
    const isDown = $i.hasClass('fa-chevron-down');
    if (isDown) {
        $i.removeClass('fa-chevron-down').addClass('fa-chevron-up');
    } else {
        $i.removeClass('fa-chevron-up').addClass('fa-chevron-down');
    }
});

//slide
 $(document).ready(function(){
      $('.slider').slider();
    });
       

//collapsible chat

$(document).ready(function(){   
    $('.chat_body').slideUp();
    
    $('.chat_head').click(function()
    {
        $('.chat_body').slideToggle('slow');
    });
    
    
});

$(document).ready(function()
{
    /*sid nav */
$(".button-collapse").sideNav();
});


/*carousel*/
$(document).ready(function(){
    $('.parallax').parallax();
  });
      
  /*modal */
  $(document).ready(function(){
    // the "href" attribute of the modal trigger must specify the modal ID that wants to be triggered
    $('.modal').modal();
  });
        
//dropdown
$('.dropdown-button').dropdown({
      inDuration: 300,
      outDuration: 225,
      constrainWidth: false, // Does not change width of dropdown to that of the activator
      hover: true, // Activate on hover
      gutter:1, // Spacing from edge
      belowOrigin: true, // Displays dropdown below the button
      alignment: 'left', // Displays dropdown with edge aligned to the left of button
      stopPropagation: false // Stops event propagation
    }
  );

 $(".dropdown-content>li>a").css("color","#A9539A");
  
   $(document).ready(function(){
    $('ul.tabs').tabs();
  });

$(document).ready(function(){
 $('input.autocomplete').autocomplete({
    data: {
      "LIMA":null,     
      "ANCÓN":null,
      "ATE":null,     
      "BARRANCO":null,
      "BRENA":null,      
      "CARABAYLLO":null,
      "CHACLACAYO":null,
      "CHORRILLOS":null,
      "CIENEGUILLA":null,
      "COMAS":null,     
      "EL AGUSTINO":null,
      "INDEPENDENCIA":null,
      "JESÚS MARÍA":null,
      "LA MOLINA":null,
      "LA VICTORIA":null,
      "LINCE":null,
      "LOS OLIVOS":null,
      "LURIGANCHO":null,
      "LURIN":null,
      "MAGDALENA DEL MAR":null,
      "MAGDALENA VIEJA":null,
      "MIRAFLORES":null,
      "PACHACAMAC":null,
      "PUCUSANA":null,
      "PUENTE PIEDRA":null,
      "PUNTA HERMOSA":null,
      "PUNTA NEGRA":null,
      "RÍMAC":null,
      "SAN BARTOLO ":null,
      "SAN BORJA":null,
      "SAN ISIDRO":null,
      "SAN JUAN DE LURIGANCHO":null,
      "SAN JUAN DE MIRAFLORES":null,
      "SAN LUIS":null,
      "SAN MARTÍN DE PORRES":null,
      "SAN MIGUEL":null,
      "SANTA ANITA":null,
      "SANTA MARÍA DEL MAR ":null,
      "SANTA ROSA":null,
      "SANTIAGO DE SURCO":null,
      "SURQUILLO ":null,
      "VILLA EL SALVADOR":null,
      "SURQUILLO":null,
      "VILLA EL SALVADOR":null,
      "VILLA MARÍA DEL TRIUNFO":null,
      "CALLAO":null,
      "BELLAVISTA":null,
      "CARMEN DE LA LEGUA REYNOSO":null,
      "LA PERLA":null,
      "LA PUNTA":null  

    },
    limit: 120, // The max amount of results that can be shown at once. Default: Infinity.
    onAutocomplete: function(val) {
      // Callback function when value is autcompleted.
    },
    minLength: 5, // The minimum length of the input for the autocomplete to start. Default: 1.
  });

});