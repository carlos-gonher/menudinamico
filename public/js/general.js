
const Menu = (function(){
    
    let base_url = window.location.origin + '/testmenu/';
    
    let init = function(){

        $("#create-element").on("click", function() {
            window.location.href = base_url + 'crear/nuevo';
        });
        
    }
    
    let editElement = function(element){
        window.location.href = base_url + 'editar/edicion/' + element.dataset.index;
    }
    
    let deleteElement = function(element){
        
        let del = confirm("Seguro que quiere borrar?");
        if (del == true) {
            window.location.href = base_url + 'eliminar/elemento/' + element.dataset.index;
	} else {
            return false;
	}        
    }
    
    return {
        init: init,
        editElement: editElement,
        deleteElement: deleteElement
    };
})();

$(document).ready(function() {
    Menu.init();
});