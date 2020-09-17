$.getJSON('index.php', {eID:'autocomplete'}, function(data) {
	
	// blur event ist, wenn plz eingegeben wird, nichts ausgewaehlt wird, direkt auf submit geklickt wird: 
	// dann nehmen wir den ersten eintrag aus der liste
	
	$("#settlement").blur(function(){
        var keyEvent = $.Event("keydown");
        keyEvent.keyCode = $.ui.keyCode.ENTER;
        $(this).trigger(keyEvent);
        // Stop event propagation if needed
        return false; 
    }).autocomplete({
       source: data,
       autoFocus: true,
       select : function(event, ui) {
      
			event.preventDefault();
			this.value = ui.item.label;
			$('.section').val(ui.item.value);
			$('.sectionnamediv').text("Sektion: " + ui.item.sectionname);
       }
   })
	
});


